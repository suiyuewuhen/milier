<?php
namespace Home\Model;
//使用关联模型必须继承RelationModel
// 所以必须引入RelationModel
use Think\Model\RelationModel;

//编写模型类，继承RelationModel
class StudentModel extends RelationModel{
        protected $_link = array(
            //定义个tp_department表的关联关系
            // 下标是要关联的数据表名，没有前缀
            'department' => array(
                // Student和department的关系：多对一
                // 定义关联关系
                'mapping_type' => self::BELONGS_TO,
                // 获取数据的名称
                'mapping_name' => 'd',
                // 关联模型的名称，指department表对应的模型
                'class_name' => 'Department',
                // 指定外键, student中的sdept是外键
                'foreign_key' => 'sdept',
                // 指定要查询的字段
                'mapping_fields' => 'id,name',
            ),
        );
}