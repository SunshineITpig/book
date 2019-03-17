<?php
namespace Admin\Controller;
use Think\Controller;

/**
 *后台默认控制器 
 */
class LoginController extends Controller
{
	/**
	 *登录验证
	 */
	public function login()
	{
		$username = I('account');
        $userpwd = I('pwd');

        $condition['account'] = $username;
    	$condition['passwd'] = $userpwd;
        $admin = M('admin');

        $result = $admin->where($condition)->find();
        if ($result) {
        	$_SESSION['adminid'] = $result['adid'];
			$_SESSION['username'] = $result['account'];
        	$this->redirect(U('Index/index'));
        }
	}

	/**
	 *登录页显示
	 */
	public function index()
	{
		$this->display();
	}

	

	/**
     * 退出登录处理
     */
    public function out(){
        //删除session
    	session_unset();
    	session_destroy();

        //跳转致登录页
    	$this->redirect(U('Login/index'));
    }

}