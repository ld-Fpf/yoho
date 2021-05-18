<?php 
class UserController extends Controller{
	private $_model;
	public function __init(){
		$this->_model = K('User');
	}

	/**
	 * [register 注册函数]
	 * @return [type] [description]
	 */
	public function register(){
		if(IS_POST){
			// 注册信息验证
			if(!$this->_model->validate_reg()){
				$this->error($this->_model->error);
			}
			$user = $this->_model -> add_user();
			if($user){
				session('username', Q('post.email'));
				session('uid', $user);
				$this -> success('注册成功', __ROOT__);
			}
			$this->error('注册失败');
		}

		$this->display();
	}

	/**
	 * [login 登录函数]
	 * @return [type] [description]
	 */
	public function login(){
		// 如果已经登录  不可在进入login页面
		if(isset($_SESSION['uid']) && isset($_SESSION['username'])){
			// 直接跳转函数go 没有提示
			go(U('Index/index'));
		}
		// 判断是否是post提交
		if(IS_POST){
			// 执行验证
			if(!$data = $this->_model->validate_login()) $this->error($this->_model->error);
			//判断是否自动登录
			if(isset($_POST['auto'])){
				setcookie(session_name(),session_id(),time() + 3600 * 24 * 7, '/');
			}else{
				setcookie(session_name(),session_id(),0, '/');
			}
			// p($data);die;
			// 验证成功的话 把用户信息保存进session
			session('uid', $data['user_id']);
			session('username', $data['email']);
			// 执行跳转
			$this->success('登陆成功', U('Index/index'));
		}
		$this->display();
	}

	/**
	 * 验证码
	 */
	public function code(){
		$code = new Code();
		$code -> show();
	}

	/**
	 * [logout 退出处理函数]
	 * @return [type] [description]
	 */
	public function logout(){
		session(NULL);
		$this->success('退出成功', U('Index/index'));
	}


	// ajax判断验证码
	public function ajax_check_code(){
		if(!IS_AJAX) $this->error('非法请求');
		$code = Q('post.verify_code','','strtoupper');
		$status = array();
		if($code != session('code')){
			$status['status'] = 0;
			$status['message'] = '验证码错误';
			
		}else{
			$status['status'] = 1;
			$status['message'] = '验证码OK';
		}
		//替代echo json_encode();die;
		$this->ajax($status);
	}
}