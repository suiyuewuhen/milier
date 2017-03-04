<?php
namespace Admin\Controller;

class MainController extends CommonController{
    function index(){
        /*1.....邮件*/
        //实例化Email模型
        $email = D('Email');
        $uid = session('id');
        //查询未读邮件
        $count = $email->where('email_read=1 and email_to='.$uid)->count();
        //将未读邮件分配到视图
        $this->assign('count', $count);
        

        /*2....动态产生左侧管理菜单*/
        // 根据roleid从role表中取出role_pids
        $role = D('Role');
        $roleid = session('roleid');
        $data = $role->field('role_pids')->find($roleid);
        $pids = $data['role_pids'];
        
        //再根据role_pids从node表取出node_name、node_title、node_module/controller/action等字段信息
        $node = D('Node');
        // 根据node_level分成1、2级菜单来取，取node_show=1的字段
        //取顶级菜单 node_level=0
        $levelA = $node->where("node_show=1 and node_level=0 and node_id in ($pids)")->select();
        $levelB = $node->where("node_show=1 and node_level=1 and node_id in ($pids)")->select();
        $this->assign('levelA', $levelA);
        $this->assign('levelB', $levelB);
        //dump($levelA);
        //dump($levelB);die;
        
        $this->display();
    }
    
    function getEmails(){
        //实例化Email模型
        $email = D('Email');
        $uid = session('id');
        //查询未读邮件
        $count = $email->where('email_read=1 and email_to='.$uid)->count();
        //将查询结果返回到前台
        echo $count;
    }
    
    
    function home(){
        $this->display();
    }
    
   
}








