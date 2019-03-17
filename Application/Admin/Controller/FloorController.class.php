<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

/**
 *楼层管理控制器 
 */
class FloorController extends Controller
{
	/**
	 *后台首页显示
	 */
	public function index()
	{
		$db = M('floor');
		$total = $db->count();
		$page = new Page($total, 5);
		$page->setConfig('first','首页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('last','末页');
		$page->setConfig('theme', ' 共 %TOTAL_ROW% 条数据 共%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show = $page->show();
	
		$floor = $db->field('fid,fname,isoff')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('category', $floor);
		$this->display();
	}

	/**
	 *添加楼层
	 */
	public function add()
	{
		if (IS_POST) {	
			$seatmap = I('seatmap');
			$fname = I('fname');
			$data['fname'] = $fname;
			$data['isoff'] = I('isoff', 'intval');
			$data['column'] = I('col');
			$data['content'] = $seatmap;
			M('floor')->add($data);

			$res = M('floor')->where(array('fname' => $fname))->field('fid')->find();
			$count = substr_count($seatmap,"e");
			for($x=1; $x<=$count; $x++){  
				$datacache['sname'] = $x;
				$datacache['sfid'] = $res['fid'];
				M('seat')->add($datacache);
			}
			$this->success('添加成功!',U('index'));
		}
		$this->display();
	}

	/**
	 * 关闭或开启楼层
	 */
	public function isoff(){
		$fid = I('fid', 'intval');
		$w = I('w', 'intval');
		$condition['fid'] = $fid;
		if($w == 1){
			M('floor')->where($condition)->save(array('isoff'=>1));
			$this->success("关闭成功");
		} else {
			M('floor')->where($condition)->save(array('isoff'=>0));
			$this->success("开启成功");
		}
	}
	/**
	 * 编辑楼层
	 */
	public function edit(){
		//展示
		$fid = I('fid', 'intval');
		$condition['fid'] = $fid;
		$dba =  M('floor');
		$floor = $dba->where($condition)->find();
		$this->assign('category', $floor);
		//修改
		if(IS_POST){
			$fname = I('fname');
			$seatmap = I('seatmap');
			$data['fname'] = $fname;
			$data['isoff'] = I('isoff', 'intval');
			$data['column'] = I('col');
			$data['content'] = $seatmap;


			$where = array('fname' => $fname);
			//保存参数
			$db = M('floor');
			$db->where($where)->save($data);
			$res = $db->where($where)->field('fid,content')->find();

			//删除原有座位	
			M('seat')->where(array('sfid'=> $res['fid']))->delete();
			//新建座位
			$count = substr_count($seatmap,"e");
			for($x=1; $x<=$count; $x++){  
				$datacache['sname'] = $x;
				$datacache['sfid'] = $res['fid'];
				M('seat')->add($datacache);
			}

			$this->success('修改成功',U('index'));
			
		}
		$this->display();
	}
	/**
	 * 删除楼层
	 */
	public function del(){
		$fid = I('fid', 'intval');
		$condition['fid'] = $fid;
		p($fid);
		//删除楼层
		M('seat')->where(array('sfid'=> $fid) )->delete();
		M('floor')->where($condition)->delete();
		$this->success('删除成功');
	}

	


}