<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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

<title>申请加入 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 加入社团申请 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<article class="page-container">
	<form action="/Home/Clubmember/apply_club" method="post"  enctype="multipart/form-data" >
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<tr class="text-c">
			<th width="40">学号</th>
			<th width="40">
				<?php if($shenfen == '系统管理员'): ?><input type="text" class="input-text" value="" placeholder="" id="stu_number" name="stu_number">
					<?php else: ?>
					<input type="text" class="input-text" value="<?php echo ($stu_number); ?>" placeholder="" id="stu_number" name="stu_number"  readonly><?php endif; ?>
			</th>
			<th width="40">院系专业</th>
			<th width="40">
			<select id="jia" onchange="ChangeExampleSelect(this.selectedIndex)" class="select" size="1" name="member_yuanxi">
				</select>
			<select class="select" size="1" name="member_major" id="example">
				</select>
			</th>
			<th width="10"  rowspan="3">头像</th>
			<th width="40"  rowspan="3">
				 <div class="row cl">
					<div class="formControls col-xs-8 col-sm-9"> 
						<span class="btn-upload form-group">
						<div class="am-form-group   am-form-file">  
							<div class="am-u-sm-2 am-u-end"> 
								<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
								<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
								<input id="doc-form-file" type="file" name="member_logos" onchange='PreviewImage(this)' multiple class="input-file"> 
							</div>
						</div>
						</span> 
					</div>
				</div>
			<div class="am-form-group">  
        		<div id="imgPreview" class="am-u-sm-4 am-u-sm-centered am-u-end">  
            		<img id="img1" src="" alt="" width="150" height="150"/><!-- 显示缩略图 -->  
        		</div>   
    		</div> 
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">姓名</th>
			<th width="40">
				<?php if($shenfen == '系统管理员'): ?><input type="text" class="input-text" value="" placeholder="" id="member_name" name="member_name">
					<?php else: ?>
					<input type="text" class="input-text" value="<?php echo ($stu_name); ?>" placeholder="" id="member_name" name="member_name" readonly><?php endif; ?>
			</th>
			<th width="40">所在班级</th>
			<th width="40">
				<input type="text" class="input-text" value="" placeholder="" id="member_class" name="member_class">
			</th>
		</tr>
		<tr class="text-c">
			<th width="40">成员性别</th>
			<th width="40">
				<input type="radio" id="sex-1" name="member_sex" value="男"><label for="sex-1">男</label>     &nbsp;&nbsp;&nbsp;
				<input type="radio" id="sex-2" name="member_sex" value="女"><label for="sex-2">女</label>
			</th>
			<th width="40">加入的社团</th>
			<th width="40">
				<select class="select" size="1" name="member_club">
					<option value="" selected>---请选择社团---</option>
					<?php if(is_array($clublsit)): $i = 0; $__LIST__ = $clublsit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$clublsit): $mod = ($i % 2 );++$i;?><option value="<?php echo ($clublsit["club_name"]); ?>"><?php echo ($clublsit["club_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</th>

		</tr>
		<tr class="text-c" >
			<th width="40">联系方式</th>
			<th width="40">
				<input type="text" class="input-text" value="" placeholder="" id="member_phone" name="member_phone">
			</th>
			<th width="40">加入的部门</th>
			<th width="40">
			<select class="select" size="1" name="member_depart">
					<option value="" selected>---请选择部门---</option>
					<option value="办公室">办公室</option>
					<option value="纪检部">纪检部</option>
					<option value="学习部">学习部</option>
					<option value="新闻部">新闻部</option>
					<option value="宣传部">宣传部</option>									
					<option value="心理部">心理部</option>	
					<option value="网络部">网络部</option>
					<option value="文艺部">文艺部</option>	
					<option value="体育部">体育部</option>
					<option value="财务部">财务部</option>
					<option value="组织部">组织部</option>	
				</select>
			</th>
			<th width="40" rowspan="2" >加入理由</th>
			<th width="40" rowspan="2">
			<textarea name="apply_reason" id="apply_reason" rows="5" cols="30">
			</textarea>
			</th>
		</tr>

		<tr class="text-c" >
			<th width="40">邮箱</th>
			<th width="40">
			<input type="text" class="input-text" value="" placeholder="" id="member_email" name="member_email">
			</th>
			<th width="40">政治面貌</th>
			<th width="40">
			<select class="select" size="1" name="member_politics">
			<option value="" selected>---政治面貌---</option>
			<?php if(is_array($politicslist)): $i = 0; $__LIST__ = $politicslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$politics): $mod = ($i % 2 );++$i;?><option value="<?php echo ($politics["politics_name"]); ?>"><?php echo ($politics["politics_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</th>
		</tr>
		<tr  class="text-c" align="center">
			<th colspan="6">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;申请加入&nbsp;&nbsp;">
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