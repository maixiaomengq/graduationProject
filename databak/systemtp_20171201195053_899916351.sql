/* This file is created by MySQLReback 2017-12-01 19:50:53 */
 /* 创建表结构 `tp_activity` */
 DROP TABLE IF EXISTS `tp_activity`;/* MySQLReback Separation */ CREATE TABLE `tp_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动id',
  `activity_theme` varchar(255) DEFAULT NULL COMMENT '活动主题',
  `activity_time` varchar(50) DEFAULT NULL COMMENT '活动时间',
  `activity_location` varchar(100) DEFAULT NULL COMMENT '活动地点',
  `activity_name` varchar(20) DEFAULT NULL COMMENT '活动负责人',
  `activity_phone` varchar(11) DEFAULT NULL COMMENT '联系电话',
  `activity_club` varchar(20) DEFAULT NULL COMMENT '主办社团',
  `file_name` varchar(255) DEFAULT NULL COMMENT '活动附件',
  `url` varchar(255) DEFAULT NULL COMMENT '文件的路径',
  `create_time` datetime DEFAULT NULL COMMENT '上传时间',
  `apply_reason` varchar(255) DEFAULT NULL COMMENT '申请理由',
  `activity_status` int(3) NOT NULL DEFAULT '0' COMMENT '状态(0待审核,1通过审核,2未通过审核)',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='社团活动表';/* MySQLReback Separation */
 /* 插入数据 `tp_activity` */
 INSERT INTO `tp_activity` VALUES ('7','2018社联周年晚会','2018年5月31日','西区体育馆','陈志良','2147483647','社团联合会','计信14计技班2018届毕业生资格审查123.xls','2017-10-26/59f1a914bf696.xls','2017-10-26 17:21:24','','1'),('10','2018图灵协会周年晚会','2018年5月31日','东区102','陈志良','13132981203','图灵协会','社联成员管理结构.docx','2017-10-28/59f40387f024f.docx','2017-10-28 12:11:51','','2'),('11','2018年编程爱好者协会周末秋游活动','2018年11月15日','装古老','陈志良','13132981203','编程爱好者协会','附4：证明（区内高校草稿）.doc','2017-10-28/59f4432301113.doc','2017-10-28 16:43:14','希望通过秋游能够更好的和小伙伴们一起增加感情','2'),('12','2018校运会','2018年5月31日','东区体育场','陈志良','13132981203','社团联合会','附4：证明（区内高校草稿）.doc','2017-10-28/59f4542a6c67c.doc','2017-10-28 17:55:54','通过校运会让大家更加团结','1'),('13','2018编程爱好者协会周年晚会','2018年5月31日','东区101','叶自强','13132981203','编程爱好者协会','权限分配表.docx','2017-11-16/5a0d57980fbaf.docx','2017-11-16 17:17:11','通过这次活动能更好的让社团团结。','1'),('14','2018编程爱好者协会开展电脑公开课','2017年12月30日','逸夫楼405','叶自强','13132981203','编程爱好者协会','权限分配表.docx','2017-11-17/5a0e761a9c3ef.docx','2017-11-17 13:39:38','通过公开课能够让大家学到知识。','0');/* MySQLReback Separation */
 /* 创建表结构 `tp_association_member` */
 DROP TABLE IF EXISTS `tp_association_member`;/* MySQLReback Separation */ CREATE TABLE `tp_association_member` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '成员id编号',
  `stu_number` int(10) NOT NULL COMMENT '学生学号',
  `member_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '学生姓名',
  `member_sex` varchar(2) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '性别',
  `member_phone` bigint(11) DEFAULT NULL COMMENT '联系方式',
  `member_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '邮箱',
  `member_yuanxi` varchar(100) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '所属院系',
  `member_major` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '所在专业',
  `member_class` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '所在班级',
  `member_club` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团名称',
  `member_depart` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '所在部门',
  `member_position` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '部门职位',
  `member_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '头像',
  `member_politics` char(8) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '政治面貌',
  `apply_reason` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '加入理由',
  `member_status` int(5) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `create_time` date DEFAULT NULL COMMENT '加入的时间',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COMMENT='社联成员信息表';/* MySQLReback Separation */
 /* 插入数据 `tp_association_member` */
 INSERT INTO `tp_association_member` VALUES ('11','2014107102','陈志良','男','13132981203','317389036@qq.com','计算机与信息工程学院','软件工程','2班','社团联合会','主席团','社长','2017-11-18/5a0ffb97101bb.jpg','党员','','1','0000-00-00'),('36','2014107101','叶自强','男','13132981203','317389036@qq.com','文学与传媒学院','汉语言','14计技班','编程爱好者协会','主席团','社长','2017-11-19/5a1185f86826b.jpg','预备党员','','1','0000-00-00'),('37','2014107105','钟永坤','男','13132981203','317389036@qq.com','经济与管理学院','市场营销','14级1班','编程爱好者协会','纪检部','副部长','2017-11-23/5a16c8ec9520a.jpg','党员','','1','0000-00-00'),('38','2014107105','钟永坤','男','13132981203','317389036@qq.com','经济与管理学院','人力资源管理','14级1班','社团联合会','学习部','干事','2017-11-23/5a16cadc96fe1.jpg','预备党员','','1','0000-00-00'),('39','2014107101','叶自强','男','13132981203','1436301790@qq.com','文学与传媒学院','汉语言文学','14计技班','社团联合会','新闻部','部长','2017-11-24/5a178124c639e.jpg','预备党员','','1','0000-00-00'),('40','2014107104','周君有','男','13132981203','317389036@qq.com','文学与传媒学院','汉语言文学','14级2班','图灵协会','学习部','部长','2017-11-24/5a18318df3afc.jpg','党员','','1','0000-00-00'),('41','2014107104','周君有','男','13132981203','317389036@qq.com','文学与传媒学院','汉语言文学','14级2班','南楼丹霞文学社','主席团','社长','2017-11-25/5a18e9bf83daa.jpg','党员','','1','2017-11-25'),('42','2014107103','刘齐雄','男','13132981203','3067977042@qq.com','计算机与信息工程学院','计算机科学与技术','14计技班','南楼丹霞文学社','宣传部','部长','2017-11-25/5a1960c854f97.jpg','党员','','1','2017-11-25'),('43','2014107106','徐海强','男','13132981203','317389036@qq.com','文学与传媒学院','汉语言文学','14计技班','社团联合会','纪检部','副社长','2017-11-25/5a1970adf2a56.jpg','党员','','1','2017-11-25'),('44','2014107106','徐海强','男','13132981203','1959094432@qq.com','文学与传媒学院','汉语言文学','14级2班','社团联合会','学习部','部长','2017-11-28/5a1cd8c3a29c7.jpg','预备党员','','1','2017-11-28'),('45','2014107105','钟永坤','男','13132981203','317389036@qq.com','经济与管理学院','市场营销','14级1班','社团联合会','纪检部','部长','2017-11-28/5a1cd8fece298.jpg','党员','','1','2017-11-28'),('46','2014107106','徐海强','男','13132981203','317389036@qq.com','政治与历史文化学院','','14级2班','图灵协会','','实习干事','2017-11-28/5a1cdf27774ab.jpg','党员','					我想学到更多。			','1','');/* MySQLReback Separation */
 /* 创建表结构 `tp_auth` */
 DROP TABLE IF EXISTS `tp_auth`;/* MySQLReback Separation */ CREATE TABLE `tp_auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `auth_name` varchar(50) NOT NULL COMMENT '权限名称',
  `auth_pid` int(100) NOT NULL COMMENT '权限父级',
  `auth_c` varchar(50) DEFAULT NULL COMMENT '权限控制器',
  `auth_a` varchar(50) DEFAULT NULL COMMENT '权限方法',
  `auth_path` varchar(50) NOT NULL COMMENT '权限路径',
  `auth_level` int(100) NOT NULL COMMENT '权限等级水平',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='权限表';/* MySQLReback Separation */
 /* 插入数据 `tp_auth` */
 INSERT INTO `tp_auth` VALUES ('1','社联信息管理','0','','','1','0'),('2','社团管理','0','','','2','0'),('3','活动管理','0','','','3','0'),('4','新闻管理','0','','','4','0'),('5','制度管理','0','','','5','0'),('6','物品管理','0','','','6','0'),('7','奖惩管理','0','','','7','0'),('8','财务管理','0','','','8','0'),('9','权限管理','0','','','9','0'),('10','社联简介管理','1','Introduction','introduction_list','1-10','1'),('11','社联部门管理','1','Department','depart_list','1-11','1'),('12','社联成员管理','1','Associationmember','members_list','1-12','1'),('13','社联活动管理','1','Activity','activity_list','1-13','1'),('14','社团列表','2','Club','club_list','2-14','1'),('15','社团成员管理','2','Clubmember','club_member','2-15','1'),('16','加入社团申请','2','Clubmember','apply_club','2-16','1'),('17','加入社团审核','2','Clubmember','apply_list','2-17','1'),('18','我的社团','2','Myclub','myclub_list','2-18','1'),('19','社员统计','2','Clubmember','member_number','2-19','1'),('20','院系统计','2','Clubmember','member_statistics','2-20','1'),('21','性别统计','2','Clubmember','member_sex','2-21','1'),('22','活动汇总','3','Clubactivity','club_activitylist','3-22','1'),('23','活动申请','3','Clubactivity','club_activityapply','3-23','1'),('24','活动审核','3','Clubactivity','club_activitycheck','3-24','1'),('25','我的社团活动','3','Clubactivity','myclub_activity','3-25','1'),('26','新闻列表','4','New','new_list','4-26','1'),('27','发布新闻','4','New','new_add','4-27','1'),('28','我的社团新闻','4','New','new_myclub','4-28','1'),('29','制度汇总','5','System','system_list','5-29','1'),('30','发布制度','5','System','system_add','5-30','1'),('31','我的社团制度','5','System','myclub_system','5-31','1'),('32','物品汇总','6','Goods','goods_list','6-32','1'),('33','物品购置表','6','Goods','buy_list','6-33','1'),('34','物品借出表','6','Goods','lend_record','6-34','1'),('35','物品借出审核','6','Goods','lend_checklist','6-35','1'),('36','评优列表','7','Rewards','rewards_list','7-36','1'),('37','社团评优表','7','Rewards','rewards_add','7-37','1'),('38','财务汇总','8','Financial','financial_list','8-38','1'),('39','添加财务记录','8','Financial','financial_add','8-39','1'),('40','财务统计','8','Financial','in_out','8-40','1'),('41','权限列表','9','Auth','authlist','9-41','1'),('42','角色列表','9','Role','rolelist','9-42','1'),('43','用户列表','9','Relation','relation_list','9-43','1'),('44','我的入社审核','2','Clubmember','myclub_apply','2-44','1'),('45','退社列表','2','Retired','retired_list','2-45','1'),('49','数据备份','0','','','49','0'),('50','备份数据库','49','Shujuku','index','49-50','1'),('51','还原数据库','49','Database','index/type/import','49-51','1');/* MySQLReback Separation */
 /* 创建表结构 `tp_buy_goods` */
 DROP TABLE IF EXISTS `tp_buy_goods`;/* MySQLReback Separation */ CREATE TABLE `tp_buy_goods` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '采购id',
  `goods_bh` varchar(20) NOT NULL COMMENT '物品编号',
  `buy_name` varchar(20) NOT NULL COMMENT '物品名称',
  `buy_number` int(3) NOT NULL COMMENT '物品数量',
  `buy_time` varchar(20) NOT NULL COMMENT '采购时间',
  `buy_stu` varchar(50) NOT NULL COMMENT '采购人',
  `buy_telephone` bigint(11) NOT NULL COMMENT '联系电话',
  `place` varchar(50) NOT NULL COMMENT '采购地点',
  PRIMARY KEY (`buy_id`),
  UNIQUE KEY `buy_id` (`buy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='采购物品表';/* MySQLReback Separation */
 /* 插入数据 `tp_buy_goods` */
 INSERT INTO `tp_buy_goods` VALUES ('1','G2','篮球','50','2017-11-6','陈志良','13132981203','西门晨光文具店'),('2','G3','足球','100','2017-11-7','陈志良','13132981203','西门晨光文具店');/* MySQLReback Separation */
 /* 创建表结构 `tp_club` */
 DROP TABLE IF EXISTS `tp_club`;/* MySQLReback Separation */ CREATE TABLE `tp_club` (
  `club_id` int(5) NOT NULL AUTO_INCREMENT COMMENT '社团id号',
  `club_bh` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '社团编号',
  `club_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '社团名称',
  `club_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团logo',
  `club_small_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT 'logo缩略图',
  `president_number` int(10) DEFAULT NULL COMMENT '现任会长学号',
  `president_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '现任会长姓名',
  `president_phone` bigint(11) DEFAULT NULL COMMENT '现任会长电话',
  `create_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '创始人姓名',
  `club_location` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团所在地',
  `create_date` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团成立日期',
  `teacher_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '指导老师',
  `club_organization` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '主管单位',
  `club_nature` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团性质(类型)',
  `club_profile` text CHARACTER SET utf8 COLLATE utf8_esperanto_ci COMMENT '社团简介',
  `count_people` int(4) DEFAULT NULL COMMENT '社团总人数',
  `club_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团邮箱',
  `club_period` char(3) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '社团届次',
  `club_departments` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '设置部门',
  `club_reson` varchar(255) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '申请的理由',
  `club_status` int(5) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`club_id`),
  UNIQUE KEY `club_bh` (`club_bh`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;/* MySQLReback Separation */
 /* 插入数据 `tp_club` */
 INSERT INTO `tp_club` VALUES ('1','M1','社团联合会','2017-10-25/59effce637ee8.jpg','2017-10-25/small_59effce637ee8.jpg','2014107102','陈志良','13132981203','河池学院','大学生活动中心609','1996年6月6日','易云飞','河池学院常委会','其他类社团','大学生社团联合会是一个管理河池学院所有社团的组织机构，主要负责所有社团的日常工作，和社团活动等方面。也是一个有爱的大家庭奥。','70','hechixueyuan@163.com','第十届','主席团,办公室,纪检部,宣传部,新闻部,体育部,学习部,网络部,女生部,组织部,外联部,心理部,国旗队','','1'),('2','M2','编程爱好者协会','2017-10-25/59effce040dd7.jpg','2017-10-25/small_59effce040dd7.jpg','2014107101','叶自强','13132981203','林晓东','暂无','2011年9月2日','易云飞','计算机与信息工程学院','兴趣爱好类','编程爱好者协会是一个计算机爱好者的聚集地。','70','317389036@qq.com','第五届','办公室,纪检部,技术部,宣传部,组织部,财务部','','1'),('3','M3','图灵协会','2017-10-25/59effcd7b1c26.jpg','2017-10-25/small_59effcd7b1c26.jpg','2014107102','陈志良','13132981203','林国隆','暂无','2011年9月1日','易云飞','计算机与信息工程学院','兴趣爱好类','计算机是最大的科技123','70','317389036@qq.com','第五届','办公室,纪检部,技术部,宣传部,组织部,财务部','','1'),('4','M4','南楼丹霞文学社','2017-11-25/5a18e99d5fe1e.jpg','2017-11-25/small_5a18e99d5fe1e.jpg','2014107104','周君有','13132981203','蒙航宇','西区大榕树旁2楼','1997年8月21号','暂无','暂无','学术科技类','这是一个文学爱好者聚集的地方。一个有爱有温暖的地方。','50','317389036@qq.com','第二十','无','','1');/* MySQLReback Separation */
 /* 创建表结构 `tp_count_member` */
 DROP TABLE IF EXISTS `tp_count_member`;/* MySQLReback Separation */ CREATE TABLE `tp_count_member` (
  `count_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '统计的id',
  `club_name` varchar(255) NOT NULL COMMENT '社团的名称',
  `January` int(4) NOT NULL DEFAULT '0' COMMENT '一月总人数',
  `February` int(4) NOT NULL DEFAULT '0' COMMENT '二月总人数',
  `March` int(4) NOT NULL DEFAULT '0' COMMENT '三月总人数',
  `April` int(4) NOT NULL DEFAULT '0' COMMENT '四月总人数',
  `May` int(4) NOT NULL DEFAULT '0' COMMENT '五月总人数',
  `June` int(4) NOT NULL DEFAULT '0' COMMENT '六月总人数',
  `July` int(4) NOT NULL DEFAULT '0' COMMENT '七月总人数',
  `August` int(4) NOT NULL DEFAULT '0' COMMENT '八月总人数',
  `September` int(4) NOT NULL DEFAULT '0' COMMENT '九月总人数',
  `October` int(4) NOT NULL DEFAULT '0' COMMENT '十月总人数',
  `November` int(4) NOT NULL DEFAULT '0' COMMENT '十一月总人数',
  `December` int(4) NOT NULL DEFAULT '0' COMMENT '十二月总人数',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY (`count_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='统计总人数表';/* MySQLReback Separation */
 /* 插入数据 `tp_count_member` */
 INSERT INTO `tp_count_member` VALUES ('1','社团联合会','5','10','20','4','3','7','8','5','9','6','6','0','2017'),('2','编程爱好者协会','0','0','0','0','0','0','0','0','0','0','1','0','2017'),('3','图灵协会','0','0','0','0','0','0','0','0','0','0','1','0','2017');/* MySQLReback Separation */
 /* 创建表结构 `tp_department` */
 DROP TABLE IF EXISTS `tp_department`;/* MySQLReback Separation */ CREATE TABLE `tp_department` (
  `depart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门编号',
  `depart_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '部门名称',
  PRIMARY KEY (`depart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;/* MySQLReback Separation */
 /* 插入数据 `tp_department` */
 INSERT INTO `tp_department` VALUES ('1','主席团'),('2','会长团'),('3','办公室'),('4','学习部'),('5','纪检部'),('6','宣传部'),('7','组织部'),('8','新闻部'),('9','网络部'),('10','体育部'),('11','外联部'),('12','女生部'),('13','心理部'),('14','国旗队');/* MySQLReback Separation */
 /* 创建表结构 `tp_faculty` */
 DROP TABLE IF EXISTS `tp_faculty`;/* MySQLReback Separation */ CREATE TABLE `tp_faculty` (
  `faculty_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '院系id',
  `faculty_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '院系编号',
  `faculty_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '院系名称',
  `faculty_major` varchar(500) CHARACTER SET utf8 COLLATE utf8_esperanto_ci DEFAULT NULL COMMENT '院系专业',
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='学校院系专业表';/* MySQLReback Separation */
 /* 插入数据 `tp_faculty` */
 INSERT INTO `tp_faculty` VALUES ('1','F01','文学与传媒学院','汉语言文学,文秘,新闻学,国际教育'),('2','F02','政治与历史文化学院','思想政治教育,历史学,社会与工作力量'),('3','F03','外国语学院','师范英语,商务英语,应用英语'),('4','F04','数学与统计学院','经济统计,应用统计,数学与应用数学,信息与计算科学'),('5','F05','物理与机电工程学院','物理学,电子信息工程,电气工程及其自动化'),('6','F06','化学与生物工程学院','生物工程,环境工程,应用化学,化学,生物科学,制药工程'),('7','F07','计算机与信息工程学院','计算机科学与技术,软件工程,网络工程,物联网工程'),('8','F08','体育学院','体育教育,社会指导'),('9','F09','艺术学院','舞蹈学,视觉传达,产品设计,服装设计,美术学,音乐学'),('10','F10','教师教育学院','小学语文教育,小学数学教育,学前教育本科,学前教育专科,小学教育全科五年制,小学教育全科三年制'),('11','F11','经济与管理学院','旅游管理,会计学,行政管理,贸易经济,人力资源管理,市场营销');/* MySQLReback Separation */
 /* 创建表结构 `tp_file` */
 DROP TABLE IF EXISTS `tp_file`;/* MySQLReback Separation */ CREATE TABLE `tp_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `tp_file` */
 INSERT INTO `tp_file` VALUES ('1','13计技2班黄梅开题报告.doc','Uploads/activity/5859eecb4c8d1.doc'),('2','自主实习相关表格.doc','Uploads/association/5859f0a1f1922.doc'),('3','河池学院本科毕业论文（设计）格式（2015届最新版）.doc','Uploads/activity/585defaa6d5fd.doc');/* MySQLReback Separation */
 /* 创建表结构 `tp_financial` */
 DROP TABLE IF EXISTS `tp_financial`;/* MySQLReback Separation */ CREATE TABLE `tp_financial` (
  `financial_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '财务id',
  `club_name` varchar(20) NOT NULL COMMENT '社团名称',
  `in_out_time` varchar(20) NOT NULL COMMENT '支出收入时间',
  `in_out_type` varchar(10) NOT NULL COMMENT '财务类型',
  `in_out_money` float NOT NULL COMMENT '收入支出金额',
  `stu_name` varchar(50) NOT NULL COMMENT '经手人姓名',
  `stu_number` int(10) NOT NULL COMMENT '经手人学号',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`financial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='财务表';/* MySQLReback Separation */
 /* 插入数据 `tp_financial` */
 INSERT INTO `tp_financial` VALUES ('13','社团联合会','2017-10-7','支入','850','陈志良','2014107102','社员缴费。'),('15','社团联合会','2017-10-11','支出','235.5','陈志良','2014107102','搞活动。'),('16','编程爱好者协会','2017-10-7','支入','500','叶自强','2014107101','缴费。'),('17','编程爱好者协会','2017-10-7','支出','10.5','叶自强','2014107101','缴费。'),('18','图灵协会','2017-10-7','支入','654','周君有','2014107104','社员缴费。');/* MySQLReback Separation */
 /* 创建表结构 `tp_go_config` */
 DROP TABLE IF EXISTS `tp_go_config`;/* MySQLReback Separation */ CREATE TABLE `tp_go_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL DEFAULT 'string',
  `config_type` varchar(255) NOT NULL DEFAULT 'site',
  `value` varchar(255) NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `add_time` datetime NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `field` (`field`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `tp_goods` */
 DROP TABLE IF EXISTS `tp_goods`;/* MySQLReback Separation */ CREATE TABLE `tp_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '物品id',
  `goods_bh` varchar(20) NOT NULL COMMENT '物品编号',
  `goods_name` varchar(20) NOT NULL COMMENT '物品名称',
  `goods_number` int(3) NOT NULL COMMENT '物品数量',
  `goods_place` varchar(50) NOT NULL COMMENT '物品存放地点',
  `club_name` varchar(50) NOT NULL COMMENT '社团名称',
  `lend_number` int(3) NOT NULL DEFAULT '0' COMMENT '借出物品数量',
  `status` varchar(10) DEFAULT '0' COMMENT '是否可借(0.不可借,1可借)',
  PRIMARY KEY (`goods_id`),
  KEY `lend_number` (`lend_number`),
  KEY `lend_number_2` (`lend_number`),
  KEY `goods_name` (`goods_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='物品汇总表';/* MySQLReback Separation */
 /* 插入数据 `tp_goods` */
 INSERT INTO `tp_goods` VALUES ('2','G2','篮球','100','大学生活动中心611','社团联合会','0','1'),('3','G3','足球','50','大学生活动中心610','社团联合会','0','1'),('4','G4','羽毛球拍','50','大学生活动中心611','社团联合会','0','0');/* MySQLReback Separation */
 /* 创建表结构 `tp_in_financial` */
 DROP TABLE IF EXISTS `tp_in_financial`;/* MySQLReback Separation */ CREATE TABLE `tp_in_financial` (
  `in_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收入id',
  `club_name` varchar(255) NOT NULL COMMENT '社团名称',
  `January` float NOT NULL DEFAULT '0' COMMENT '一月收入',
  `February` float NOT NULL DEFAULT '0' COMMENT '二月收入',
  `March` float NOT NULL DEFAULT '0' COMMENT '三月收入',
  `April` float NOT NULL DEFAULT '0' COMMENT '四月收入',
  `May` float NOT NULL DEFAULT '0' COMMENT '五月收入',
  `June` float NOT NULL DEFAULT '0' COMMENT '六月收入',
  `July` float NOT NULL DEFAULT '0' COMMENT '七月收入',
  `August` float NOT NULL DEFAULT '0' COMMENT '八月收入',
  `September` float NOT NULL DEFAULT '0' COMMENT '九月收入',
  `October` float DEFAULT '0' COMMENT '十月收入',
  `November` float NOT NULL DEFAULT '0' COMMENT '十一月收入',
  `December` float NOT NULL DEFAULT '0' COMMENT '十二月收入',
  `time` int(11) NOT NULL COMMENT '年份时间',
  PRIMARY KEY (`in_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='财务收入表';/* MySQLReback Separation */
 /* 插入数据 `tp_in_financial` */
 INSERT INTO `tp_in_financial` VALUES ('1','社团联合会','0','0','0','0','0','0','0','0','0','0','850','0','2017'),('2','编程爱好者协会','0','0','0','0','0','0','0','0','0','0','500','0','2017'),('3','图灵协会','0','0','0','0','0','0','0','0','0','0','654','0','2017');/* MySQLReback Separation */
 /* 创建表结构 `tp_lend_goods` */
 DROP TABLE IF EXISTS `tp_lend_goods`;/* MySQLReback Separation */ CREATE TABLE `tp_lend_goods` (
  `lend_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '借出id',
  `goods_bh` varchar(20) NOT NULL COMMENT '物品编号',
  `lend_name` varchar(20) NOT NULL COMMENT '物品名称',
  `lend_club` varchar(50) NOT NULL COMMENT '社团名称',
  `lend_number` int(3) NOT NULL COMMENT '借出数量',
  `lend_time` varchar(50) NOT NULL COMMENT '借出时间',
  `return_time` varchar(50) NOT NULL COMMENT '归还时间',
  `lend_stu` varchar(50) NOT NULL COMMENT '借出人',
  `stu_number` int(10) NOT NULL COMMENT '借出人学号',
  `lend_telephone` bigint(11) NOT NULL COMMENT '借出者电话',
  `lend_reason` varchar(255) NOT NULL COMMENT '借出理由',
  `lend_status` int(3) NOT NULL DEFAULT '0' COMMENT '审核状态(0.待审核，1.通过审核2.未通过审核)',
  `return_status` int(3) DEFAULT NULL COMMENT '归还状态（0.待归还，1.已归还）',
  PRIMARY KEY (`lend_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='借出物品表';/* MySQLReback Separation */
 /* 插入数据 `tp_lend_goods` */
 INSERT INTO `tp_lend_goods` VALUES ('6','G2','篮球','编程爱好者协会','30','2016年11月7日','2016年11月10日','陈志良','2014107102','13132981230','用于篮球比赛','1','1'),('9','G3','足球','编程爱好者协会','10','2016年11月7日','2016年11月10日','叶自强','2014107101','13132981230','比赛用','1','1');/* MySQLReback Separation */
 /* 创建表结构 `tp_manager` */
 DROP TABLE IF EXISTS `tp_manager`;/* MySQLReback Separation */ CREATE TABLE `tp_manager` (
  `mg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mg_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `mg_pwd` varchar(16) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL,
  `mg_time` int(11) NOT NULL,
  `mg_role_id` tinyint(50) NOT NULL,
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;/* MySQLReback Separation */
 /* 插入数据 `tp_manager` */
 INSERT INTO `tp_manager` VALUES ('1','admin','123','20171014','1');/* MySQLReback Separation */
 /* 创建表结构 `tp_new` */
 DROP TABLE IF EXISTS `tp_new`;/* MySQLReback Separation */ CREATE TABLE `tp_new` (
  `new_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '新闻id',
  `new_title` varchar(100) NOT NULL COMMENT '新闻主题',
  `new_club` varchar(50) NOT NULL COMMENT '社团全称',
  `new_depart` varchar(50) NOT NULL COMMENT '部门名称',
  `new_stu` varchar(50) NOT NULL COMMENT '发布新闻的学生姓名',
  `new_number` int(10) NOT NULL COMMENT '发布新闻的学生学号',
  `new_time` date NOT NULL COMMENT '发布时间',
  `new_update` datetime DEFAULT NULL COMMENT '新闻修改时间',
  `new_con` longtext NOT NULL COMMENT '发布的内容',
  PRIMARY KEY (`new_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='新闻表';/* MySQLReback Separation */
 /* 插入数据 `tp_new` */
 INSERT INTO `tp_new` VALUES ('1','校运会','社团联合会','新闻部','陈志良','2014107102','2017-10-17','','校运会举办成功'),('3','社联18周年晚会','社团联合会','新闻部','陈志良','2014107102','0000-00-00','','恭喜社联18周年晚会成功举办&lt;img src=&quot;/My_thinkphp/Public/Uploads/kindeditor/attached/image/20171102/20171102034013_12969.jpg&quot; alt=&quot;&quot; /&gt;'),('5','241','213','231','123','12321','2017-11-02','','&lt;p&gt;&lt;img src=&quot;/ueditor/php/upload/image/20171102/1509629954112149.jpg&quot; title=&quot;1509629954112149.jpg&quot; alt=&quot;暴风截图201652539849098.jpg&quot;/&gt;&lt;/p&gt;'),('6','123','123','123','123','123','2017-11-02','','&lt;p&gt;我爱你&lt;/p&gt;'),('7','123','123','123','123','123','2017-11-03','2017-11-03 10:50:12','123456'),('8','校运会','社团联合会','新闻部','陈志良','2014107102','2017-11-04','','&lt;p&gt;&lt;span style=&quot;color: rgb(255, 0, 0); font-size: 36px;&quot;&gt;恭喜二十一届校运会举办成功！&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(255, 0, 0); font-size: 36px;&quot;&gt;&lt;img src=&quot;/My_thinkphp/Public/image/20171104/1509785'),('9','校运会','社团联合会','新闻部','陈志良','2014107102','2017-11-04','','&lt;p&gt;&lt;span style=&quot;font-size: 36px; color: rgb(255, 192, 0);&quot;&gt;校运会&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 36px; color: rgb(255, 192, 0);&quot;&gt;&lt;img src=&quot;/My_thinkphp/php/upload/image/20171104/1509786306'),('23','校运会','社团联合会','新闻部','陈志良','2014107102','2017-11-04','','&lt;p&gt;&lt;span style=&quot;font-size: 36px; color: rgb(255, 0, 0);&quot;&gt;恭喜校运会成功举办，圆满结束！&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 36px; color: rgb(255, 0, 0);&quot;&gt;&lt;img src=&quot;/My_thinkphp/Public/image/20171104/1509789799853750.jpg&quot; title=&quot;1509789799853750.jpg&quot; alt=&quot;logo.jpg&quot;/&gt;&lt;/span&gt;&lt;/p&gt;'),('24','2018年编程爱好者','编程爱好者协会','主席团','叶自强','2014107101','2017-11-16','','&lt;p&gt;你还好吗&lt;/p&gt;'),('25','123awdqwe','编程爱好者协会','123','123','0','2017-11-21','','&lt;p&gt;qweqwe&lt;/p&gt;'),('27','123','编程爱好者协会','wqe','asdwqe','123','2017-11-21','','&lt;p&gt;asd&lt;/p&gt;'),('28','sad','编程爱好者协会','qwe','asd','123','2017-11-21','','&lt;p&gt;qwe&lt;/p&gt;'),('42','qweqweqwewqeqwe','编程爱好者协会','qweqwe123','asd','123','2017-11-21','','&lt;p&gt;qwe&lt;br/&gt;&lt;/p&gt;'),('43','sadasdsadsadqwe ','编程爱好者协会','123','qwe ','2014107102','2017-11-21','','&lt;p&gt;qwe&amp;nbsp;&lt;/p&gt;'),('44','qwe 123213','编程爱好者协会','qweqwe123','qwe ','12','2017-11-21','','&lt;p&gt;qwe&lt;/p&gt;'),('45','123awdqweasdsad','编程爱好者协会','asdasd','叼','123','2017-11-21','','&lt;p&gt;请问&lt;/p&gt;'),('46','是打得全文','编程爱好者协会','阿斯顿瓦切','请问','2014107101','2017-11-21','2017-11-21 17:52:52','&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;请问&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;'),('47','是打得全文','编程爱好者协会','新闻部','请问请问','123','2017-11-21','','&lt;p&gt;请问&lt;/p&gt;'),('48','是打得全文','编程爱好者协会','去问问','请问','2014107102','2017-11-21','2017-11-21 17:51:33','&lt;p&gt;				&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;请问&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;				&lt;/p&gt;');/* MySQLReback Separation */
 /* 创建表结构 `tp_out_financial` */
 DROP TABLE IF EXISTS `tp_out_financial`;/* MySQLReback Separation */ CREATE TABLE `tp_out_financial` (
  `out_in` int(11) NOT NULL AUTO_INCREMENT COMMENT '支出id',
  `club_name` varchar(255) NOT NULL COMMENT '社团名称',
  `January` float NOT NULL DEFAULT '0' COMMENT '一月支出',
  `February` float NOT NULL DEFAULT '0' COMMENT '二月支出',
  `March` float NOT NULL DEFAULT '0' COMMENT '三月支出',
  `April` float NOT NULL DEFAULT '0' COMMENT '四月支出',
  `May` float NOT NULL DEFAULT '0' COMMENT '五月支出',
  `June` float NOT NULL DEFAULT '0' COMMENT '六月支出',
  `July` float NOT NULL DEFAULT '0' COMMENT '七月支出',
  `August` float NOT NULL DEFAULT '0' COMMENT '八月支出',
  `September` float NOT NULL DEFAULT '0' COMMENT '九月支出',
  `October` float NOT NULL DEFAULT '0' COMMENT '十月支出',
  `November` float DEFAULT '0' COMMENT '十一月支出',
  `December` float NOT NULL DEFAULT '0' COMMENT '十二月支出',
  `time` int(4) NOT NULL COMMENT '时间年份',
  PRIMARY KEY (`out_in`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='财务支出统计表';/* MySQLReback Separation */
 /* 插入数据 `tp_out_financial` */
 INSERT INTO `tp_out_financial` VALUES ('1','社团联合会','0','0','0','0','0','0','0','0','0','0','235.5','0','2017'),('2','编程爱好者协会','0','0','0','0','0','0','0','0','0','0','10.5','0','2017');/* MySQLReback Separation */
 /* 创建表结构 `tp_politics` */
 DROP TABLE IF EXISTS `tp_politics`;/* MySQLReback Separation */ CREATE TABLE `tp_politics` (
  `politics_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表ID',
  `politics_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_esperanto_ci NOT NULL COMMENT '政治面貌名称',
  PRIMARY KEY (`politics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;/* MySQLReback Separation */
 /* 插入数据 `tp_politics` */
 INSERT INTO `tp_politics` VALUES ('1','党员'),('2','预备党员'),('3','共青团员'),('4','群众');/* MySQLReback Separation */
 /* 创建表结构 `tp_relation` */
 DROP TABLE IF EXISTS `tp_relation`;/* MySQLReback Separation */ CREATE TABLE `tp_relation` (
  `relation_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '关系id',
  `stu_id` bigint(20) NOT NULL COMMENT '学生id',
  `role_id` bigint(20) NOT NULL DEFAULT '5' COMMENT '角色id',
  `content` varchar(1000) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`relation_id`),
  KEY `stu_id` (`stu_id`,`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户关系表';/* MySQLReback Separation */
 /* 插入数据 `tp_relation` */
 INSERT INTO `tp_relation` VALUES ('1','1','2','社联社长'),('2','2','3','普通社长'),('3','3','4','普通社员'),('4','4','3','普通用户'),('5','5','4','普通用户'),('7','6','4','');/* MySQLReback Separation */
 /* 创建表结构 `tp_retired` */
 DROP TABLE IF EXISTS `tp_retired`;/* MySQLReback Separation */ CREATE TABLE `tp_retired` (
  `retired_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '退社id',
  `stu_number` int(10) NOT NULL COMMENT '学生学号',
  `member_name` varchar(50) NOT NULL COMMENT '学生姓名',
  `member_club` varchar(50) NOT NULL COMMENT '退出的社团',
  `retired_depart` varchar(50) NOT NULL COMMENT '当前部门',
  `retired_position` varchar(50) NOT NULL COMMENT '当前职位',
  `retired_reason` varchar(1000) NOT NULL COMMENT '理由',
  `apply_time` datetime NOT NULL COMMENT '提交时间',
  `retired_time` datetime DEFAULT NULL COMMENT '退社时间',
  `remark` int(11) NOT NULL DEFAULT '0' COMMENT '状态（0待审核，1通过审核，2未通过审核）',
  PRIMARY KEY (`retired_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='退社申请表';/* MySQLReback Separation */
 /* 插入数据 `tp_retired` */
 INSERT INTO `tp_retired` VALUES ('1','2014107103','刘齐雄','编程爱好者协会','纪检部','部长','我要专心学习。','2017-11-25 16:38:51','0000-00-00 00:00:00','1'),('2','2014107103','刘齐雄','南楼丹霞文学社','宣传部','部长','我想学习','2017-11-25 20:24:42','','0');/* MySQLReback Separation */
 /* 创建表结构 `tp_rewards` */
 DROP TABLE IF EXISTS `tp_rewards`;/* MySQLReback Separation */ CREATE TABLE `tp_rewards` (
  `rewards_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '奖惩id',
  `club_name` varchar(50) NOT NULL COMMENT '社团名称',
  `rewards_type` varchar(50) NOT NULL COMMENT '评优类型',
  `met_activity_core` int(3) NOT NULL COMMENT '会议活动考勤分',
  `finance_core` int(3) NOT NULL COMMENT '财务考勤分',
  `club_activity_core` int(3) NOT NULL COMMENT '社团活动得分',
  `regiment_core` int(3) NOT NULL COMMENT '参与团委和社联',
  `organization_core` int(3) NOT NULL COMMENT '活动分',
  `normal_core` int(3) NOT NULL COMMENT '社团组织机构分',
  `judges_core` int(3) NOT NULL COMMENT '平时分总分',
  `vote_core` int(3) NOT NULL COMMENT '评委评分',
  `total_core` int(3) NOT NULL COMMENT '投票得分',
  `begin_time` varchar(20) NOT NULL COMMENT '综合所得总分',
  PRIMARY KEY (`rewards_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='奖罚表';/* MySQLReback Separation */
 /* 插入数据 `tp_rewards` */
 INSERT INTO `tp_rewards` VALUES ('1','编程爱好者协会','明星社团','5','5','5','5','5','25','40','8','73','2017-11-9'),('2','图灵协会','优秀社团','6','6','6','6','6','30','42','9','81','2017-11-9');/* MySQLReback Separation */
 /* 创建表结构 `tp_role` */
 DROP TABLE IF EXISTS `tp_role`;/* MySQLReback Separation */ CREATE TABLE `tp_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(50) NOT NULL COMMENT '角色名称',
  `role_auth_ids` varchar(1000) NOT NULL COMMENT '权限集合(1,2,3)',
  `role_auth_ac` varchar(1000) DEFAULT NULL COMMENT '控制器-方法',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='角色表';/* MySQLReback Separation */
 /* 插入数据 `tp_role` */
 INSERT INTO `tp_role` VALUES ('1','最高管理员','1,10,11,12,13,2,14,15,16,17,44,18,19,20,21,3,22,23,24,25,4,26,27,28,5,29,30,31,6,32,33,34,35,7,36,37,8,38,39,40,9,41,42,43','Introduction-introduction_list,Department-depart_list,Associationmember-members_list,Activity-activity_list,Club-club_list,Clubmember-club_member,Clubmember-apply_club,Clubmember-apply_list,Clubmember-myclub_apply,Myclub-myclub_list,Clubactivity-club_activitylist,Clubactivity-club_activityapply,Clubactivity-club_activitycheck,Clubactivity-myclub_activity,New-new_list,New-new_add,New-new_myclub,System-system_list,System-system_add,System-myclub_system,Goods-goods_list,Goods-buy_list,Goods-lend_record,Goods-lend_checklist,Rewards-rewards_list,Rewards-rewards_add,Financial-financial_list,Financial-financial_add,Auth-authlist,Role-rolelist'),('2','社联社长','1,10,11,12,13,2,14,15,16,17,18,19,20,21,44,45,3,22,23,24,25,4,26,27,28,5,29,30,31,6,32,33,34,35,7,36,37,8,38,39,40','Introduction-introduction_list,Department-depart_list,Associationmember-members_list,Activity-activity_list,Club-club_list,Clubmember-club_member,Clubmember-apply_club,Clubmember-apply_list,Myclub-myclub_list,Clubmember-member_number,Clubmember-member_statistics,Clubmember-member_sex,Clubactivity-club_activitylist,Clubactivity-club_activityapply,Clubactivity-club_activitycheck,Clubactivity-myclub_activity,New-new_list,New-new_add,New-new_myclub,System-system_list,System-system_add,System-myclub_system,Goods-goods_list,Goods-buy_list,Goods-lend_record,Goods-lend_checklist,Rewards-rewards_list,Rewards-rewards_add,Financial-financial_list,Financial-financial_add,Financial-in_out,Clubmember-myclub_apply,Retired-retired_list'),('3','社长','2,15,16,17,18,19,20,21,44,45,3,23,24,25,4,26,27,28,5,29,30,31,6,32,34,35,8,38,39,40','Clubmember-club_member,Clubmember-apply_club,Clubmember-apply_list,Myclub-myclub_list,Clubmember-member_number,Clubmember-member_statistics,Clubmember-member_sex,Clubactivity-club_activityapply,Clubactivity-club_activitycheck,Clubactivity-myclub_activity,New-new_list,New-new_add,New-new_myclub,System-system_list,System-system_add,System-myclub_system,Goods-goods_list,Goods-lend_record,Goods-lend_checklist,Financial-financial_list,Financial-financial_add,Financial-in_out,Clubmember-myclub_apply,Retired-retired_list'),('4','普通社员','2,16,18,44,45,3,25,4,28,5,31','Clubmember-apply_club,Myclub-myclub_list,Clubactivity-myclub_activity,New-new_myclub,System-myclub_system,Clubmember-myclub_apply,Retired-retired_list'),('5','普通用户','2,16,44','Clubmember-apply_club,Clubmember-myclub_apply');/* MySQLReback Separation */
 /* 创建表结构 `tp_student` */
 DROP TABLE IF EXISTS `tp_student`;/* MySQLReback Separation */ CREATE TABLE `tp_student` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生id',
  `stu_number` int(11) NOT NULL COMMENT '学生学号',
  `stu_name` varchar(20) NOT NULL COMMENT '学生姓名',
  `stu_pwd` varchar(255) NOT NULL COMMENT '学生登录密码',
  `stu_sex` varchar(2) DEFAULT NULL COMMENT '性别',
  `stu_birthday` varchar(20) DEFAULT NULL COMMENT '出生日期',
  `stu_home` varchar(100) DEFAULT NULL COMMENT '家庭住址',
  `stu_phone` varchar(11) DEFAULT NULL COMMENT '联系方式',
  `stu_yuanxi` varchar(100) DEFAULT NULL COMMENT '所属院系',
  `stu_major` varchar(50) DEFAULT NULL COMMENT '所在专业',
  `stu_class` varchar(10) DEFAULT NULL COMMENT '所在班级',
  `stu_logo` varchar(255) DEFAULT NULL COMMENT '头像',
  `stu_politics_status` varchar(8) DEFAULT NULL COMMENT '政治面貌',
  `login_last_time` varchar(255) DEFAULT NULL COMMENT '最后登录时间',
  `stu_status` int(2) DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='学校学生表';/* MySQLReback Separation */
 /* 插入数据 `tp_student` */
 INSERT INTO `tp_student` VALUES ('1','2014107102','陈志良','123456789','男','1996年2月22日','广西贵港市平南县平南镇王府井','13132981203','计算机信息与工程学院','计算机科学与技术','14计技班','logo1.jpg','团员','','0'),('2','2014107101','叶自强','123456','男','1995年3月22日','广西钦州市灵山县','13132981103','文学与传媒学院','汉语言文学','14汉语言1班','logo2.jpg','党员','','0'),('3','2014107103','刘齐雄','123','男','1994年3月22日','广西梧州市珍宝街','13132981506','物理与机电工程学院','电子信息工程','2014级电信2班','logo3.jpg','群众','','0'),('4','2014107104','周君有','qq123','男','1995年10月12日','广西北海市下嘴村','13132981564','文学与传媒学院','新闻传媒','2014级新闻班','logo4.jpg','党员','','0'),('5','2014107105','钟永坤','aa123456','男','1995年10月10日','广西梧州市平安街','13132981563','经济与管理学院','经济与统计','14级2班','','团员','','0'),('6','2014107106','徐海强','123456','男','1994年3月12日','广西贵港市桂平市西山街','18122981103','外国语学院','应用英语','15级1班','','共青团员','','0');/* MySQLReback Separation */
 /* 创建表结构 `tp_system` */
 DROP TABLE IF EXISTS `tp_system`;/* MySQLReback Separation */ CREATE TABLE `tp_system` (
  `system_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '制度id',
  `system_stu` varchar(50) NOT NULL COMMENT '发布者姓名',
  `system_number` int(10) NOT NULL COMMENT '发布者学号',
  `system_club` varchar(50) NOT NULL COMMENT '社团',
  `system_content` text NOT NULL COMMENT '制度内容',
  PRIMARY KEY (`system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='社团制度表';/* MySQLReback Separation */
 /* 插入数据 `tp_system` */
 INSERT INTO `tp_system` VALUES ('1','陈志良','2014107102','社团联合会','			（1）学会做人，方为人上人
（2）要有吃苦耐劳的精神
（3）待人诚恳老实			'),('4','叶自强','2014107101','编程爱好者协会','&lt;p&gt;			（1）热爱计算机			&lt;/p&gt;&lt;p&gt;（2）学习技术&lt;/p&gt;&lt;p&gt;每周例会一定要来开&lt;/p&gt;'),('5','陈志良','2014107102','图灵协会','（1）要有电脑基础'),('6','陈志','2014107102','社团联合会','&lt;p&gt;			&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;（1）真是&lt;/p&gt;&lt;p&gt;（2）是的&lt;/p&gt;&lt;p&gt;123&lt;/p&gt;&lt;p&gt;			&lt;/p&gt;');/* MySQLReback Separation */