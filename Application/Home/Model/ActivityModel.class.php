<?php

namespace Home\Model;
use Think\Model;

class ActivityModel extends Model{
	protected $autoTimeFormat = 'Y年m月d日 H:i:s';    //定义插入时间戳格式
protected $autoCreateTimestamps = array('create_time');  //定义数据库的字段,是指数据库中存放时间的字段为date.数据库中的字段类型最好相应.看定义插入时间戳格式的类型,上面的是年月日加小时分秒,字段的类型最好就是datatime

	protected $_validate=array(
			array(//空和唯一
				'activity_theme',
				'require',
				'活动主题不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新和新增的时候 3
			),
			array(//中文
				'activity_time',
				'require',
				'时间不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新和新增的时候 3	
			),
			array(
				'activity_location',
				'require',
				'活动地点不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
			),
			array(//10位数
				'activity_name',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'负责人格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
			),
			array(
				'activity_phone',
				'/^(((d{3}))|(d{3}-))?13d{9}$/',
				'手机格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
			),
			array(
				'activity_club',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'主办社团格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
			),
			array(
				'apply_reason',
				'require',
				'申请理由不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
			),
		);
}