<?php
function checkSex($sex){
    $arr = array('男','女','人妖');
    if(in_array($sex, $arr)){
        return true;
    }
    return false;
}

function setNowTime(){
    return date('Y-m-d H:i:s');
}




















