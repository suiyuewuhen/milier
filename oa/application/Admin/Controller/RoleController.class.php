<?php
namespace Admin\Controller;
class RoleController extends CommonController{
    function index(){
        $role = D('Role');
        $role_list = $role->select();
        $this->assign('role_list', $role_list);
        $this->display();
    }
    
    function distribute(){
        // 实例化Node模型，查询所有权限
        $node = D('Node');
        $node_list = $node->select();
        $this->assign('node_list', $node_list);
        $this->display();
    }
    
    function distributeOk(){
        //接收选中的权限值
        $ids = I('get.ids');
        $roleid = I('get.roleid');
        // 根据$ids从Node表中查询对应的node_path
        $node = D('Node');
        // select node_path from oa_node where node_id in ('1,2,3,4,5,6');
        $node_paths = $node->field('node_path')->select($ids);
        //dump($node_paths);die;
        // 将两个基本权限添加进来
        $paths = "Admin-Main-index,Admin-Main-home,";
        //遍历$node_paths，取出其中path值，拼接成字符串
        foreach($node_paths as $value){
            if($value['node_path'] != 'kong'){
                $paths .= $value['node_path'].',';
            }
        }
        //截取掉最后的，
        $paths = substr($paths, 0, strlen($paths) - 1);
        //dump($paths);die;
        // 实例化Role模型，执行更新
        $role = D('Role');
        $data = array(
            'role_id' => $roleid,
            'role_pids' => $ids,
            'role_path' => $paths
        );
        //dump($data);die;
        if($role->save($data)){
            $this->success('分配权限成功', U('index'), 3);
        } else {
            $this->error('分配权限失败', U('index'), 3);
        }
    }
}















