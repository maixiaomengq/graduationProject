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
<script type="text/javascript" src="/Public/js/faculty.js"></script> 
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

	<form action="/Home/Associationmember/members_update/id/45" method="post"  enctype="multipart/form-data" >
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<tr class="text-c">
			<th width="40">学号</th>
			<th width="40"><input type="text" class="input-text" value="<?php echo ($current["stu_number"]); ?>" placeholder="" id="stu_number" name="stu_number"></th>

			<th width="40">院系专业</th>
			<th width="40">
			<select class="select" size="1" name="member_yuanxi" id="jia" onchange="ChangeExampleSelect(this.selectedIndex)">
 					<option value="0" selected>---请选择院系---</option>
					<?php if(is_array($facultylist)): $i = 0; $__LIST__ = $facultylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$faculty): $mod = ($i % 2 );++$i; if($faculty['faculty_name'] == $current['member_yuanxi']): ?><option value="<?php echo ($faculty["faculty_name"]); ?>" selected="selected" ><?php echo ($faculty["faculty_name"]); ?>
						</option>
					<?php else: ?>
						<option value="<?php echo ($faculty["faculty_name"]); ?>" ><?php echo ($faculty["faculty_name"]); ?>
						</option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			<select class="select" size="1" name="member_major" id="example">
				
				</select>
			</th>
			<th width="10"  rowspan="5">头像</th>
			<th width="40"  rowspan="5">
				 <div class="row cl">
					<div class="formControls col-xs-8 col-sm-9"> 
						<span class="btn-upload form-group">
						<div class="am-form-group   am-form-file">  
							<div class="am-u-sm-2 am-u-end"> 
								<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px" value="<?php echo ($current["member_logo"]); ?>">
								<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
								<input id="doc-form-file" type="file" name="member_logos" onchange='PreviewImage(this)' multiple class="input-file"> 
							</div>
						</div>
						</span> 
					</div>
				</div>
				<div class="am-form-group">  
        		<div id="imgPreview" class="am-u-sm-4 am-u-sm-centered am-u-end">  
            		<img id="img1" src="/Public/uploads/member/<?php echo ($current["member_logo"]); ?>" alt="" width="150" height="150"/><!-- 显示缩略图 -->  
        		</div>   
    		</div> 
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">姓名</th>
			<th width="40"><input type="text" class="input-text" value="<?php echo ($current["member_name"]); ?>" placeholder="" id="member_name" name="member_name"></th>
			<th width="40">所在班级</th>
			<th width="40">
				<input type="text" class="input-text" value="<?php echo ($current["member_class"]); ?>" placeholder="" id="member_class" name="member_class">
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">成员性别</th>
			<th width="40">
			<?php if( $current['member_sex'] == '男' ): ?><input type="radio" id="sex-1" name="member_sex" value="男" checked="checked"><label for="sex-1">男</label>
			<?php else: ?>
				<input type="radio" id="sex-1" name="member_sex" value="男" ><label for="sex-1">男</label><?php endif; ?>
			 &nbsp;&nbsp;&nbsp;
			<?php if( $current['member_sex'] == '女' ): ?><input type="radio" id="sex-2" name="member_sex" value="女" checked="checked"><label for="sex-2">女</label>
			<?php else: ?>
				<input type="radio" id="sex-2" name="member_sex" value="女"><label for="sex-2">女</label><?php endif; ?>
			</th>
			<th width="40">部门和职位</th>
			<th width="40">
			<select class="select" size="1" name="member_depart">
					<option value="" selected>---请选择部门---</option>
					<?php if(is_array($departlist)): $i = 0; $__LIST__ = $departlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$depart): $mod = ($i % 2 );++$i; if($depart['depart'] == $current['member_depart']): ?><option value="<?php echo ($depart["depart"]); ?>" selected="selected" ><?php echo ($depart["depart"]); ?>
						</option>
					<?php else: ?>
						<option value="<?php echo ($depart["depart"]); ?>" ><?php echo ($depart["depart"]); ?>
						</option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			<select class="select" size="1" name="member_position">
					<option value="" selected>---请选择职位---</option>
					<?php if(is_array($positionlist)): $i = 0; $__LIST__ = $positionlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$position): $mod = ($i % 2 );++$i; if($position['position'] == $current['member_position']): ?><option value="<?php echo ($position["position"]); ?>" selected="selected" ><?php echo ($position["position"]); ?>
						</option>
					<?php else: ?>
						<option value="<?php echo ($position["position"]); ?>" ><?php echo ($position["position"]); ?>
						</option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</th>
		</tr>
		<tr class="text-c" >
			<th width="40">联系方式</th>
			<th width="40">
				<input type="text" class="input-text" value="<?php echo ($current["member_phone"]); ?>" placeholder="" id="member_phone" name="member_phone">
			</th>
			<th width="40">政治面貌</th>
			<th width="40">
			<select class="select" size="1" name="member_politics">
			<option value="" selected>---政治面貌---</option>
			<?php if(is_array($politicslist)): $i = 0; $__LIST__ = $politicslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$politics): $mod = ($i % 2 );++$i; if( $politics['politics_name'] == $current['member_politics']): ?><option value="<?php echo ($politics["politics_name"]); ?>" selected="selected"><?php echo ($politics["politics_name"]); ?></option>
				<?php else: ?>
					<option value="<?php echo ($politics["politics_name"]); ?>"><?php echo ($politics["politics_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</th>
		</tr>

		<tr class="text-c" >
			<th width="40">邮箱</th>
			<th width="40">
			<input type="text" class="input-text" value="<?php echo ($current["member_email"]); ?>" placeholder="" id="member_email" name="member_email">
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