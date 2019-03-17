<?php
namespace Home\Controller;
use Think\Controller;

/**
 *公用控制器 
 */
class CommonController extends Controller
{
	/**
	 *初始化
	 */
	Public function _initialize () {

		//处理自动登录
		if (isset($_COOKIE['auto']) || !isset($_SESSION['uid'])) {
			$value = explode('|' , encryption($_COOKIE['auto'], 1));
			$ip = get_client_ip();

			//本次登录IP与上次登录IP一致时
			if ($ip) {
				$username = $value[0];
				$where = array('username' => $username);

				$user = M('user')->where($where)->field(array('id'))->find();

				//检索出用户信息时，保持登录状态
				if ($user) {
					session('uid', $user['id']);
				}
			}
		}

		//判断用户是否已登录
		if (!isset($_SESSION['uid'])) 
			$this->redirect('Login/index');
	}

}