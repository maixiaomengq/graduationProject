<?php
namespace Home\Controller;
use Think\Controller;

class ClubactivityController extends Controller{
	//活动汇总:显示所有状态的活动----------------------社联管理员的权限
	public function club_activitylist(){
		$activitylist = M('activity')->select();
		$this->assign('activitylist',$activitylist);
		$this->display();
	}
	//活动的申请。---------------------------------------所有社团干部都有的权利
	public function club_activityapply(){
		$activityadd = D('activity');
		if(IS_POST){
			if ($activityadd->create()){
				$data=I('post.');
				$data['activity_status']=0;
				if($_FILES['urls']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'exts'		   =>array('doc','wps','xls','ppt','txt','rar','docx'),
						'rootPath' =>  './Public/Uploads/activity/'
					);//文件上传后的保存路径

					$upload= new \Think\Upload($config);//实例化上传文件类对象
					$info = $upload->uploadOne($_FILES['urls']);//取到上传后的文件的信息
					$data['file_name']=$info['name'];//获取上传的文件名称，设置文件名称和数据库的一样
					$data['url']=$info['savepath'].$info['savename'];//要设置添加的字段和数据库的一样
					$time=NOW_TIME;//获取当前时间的int类型
					$data['create_time']=date("Y-m-d H:i:s",$time);// 格式化时间戳
					
					if (!$info){//如果上传有误：则返回错误信息
                    	 $this->error($upload->getError());
                	}else{
                		// 上传成功就添加到数据库
						if (M('activity')->add($data)){
							$this->success('已确认申请，请等候审核。',U('myclub_activity'),3);
							exit;
						}else{
							$this->error('申请失败，信息有误，请重新申请。');
							exit();
						}
                	}
				}else{//如果没有收到添加信息则，返回信息
					$this->error('您还没有上传附件');
				}
			}else{
				$this->error($activityadd->getError());				
			}
		}
		$shenfen=session('shenfen');
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
	//查看活动详细信息
	public function activity_message($id){
		$current = M('activity')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//活动审核列表，来进行活动的审批。-----------------------------------------------社联管理员的权限
	public function club_activitycheck(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$activitycheck = M('activity')->select();
			$this->assign('activitycheck',$activitycheck);
			$count = M('activity')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$activitycheck = M('activity')->select();
				$this->assign('activitycheck',$activitycheck);
				$count = M('activity')->count();
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己是社长的社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);
				$tiaojian['activity_club']=array('IN',$club_name);
				$activitycheck = M('activity')->where($tiaojian)->select();
				$this->assign('activitycheck',$activitycheck);
				$count = M('activity')->where($tiaojian)->count();
				$this->assign('count',$count);
			}
		}


		// $activitycheck = M('activity')->where("activity_status=0")->select();
		// $this->assign('activitycheck',$activitycheck);
		$this->display();
	}
	//活动审核表格-----------------------------------------------社联管理员的权限
	public function activity_check($id){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){
			$current = M('activity')->find($id);
			$this->assign('current',$current);
			$this->display();
		}else{
			$this->error('您没有这个权限。');
		}
	}
	//通过审核时候修改-----------------------------------------------社联管理员的权限
	public function activity_pass($id){
		$data=array();
		$data['activity_id']=$id;
		$data['activity_status']=1;
		if (M('activity')->save($data)){
			$this->success('通过审核。',U('club_activitycheck'),3);
		}else{
			$this->error('审核失败，请重新审核。');
		}
	}
	//未通过审核时候修改-----------------------------------------------社联管理员的权限
	public function activity_notpass($id){
		$data=array();
		$data['activity_id']=$id;
		$data['activity_status']=2;
		if (M('activity')->save($data)){
			$this->success('未通过审核。',U('club_activitycheck'),3);
		}else{
			$this->error('审核失败，请重新审核。');
		}
	}
	//查看活动详细信息
	public function activity_con($id){
		$current = M('activity')->find($id);
		$this->assign('current',$current);
		$this->display();
	}

	//文件下载功能
    public function getdown(){
        $id=I('get.id');
        $file_url=M('activity')->where(array('activity_id'=>$id))->getField('url');//找出地址
 		//地址规范化
        $root=getcwd();  //E:\phpStudy\phpStudy\phpStudy\WWW\association\tp
        $root=str_replace('\\','/',$root);//E:/phpStudy/phpStudy/phpStudy/WWW/association/tp
        $file=$root."/Public/Uploads/activity/".$file_url;//找到文件保存的路径
     
        // $file="E:/phpStudy/phpStudy/phpStudy/WWW/association/tp/Public/Uploads/activity/585952550c9be.doc";
        download($file);
    }

    //删除活动
	public function  activity_del($id){
		if (M('activity')->delete($id)){
			$this->success('删除成功',U('club_activitylist'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//活动批量删除
		public function pl_del(){

		$data=$_POST['activityarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('activity')->delete($data_str)){
			$this->success('批量删除成功',U('club_activitylist'),3);
		}else{
			$this->error('批量删除失败');
		}
	}
	//查看我的社团活动--------------------------例子
	public function myclub_activity(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$myclub_activity = M('activity')->select();
			$this->assign('myclub_activity',$myclub_activity);
			$count = M('activity')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['activity_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclub_activity = M('activity')->where($tiaojian)->where(array('activity_status'=>1))->select();
				$this->assign('myclub_activity',$myclub_activity);
				$count=M('activity')->where($tiaojian)->where(array('activity_status'=>1))->count();
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['activity_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclub_activity = M('activity')->where($tiaojian)->where(array('activity_status'=>1))->select();
				$this->assign('myclub_activity',$myclub_activity);
				$count=M('activity')->where($tiaojian)->where(array('activity_status'=>1))->count();
				$this->assign('count',$count);
			}elseif($role['role_id']==4){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['activity_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclub_activity = M('activity')->where($tiaojian)->where(array('activity_status'=>1))->select();
				$this->assign('myclub_activity',$myclub_activity);
				$count=M('activity')->where($tiaojian)->where(array('activity_status'=>1))->count();
				$this->assign('count',$count);
			}
		}
		$this->display();
	}
}

?>