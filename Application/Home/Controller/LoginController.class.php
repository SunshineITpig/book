<?php
namespace Home\Controller;
use Think\Controller;

/**
 *登录控制器 
 */
class LoginController extends Controller
{
	/**
	 *登录页显示
	 */
	public function index()
	{
		$this->display();
	}
	/**
	 * 验证码显示
	 */
	public function verify(){
		$config = array(
            'imageW'    =>    80,
            'imageH'    =>    25,
            'fontSize'  =>    12,    // 验证码字体大小
            'length'    =>    1,     // 验证码位数
            'useNoise'  =>    false, // 关闭验证码杂点
            'useCurve'  =>    false,
        	'codeSet'   =>    '0123456789'
        );
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}
	/**
	 * 登录验证
	 */
	public function login(){
		//判断验证码是否正确
		$verify = I('verify');
		if(!check_verfiy($verify)) 
			$this->error('验证码不正确');

		//判断用户名或者密码是否正确
		$account = I('account');
		$passwd = I('pwd', 'md5');
		$user = M('user');
		$condition['username'] = $account;
    	$condition['passwd'] = $passwd;
		$result = $user->where($condition)->find();

		if(!$result){
			$this->error('用户名或者密码不正确');
		}

		//处理下一次自动登录
		if (isset($_POST['auto'])) {
			$ip = get_client_ip();
			$value = $account . '|' . $ip;
			$value = encryption($value);
			@setcookie('auto', $value, C('AUTO_LOGIN_TIME'),'/');
		}

		//登录成功写入SESSION并且跳转到首页
		session('uid', $result['id']);
		$this->success('登录成功,正在为您跳转...', __APP__);
	}

	/**
     * 退出登录处理
     */
    public function out(){
        //删除session
    	session_unset();
    	session_destroy();
       
       	//删除用于自动登录的cookie
    	@setcookie('auto', '', time()-3600, '/');

        //跳转致登录页
    	$this->redirect(U('Login/index'));
    } 
    
}