<?php 
class UserModel extends Model{
	public $table = 'yoho_user';
	// 自动验证规则
	public $validate = array(
		array('email', 'nonull', '邮箱不能为空', 2, 3),
		array('password', 'nonull', '密码不能为空', 2, 3),
	);

	// 自动验证
	public function validate_login(){
		// 验证失败 返回
		if(!$this->create()) return false;
		// 获取提交的用户名和密码
		$email = Q('post.email');
		$password = Q('post.password', '', 'md5');
		// 数据库中查询数据
		$data = $this->where(array('email' => $email))->find();
		// 如果跟数据库信息不一致 设置错误提示
		if(!$data || $password != $data['password']){
			$this->error = '用户名或密码不正确';
			return false;
		}
		// 返回数据
		return $data;
	}


	// 注册信息验证
	public function validate_reg(){
		$email = Q('post.email');
		$pswd_c = Q('post.password');
		$pswd = Q('post.password', '', 'md5');
		$pswdc = Q('post.password1', '', 'md5');
		$code = Q('post.verify_code', '', 'strtoupper');
		// 验证码验证
		if(empty($code)){
			$this->error = '验证码不能为空';
			return false;
		}
		// 如果跟session中保存的验证码字段不一致 返回错误
		if($code != session('code')){
			$this->error = '验证码错误';
			return false;
		}
		// 用户名验证
		$preg = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
		if(empty($email)){
			$this->error = '邮箱不能为空';
			return false;
		}else{
			if(!preg_match($preg, $email)){
				$this->error = '邮箱不合法';
				return false;
			}
		}
		if($this->where(array('email' => $email)) -> find()){
			$this->error = '该邮箱已存在';
			return false;
		}
		// 密码验证
		if(empty($pswd_c)){
			$this->error = '密码不能为空';
			return false;
		}else{
			if(strlen($pswd_c)<5 || strlen($pswd_c)>10){
				$this->error = '密码长度不能小于5位或大于10位';
				return false;
			}
		}
		// 确认密码验证
		if($pswdc != $pswd){
			$this->error = '两次密码不一致';
			return false;
		}

		return true;
	}

	/**
	 * [add_user 新增会员]
	 * @param [type] $data [description]
	 */
	public function add_user(){
		$password = Q('post.password');
		$pswd = md5("{$password}");
		$data = array('email' => Q('post.email'), 'password' => $password);
		return $this->add($data);
	}

	/**
	 * [add_user 编辑会员]
	 * @param [type] $data [description]
	 */
	public function edit_user($data){
		return $this->save($data);
	}

	/**
	 * [add_user 删除会员]
	 * @param [type] $data [description]
	 */
	public function del_user($uid){
		return $this->del($uid);
	}

	/**
	 * [get_all_data 查询所有数据]
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	public function get_all_data($where=NULL){
		$data = $this->where($where)->all();
		return $data;
	}

	/**
	 * [get_one_data 查询单条数据]
	 * @param  [type] $where [description]
	 * @return [type]        [description]
	 */
	public function get_one_data($where = NULL){
		$data = $this->where($where)->find();
		return $data;
	}
}