<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="shortcut icon" href="/Public/image/favico.ico"/>
<link rel="bookmark" href="/Public/image/favico.ico"/>
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<link type="text/css" href="/Public/Front/css/style.css" rel="stylesheet" />
<link rel="shortcut icon" href="/Public/image/favico.ico"/>
<script type="text/javascript" src="/Public/Front/js/jquery.1.4.2.min.js"></script>

<script type="text/javascript" src="/Public/Front/js/lib.js"></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>社团管理系统后台</title>

</head>
<body style="display:none;">
<!--头部-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl">
		<img class="logo navbar-logo f-l mr-10 hidden-xs" src="/Public/image/system_logo.png">
			<span class="logo navbar-slogan f-l mr-10 hidden-xs"><font size="5">河池学院社团管理系统</font></span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">

		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>用户：</li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A"><?php echo ($name); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
					<?php if($shenfen == '系统管理员'): ?><img src="/Public/image/admin.png" height="40" width="40">
					<?php else: ?>
						<img src="/Public/Uploads/student/<?php echo ($stu_logo); ?>"><?php endif; ?>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
						<li><a href="#">切换账户</a></li>
						<li><a href="/Home/Manager/logout">退出</a></li>
				</ul>
			</li>
				<li id="Hui-msg">
					时间：<?php echo ($time); ?>
					<!---->
					<!--&lt;!&ndash;<a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> &ndash;&gt;-->
				</li>

				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>


<!--菜单栏-->
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<?php if(is_array($info1)): $i = 0; $__LIST__ = $info1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dl id="menu-article">
				<dt>
				<?php if($vo1['auth_name'] == '社联信息管理'): ?><i class="Hui-iconfont">&#xe616;</i> 
				<?php elseif($vo1['auth_name'] == '社团管理'): ?>
				<i class="Hui-iconfont">&#xe6d3;</i> 	
				<?php elseif($vo1['auth_name'] == '活动管理'): ?>
				<i class="Hui-iconfont">&#xe6d8;</i>
				<?php elseif($vo1['auth_name'] == '新闻管理'): ?>
				<i class="Hui-iconfont">&#xe6f2;</i>
				<?php elseif($vo1['auth_name'] == '制度管理'): ?>
				<i class="Hui-iconfont">&#xe6ed;</i>
				<?php elseif($vo1['auth_name'] == '物品管理'): ?>
				<i class="Hui-iconfont">&#xe620;</i>
				<?php elseif($vo1['auth_name'] == '奖惩管理'): ?>
				<i class="Hui-iconfont">&#xe638;</i>
				<?php elseif($vo1['auth_name'] == '财务管理'): ?>
				<i class="Hui-iconfont">&#xe63a;</i>
				<?php elseif($vo1['auth_name'] == '权限管理'): ?>
				<i class="Hui-iconfont">&#xe62e;</i>
					<?php elseif($vo1['auth_name'] == '数据备份'): ?>
					<i class="Hui-iconfont">&#xe62e;</i><?php endif; ?>
				<?php echo ($vo1["auth_name"]); ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<?php if(is_array($info2)): $i = 0; $__LIST__ = $info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if( $vo2['auth_pid'] == $vo1['auth_id'] ): ?><li><a data-href="/Home/<?php echo ($vo2["auth_c"]); ?>/<?php echo ($vo2["auth_a"]); ?>" data-title="<?php echo ($vo2["auth_name"]); ?>" href="javascript:void(0)"><?php echo ($vo2["auth_name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</dd>
			</dl><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</aside>

<!--菜单栏收缩功能-->
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>


<!--右边-->
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="/Home/Manager/welcome">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group">
			<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
				<i class="Hui-iconfont">&#xe6d4;</i></a>
			<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['400px','300px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '个人信息',
		content: '<div>' +'<?php if($shenfen == 系统管理员): ?><span>管理员您好！</span>' +
		'<?php elseif($shenfen == 学生用户): ?>' +
		'<?php if($role_id == 2): ?><span>社联社长您好！</span><p>您加入的社团有：</p><?php if(is_array($myclub)): $i = 0; $__LIST__ = $myclub;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($i); ?>.<?php echo ($vo["member_club"]); ?>&nbsp;&nbsp;部门：<?php echo ($vo["member_depart"]); ?>&nbsp;&nbsp;职位：<?php echo ($vo["member_position"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>' +
		'<?php elseif($role_id == 3): ?><span>社长您好！<span><p>您加入的社团有：</p><?php if(is_array($myclub)): $i = 0; $__LIST__ = $myclub;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($i); ?>.<?php echo ($vo["member_club"]); ?>&nbsp;&nbsp;部门：<?php echo ($vo["member_depart"]); ?>&nbsp;&nbsp;职位：<?php echo ($vo["member_position"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>' +
		'<?php elseif( $role_id == 4 or 5): ?><span>您好！<span><p>您加入的社团有：</p><?php if(is_array($myclub)): $i = 0; $__LIST__ = $myclub;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($i); ?>.<?php echo ($vo["member_club"]); ?>&nbsp;&nbsp;部门：<?php echo ($vo["member_depart"]); ?>&nbsp;&nbsp;职位：<?php echo ($vo["member_position"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>' +
		'<?php endif; endif; ?>'+
		'</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script> 
<script>
   $(document).ready(function(){
   	$("body").show(1000);
  });
</script>
<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>