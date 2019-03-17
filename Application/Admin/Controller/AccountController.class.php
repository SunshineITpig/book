<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;

/**
 *后台默认控制器 
 */
class AccountController extends Controller
{
	/**
	 *添加处理
	 */
	public function add()
	{
		if (IS_POST) {
			$count = I('num', 'intval');
			$username = I('start', 'intval');		
			
			$data['passwd'] = I('psw') ;
			for($x=0; $x<$count; $x++){  
				$data['username'] = $username + $x;
				M('user')->add($data);
			}
			$this->success('添加成功!',U('index'));
		}
		$this->display();
	}

	/**
	 *删除处理
	 */
	public function del()
	{
		if (IS_POST) {
			$count = I('num', 'intval');
			$username = I('start', 'intval');		
			
			for($x=0; $x<$count; $x++){  
				$where['username'] = $username + $x;
				M('user')->where($where)->delete();
			}
			$this->success('删除成功!',U('index'));
		}
		$this->display();
	}

	/**
	 *查看处理
	 */
	public function index()
	{
		$db = M('user');
		$total = $db->count();
		$page = new Page($total, 10);
		$page->setConfig('first','首页');
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('last','末页');
		$page->setConfig('theme', ' 共 %TOTAL_ROW% 条数据 共%TOTAL_PAGE%页 %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show = $page->show();
	
		$user = $db->field('id,username')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('category', $user);
		$this->display();
	}


}