<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>折线图</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 财务管理 <span class="c-gray en">&gt;</span> 财务统计 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="/Home/Financial/in_out.shtml" method="post"  enctype="multipart/form-data" >
    <div class="cl pd-5 bg-1 bk-gray mt-20" align="center"> 
        社团名称:
        <select name="club_name" id="club_name">
        <option>---请选择社团---</option>
        <?php if(is_array($clublsit)): $i = 0; $__LIST__ = $clublsit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["club_name"]); ?>"><?php echo ($vo["club_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        时间：
        <input type="text" class="input-text" style="width:100px" placeholder="如：1996" id="time" name="time">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查找</button>
    </div>
    </form>
	<div id="container" style="min-width:700px;height:400px"></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/lib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="/Public/lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
    Highcharts.chart('container', {
        title: {
            text: '<?php echo ($club_name); echo ($time); ?>年度财务变化折线图',
            x: -20 //center
        },
        subtitle: {
            text: '年度总收入：<?php echo ($in_count); ?>年度总支出：<?php echo ($out_count); ?>',
            x: -20
        },
        xAxis: {
            categories: ['一月份', '二月份', '三月份', '四月份', '五月份', '六月份','七月份', '八月份', '九月份', '十月份', '十一月份', '十二月份']
        },
        yAxis: {
            title: {
                text: '人民币 (元)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '元'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '支入',
            data: [<?php echo ($in_January); ?>, <?php echo ($in_February); ?>,<?php echo ($in_March); ?>,<?php echo ($in_April); ?>,<?php echo ($in_May); ?>,<?php echo ($in_June); ?>,<?php echo ($in_July); ?>,<?php echo ($in_August); ?>,<?php echo ($in_September); ?>,<?php echo ($in_October); ?>,<?php echo ($in_November); ?>,<?php echo ($in_December); ?>]
        }, {
            name: '支出',
            data: [<?php echo ($out_January); ?>, <?php echo ($out_February); ?>,<?php echo ($out_March); ?>,<?php echo ($out_April); ?>,<?php echo ($out_May); ?>,<?php echo ($out_June); ?>,<?php echo ($out_July); ?>,<?php echo ($out_August); ?>,<?php echo ($out_September); ?>,<?php echo ($out_October); ?>,<?php echo ($out_November); ?>,<?php echo ($out_December); ?>]
        }]
    });
});
</script>
</body>
</html>