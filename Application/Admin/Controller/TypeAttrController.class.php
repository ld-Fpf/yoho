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
            $avalue = Q('post.attr_value');
            $taid = $this->_model->add_data();
            if(!$taid) $this->error($this->_model->error);
            // 属性值表 插入操作
            $avalue = K('AttrValue')->add_data($taid, $avalue);
             $this->success('添加成功',U('index', array('tid'=>$_GET['tid'])));
        }
        $this->display();
    }

    // 编辑数据
    public function edit(){
        // 判断是不是post提交
        if(IS_POST){
            // p(Q('post.'));die;
            $avalue = Q('post.attr_value');
            $taid = Q('post.taid');
            if(!$this->_model->edit_data()) $this->error($this->_model->error);

            // 属性表的值 先全部删除 再重新添加
            K('AttrValue') ->del_data($taid);
            $avalue = K('AttrValue')->add_data($taid, $avalue);
            $this->success('修改成功',U('index', array('tid'=>$_GET['tid'])));
        }
        // p(Q('get.'));die;
        // 查找get方式提交过来的所属tid的所有内容查找出来
        $data = $this->_model->get_one_data(array('taid' => Q('get.taid', 0, 'intval')));
        $vtpl = APP_PATH.'Admin/Field/'.$data['show_type'].'/edit.html'; //分配模板
        // 获取属性值表中的数据
        $avdata=M('yoho_attr_value')->where(array('taid'=>Q('taid',0,'intval')))->all();
        // p($data);die;
        // 赋予模版变量
        $this->assign('data', $data);
        $this->assign('vtpl', $vtpl);
        $this->assign('avdata', $avdata);
        $this->display();
    }

    // 删除数据
    public function del(){
        $taid = Q('get.taid');
        K('AttrValue') ->del_data($taid);
        $this->_model->del_data();
        $this->success('删除成功',U('index', array('tid'=>$_GET['tid'])));
    }

    //添加属性类型 获得inpu select 模板
    public function addAttr(){
        $type = $_POST['type'];
        $path = APP_PATH . 'Admin/Field/' . $type . '/add.html';
        $c = $this->fetch($path);
        echo $c;die;
    }
}