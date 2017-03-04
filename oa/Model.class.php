<?php

header("Content-type:text/html;charset=utf-8");
class Model{
    // 设置要操作表名
    Public $tableName;
    private $date;
    
    //__set()方法会破坏类的封装性。
    function __set($name, $value){
        //$this->$name = $value;
        $this->data[$name] = $value;
        //$this->data['age'] = 20;
        //$this->data['name'] = 'zs';
    }
    
    function add($data = ''){
        if(!empty($data)){
            $this->date = $data;
        }
        $fields = '';
        $values = '';
        foreach($this->data as $k=>$v){
            $fields .= $k.",";
            $values .= "'".$v."',";
        }
        /* echo $fields;
        echo "<hr />";
        echo $values; */
        $fields = substr($fields, 0, strlen($fields) - 1);
        $values = substr($values, 0, strlen($values) - 1);
        $sql = "insert into $this->tableName($fields) values($values)";
        echo $sql;
    }
    
    function del(){
        
    }
    
    function update(){
        
    }
    
    function select(){
        
    }
}
$data = array('sno'=>10001, 'sname'=>'zs');
$s = new Model();
$s->add($data);

















/* $s->tableName = 'tp_student';
$s->sno = null;
$s->sname = 'aaa';
$s->spasswd = md5(123);
$s->sage = 20;
$s->ssex = '女';
$s->sdept = 6;
$s->stime = date('Y-m-d H:i:s');
$s->add(); */
$s->tableName = 'tp_department';
$s->id = 7;
$s->name = '西班牙语';
$s->pid = 2;
$s->level = 1;
$s->add();
