<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>总统计饼状统计图</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 社团管理 <span class="c-gray en">&gt;</span> 总统计 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="/Home/Clubmember/member_count" method="post"  enctype="multipart/form-data" >
    <div class="cl pd-5 bg-1 bk-gray mt-20" align="center">
<!--             <input type="text" class="input-text" style="width:250px" placeholder="输入社团名称" id="" name=""> -->
        查询的统计类型:
        <select name="type" id="type">
        <option>---选择类型---</option>
        <option value="container">参加社团的各院人数与比例统计</option>
            <option value="people">全校人数和参与社团人数比例统计</option>
        </select>
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
    </div>
    </form>
	<div id="<?php echo ($type); ?>" style="min-width:700px;height:400px"></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/lib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="/Public/lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
<script type="text/javascript" src="/Public/lib/hcharts/Highcharts/5.0.6/js/highcharts-3d.js"></script>
<script type="text/javascript">
﻿﻿$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: '参加社团的各院人数与比例'
        },
        subtitle:{
            text:'文学与传媒学院：<?php echo ($wenchuan); ?>人、政治与历史文化学院：<?php echo ($zhengshi); ?>人、外国语学院：<?php echo ($waiguoyu); ?>人、' +
            '数学与统计学院：<?php echo ($shutong); ?>人、'+ '物理与机电工程学院：<?php echo ($wudian); ?>人、' +'<br />'+
            '化学与生物工程学院：<?php echo ($huasheng); ?>人、计算机与信息工程学院：<?php echo ($jixin); ?>人、' +
            '体育学院：<?php echo ($tiyu); ?>人、艺术学院：<?php echo ($yishu); ?>人、教师教育学院：<?php echo ($jiaoshi); ?>人、经济与管理学院：<?php echo ($jingguan); ?>人'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 50,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: '占社团各院系比例',
            data: [

                ['文学与传媒学院',   <?php echo ($wenchuan); ?>],
                ['政治与历史文化学院', <?php echo ($zhengshi); ?>],
                // {
                //     name: 'Chrome',
                //     y: 12.8,
                //     sliced: true,
                //     selected: true
                // },
                ['外国语学院',<?php echo ($waiguoyu); ?>],
                ['数学与统计学院',<?php echo ($shutong); ?>],
                ['物理与机电工程学院',<?php echo ($wudian); ?>],
                ['化学与生物工程学院',<?php echo ($huasheng); ?>],
                ['计算机与信息工程学院',<?php echo ($jixin); ?>],
                ['体育学院',<?php echo ($tiyu); ?>],
                ['艺术学院',<?php echo ($yishu); ?>],
                ['教师教育学院',<?php echo ($jiaoshi); ?>],
                ['经济与管理学院',<?php echo ($jingguan); ?>]
            ]
        }]
    });
    $('#people').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '全校总人数和参与社团总人数比例'
        },
        subtitle:{
            text:'全校总人数：<?php echo ($stu_count); ?>、参与社团总人数：<?php echo ($member_count); ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: '人数比例图：',
            data: [
                ['全校人数', <?php echo ($stu_count); ?>],
                ['参与社团人数', <?php echo ($member_count); ?>],
                // {
                //     name: 'Chrome',
                //     y: 12.8,
                //     sliced: true,
                //     selected: true
                // },

            ]
        }]
    });
});
</script>
</body>
</html>