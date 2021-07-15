<?php

namespace Home\Model;
use Think\Model;

class Association_memberModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'stu_number',
				'/^\d{10}$/',
				'学号输入的格式不对',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新和新增的时候 3
				),
			array(//中文
				'member_name',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'学生姓名格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新和新增的时候 3	
				),
			array(//手机号码
				'member_phone',
				'/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/',
				'手机号码格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(//邮箱格式
				'member_email',
				'email',
				'邮箱格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(
				'member_class',
				'require',
				'所在班级必须填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				)
		);

}