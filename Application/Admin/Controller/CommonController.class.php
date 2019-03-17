<?php
namespace Admin\Controller;
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
		if (!isset($_SESSION['adminid']) || !isset($_SESSION['username']))
			$this->redirect('Login/index');
	}

}