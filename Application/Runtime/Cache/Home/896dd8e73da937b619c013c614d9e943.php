<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]       \'%y-%M-%d\'>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_full/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_full/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_full/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/thinkphp_3.2.3_full/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>数据备份</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据备份 <span class="c-gray en">&gt;</span> 备份数据库 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">

	<!--<form id="export-form" action="<?php echo U('export');?>" method="post"  enctype="multipart/form-data" >-->
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span>
						<a id="export" class="btn btn-primary radius" href="javascript:;" autocomplete="off">立即备份</a>
			<!--<a id="export" class="btn btn-primary radius" href="javascript:;" autocomplete="off">立即备份</a>-->
        <a id="optimize" class="btn btn-primary radius" href="<?php echo U('optimize');?>">优化表</a>
        <a id="repair" class="btn btn-primary radius" href="<?php echo U('repair');?>">修复表</a></span>
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<form id="export-form" action="<?php echo U('export');?>" method="post"  enctype="multipart/form-data" >
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value="" class="check-all" checked="chedked"></th>
				<th hidden="hidden"></th>
				<th hidden="hidden"></th>
				<th width="25">序号</th>
				<th width="100">表名</th>
				<th width="120">数据量</th>
				<th width="120">数据大小</th>
				<th width="160">创建时间</th>
				<th width="160">备份状态</th>
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input class="ids" checked="chedked" type="checkbox" value="<?php echo ($table["name"]); ?>}" name="tables[]"></td>
				<td hidden="hidden"></td>
				<td hidden="hidden"></td>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($table["name"]); ?></td>
				<td><?php echo ($table["rows"]); ?></td>
				<td><?php echo ($table["data_length"]); ?></td>
				<td><?php echo ($table["create_time"]); ?></td>
				<td class="info">未备份</td>
				<td class="action">
					<a class="ajax-get no-refresh" href="<?php echo U('optimize?tables='.$table['name']);?>">优化表</a>&nbsp;
					<a class="ajax-get no-refresh" href="<?php echo U('repair?tables='.$table['name']);?>">修复表</a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		</tbody>
	</table>

	</div>
	</form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function( ){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});
	
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/thinkphp_3.2.3_full/Home/Database/members_del/id/<?php echo ($vo["member_id"]); ?>',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
<!-- /应用列表 -->

	<script type="text/javascript">
		(function($){
			var $form = $("#export-form"), $export = $("#export"), tables
			$optimize = $("#optimize"), $repair = $("#repair");

			$optimize.add($repair).click(function(){
				$.post(this.href, $form.serialize(), function(data){
					if(data.status){
						updateAlert(data.info,'alert-success');
					} else {
						updateAlert(data.info,'alert-error');
					}
					setTimeout(function(){
						$('#top-alert').find('button').click();
						$(that).removeClass('disabled').prop('disabled',false);
					},1500);
				}, "json");
				return false;
			});

			$export.click(function(){
				$export.parent().children().addClass("disabled");
				$export.html("正在发送备份请求...");
				$.post(
						$form.attr("action"),
						$form.serialize(),
						function(data){
							if(data.status){
								tables = data.tables;
								$export.html(data.info + "开始备份，请不要关闭本页面！");
								backup(data.tab);
								window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
							} else {
								updateAlert(data.info,'alert-error');
								$export.parent().children().removeClass("disabled");
								$export.html("立即备份");
								setTimeout(function(){
									$('#top-alert').find('button').click();
									$(that).removeClass('disabled').prop('disabled',false);
								},1500);
							}
						},
						"json"
				);
				return false;
			});

			function backup(tab, status){
				status && showmsg(tab.id, "开始备份...(0%)");
				$.get($form.attr("action"), tab, function(data){
					if(data.status){
						showmsg(tab.id, data.info);

						if(!$.isPlainObject(data.tab)){
							$export.parent().children().removeClass("disabled");
							$export.html("备份完成，点击重新备份");
							window.onbeforeunload = function(){ return null }
							return;
						}
						backup(data.tab, tab.id != data.tab.id);
					} else {
						updateAlert(data.info,'alert-error');
						$export.parent().children().removeClass("disabled");
						$export.html("立即备份");
						setTimeout(function(){
							$('#top-alert').find('button').click();
							$(that).removeClass('disabled').prop('disabled',false);
						},1500);
					}
				}, "json");

			}

			function showmsg(id, msg){
				$form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
			}
		})(jQuery);
	</script>

</body>
</html>