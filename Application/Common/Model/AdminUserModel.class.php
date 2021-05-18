<?php 
class AdminUserModel extends Model{
	public $table = 'yoho_admin_user';

	// 自动验证规则
	public $validate = array(
		array('username', 'nonull', '用户名不能为空', 2, 3),
		array('password', 'nonull', '密码不能为空', 2, 3),
		array('code', 'nonull', '验证码不能为空', 2, 3),
	);

	// 自动验证
	public function validate_login(){
		// 验证失败 返回
		if(!$this->create()) return false;
		// 获取验证码 并转成大写
		$code = Q('post.code', '', 'strtoupper');
		// 如果验证码跟session中保存的验证码信息不相同 设置错误提示
		if($code != session('code')){
			$this->error = '验证码错误';
			return false;
		}
		// 获取提交的用户名和密码
		$username = Q('post.username');
		$password = Q('post.password', '', 'md5');
		// 数据库中查询数据
		$data = $this->where(array('username' => $username))->find();
		// p($data);die;
		// 如果跟数据库信息不一致 设置错误提示
		if(!$data || $password != $data['password']){
			$this->error = '用户名或密码不正确';
			return false;
		}
		// 更新登陆时间和登录ip
		$data['logintime'] = time();
		$data['loginip'] = $_SERVER["REMOTE_ADDR"];
		$this->save($data);
		// 返回数据
		return $data;
	}
}