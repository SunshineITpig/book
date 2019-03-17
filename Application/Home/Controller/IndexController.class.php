<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

/**
 *前台默认控制器 
 */
class IndexController extends CommonController {
	/**
 	*默认选择页 
 	*/
    public function index(){
        $db = M('floor');
        $where = array('isoff' => 0);
        $area = $db->where($where)->select();
        $this->assign('area', $area);// 赋值数据集
        $this->display();
    }

    /**
    *默认主页 
    */
    public function main(){
        //实例化模型
        $db = M('floor');
        //取出form表单传来的楼层参数
        $fid = I('fid','intval');

        //找到楼层相对相应的map，存入session，打印座位
        $area = $db->field('content,fname')->where(array('fid' => $fid))->find();
        $fname = $area['fname'];
        $res = $area['content'];
        $_SESSION['map'] = $res;

        //找到楼层已预定的座位str
        $condition['sfid'] = $fid;
        $condition['isbook'] = "1";
        $result = M('seat')->field('sname')->where($condition)->order('sname')->select();//已预定的座位名称集
        $count = count($result);//已预定的座位数
        
        //座位列数
        $clo = $db->field('column')->where(array('fid' => $fid))->find();
        //转换座位号用于渲染
        $returnseat = "";
        for($x=0; $x < $count; $x++){ 
            $return = workout($res,$result[$x]['sname'],$clo['column']); 
            $returnseat = $returnseat . "'" . $return . "'" . "," ;
        }
        $str = "[" . $returnseat . "]";

        //将楼层和map和已预订str传回前台,赋值数据集
        $this->assign('fid', $fid);
        $this->assign('res', $res);
        $this->assign('return', $str);
        $this->assign('fname', $fname);
   
        //模板页展示
        $this->display();
    }


    /**
    *预订座位
    */
    public function bookseat(){

        //取出js传来的楼层和座位参数
        $floor = I('floorname','intval');
        $seat = I('seatname','intval');
        //组合查询条件
        $condition['sfid'] = $floor;
        $condition['sname'] = $seat;


        //判断用户是否被锁定或者信任值不够
        $where = M('user')->field('islock,trust')->where(array('id' => $_SESSION['uid']))->find();
        if(intval($where['trust']) < 60){
                echo json_encode(array('status' => 0, 'msg'=>'用户信任值低'));
                return;
        }
        
        if ($where['islock']) {
            echo json_encode(array('status' => 0, 'msg'=>'用户还未签离'));
        }else{
            if( M('seat')->where($condition)->save(array('isbook'=>1)) ){

                //座位列数
                $area = M('floor')->field('column')->where(array('fid' => $floor))->find();
                //取出座位map
                $res = $_SESSION['map'];
                //转换座位号,用于渲染
                $returnseat = workout($res,$seat,$area['column']);

                //写入历史记录
                $data = array(
                    'booktime' =>  time(),
                    'risbook'  =>  1,
                    'fid'      =>  $floor,
                    'sid'      =>  $seat,
                    'uid'      =>  session('uid')
                    );
                M('record')->data($data)->add();

                //锁定用户不许再次预定
                M('user')->where(array('id' => $_SESSION['uid']))->save(array('islock'=>1));

                //组合json消息传入js文件
                echo json_encode(array('status' => 1, 'msg'=>'预订成功', 'rseat' => $returnseat));

                //15分钟后若isattance=0且islock=1则信任值减3分
            }else{
                echo json_encode(array('status' => 0, 'msg'=>'预订失败'));
            }
        }    
    }   



    /**
    *签离座位
    */
    public function leftseat(){

        //取出session签离信息
        $where['uid'] = $_SESSION['uid'];
        $where['risbook'] = 1;
        $floorandseat = M('record')->field('fid,sid')->where($where)->find();
        $condition['sfid'] = $floorandseat['fid'];
        $condition['sname'] = $floorandseat['sid'];

        //取出session用于渲染
        //座位列数
        $area = M('floor')->field('column')->where(array('fid' => $condition['sfid']))->find();
        //取出座位map
        $res = $_SESSION['map'];
        //转换座位号,存入cookie用于渲染
        $returnseat = workout($res,$condition['sname'],$area['column']);
        // $returnseat = $_COOKIE['returnseat'];

        if( M('seat')->where($condition)->save(array('isbook'=>0)) ){
            //解除用户锁定
            M('user')->where(array('id' => $_SESSION['uid']))->save(array('islock'=>0));
            //解除用户签到记号
            // M('user')->where(array('id' => $_SESSION['uid']))->save(array('isattance'=>0));

            //写入历史记录
            $data = array(
                'lefttime' =>  time(),
                'risbook'  =>  0, 
                );
            M('record')->where($where)->save($data);

            echo json_encode(array('status' => 1, 'msg'=>'签离成功', 'rseat' => $returnseat));
        }else{
            echo json_encode(array('status' => 0, 'msg'=>'签离失败'));
            // echo json_encode(array('status' => 0, 'msg'=> $returnseat));
        }
    }

    /**
    *个人信息展示
    */ 
    public function information(){
        //信任值展示
        $db = M('user');
        $where = array('id' => $_SESSION['uid']);
        $trust = $db->where($where)->field('trust')->find();
        $this->assign('trust', $trust['trust']);

        //预订记录分页展示
        $total = M('record')->where(array('uid' => $_SESSION['uid']))->count();
        $page = new page($total, 4);
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','末页');
        $page->setConfig('theme', ' 共 %TOTAL_ROW% 条数据 共%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $page->show();

        $record = M('record')->where(array('uid' => $_SESSION['uid']))->order('rid DESC')->limit($page->firstRow, $page->listRows)->select();
        $this->assign('record', $record);
        $this->assign('page', $show);

        $this->display();
    }

    /**
    *修改密码
    */ 
    public function change(){
        $pwd = I('name');
        $repwd = I('rename');

        if ($pwd != $repwd) {
            echo json_encode(array('status' => 0, 'msg'=>'两次密码不一致'));
        }

        $db = M('user');
        $where = array('id' => $_SESSION['uid']);
        if ($db->where($where)->save(array('passwd' => $pwd ))) {
            echo json_encode(array('status' => 1, 'msg'=>'修改成功'));
        }else{
            echo json_encode(array('status' => 0, 'msg'=>'修改失败'));
        }
    }

    /**
    *举报功能
    */ 
    public function report(){
        $seat = I('seat');
        $content = I('content');
        $con = $seat . $content ;

        $db = M('letter');
        $data = array(
            'rtime'     =>  time(),
            'content'  =>  $con
            );
        
        if (M('letter')->data($data)->add()) {
            echo json_encode(array('status' => 1, 'msg'=>'举报成功'));
        }else{
            echo json_encode(array('status' => 0, 'msg'=>'举报失败'));
        }
    }
}