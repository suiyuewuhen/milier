<?php
//无线分类
function getDeptTree($arr, $pid=0){
    static $result = array();
    foreach($arr as $value){
        if($value['dept_pid'] == $pid){
            $result[] = $value;
            getDeptTree($arr, $value['dept_id']);
        }
    }
    return $result;
}
//上传文件,涉及作者
function setAuthor()
{
	return session('id');
}
//时间
function setTime()
{
	return time();
}