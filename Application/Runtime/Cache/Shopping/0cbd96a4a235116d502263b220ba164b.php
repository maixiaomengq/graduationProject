<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>上海某某不锈钢有限公司</title>
<meta name="keywords" content="上海某某不锈钢有限公司" />
<meta name="description" content="上海某某不锈钢有限公司" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
<link type="text/css" href="/thinkphp_3.2.3_full/Public/Shopping/css/style.css" rel="stylesheet" />
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/Shopping/js/jquery.1.4.2.min.js"></script>
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/Shopping/js/lib.js"></script>
<script type="text/javascript">
$(function() {

	//导航
	$(".nav").lavaLamp({
		fx: "backinout", 
		speed: 700,
		click: function(event, menuItem) {
			return true;
		}
	});
	
	//新闻
	$("#scrolltop").myScroll({
		speed:40,
		rowHeight:26
	});
	
	//产品展示
	$("#scrollpic").jCarouselLite({
		btnPrev:'.prev',
		btnNext:'.next',
		auto:2000,
		visible:4
	});	
	
});
</script>
<!--解决 IE6 背景缓存-->
<!--[if IE 6]><script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);</script><![endif]-->
</head>

<body>

	<div class="container header">
		<img src="/thinkphp_3.2.3_full/Public/Shopping/images/hechixueyuan.png" width="100" height="100" alt="">
			<font size="10" color="blue">河池学院社团主页</font>

		<div class="ritside">
			<script type="text/javascript">
			document.write("<div class='today'>"+
				getFullYear(today)+"年&nbsp;&nbsp;"
				+isnMonths[today.getMonth()]+"月"
				+today.getDate()+"日&nbsp;&nbsp;"
				+isnDays[today.getDay()]
			+"</div>");
			</script>
			<div class="telephone">
				<a href= <?php echo U('Home/Index/index');?>>社团后台</a>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="nav">
			<div class="nlbg"></div>
			<ul>
				<li class="current"><a href=<?php echo U('Index/index');?>>首 页</a></li>
				<li><a href="about.html">关于我们</a></li>
				<li><a href="news.html">新闻动态</a></li>
				<li><a href="product.html">产品展示</a></li>
				<li><a href="job.html">加入我们</a></li>
				<li class="last"><a href="contact.html">联系我们</a></li>
			</ul>
			<div class="nrbg"></div>
		</div>
	</div><!--header end-->
	
	<div class="container content">
		
		<div class="banner"><a href="#"><img src="/thinkphp_3.2.3_full/Public/Shopping/images/banner.jpg" width="960" height="277" alt="" /></a></div>
		
		<div class="f-l i-company pubox">
			<div class="putit"><div><h2 class="f-l">公司介绍</h2><a class="f-r more" href="about.html">更多>></a></div></div>
			<div class="pubcon">
				<a href="about.html"><img class="f-l" src="/thinkphp_3.2.3_full/Public/Shopping/images/214sada.jpg" width="171" height="114" alt="公司介绍" /></a>
				<p>自今年以来，不锈钢棒材价格跌跌不休，主要是终端需求持续低迷，下游采购商“买涨不买跌”的心态影响。不锈钢型材行业的微利经营仍在持续，甚至进一步发展...</p>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="f-l i-news pubox">
			<div class="putit"><div><h2 class="f-l">新闻动态</h2><a class="f-r more" href="news.html">更多>></a></div></div>
			<div class="pubcon" id="scrolltop">
				<ul>
					<li><em class="dian">·</em><a href="news.html">青山控股集团熊欢龙湾区第动会</a><span class="date">[05-26]</span></li>
					<li><em class="dian">·</em><a href="news.html">青山控股集团熊欢龙湾区第动会</a><span class="date">[05-26]</span></li>
					<li><em class="dian">·</em><a href="news.html">青山控股集团熊欢龙湾区第动会</a><span class="date">[05-26]</span></li>
					<li><em class="dian">·</em><a href="news.html">青山控股集团熊欢龙湾区第动会</a><span class="date">[05-26]</span></li>
					<li><em class="dian">·</em><a href="news.html">青山控股集团熊欢龙湾区第动会</a><span class="date">[05-26]</span></li>
					<li><em class="dian">·</em><a href="news.html">青山控股集团熊欢龙湾区第动会</a><span class="date">[05-26]</span></li>
				</ul>
			</div>
		</div>
		
		<div class="f-r i-contact pubox">
			<div class="putit"><div><h2 class="f-l">联系方式</h2><a class="f-r more" href="contact.html">更多>></a></div></div>
			<div class="pubcon">
				地 址：温州市龙湾区永中街道青山<br />联系人：朱某某<br />电 话：+86-0577-86602022<br />邮 箱：<a style="text-decoration:underline;" href="mailto:q541374203@qq.com">q541374203@qq.com</a>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="f-l i-product pubox">
			<div class="putit"><div><h2 class="f-l">产品展示</h2><a class="f-r more" href="product.html">更多>></a></div></div>
			<div class="pubcon">
				<div class="f-l sbtn prev"></div>
				<div id="scrollpic">
					<ul>
						<li>
							<a href="product.html"><img src="/thinkphp_3.2.3_full/Public/Shopping/images/1243a.jpg" width="140" height="122" alt="" /></a>
							<span><a href="product.html">ASTM A270</a></span>
						</li>
						<li>
							<a href="product.html"><img src="/thinkphp_3.2.3_full/Public/Shopping/images/123asd.jpg" width="140" height="122" alt="" /></a>
							<span><a href="product.html">ASTM A554/DIN</a></span>
						</li>
						<li>
							<a href="product.html"><img src="/thinkphp_3.2.3_full/Public/Shopping/images/3214saf.jpg" width="140" height="122" alt="" /></a>
							<span><a href="product.html">ISO 2037/DIN11850</a></span>
						</li>
						<li>
							<a href="product.html"><img src="/thinkphp_3.2.3_full/Public/Shopping/images/1234af.jpg" width="140" height="122" alt="" /></a>
							<span><a href="product.html">ASTM A790/ASTM A789</a></span>
						</li>
					</ul>
				</div>
				<div class="f-r sbtn next"></div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="f-r i-friendship pubox">
			<div class="putit"><div><h2 class="f-l">友情链接</h2></div></div>
			<div class="pubcon">
				<ul>
					<li><em class="dian">·</em><a href="http://www.hcnu.edu.cn/">河池学院主页</a></li>
					<li><em class="dian">·</em><a href="http://172.16.0.143/default2.aspx">教务管理系统</a></li>
					<li><em class="dian">·</em><a href="http://www.hcnu.edu.cn/login.php">网络教学综合平台</a></li>
					<li><em class="dian">·</em><a href="http://hcnu.fanya.chaoxing.com/portal">超星慕课学习平台</a></li>
					<li><em class="dian">·</em><a href="http://www.hcnu.edu.cn/index.php?m=content&c=index&a=lists&catid=82">学校OA办公系统
					</a></li>
				</ul>
			</div>
		</div>
		
		<div class="clear"></div>
		
	</div><!--content end-->
	
	<div class="container footer">
		<div class="btnmenu"><a href="index.html">首 页</a><span>|</span><a href="about.html">企业介绍</a><span>|</span><a href="news.html">新闻动态</a><span>|</span><a href="product.html">产品展示</a><span>|</span><a href="job.html">加入我们</a><span>|</span><a href="contact.html">联系我们</a></div>
		<div class="copyright">Copyright © 2011-2012   tssinfo.com   Inc.All Rights Reserved<br />浙ICP备11030275号-2 更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></div>
	</div><!--footer end-->
	
</body>
</html>