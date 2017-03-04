<?php
namespace Home\Controller;
use Think\Controller;
class RelationController extends Controller{
    function index(){
        //1.实例化Student模型
        $student = D('Student');
        //2. 调用select方法进行查询
        // 调用RelationModel中定义的relation方法，并且传入true来告诉底层
        // 现在是执行关联查询
        $data = $student->relation(true)->select();
        dump($data);
    }
    
    function selfFind(){
        //1. 实例化Department模型
        $d = D('Department');
        //2. 调用select方法查询
        $data = $d->relation(true)->select();
        dump($data);
    }
    
    function del(){
        //1. 实例化Department模型
        $d = D('Department');
        //2. 调用delete进行删除
        // 关联删除时，必须将关联删除的表名作为参数传入
        $d->relation('student')->delete(7);
    }
}











