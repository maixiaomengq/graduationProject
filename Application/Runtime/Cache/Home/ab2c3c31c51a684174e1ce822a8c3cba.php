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
<title>柱状图统计</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 社团管理 <span class="c-gray en">&gt;</span> 社员统计 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <form action="/Home/Clubmember/member_number.shtml" method="post"  enctype="multipart/form-data" >
    <div class="cl pd-5 bg-1 bk-gray mt-20" align="center"> 
<!--             <input type="text" class="input-text" style="width:250px" placeholder="输入社团名称" id="" name=""> -->
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
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo ($club_name); echo ($time); ?>社员统计图'
        },
        subtitle: {
            text: '一月份：<?php echo ($count_January); ?>、二月份：<?php echo ($count_February); ?>、三月份：<?php echo ($count_January); ?>、四月份：<?php echo ($count_March); ?>、五月份：<?php echo ($count_January); ?>、六月份：<?php echo ($count_June); ?>、七月份：<?php echo ($count_July); ?>、八月份：<?php echo ($count_August); ?>、九月份：<?php echo ($count_September); ?>、十月份：<?php echo ($count_October); ?>、十一月份：<?php echo ($count_November); ?>、十二月份：<?php echo ($count_December); ?>、年度总人数：<?php echo ($count); ?>'
        },
        xAxis: {
            categories: [
                '一月份',
                '二月份',
                '三月份',
                '四月份',
                '五月份',
                '六月份',
                '七月份',
                '八月份',
                '九月份',
                '十月份',
                '十一月份',
                '十二月份'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: '人数（个）'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:}个</b></td></tr>'

                ,
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '<?php echo ($club_name); ?>',
            data: [<?php echo ($count_January); ?>, <?php echo ($count_February); ?>, <?php echo ($count_March); ?>, <?php echo ($count_April); ?>, <?php echo ($count_May); ?>, <?php echo ($count_June); ?>, <?php echo ($count_July); ?>, <?php echo ($count_August); ?>, <?php echo ($count_September); ?>, <?php echo ($count_October); ?>, <?php echo ($count_November); ?>, <?php echo ($count_December); ?>]

        }, ]
    });
});				
</script>
</body>
</html>