<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
    //定义主键
    protected $pk = 'user_id';
    //定义字段
    protected $fields = array(
        'user_id', 'user_name', 'user_nickname', 'user_passwd',
        'user_deptid', 'user_sex', 'user_birthday', 'user_tel',
        'user_email', 'user_ctime'
    );
    
    function checkLoginfo($name, $passwd){
        //1. 根据用户名从User表中查询数据
        // $user_info：一维数组或者空
        $user_info = $this->where("user_name='$name' and user_passwd='$passwd'")->find();
        //2. 如果结果为空,登录失败
        if(empty($user_info)){
            return false;
        }
        //3. 判断数据表查询信息和表单提交信息的一致性
        if($user_info['user_name'] == $name && $user_info['user_passwd'] == $passwd){
            //登录成功保存session
            session('id', $user_info['user_id']);
            session('name', $user_info['user_name']);
            session('nickname', $user_info['user_nickname']);
            session('deptid', $user_info['user_deptid']);
            //将roleid记录到session
            session('roleid', $user_info['user_roleid']);
            //将role_path保存到session
            // 根据user_roleid字段查询role表中的role_path字段
            $data = D('Role')->field('role_path')->find($user_info['user_roleid']);
            $paths = $data['role_path'];
            session('role_paths', $paths);
            
            return true;
        } else {
            return false;
        }
        
    }
}






