<?php
header("Content-type:text/html;charset=utf-8");
//表映射到类
class Student{
    // 字段映射到属性
    public $sno;
    public $sname;
    public $spasswd;
    public $sage;
    public $ssex;
    public $sdept;
    public $stime;
    
    // 向Student表中插入数据
    function add(){
        $sql = "insert into tp_student 
            value($this->sno,'$this->sname','$this->spasswd',$this->sage,
            '$this->ssex',$this->sdept,'$this->stime')";
        echo $sql;
    }
}

$s = new Student();
$s->sno = 10011;
$s->sname = 'aaa';
$s->spasswd = md5(123);
$s->sage = 20;
$s->ssex = '女';
$s->sdept = 6;
$s->stime = date('Y-m-d H:i:s');

$s->add();

