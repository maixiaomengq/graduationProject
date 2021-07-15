<?php
namespace Home\Controller;
use Think\Controller;

class DepartmentController extends Controller{
	public function depart_list(){

		$now = M('club')->where("club_name = '社团联合会'")->find();
		$club_departments= $now['club_departments'];//取到社联的部门：是一个字符串，需要分隔成数组
		$club_departments_array = explode(',', $club_departments);//把部门字符串切割成数组
		
		$this->assign('club_departments_array',$club_departments_array);
		$this->display();
	}
	public function depart_members($name){
		$memberlist = M('association_member')->where("member_depart = '$name'")->select();
		$this->assign('memberlist',$memberlist);
		$this->display();
	}
	public function members_update($id){
		if (IS_POST){
			if ($data=M('association_member')->create()){
				$data['member_id']=$id;
				//上传文件
				if($_FILES['member_logos']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'rootPath' =>  './Public/Uploads/member/'
					);//文件上传后的保存路径
					$upload= new \Think\Upload($config);//实例化上传文件类对象
					$info = $upload->uploadOne($_FILES['member_logos']);//取到上传后的文件的信息
					//要设置添加的字段和数据库的一样
					$data['member_logo']=$info['savepath'].$info['savename'];
					if (M('association_member')->save($data)){
						$this->success('修改成功',U('depart_list'),3);
						exit;
					}else{
						$this->error('修改失败');
						exit;
					}
				}else{
					if (M('association_member')->save($data)){
						$this->success('修改成功',U('depart_list'),3);
						exit;
					}else{
						$this->error('修改失败');
						exit;
					}
				}
			}
		}
		//取到二级学院的院系名称
		$facultylist =M('faculty')->select();
		$this->assign('facultylist',$facultylist);
		//获取政治面貌的名称
		$politicslist =M('politics')->select();
		$this->assign('politicslist',$politicslist);

		//显示内容在修改页面
		$current = M('association_member')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//删除成员
	public function  members_del($id){
		if (M('association_member')->delete($id)){
			$this->success('删除成功',U('depart_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
		//批量删除
	public function pl_del(){

		$data=$_POST['memeberarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('association_member')->delete($data_str)){
			$this->success('批量删除成功',U('depart_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

}
?>