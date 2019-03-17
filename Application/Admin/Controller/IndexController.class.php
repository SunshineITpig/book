<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

/**
 *后台默认控制器 
 */
class IndexController extends Controller
{
	/**
	 *后台首页显示
	 */
	public function index()
	{
		$this->display();
	}
	/**
	 *举报显示
	 */
	public function report()
	{
		$db = M('letter');
		$total = $db->count();
		$page = new Page($total, 5);
		$page->setConfig('first','首页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('last','末页');
		$page->setConfig('theme', ' 共 %TOTAL_ROW% 条数据 共%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show = $page->show();
	
		$letter = $db->field('lid,content,from,rtime')->limit($page->firstRow.','.$page->listRows)->order('lid DESC')->select();
		$this->assign('page',$show);
		$this->assign('category', $letter);
		$this->display();
	}
	/**
	 *举报删除
	 */
	public function del()
	{
		$lid = I('lid', 'intval');
		$condition['lid'] = $lid;
		//删除楼层
		M('letter')->where($condition)->delete();
		$this->success('删除成功');
	}
	/**
	 *修改密码
	 */
	public function passwd()
	{
		if(IS_POST){
            $passwdF = I('passwdF');
            $passwdS = I('passwdS');

            if($passwdF != $passwdS) $this->error('两次密码不相同');

            // M('admin')->where(array('adid'=>session('adid')))->save(array('passwd'=>$passwdF));
            $this->success("修改成功",U('index'));
        }
		$this->display();
	}


}