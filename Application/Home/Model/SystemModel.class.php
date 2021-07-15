<?php

namespace Home\Model;
use Think\Model;

class SystemModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'system_club',
				'require',
				'社团不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//中文
				'system_stu',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'发布者格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候		
				),
			array(
				'system_number',
				'/^\d{10}$/',
				'发布者学号格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(
				'system_content',
				'require',
				'制度内容不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				)
		);

}