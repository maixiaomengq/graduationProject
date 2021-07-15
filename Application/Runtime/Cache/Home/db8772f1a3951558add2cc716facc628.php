<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
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
<!--/meta 作为公共模版分离出去-->

<title>审核物品 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">

	<form action="/thinkphp_3.2.3_full/Home/Goods/lend_con/id/9" method="post"  enctype="multipart/form-data" >
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<tr class="text-c">
			<th width="40" >物品编号</th>
			<th width="40" colspan="3" >
				<?php echo ($current["goods_bh"]); ?>
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">物品名称</th>
			<th width="40">
				<?php echo ($current["lend_name"]); ?>
			</th>
			<th width="40">借出数量</th>
			<th width="40">
				<?php echo ($current["lend_number"]); ?>
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">社团名称</th>
			<th width="40">
				<?php echo ($current["lend_club"]); ?>
			</th>
			<th width="40">借出时间</th>
			<th width="40">
				<?php echo ($current["lend_time"]); ?>
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">归还时间</th>
			<th width="40">
				<?php echo ($current["return_time"]); ?>
			</th>
			<th width="40">借出人</th>
			<th width="40">
				<?php echo ($current["lend_stu"]); ?>
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">借出人学号</th>
			<th width="40">
				<?php echo ($current["stu_number"]); ?>
			</th>
			<th width="40">借出者电话</th>
			<th width="40">
				<?php echo ($current["lend_telephone"]); ?>
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">借出理由</th>
			<th width="40" colspan="3">
				<?php echo ($current["lend_reason"]); ?>
			</th>
		</tr>
	</table>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/thinkphp_3.2.3_full/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
// $(function(){
// 	$('.skin-minimal input').iCheck({
// 		checkboxClass: 'icheckbox-blue',
// 		radioClass: 'iradio-blue',
// 		increaseArea: '20%'
// 	});
	
	$("#form-member-add").validate({
		rules:{
			stu_name:{
				required:true,
				minlength:2,
				maxlength:16
			},
			stu_sex:{
				required:true,
			},
			stu_phone:{
				required:true,
				isMobile:true,
			},
			stu_email:{
				required:true,
				email:true,
			},
			stu_logo:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<script type="text/javascript">  
    //===【浏览文件上传地址写入文本框】开始  
    $(function() {  
        $('#doc-form-file').on('change', function() {  
            var fileNames = '';  
            $.each(this.files, function() {  
                fileNames +=  this.name ;  
            });  
            $('#ImgURL').val(fileNames);  
        });  
    });  
    //===【浏览文件上传地址写入文本框】结束  
          
        //缩略图显示方法  
    function PreviewImage(imgFile)  
    {  
        var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);  
        filextension=filextension.toLowerCase();  
        if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))  
        {  
            alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");  
            imgFile.focus();  
        }  
        else  
        {  
            var path;  
            if(document.all)//IE  
            {  
                imgFile.select();  
                path = document.selection.createRange().text;  
                document.getElementById("imgPreview").innerHTML="";  
                document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果        
            }  
            else//FF  
            {  
                path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上  
                //path = imgFile.files[0].getAsDataURL();// FF 3.0  
                document.getElementById("imgPreview").innerHTML = "<img id='img1' width='150px' height='150px' src='"+path+"'/>";  
                //document.getElementById("img1").src = path;  
            }  
        }  
    }  
</script>  
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>