<?php
namespace Admin\Controller;
class NodeController extends CommonController{
    function add(){
        $node = D('Node');
        $node_list = $node->field('node_id,node_name')->select();
        $this->assign('node_list', $node_list);
        $this->display();
    }
    
    function addOk(){
        $node = D('Node');
        $data = $node->create('', 1);
        if($node->add($data)){
            $this->success('添加节点成功', U('add'), 3);
        } else {
            $this->error('添加节点失败', U('add'), 3);
        }
    }
    
    function index(){
        $node = D('Node');
        $node_list = $node->select();
        $this->assign('node_list', $node_list);
        $this->display();
    }
    
}

















