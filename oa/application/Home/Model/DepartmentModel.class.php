<?php
namespace Home\Model;
use Think\Model\RelationModel;

class DepartmentModel extends RelationModel{
    protected $_link = array(
        'department' => array(
            'mapping_type' => self::BELONGS_TO,
            'mapping_name' => 'dept',
            'class_name'   => 'Department',
            'parent_key'   => 'pid',
            'mapping_fields' => 'id,name'
        ),
        
        'student' => array(
            'mapping_type' => self::HAS_MANY,
            'class_name'   => 'Student',
            'foreign_key'  => 'sdept'
        ),
    );
}















