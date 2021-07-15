<?php

namespace Home\Model;
use Think\Model;

class FinancialModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'in_out_money',
				'/^(([1-9][0-9]*)|(([0]\.\d{1,2}|[1-9][0-9]*\.\d{1,2})))$/',
				'金额填写的格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(
				'in_out_time',
				'require',
				'时间不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候		
				),
			array(
				'stu_name',
				'/^[\x{4e00}-\x{9fa5}]+$/u',
				'发布者格式不对，请重新填写',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(
				'stu_number',
				'/^\d{10}$/',
				'学号输入的格式不对',
				self::EXISTS_VALIDATE,//0
				'regex',
				self::MODEL_BOTH//更新时候
				),
			array(
				'remark',
				'require',
				'备注不能为空',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				)

		);

}