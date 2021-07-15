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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 物品管理 <span class="c-gray en">&gt;</span> 物品借出审核<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F<?php echo ($dp["$D('datemax')"]); ?>', minDate:'%y-%M-%d'})" id="datemin" class="input-text Wdate" style="width:120px;">

		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F<?php echo ($dp["$D('datemin')"]); ?>',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>

	<form action="/thinkphp_3.2.3_full/Home/Goods/check_pldel" method="post"  enctype="multipart/form-data" >
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
<!-- 	<span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>  -->
	<span class="l"><input type="submit" value="&#xe6e2;批量删除" class="btn btn-danger radius" >
	</span> 
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="25">序号</th>
				<th width="25">物品编号</th>
				<th width="50">物品名称</th>
				<th width="25">社团名称</th>
				<th width="50">借出数量</th>
				<th width="50">借出时间</th>
				<th width="25">归还时间</th>
				<th width="25">借出人</th>
				<th width="25">借出人学号</th>		
				<th width="25">借出者电话</th>
				<th width="25">审核状态</th>		
				<th width="50">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($checklist)): $i = 0; $__LIST__ = $checklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input type="checkbox" value="<?php echo ($vo["lend_id"]); ?>" name="checkarray[]"></td>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["goods_bh"]); ?></td>
				<td><?php echo ($vo["lend_name"]); ?></td>
				<td><?php echo ($vo["lend_club"]); ?></td>
				<td><?php echo ($vo["lend_number"]); ?></td>
				<td><?php echo ($vo["lend_time"]); ?></td>												
				<td><?php echo ($vo["return_time"]); ?></td>
				<td><?php echo ($vo["lend_stu"]); ?></td>
				<td><?php echo ($vo["stu_number"]); ?></td>
				<td><?php echo ($vo["lend_telephone"]); ?></td>
				<?php if($vo['lend_status'] == 1): ?><td><span class="label label-success radius">已通过审核</span></td>
				<?php elseif($vo['lend_status'] == 2): ?>
					<td><span class="label label-danger radius">未通过审核</span></td>
				<?php else: ?>
					<td><span class="label label-secondary radius">待审核</span></td>
				</elseif><?php endif; ?>
				<td class="td-manage">
				<a title="审核信息" href="javascript:;" onclick="member_edit('审核信息','/thinkphp_3.2.3_full/Home/Goods/lend_checkgoods/id/<?php echo ($vo["lend_id"]); ?>','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe665;</i></a>
				<a title="详细信息" href="javascript:;" onclick="member_edit('详细信息','/thinkphp_3.2.3_full/Home/Goods/lend_con/id/<?php echo ($vo["lend_id"]); ?>','4','','510')" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe616;</i></a>
					<a title="删除" href="/thinkphp_3.2.3_full/Home/Goods/check_del/id/<?php echo ($vo["lend_id"]); ?>" class="ml-5" style="text-decoration:none" onclick="return confirm('确定要删除吗？')">
					<i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>

		</tbody>
	</table>

	</div>
</div>
</form>
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
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/thinkphp_3.2.3_full/Home/Goods/members_del/id/<?php echo ($vo["member_id"]); ?>',
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
</body>
</html>