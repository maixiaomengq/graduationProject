<?php

namespace Home\Model;
use Think\Model;

class NewModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'new_title',
				'require',
				'新闻主题已存在或未填写，请重新填写',
				self::EXISTS_VALIDATE,//0
				'unique',
				self::MODEL_BOTH
				),
			array(//中文
				'new_depart',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'部门格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候		
				),
			array(
				'new_stu',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'发布者格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(//10位数
				'new_number',
				'/^\d{10}$/',
				'学号输入的格式不对',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(
				'new_con',
				'require',
				'新闻内容必须填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				)
		);

}