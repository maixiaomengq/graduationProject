<?php
//在这个自创一个自定义工具类，比如发送邮件
namespace Components;//根目录就是Application
use Think\Controller;
class AdminController extends Controller{
	public function __construct(){
		parent::__construct();
		$shenfen=session('shenfen');
		if ($shenfen =="系统管理员"){
			//防止用户登录的翻墙
			$mg_id=session('mg_id');
			if (empty($mg_id)){

				echo '<script type="text/javascript">';
				echo 'window.top.location.href="/thinkphp_3.2.3_full/index.php/Index/index"';
				echo '</script>';
				exit();
			}
			// //防止翻墙访问
			// $controller = strtolower(CONTROLLER_NAME);//返回转换为小写的字符串。
			// $all_allow_controller_array = array('index','manager');
			// if (!in_array($controller,$all_allow_controller_array)){//判断第一个参数是否在第二个参数数组里面
			// 	$now_ac = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
			// 	$manager=M('manager')->find($mg_id);//当前的用户
			// 	$role=M('role')->find($manager['mg_role_id']);//当前用户对应的角色
			// 	$role_auth_ac= $role['role_auth_ac'];//当前角色允许访问的地址
			// 	if (stripos($role_auth_ac,$now_ac)===false){//查找要查的数据在这个数组里面第几位
			// 		echo '<meta charset=utf-8 />';
			// 		die('当前用户没有此权限');
			// 	}
			// }		
		}elseif($shenfen =="学生用户"){
			$stu_id=session('stu_id');
			if (empty($stu_id)){
				echo '<script type="text/javascript">';
				echo 'window.top.location.href="/thinkphp_3.2.3_full/index.php/Index/index"';
				echo '</script>';
				exit();
			}
			//防止翻墙访问
			$controller = strtolower(CONTROLLER_NAME);//返回转换为小写的字符串。
			$all_allow_controller_array = array('index','manager');
			if (!in_array($controller,$all_allow_controller_array)){//判断第一个参数是否在第二个参数数组里面
				$now_ac = strtolower(CONTROLLER_NAME.'-'.ACTION_NAME);
				$manager=M('relation')->find($stu_id);//当前的用户
				$role=M('role')->find($manager['role_id']);//当前用户对应的角色
				$role_auth_ac= $role['role_auth_ac'];//当前角色允许访问的地址
				if (stripos($role_auth_ac,$now_ac)===false){//查找要查的数据在这个数组里面第几位
					echo '<meta charset=utf-8 />';
					die('当前用户没有此权限');
				}
			}
		}else{
			echo '<script type="text/javascript">';
				echo 'window.top.location.href="/thinkphp_3.2.3_full/index.php/Index/index"';
				echo '</script>';
				exit();
		}
	}
}

?>