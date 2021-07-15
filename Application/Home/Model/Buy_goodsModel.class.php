<?php

namespace Home\Model;
use Think\Model;

class Buy_goodsModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'buy_name',
				'require',
				'物品名称不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//中文
				'buy_number',
				'number',
				'购置数量格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候		
				),
			array(
				'place',
				'require',
				'购置地点不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(
				'buy_time',
				'require',
				'购置地点不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//10位数
				'buy_stu',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'姓名格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(
				'buy_telephone',
				'/^(((d{3}))|(d{3}-))?13d{9}$/',
				'手机格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
		);

}