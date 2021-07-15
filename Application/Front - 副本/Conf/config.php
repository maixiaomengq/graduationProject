<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'systemtp',          // 数据库名systemtp
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '8463233123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'LOAD_EXT_CONFIG'    =>'user,upload',
    'URL_MODEL'=>2,//URL模式类型
    'URL_HTML_SUFFIX' =>'shtml|html',//隐藏URL
   // 'ACTION_SUFFIX'   =>'Action',//操作方法后缀
  //  'ACTION_BIND_CLASS'    =>true,//操作绑定到类
//加载自定义配置文件。

// 配置邮件发送服务器

        'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称
        'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
        'MAIL_USERNAME' =>'317389036@qq.com',//你的邮箱名
        'MAIL_FROM' =>'317389036@qq.com',//发件人地址
        'MAIL_FROMNAME'=>'社团机器人',//发件人姓名
        'MAIL_PASSWORD' =>'xsihlelgdwxlbjaf',//邮箱密码
        'MAIL_CHARSET' =>'UFT-8',//设置邮件编码
        'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件QQ 362380202 联系我
        
);