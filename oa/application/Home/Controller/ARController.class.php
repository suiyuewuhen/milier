<?php
namespace Home\Controller;
use Think\Controller;
class ARController extends Controller{
    function add_test(){
        //1. 实例化Student模型
        $student = D('Student');
        //2. 将字段和值的信息以属性方式添加到$student对象中
        $student->sno = 10016;
        $student->sname = 'ccc';
        $student->spasswd = md5(234);
        $student->sage = 20;
        $student->ssex = '女';
        $student->sdept = 4;
        $student->stime = date('Y-m-d H:i:s');
        //3. 调用add方法进行数据插入操作
        $student->add();
    }
    
    function save_test(){
        //1. 实例化Student模型
        $student = D('Student');
        //2. 设置要修改的数据
        $student->sno = 10016;
        $student->sname = 'ddd';
        $student->sage = 21;
        //3. 调用save方法进行修改
        $student->save();
    }
    
    function del_test(){
        //1. 实例化Student模型
        $student = D('Student');
        //2. 设置要删除的数据，指定主键值
        $student->sno = 10016;
        //3. 调用delete方法进行删除
        $student->delete();
    }
    
    function find_test(){
        //1. 实例化Student模型
        $student = D('Student');
        //2. 查询sno=10003的学生信息
        //$student->sno = 10003;
        //$data = $student->find();
        
        //使用字段名称进行查询
        //$data = $student->getbysno(10004);
        $data = $student->getbysname('aaa');
        dump($data);
    }
}















