<?php
use Org\Util;

function show(){
	echo 'hello,hello';
}


function getTestData(){
	$data=array();
	for($i=0;$i<10;$i++){
		$data[$i]['name']='user-'.$i;
		$data[$i]['age']=rand(18,90);
	}
	return $data;
}

/**
 * 邮件发送函数
 */

/**
 * 邮件发送函数
 */

// function sendMail($to, $title, $content) { 
//             //vendor('PHPMailer.class#PHPMailer');
//             Vendor('PHPMailer.PHPMailerAutoload');     
//             $mail = new PHPMailer(); //实例化
//             $mail->IsSMTP(); // 启用SMTP
//             $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
//             $mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
//             $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
//             $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
//             $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
//             $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
//             $mail->Port =465;
//             $mail->AddAddress($to,"尊敬的客户");
//             $mail->WordWrap = 50; //设置每行字符长度
//             $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
//             $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
//             $mail->Subject =$title; //邮件主题
//             $mail->Body = $content; //邮件内容
//             $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
//              if(!$mail->Send()) {
//             echo "Message could not be sent. <p>";
//             echo "Mailer Error: " . $mail->ErrorInfo;

//             exit();
//             } else {
//             echo "Message has been sent";
//             }
//         } 
        
// function sendMail2($to, $title, $content) {
//
//             $mail = new Util\PHPMailer();
//             $mail->IsSMTP(); // 启用SMTP
//             $mail->Host='smtp.qq.com'; //smtp服务器的名称（这里以QQ邮箱为例）
//             $mail->SMTPAuth = true; //启用smtp认证
//             $mail->Username =  '595736620@qq.com';//你的邮箱名
//             $mail->Password = 'hcvhzxmvlgclbdhf'; //邮箱密码
//             $mail->From = '595736620@qq.com'; //发件人地址（也就是你的邮箱地址）
//             $mail->FromName = '胡小军'; //发件人姓名
//             $mail->Port = 587;
//             $mail->AddAddress($to,"尊敬的客户");
//             $mail->WordWrap = 50; //设置每行字符长度
//             $mail->IsHTML(true); // 是否HTML格式邮件
//             $mail->CharSet='UTF-8'; //设置邮件编码
//             $mail->Subject =$title; //邮件主题
//             $mail->Body = $content; //邮件内容
//             $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
//              if(!$mail->Send()) {
//             echo "Message could not be sent. <p>";
//             echo "Mailer Error: " . $mail->ErrorInfo;
//
//             exit();
//             } else {
//             echo "Message has been sent";
//             }
//         }
function sendMail2($to, $title, $content) {
                $mail = new Util\PHPMailer();
            $mail->IsSMTP(); // 启用SMTP
            $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
            $mail->SMTPAuth = true; //启用smtp认证
            $mail->Username =  C('MAIL_USERNAME');;//你的邮箱名
            $mail->Password = C('MAIL_PASSWORD'); //邮箱密码
            $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
            $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
            $mail->Port = 587;
            $mail->AddAddress($to,"同学您好");
            $mail->WordWrap = 50; //设置每行字符长度
            $mail->IsHTML(true); // 是否HTML格式邮件
            $mail->CharSet='UTF-8'; //设置邮件编码
            $mail->Subject =$title; //邮件主题
            $mail->Body = $content; //邮件内容
            $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
             if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;

            exit();
            } else {

            }
        }
function sendMail_pl($email, $title, $content) {
    $mail = new Util\PHPMailer();
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = true; //启用smtp认证
    $mail->Username =  C('MAIL_USERNAME');;//你的邮箱名
    $mail->Password = C('MAIL_PASSWORD'); //邮箱密码
    $mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
    $mail->Port = 587;
//    $mail->AddAddress($to,"尊敬的客户");
    if (is_array($email)){
        foreach($email as $emails){
            $mail->AddAddress($emails,"同学您好");
        }
    }else{
        $mail->AddAddress($email,"同学您好");
    }
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(true); // 是否HTML格式邮件
    $mail->CharSet='UTF-8'; //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;

        exit();
    } else {

    }
}
//公共函数
//获取文件修改时间
function getfiletime($file, $DataDir) {
    $a = filemtime($DataDir . $file);
    $time = date("Y-m-d H:i:s", $a);
    return $time;
}

//获取文件的大小
function getfilesize($file, $DataDir) {
    $perms = stat($DataDir . $file);
    $size = $perms['size'];
    // 单位自动转换函数
    $kb = 1024;         // Kilobyte
    $mb = 1024 * $kb;   // Megabyte
    $gb = 1024 * $mb;   // Gigabyte
    $tb = 1024 * $gb;   // Terabyte

    if ($size < $kb) {
        return $size . " B";
    } else if ($size < $mb) {
        return round($size / $kb, 2) . " KB";
    } else if ($size < $gb) {
        return round($size / $mb, 2) . " MB";
    } else if ($size < $tb) {
        return round($size / $gb, 2) . " GB";
    } else {
        return round($size / $tb, 2) . " TB";
    }
}

?>