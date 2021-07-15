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
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加活动 - H-ui.admin v3.1</title>
 <style type="text/css">
dl,dt,dd{ 
margin:0; 
background:#fff5fa; 
font-size:14px; 
} 
dl{ 
margin:0 auto; 
width:50%; 
border:1px solid #dff0d8; 
border-bottom:none; 
} 
dt{ 
font-weight:800; 
background:#dff0d8; 
color:; 
} 
dt,dd{ 
line-height:30px; 
padding:0 0 0 10px; 
border-bottom:1px solid #dff0d8; 
height:30px; 
overflow:hidden 
} 
dd{ 
text-indent:3em; 
} 
.fff{ 
background:#fff 
} 
dt span,dd span{ 
display:block; 
float:right; 
font-size:14px; 
border-left:1px solid #f8b3d0; 
text-indent:0em; 
width:80px; 
text-align:center; 
} 

 </style>
</head>
<body>
	<form action="/Home/Role/distribute/role_id/5" method="post"  enctype="multipart/form-data" >
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<dl class="hb">
			当前角色：<?php echo ($role_name); ?>
		<?php if(is_array($info1)): foreach($info1 as $key=>$vo1): ?><dt>
			<?php if(in_array($vo1['auth_id'],$role_auth_ids_array)): ?><input type="checkbox" name="auth[]" value="<?php echo ($vo1["auth_id"]); ?>" checked="checked">
			<?php else: ?>
				<input type="checkbox" name="auth[]" value="<?php echo ($vo1["auth_id"]); ?>"><?php endif; ?>
			<?php echo ($vo1["auth_name"]); ?>
			</dt>

			<?php if(is_array($info2)): foreach($info2 as $key=>$vo2): if($vo2['auth_pid'] == $vo1['auth_id'] ): ?><dd class="fff">
				<?php if(in_array($vo2['auth_id'],$role_auth_ids_array)): ?><input type="checkbox" name="auth[]" value="<?php echo ($vo2["auth_id"]); ?>" checked="checked">
				<?php else: ?>
					<input type="checkbox" name="auth[]" value="<?php echo ($vo2["auth_id"]); ?>" ><?php endif; ?>
				<?php echo ($vo2["auth_name"]); ?>
				</dd><?php endif; endforeach; endif; endforeach; endif; ?>
	</dl>

		<tr  class="text-c" align="center">
			<th>
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;确定分配&nbsp;&nbsp;">
			</th>
		</tr>
	</table>
	</form>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
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