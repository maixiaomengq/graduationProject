<?php
namespace Home\Controller;
use Think\Controller;
class RoleController extends \Components\AdminController{
	public function rolelist(){
		$rolelist = M('role')->select();
		$this->assign('rolelist',$rolelist);
		$count = M('role')->count();
		$this->assign('count',$count);
		$this->display();
	}

	//分配权限的方法
	public function distribute($role_id){
		$role = new \Home\Model\RoleModel();
		if(IS_POST){
			$model = new \Home\Model\RoleModel();
			//$_POST[auth];//获取表单页面的check的数组
			if($model->updateRole($_POST['auth'],$role_id)){	
			//传递两个参数来调用Role模型的updateROle方法
				$this->success('修改成功',U('rolelist'),3);
				exit();
			}else{
				$this->error('修改失败');
				exit();
			}
		}
		$role_info = $role->find($role_id);//角色信息
		$role_name=$role_info['role_name'];
		$this->assign('role_name',$role_name);
		$role_auth_ids = $role_info['role_auth_ids'];  //获取该角色具有的权限集合
		$role_auth_ids_array = explode(',', $role_auth_ids);//把权限字符串切割成数组
		//in_array(第一个参数是定义的值，第二个参数是一个数组) 函数判断哪个数在这个数组里面。
		$this->assign('role_auth_ids_array',$role_auth_ids_array);

		$info1=M('auth')->where("auth_level=0 ")->select();
		$info2=M('auth')->where("auth_level=1 ")->select();
		$this->assign('info1',$info1);
		$this->assign('info2',$info2);

		$this->display();
	}
	//添加设定角色
	public function role_add(){
		if (IS_POST){
			$data=I('post.');
			if (M('role')->add($data)){
				$this->success('添加设定角色成功',U('rolelist'),3);
			}else{
				$this->error('添加失败。');
			}
		}
		$this->display();
	}

	//删除设定角色
	public function role_del($id){
		if (M('role')->delete($id)){
			$this->success('删除设定角色成功',U('rolelist'),3);
		}else{
			$this->error('删除失败');
		}
	}

}


?>