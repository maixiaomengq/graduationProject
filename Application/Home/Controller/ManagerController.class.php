<?php
namespace Home\Controller;


class ManagerController extends \Components\AdminController{
	
	public function index(){
		$shenfen = session('shenfen');
		$this->assign('shenfen',$shenfen);
		//这是选择身份为系统管理员时候的权限
		if($shenfen == "系统管理员"){
			$manager=M('manager')->find(session('mg_id'));//获取当前登录的用户信息
			$role=M('role')->find($manager['mg_role_id']);//通过当前用户的角色id获取角色的信息
			$auth_ids = $role['role_auth_ids'];//获取当前用户的角色的权限集合
			if ($manager['mg_role_id']==1){
				$info1=M('auth')->where("auth_level=0 ")->select();
				$info2=M('auth')->where("auth_level=1 ")->select();
			}else{
				$info1=M('auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
				$info2=M('auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
			}
			$this->assign('info1',$info1);
			$this->assign('info2',$info2);
		}
		//这是选择身份为学生用户时候根据角色职位显示不同的权限
		elseif($shenfen == "学生用户"){
			$student=M('student')->find(session('stu_id'));//获取当前登录的用户信息		
			$relation=M('relation')->where(array('stu_id'=> $student['stu_id']))->find();//通过当前用户的id获取角色的关系
			if ($relation){
				$role=M('role')->find($relation['role_id']);//通过角色的关系表的角色id
				$auth_ids = $role['role_auth_ids'];//获取当前用户的角色的权限集合
				if ($role['role_id']==1){
					$info1=M('auth')->where("auth_level=0 ")->select();
					$info2=M('auth')->where("auth_level=1 ")->select();
				}else{
					$info1=M('auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();
					$info2=M('auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();
				}
				$this->assign('info1',$info1);
				$this->assign('info2',$info2);
				$stu_number = session('stu_number');//当前学生用户的学号
				$stu_logo = M('student')->where(array('stu_number'=>$stu_number))->getField('stu_logo');//通过学号查询学生的信息
				$this->assign('stu_logo',$stu_logo);
			}else{
				$this->error('后台查询不到当前学生的用户信息，请联系管理员解决。');
			}
		}

		if ($shenfen == '系统管理员') {
			$name = session('name');
			$this->assign('name', $name);
		}elseif ($shenfen =='学生用户'){
			$name = session('name');
			$this->assign('name', $name);
			$stu_id =session('stu_id');
			$role_id =M('relation')->where(array('stu_id'=>$stu_id))->getField('role_id');
			$this->assign('role_id',$role_id);
			$stu_number = M('student')->where(array('stu_id'=>$stu_id))->getField('stu_number');
			//所在的社团
			$myclub =M('association_member')->where(array('member_name'=>$name,'member_number'=>$stu_number,'member_status'=>1))->getField('member_club,member_depart,member_position',true);
			$this->assign('myclub',$myclub);
		}
		$time =  date('Y年m月d日 ',time());
		$this->assign('time',$time);
		$this->display();
	}
	
	public function welcome(){
		$Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
		$area = $Ip->getlocation(); // 获取某个IP地址所在的位置
		$this->display();
	}

	public function my_con(){

	}

	public function logout(){
		$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),'',time()-1,'/');
		}
		$row=session_destroy();
		if ($row){
			$this->success('已退出当前用户',U('Index/index'),3);
		}else{
			$this->error('退出失败');
		}

	}
}

?>