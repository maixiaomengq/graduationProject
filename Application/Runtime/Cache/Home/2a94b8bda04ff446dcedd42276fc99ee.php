<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<link rel="shortcut icon" href="/Public/image/favico.ico"/>
<link rel="bookmark" href="/Public/image/favico.ico"/>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<title>登录界面</title>
</head>
<link href="/Public/Login/css/style.css" rel="stylesheet" type="text/css" />
</script><script type="text/javascript">
function changeAuthCode() {
	var num = 	new Date().getTime();
	var rand = Math.round(Math.random() * 10000);
	num = num + rand;
	$('#ver_code').css('visibility','visible');
	if ($("#vdimgck")[0]) {
		$("#vdimgck")[0].src = "../include/vdimgck.php?tag=" + num;
	}
	return false;	
}
</script>
<script type="text/javascript">
function changeAuthCode() {
	var num = 	new Date().getTime();
	var rand = Math.round(Math.random() * 10000);
	num = num + rand;
	$('#ver_code').css('visibility','visible');
	if ($("#vdimgck")[0]) {
		$("#vdimgck")[0].src = "../include/vdimgck.php?tag=" + num;
	}
	return false;	
}
	var mycode=document.getElementById("code");
</script>


</head>
<body>
<div id="container" align="center">
  <div id="header">
    <h1></h1>
    <ul class="nav">
    </ul>
  </div>
  <div id="content">
    <div class="left_main">
      <h2>渠道信息</h2>
      <ul class="news" id="qdkb_html" style="color:#FFFFFF;">
        大学生社团管理系统,为您提供便捷渠道，更好的自动化管理社团。
      </ul>
      <div class="help_center">
        <h3><a href="http://www.moke8.com/" target="_blank">技术联系</a></h3>
        <p><strong>联系QQ：317389036&nbsp;&nbsp;&nbsp;联系电话：13132981203</strong></p>
      </div>
      <div class="bbs">
        <h3><a href="http://www.moke8.com/dedecms/" target="_blank">版权工作者</a></h3>
        <p><strong>天缘技术有限公司</strong></p>
      </div>
    </div>
<!--      action="/Home/Index/index" -->
    <form name="form1" method="post" id="aa">
      <input type="hidden" name="gotopage" value="<?php if(!empty($gotopage)) echo $gotopage;?>" />
      <input type="hidden" name="dopost" value="login" />
      <input name='adminstyle' type='hidden' value='newdedecms' />
      <fieldset class="right_main">
      <legend>用户登录</legend>     
      <dl class="setting">
        <dt>
          <label>用户名</label>
        </dt>
        <dd><span class="text_input"><input type="text" name="user" id="username"/></span></dd>
        <dt>
          <label>密　码</label>
        </dt>
        <dd><span class="text_input"><input type="password" name="pw" id="userpass" /></span></dd>
        <dt>
          <label>用户身份</label>
        </dt>
          <dd><font size="2">
          <input type="radio" id="shenfen1" name="shenfen" value="系统管理员">系统管理员
          <input type="radio" id="shenfen2" name="shenfen" value="学生用户" checked >学生用户
          </font></dd>
        <dt>
          <label>验证码</label>
        </dt>
        <dd><span class="short_input"><input  id="code" type="text" style="text-transform: uppercase;" name="yzm"/></span>
          <span class="yzm">
                    <img src="<?php echo U('Index/verifyImg');?>" alt="" onclick=" this.src='/Home/Index/verifyImg/'+ Math.random();">
                    </span>
          </dd>

        <dd>
          <a href= <?php echo U('Front/Index/index');?> ><font size="4">社团官网</font></a>
          <button name="sm1" onclick="xgpw();"  class="login_btn_hover" value="" />
        </dd>
      </dl>
      </fieldset>
    </form>
  </div>
  <div id="footer"></div>
</div>

<script>
function code(){
    document.getElementByIdx_x('code').src = 'code.php?'+Math.random()*10000;
}
</script>
  <script>

$(document).ready(function(){
  $("button").click(function(){
    $("body").fadeOut();
    $("body").fadeOut("slow");
    $("body").fadeOut(5000);
  });
});
       function xgpw(){
          $.ajax({
        type:"post",
        url:"<?php echo U('Manager/index');?>",
        dataType:'JSON',
        data:$('#aa').serialize(),
        
      });
        }
      </script>
</body>
</html>