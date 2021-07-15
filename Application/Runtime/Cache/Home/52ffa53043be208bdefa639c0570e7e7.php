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

<title>添加成员 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">

	<form action="/thinkphp_3.2.3_full/Home/Club/club_update/id/2" method="post"  enctype="multipart/form-data" >
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<tr class="text-c">
			<th width="40">社团名称</th>
			<th width="40"><input type="text" class="input-text" value="<?php echo ($current["club_name"]); ?>" placeholder="" id="club_name" name="club_name"></th>
			<th width="40">社团所在地</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["club_location"]); ?>" placeholder="" id="club_location" name="club_location">
			</th>
			<th width="10"  rowspan="4">头像</th>
			<th width="40"  rowspan="4">
				<div class="row cl">
					<div class="formControls col-xs-8 col-sm-9"> 
						<span class="btn-upload form-group">
						<div class="am-form-group   am-form-file">  
							<div class="am-u-sm-2 am-u-end"> 
								<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px" value="<?php echo ($current["club_small_logo"]); ?>">
								<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
								<input id="doc-form-file" type="file" name="club_logos" onchange='PreviewImage(this)' multiple class="input-file"> 
							</div>
						</div>
						</span> 
					</div>
				</div>
			<div class="am-form-group">  
        		<div id="imgPreview" class="am-u-sm-4 am-u-sm-centered am-u-end">  
            		<img id="img1" src="/thinkphp_3.2.3_full/Public/uploads/logos/<?php echo ($current["club_logo"]); ?>" alt="" width="150" height="150"/><!-- 显示缩略图 -->  
        		</div>   
    		</div> 
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">现任会长学号</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["president_number"]); ?>" placeholder="" id="president_number" name="president_number">
			</th>
			<th width="40">社团成立日期</th>
			<th width="40">
				<input type="text" class="input-text" value="<?php echo ($current["create_date"]); ?>" placeholder="" id="create_date" name="create_date">
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">现任会长姓名</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["president_name"]); ?>" placeholder="" id="president_name" name="president_name">
			</th>
			<th width="40">指导老师</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["teacher_name"]); ?>" placeholder="" id="teacher_name" name="teacher_name">
			</th>
		</tr>
		<tr class="text-c" >
			<th width="40">现任会长电话</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["president_phone"]); ?>" placeholder="" id="president_phone" name="president_phone">
			</th>
			<th width="40">主管单位</th>
			<th width="40">
				<input type="text" class="input-text" value="<?php echo ($current["club_organization"]); ?>" placeholder="" id="club_organization" name="club_organization">
			</th>
		</tr>
		<tr class="text-c" >
			<th width="40">创始人姓名</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["create_name"]); ?>" placeholder="" id="create_name" name="create_name">
			</th>
			<th width="40">社团性质(类型)</th>
			<th width="40">
				<select class="select" size="1" name="club_nature">
					<option value="">---选择类型---</option>
					<?php if(is_array($clubtype)): $i = 0; $__LIST__ = $clubtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['type'] == $current['club_nature']): ?><option value="<?php echo ($vo["type"]); ?>" selected><?php echo ($vo["type"]); ?></option>
						<?php else: ?>
						<option value="<?php echo ($vo["type"]); ?>" ><?php echo ($vo["type"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</th>
			<th width="20"  rowspan="3">社团简介</th>
			<th width="40" rowspan="3">
			<textarea name="club_profile"  id="club_profile" cols="35" rows="8"><?php echo ($current["club_profile"]); ?></textarea>
			</th>
		</tr>
		<tr class="text-c" >
			<th width="40">社团总人数</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["count_people"]); ?>" placeholder="" id="count_people" name="count_people">
			</th>
			<th width="40">设置部门</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["club_departments"]); ?>" placeholder="" id="club_departments" name="club_departments">
			</th>
		</tr>
		<tr class="text-c" >
			<th width="40">社团邮箱</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["club_email"]); ?>" placeholder="" id="club_email" name="club_email">
			</th>
			<th width="40">社团届次</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["club_period"]); ?>" placeholder="" id="club_period" name="club_period">
			</th>
		</tr>
		<tr  class="text-c" align="center">
			<th colspan="6">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;确认修改&nbsp;&nbsp;">
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