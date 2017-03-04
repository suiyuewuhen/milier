<?php
namespace Admin\Model;
use Think\Model;

class DeptModel extends Model{
    //1. 定义主键
    protected $pk = 'dept_id';
    //2. 定义字段
    protected $fields = array(
        'dept_id', 'dept_name', 'dept_pid',
        'dept_sort', 'dept_remark', 'dept_ctime'
    );
    //3. 定义表单和数据表的字段映射
    protected $_map = array(
        //左边:下标是表单的name值
        //右边:值是数据表字段名
        'id'   => 'dept_id',
        'name' => 'dept_name',
        'pid'  => 'dept_pid',
        'sort' => 'dept_sort',
        'remark' => 'dept_remark'
    );
    //4. 自动验证
    protected $_validate = array(
        array('dept_name', 'require', '部门名称不能为空', 1, 'regex', 3),
        array('dept_pid', 'checkDept', '错误的父部们id', 1, 'callback', 3),
        array('dept_sort', 'require', '排序不能为空', 1, 'regex', 3),
        array('dept_remark', 'require', '部门备注不能为空', 1, 'regex', 3),
    );

    function checkDept($pid){
        //1. 查询已经存在的所有dept_id的值
        $data = $this->field('dept_id')->select();
        //2. 将$data转为一维数组
        $tmp = array();
        foreach($data as $value){
            $tmp[] = $value['dept_id'];
        }
        //3. 检查$pid是否存在于$tmp中
        if(in_array($pid, $tmp)){
            return true;
        }
        return false;
    }
}























