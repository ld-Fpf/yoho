<?php
class TypeattrController extends Controller{
    private $_model;
    public function __init(){
        $this->_model = K('TypeAttr');
    }

    public function index(){
        $where['type_id'] = Q('get.tid');
        $data = $this->_model->get_all_data($where,true);
        $this->assign('page',$data['page']);
        //在分页分配完成之后，$data['page'] 就没有用了，
        //所以删除掉它，要不循环会有问题
        unset($data['page']);
        $this->assign('data',$data);
        $this->display();
    }

	// 新增数据
    public function add(){
        if(IS_POST){
            // p(Q('post.'));die;
            // 执行模型添加 其中包含了 自动验证
            if(!$this->_model->add_data()) $this->error($this->_model->error);
             $this->success('添加成功',U('index', array('tid'=>$_GET['tid'])));
        }
        $this->display();
    }

    // 编辑数据
    public function edit(){
        // 判断是不是post提交
        if(IS_POST){
            // p(Q('post.'));die;
            // 执行model类中的edit_data函数进行验证 通过修改成功 失败返回错误提示
            if(!$this->_model->edit_data()) $this->error($this->_model->error);
            // echo $this->_model->getlastsql();die;
            $this->success('修改成功',U('index', array('tid'=>$_GET['tid'])));
        }
        // p(Q('get.'));die;
        // 查找get方式提交过来的所属tid的所有内容查找出来
        $data = $this->_model->get_one_data(array('taid' => Q('get.taid', 0, 'intval')));
        // p($data);die;
        // 赋予模版变量
        $this->assign('data', $data);
        $this->display();
    }

    // 删除数据
    public function del(){
        $this->_model->del_data();
        $this->success('删除成功',U('index', array('tid'=>$_GET['tid'])));
    }
}