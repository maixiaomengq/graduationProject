<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta http-equiv=Content-Type content="text/html; charset=gb2312">

<title>河池学院社团主页</title>
	<link rel="shortcut icon" href="/Public/image/favico.ico"/>
<link rel="stylesheet" type="text/css" href="/Public/Front/css/reset.css">
<link rel="stylesheet" type="text/css" href="/Public/Front/css/base.css">
<link rel="stylesheet" type="text/css" href="/Public/Front/css/tipTip.css">
<link rel="stylesheet" type="text/css" href="/Public/Front/css/short-code.css">
<link rel="stylesheet" type="text/css" href="/Public/Front/css/prettyPhoto.css">
<link rel="stylesheet" type="text/css" href="/Public/Front/css/css3.css">
<link rel="stylesheet" type="text/css" href="/Public/Front/css/slider.css">
<script type="text/javascript" src="/Public/Front/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="/Public/Front/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="/Public/Front/js/cufon-yui.js"></script>
<script type="text/javascript" src="/Public/Front/js/TitilliumText.font.js"></script>
<script type="text/javascript" src="/Public/Front/js/cufon-replace.js"></script>
<script type="text/javascript" src="/Public/Front/js/scripts.js"></script>
<script type="text/javascript" src="/Public/Front/js/custom.js"></script>
<script type="text/javascript" src="/Public/Front/js/shortcode.js"></script>
	<!--[if IE 7]><link rel="stylesheet" type="text/css" href="/Public/Front/css/ie7.css"><![endif]-->
	<style>
		ul{ padding:0; margin:0; list-style:none;}
		a{ text-decoration:none; color:#F00}
		.lcrbox { margin: 10px 0; overflow: hidden }
		.lcr_l, .lcr_r { display: block; position: relative; top: 50%; margin-right: 0; text-align: center }
		.lcr_l { float: left }
		.lcr_r { float: right }
		.lcr_c { height: 100%; overflow: hidden; position: relative }
		.lcr_c ul { white-space: nowrap; font-size: 0 }
		@media screen and (-webkit-min-device-pixel-ratio:0) {
			.lcr_c ul { display: inline-table; vertical-align: top }
		}
		.lcr_c li { display: inline; font-size: 13px }
		.lcr_c li a { display: inline-block }
		.lcr_c img { padding: 2px; border: #dadada solid 1px }

		.lcrbox01 { height: 110px; position: relative; margin-top: 0 }
		.lcrbox01 .lcr_l, .lcrbox01 .lcr_r { width: 17px; height: 36px; line-height:36px;  margin-top: -18px; background-color: #fff; position: absolute; z-index: 100 }
		.lcrbox01 .lcr_l { left: 0; border-radius: 0 3px 3px 0; opacity: .5; filter: alpha(opacity=50) }
		.lcrbox01 .lcr_l:hover { opacity: .8; filter: alpha(opacity=80) }
		.lcrbox01 .lcr_r { right: 0; border-radius: 3px 0 0 3px; opacity: .5; filter: alpha(opacity=50) }
		.lcrbox01 .lcr_r:hover { opacity: .8; filter: alpha(opacity=80) }
		.lcrbox01 .lcr_c { z-index: 99 }
		.lcrbox01 .lcr_c li { padding-left: 10px }
		.lcrbox01 .lcr_c .scroll_first { padding-left: 0 }
		.lcrbox01 .lcr_c img { width: 182px; height: 102px }
		.lcrbox01 .lcr_l .ico, .lcrbox01 .lcr_r .ico { margin-top: 13px }
		:root .lcrbox01 .lcr_l, :root .lcrbox01 .lcr_l:hover, :root .lcrbox01 .lcr_r, :root .lcrbox01 .lcr_r:hover { filter: none }
	</style>

<style type="text/css">
<!--
.STYLE5 {
	font-size: 30px;
	color: #333333;
	margin: 10 0 10 0;
}
.STYLE6 {color: #FF0000}
.STYLE8 {font-size: 30px; color: #333333; margin: 10 0 10 0; font-weight: bold; }
.STYLE9 {font-size: 24px}
.STYLE10 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
	<style type="text/css">
		#left {
			display:inline-block;
			float:left;
		}
		#right {
			display:inline-block;
			float:right;
		}
	</style>
</head>
<body class="home"><!--Header-->
<div class="full-width-wrapper" id="header">
  <div class="full-width-wrapper" id="abstract-bg"><!--Banner-->
    <div class="fixed-width-wrapper" id="banner">
      <a href="<?php echo U('Index/index');?>" title="" class="logo"><img src="/Public/Front/images/hechixueyuanzhuye.png" alt="Maxx - The Modern HTML template"></a>
     <!--/Banner--> <!--<ul class="social-network">
	    <li><a href="#" title="Facebook"><img src="images/icons/facebook.png" alt=""></a></li>
		<li><a href="#" title="Twitter"><img src="images/icons/twitter.png" alt=""></a></li>
		<li><a href="#" title="Delicious"><img src="images/icons/delicious.png" alt=""></a></li>
	  </ul>-->
	</div><!--/Banner--><!--Navigation + Search-->
	<div class="fixed-width-wrapper border-radius-5px" id="navigation-bar">
		<div id="g-navigation"><ul class="simple-drop-down-menu">
		  <li class="home-page current border-radius-left-5px"><a href="<?php echo U('Index/index');?>">首页</a></li>
		  <li><a href="<?php echo U('Club/club_list');?>" title="">学校社团</a></li>
		  <li><a href="<?php echo U('New/new_list');?>" title="">新闻动态</a></li>
			<li><a href="<?php echo U('Activity/activity_list');?>" title="">活动动态</a></li>
			<li><a href="<?php echo U('Home/Index/index');?>" title="">社团后台</a></li>
			</ul></div>
			  <div id="g-search">
				<form action="" method="post"><div><input type="text" class="input-field border-radius-left-3px reset-text" value="Search here..."></div>
				  <div><button type="submit" title="Search" class="sprite"><em>Search</em></button></div>
				</form>
	  </div>
	</div><!--/Navigation + Search-->
  </div>
</div><!--/Header--><!--Slider-->
   <!--中部图片-><!--Slider-->
    <div class="clear" id="slider-bg"><div class="full-width-wrapper" id="slider-frame">
		<div class="fixed-width-wrapper maxx-theme" id="slider-wrapper">
			<div id="slider" class="nivoSlider">
				<a href="#"><img src="/Public/Front/images/tushu.jpg" alt="" title="" width="960" height="370"></a>
				<a href="#"><img src="/Public/Front/images/menkou.jpg" alt="" title="" width="960" height="370"></a>
				<a href="#"><img src="/Public/Front/images/tianjinchang.jpg" alt="" title="" width="960" height="370"></a>
				<a href="#"><img src="/Public/Front/images/yifulou.jpg" alt="" title=""></a>
				<a href="#"><img src="/Public/Front/images/jianzhu.jpg" alt="" title=""></a>
			</div>
			<div id="htmlcaption" class="nivo-html-caption"> <a href="#"></a></div>
			<div id="htmlcaption2" class="nivo-html-caption"> <a href="#"></a></div>
			<div id="htmlcaption3" class="nivo-html-caption"><a href="#"></a>                </div>
		</div>
	</div>
	</div>
	<!--中部图片结束-><!--Slider-->
	
	<!--主要内容-><!--Slider-->
	<div class="full-width-wrapper"><div class="fixed-width-wrapper body-divider " id="body-content"><!--Entry--><div class="entry three-column fixed-width-wrapper"><!--block-->
	<div class="block type1">
	<span class="STYLE10">社团联合会</span>
	  <div class="content"><a href="#" title="" class="preloading-light img-border align-none"><img src="/Public/Front/images/shelian.jpg" width="280" height="130" alt=""></a>
	    <div class="clear"></div><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学生社团联合会（Students' Association Union）在校团委的直接指导下，管理社团工作、服务社团发展的学生组织，旗下管辖着涵盖文学学术、实践服务、艺术文化、爱好兴趣、体育运动等功能丰富、类型兼备的各类学生社团组织。它以充分调动众多社团及其会员的积极性和创造性，全面开展有深度、有内涵、有品位、有价值、有意义的社团活动，不断丰富校园文化生活，提高当代大学生的学习能力、实践能力、组织能力和创新能力为目标。</p>
	  </div><a class="read-more" href="<?php echo U('Club/club_list');?>" title="Read more">Read more</a></div><!--/block--><!--block-->
 <div class="block type1">
	<span class="STYLE10">新闻动态</span>
	  <div class="content">
	    <a href="#" title="" class="preloading-light img-border align-none"><img src="/Public/Front/images/xinwen2.gif" height="120" width="280" alt=""></a>
	    <div class="clear"></div>
		  <p>
			  <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('New/new_con',array('id'=>$vo['new_id']));?>"><?php echo ($vo["new_title"]); ?></a><font id="right">[<?php echo ($vo["new_time"]); ?>]</font></li><?php endforeach; endif; else: echo "" ;endif; ?>
 </p>
	  </div><a class="read-more" href="<?php echo U('New/new_list');?>" title="Read more">Read more</a></div>
 <!--/block--><!--block-->
 <div class="block type3">
<span class="STYLE10">最新活动动态</span>
   <div class="content">
	   <a href="#" title="" class="preloading-light img-border align-none"><img src="/Public/Front/images/huodong.gif" height="120" width="280" alt=""></a>
     <ul class="list point">
		 <?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Activity/activity_list');?>" title=""><?php echo ($vo["activity_theme"]); ?></a><font id="right"></font></li><?php endforeach; endif; else: echo "" ;endif; ?>

	 </ul>
	 </div>
	 <a class="read-more" href="#" title="Read more">Read more</a></div><!--/block--></div>
 <!--/Entry--><!--Get in touch-->
		<br />
		<div id="left">
			<span class="STYLE10">风采展览</span>
			<p>
			<div id="lcrboxslide" class="lcrbox lcrbox01" style="width:600px;">
				<a title="prev" class="lcr_l" href="javascript:;"><</a><a title="next" class="lcr_r" href="javascript:;">></a>
				<div class="lcr_c">
					<ul  style="position: absolute;" class="overview">
						<li class="scroll_first"><img  src="/Public/Front/images/bianchengaihaozhe.jpg" alt="" /></li>
						<li><img src="/Public/Front/images/nanloudanxia.jpg"  alt="" /></li>
						<li><img src="/Public/Front/images/aixinshe.jpg"  alt="" /></li>
						<li><img src="/Public/Front/images/tuqingxiehui.jpg" alt="" /></li>
						<li><img src="/Public/Front/images/baituandazhan.jpg" alt="" /></li>
						<li><img src="/Public/Front/images/nanloudanxia.jpg"  alt="" /></li>
						<li><img src="/Public/Front/images/aixinshe.jpg"  alt="" /></li>
						<li><img src="/Public/Front/images/tuqingxiehui.jpg" alt="" /></li>
						<li><img src="/Public/Front/images/baituandazhan.jpg" alt="" /></li>
					</ul>
				</div>
			</div></p>
		</div>
		<div id="right">
			<span class="STYLE10">宣传视频</span>
		<center>
			<video width="300" height="200" controls="controls" autoplay="autoplay">
				<source src="/i/movie.ogg" type="video/ogg" />
				<source src="/Public/movie.mp4" type="video/mp4" />
				<source src="/i/movie.webm" type="video/webm" />
				<object data="/Public/movie.mp4" width="320" height="240">
					<embed width="320" height="240" src="/Public/movie.mp4" />
				</object>
			</video>
		</center>
		</div>
 <div id="get-in-touch" class="fixed-width-wrapper"><div class="via-phone-number float-left">
	 <a class="icon sprite float-left" title="Keep in touch with us">Keep in touch with us</a>
	 <font size="100" face="宋体">友情链接：
		 <p>
		 <a href="http://www.hcnu.edu.cn/">河池学院主页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <a href="http://172.16.0.143/default2.aspx">教务管理系统</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <a href="http://www.hcnu.edu.cn/login.php">网络教学综合平台</a>
			 <br />
		 <a href= <?php echo U('Home/Index/index');?>>社团后台系统</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <a href="http://hcnu.fanya.chaoxing.com/portal">超星慕课学习平台</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <a href="http://www.hcnu.edu.cn/index.php?m=content&c=index&a=lists&catid=82">学校OA办公系统</a>
		 </p>
	 </font>
	 <span></span></div>
	 <div class="via-email float-right"><form action="" method="post"><div><input class="input-field border-radius-3px reset-text float-left" value="Enter your E-mail address..."></div><div>
 <button type="submit" class="black border-radius-3px float-right"><em class="sprite"></em>CLICK!</button></div></form></div></div><!--/Get in touch-->
 </div>
 </div>
		<!--主要内容结束-><!--Slider-->
	
    <!--/尾--><!--Footer Extra-->
	<div class="full-width-wrapper" id="footer-extra-wrapper"><div class="fixed-width-wrapper"><div id="copyright"><a href="#" class="logo float-left" title=""><img src="/Public/Front/images/system_logo.png" alt=""></a><ul><li>(c) 2017 HECHIXUEYUAN Association  </li><li><a href="#" title="">developer：CHENZHILIANG</a></li><li><a href="#" title="">技术客服QQ：317389036</a></li></ul><a href="#" class="back-to-top sprite" title="Back to top">Back to top</a></div></div></div>
	<!--/尾结束-->
<script >
	(function($){
		/*左右滚动*/
		var defaults={
			cont:'',
			prev:'.prev',
			next:'.next',
			time:10000,//滚动时间
			distance: null, //滚动距离
			auto: false,
			autoDelay:"3000"
		};

		$.fn.slider=function(options){
			var o= $.extend({},defaults,options||{}),self=this;
			var jqCont=$(o.cont,self);
			var jqContWidth=jqCont.width();
			var dist= 0,maxDist=jqContWidth- o.distance;

			var setInt;             //自动滚动定时器变量
			clearInterval(setInt);  //先清理一次

			//向前滚动
			$(o.prev,self).bind('click',function(){
				if(dist>=0)return;
				dist+= o.distance;
				if(dist>=0)dist=0;
				jqCont.stop().animate({left:dist}, o.time);
			});
			//向后滚动
			$(o.next,self).bind('click',function(){
				if(Math.abs(dist)>=maxDist)return;
				dist+= -o.distance;
				if(Math.abs(dist)>=jqContWidth)dist=-maxDist;
				jqCont.stop().animate({left:dist}, o.time);
			});

			//自动滚动
			self.bind({
				'mouseenter': function() {
					clearInterval(setInt);
				},
				'mouseleave':function(){
					setInt = setInterval(function () {
						$(o.next, self).trigger("click");
					},o.autoDelay);
				}
			});
			if (o.auto) {
				self.trigger("mouseleave");
			}

		};

	})(jQuery);

	//滚动
	$('#lcrboxslide').slider({
		cont: '.overview',
		prev: '.lcr_l',
		next: '.lcr_r',
		distance: 792,
		time: 1500,
		auto: true
	});
</script>
</body>
</html>