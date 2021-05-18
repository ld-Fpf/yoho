<?php 
class LoginController extends Controller{
	private $_model;
	// 初始化扩展函数变量
	public function __init(){
		$this->_model = K('AdminUser');
	}
	public function index(){
		// 打印所有框架常量
		// print_const();
		// 如果已经登录  不可在进入login页面
		if(isset($_SESSION['aid']) && isset($_SESSION['adminname'])){
			// 直接跳转函数go 没有提示
			go(U('Index/index'));
		}
		// 判断是否是post提交
		if(IS_POST){
			// 执行验证
			if(!$data = $this->_model->validate_login()) $this->error($this->_model->error);
			// p($data);die;
			// 验证成功的话 把用户信息保存进session
			session('aid', $data['user_id']);
			session('adminname', $data['username']);
			// 执行跳转
			$this->success('登陆成功', U('Index/index'));
		}
		// 显示视图
		$this->display();
	}

	/**
	 * [code 显示验证码]
	 * @return [type] [description]
	 */
	public function code(){
		$code = new Code();
		$code->show();
	}

	/**
	 * [logout 退出处理函数]
	 * @return [type] [description]
	 */
	public function logout(){
		session(NULL);
		$this->success('退出成功', U('Login/index'));
	}
}