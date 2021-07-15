<?php
namespace Home\Controller;
use Think\Controller;

class SystemController extends Controller{
	//列表
	public function system_list(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$systemlist = M('system')->select();
			$this->assign('systemlist',$systemlist);
			$count = M('system')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$systemlist = M('system')->select();
				$this->assign('systemlist',$systemlist);
				$count = M('system')->count();//记录总数
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);
				$tiaojian['system_club']=array('IN',$club_name);
				$systemlist = M('system')->where($tiaojian)->select();
				$this->assign('systemlist',$systemlist);
				$count = M('system')->where($tiaojian)->count();//记录总数
				$this->assign('count',$count);
			}
		}
		$this->display();
	}
	//添加制度
	public function system_add(){
		$systemadd = D('system');
		if (IS_POST){
			if($systemadd->create()){
				$data=I('post.');
	            $data['system_content']=$data['content'];
	            if (M('system')->add($data)){
					$this->success('发布制度成功',U('system_list'),3);
					exit();
				}else{
					$this->error('发布制度失败');
					exit();
				}
			}else{
				$this->error($systemadd->getError());
			}
		}
		$shenfen = session('shenfen');
		if ($shenfen=='系统管理员'){
			$role_id=1;
			$this->assign('role_id',$role_id);
		}else{
			$stu_id = session('stu_id');//当前学生用户在社团的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();
			//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
			$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club');
			$role_id=$relation['role_id'];
			$this->assign('role_id',$role_id);
			$this->assign('club_name',$club_name);
		}
		$this->display();
	}
	//查看制度的详细信息
	public function system_con($id){
		$current= M('system')->find($id);

		$aa=htmlspecialchars_decode($current['system_content']);
		$this->assign('current',$current);
		$this->assign('aa',$aa);
		$this->display();
	}
	//修改制度内容
	public function system_update($id){
		$systemadd =D('system');
		if (IS_POST){
			if($systemadd->create()){
				$data=I('post.');
				if(in_array("", $_POST)){//用来判断POST中获取到的是否存在没输入的
	                $this->error('存在没有输入的项！');
	            }
	            	$data['system_content']=$data['content'];
	            	$data['system_id']=$id;
	            if (M('system')->save($data)){
	            	$this->success('修改制度成功',U('system_list'),3);
	            	exit();
	            }else{
	            	$this->error('修改制度失败');
					exit();
	            }
	        }else{
	        	$this->error($systemadd->getError());
	        }
		}
		$current= M('system')->find($id);
		$this->assign('current',$current);

		$aa=htmlspecialchars_decode($current['system_content']);
		$this->assign('aa',$aa);
		$this->display();	
	}
	//制度删除
	public function  system_del($id){
		if (M('system')->delete($id)){
			$this->success('删除成功',U('system_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//制度批量删除
	public function pl_del(){
		$data=$_POST['systemarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('system')->delete($data_str)){
			$this->success('批量删除成功',U('system_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

	//我的社团制度---------------------------------------------------------------------(只能看到自己社团的)
	public function myclub_system(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$systemlist = M('system')->select();
			$this->assign('systemlist',$systemlist);
			$count = M('system')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$systemlist = M('system')->select();
				$this->assign('systemlist',$systemlist);
				$count = M('system')->count();//记录总数
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['system_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$systemlist = M('system')->where($tiaojian)->select();
				$this->assign('systemlist',$systemlist);
				$count=M('system')->where($tiaojian)->count();
				$this->assign('count',$count);
			}elseif ($role['role_id']==4){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['system_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$systemlist = M('system')->where($tiaojian)->select();
				$this->assign('systemlist',$systemlist);
				$count=M('system')->where($tiaojian)->count();
				$this->assign('count',$count);
			}
		}



		$this->display();
	}
}

?>