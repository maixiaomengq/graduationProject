<?php
namespace Home\Controller;
use Think\Controller;


class NewController extends Controller
{
	public function new_list(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$newlist = M('new')->select();
			$this->assign('newlist',$newlist);
			$count = M('new')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$newlist = M('new')->select();
				$this->assign('newlist',$newlist);
				$count = M('new')->count();//记录总数
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club');
				$tiaojian['new_club']=array('IN',$club_name);				
				$newlist = M('new')->where($tiaojian)->select();
				$this->assign('newlist',$newlist);
				$count = M('new')->where($tiaojian)->count();//记录总数
				$this->assign('count',$count);
			}
		}

		$this->display();
	}
	//添加新闻
	public function new_add(){
		$newadd=D('new');
		if (IS_POST){
			if($newadd->create()){
				$data=I('post.');
				// $row = M('new')->where(array('new_title'=>$data['new_title']))->count();
				// if ($row>0){//判断社团是否重复添加
				// 	$this->error('该新闻主题已存在，请不要重复发布');
				// }else{
				// if (preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$data['new_depart'])) {	
				
				// 	echo "是中文";
				// }else{
				// 	echo "不是中文";
				// }
				// exit;
					$time=NOW_TIME;//获取当前时间的int类型
					$data['new_time']=date("Y-m-d H:i:s",$time);// 格式化时间戳
					$data['new_con']=$data['content'];
					if ($newadd->add($data)){
					$this->success('新闻发布成功',U('new_list'),3);
						exit;
					}else{
						$this->error('新闻发布失败');
						exit();
					}
				// }
			}else{
				$this->error($newadd->getError());
			}
		}
		$shenfen=session('shenfen');
		$this->assign('shenfen',$shenfen);
		$stu_id = session('stu_id');//当前学生用户在社团的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();
		//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
		$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club');
		$role_id=$relation['role_id'];
		$this->assign('role_id',$role_id);
		$this->assign('club_name',$club_name);

		$this->display();
	}
	//修改时候
	public function new_editor($id){
		$newadd=D('new');
		if(IS_POST){
			if ($newadd->create()){
				$data=I('post.');
				$time=NOW_TIME;//获取当前时间的int类型
				$data['new_update']=date("Y-m-d H:i:s",$time);// 格式化时间戳
	            $data['new_con']=$data['content'];
	            $data['new_id']=$id;
	            if (M('new')->save($data)){
				$this->success('新闻修改成功',U('new_list'),3);
					exit;
				}else{
					$this->error('新闻修改失败');
					exit();
				}
			}else{
				$this->error($newadd->getError());
			}
		}

		$current =M('new')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//显示新闻的详细信息
	public function new_con($id){

		$current =M('new')->find($id);
		$aa=htmlspecialchars_decode($current['new_con']);
	

		$this->assign('current',$current);
		$this->assign('aa',$aa);
		
		$this->display();
	}
	//新闻删除
	public function  new_del($id){
		if (M('new')->delete($id)){
			$this->success('删除成功',U('new_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//新闻批量删除
	public function pl_del(){
		$data=$_POST['newarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('new')->delete($data_str)){
			$this->success('批量删除成功',U('new_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}
	//-------------------------------------------我的社团新闻
	public function new_myclub(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$myclubnew = M('new')->select();
			$this->assign('myclubnew',$myclubnew);
			$count = M('new')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['new_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclubnew = M('new')->where($tiaojian)->select();
				$this->assign('myclubnew',$myclubnew);
				$count=M('new')->where($tiaojian)->count();
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['new_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclubnew = M('new')->where($tiaojian)->select();
				$this->assign('myclubnew',$myclubnew);
				$count=M('new')->where($tiaojian)->count();
				$this->assign('count',$count);
			}elseif($role['role_id']==4){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['new_club'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclubnew = M('new')->where($tiaojian)->select();
				$this->assign('myclubnew',$myclubnew);
				$count=M('new')->where($tiaojian)->count();
				$this->assign('count',$count);
			}
		}

		$this->display();
	}
}

?>