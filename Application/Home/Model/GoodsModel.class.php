<?php

namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'goods_name',
				'require',
				'物品名称不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//中文
				'goods_number',
				'number',
				'物品数量格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候		
				),
			array(
				'goods_place',
				'require',
				'存放地点不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//10位数
				'club_name',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'保管社团格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				)
		);

}