<?php

namespace Home\Model;
use Think\Model;

class RewardsModel extends Model{

	protected $_validate=array(
			array(//空和唯一
				'met_activity_core',
				'number',
				'会议活动考勤分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'finance_core',
				'number',
				'财务考勤分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'club_activity_core',
				'number',
				'社团活动得分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'regiment_core',
				'number',
				'参与团委和社联活动分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'organization_core',
				'number',
				'社团组织机构分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'judges_core',
				'number',
				'评委评分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'vote_core',
				'number',
				'投票得分格式不对或为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
			array(//空和唯一
				'begin_time',
				'require',
				'评优日期格式不能为空，请重新填写',
				self::EXISTS_VALIDATE,//0
				'require',
				self::MODEL_BOTH//更新时候
				),
		);

}