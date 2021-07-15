<?php
namespace Home\Controller;
use Think\Controller;

class RetiredController extends Controller{
	public function retired_list(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$retiredlist =M('retired')->select();
			$this->assign('retiredlist',$retiredlist);
			$count = M('retired')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$retiredlist =M('retired')->select();
				$this->assign('retiredlist',$retiredlist);
				$count = M('retired')->count();//记录总数
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club');
				$tiaojian['member_club']=array('IN',$club_name);
				$retiredlist = M('retired')->where($tiaojian)->select();
				$this->assign('retiredlist',$retiredlist);
				$count = M('retired')->where($tiaojian)->count();//记录总数
				$this->assign('count',$count);
			}elseif($role['role_id']==4){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['member_club']=array('IN',$club_name);
				$retiredlist = M('retired')->where($tiaojian)->select();
				$this->assign('retiredlist',$retiredlist);
				$count = M('retired')->where($tiaojian)->count();//记录总数
				$this->assign('count',$count);
			}
		}

		$stu_id = session('stu_id');//当前学生用户的id
		$relations=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role_ids =$relations['role_id'];
		$this->assign('role_ids',$role_ids);
		$this->assign('shenfen',$shenfen);
		$this->display();
	}
	public function retired_con($id){
		$current = M('retired')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	public function retired_check($id){
		$current = M('retired')->find($id);
		$this->assign('current',$current);
		$this->display();	
	}
	//通过
	public function retired_pass($id){
		//修改退社表的状态
		$retiredarray['retired_id']=$id;
		$retiredarray['retired_time']=date("Y-m-d H:i:s",NOW_TIME);
		$retiredarray['remark']=1;
		M('retired')->save($retiredarray);
		//先查到当前的学生信息的学号和姓名和学生表里的id
		$stu_number = M('retired')->where(array('retired_id'=>$id))->getField('stu_number');
		$member_name = M('retired')->where(array('retired_id'=>$id))->getField('member_name');
		$club_name = M('retired')->where(array('retired_id'=>$id))->getField('member_club');
		//然后查出成员表里面对应的成员id
		$member_id=M('association_member')->where(array('stu_number'=>$stu_number,'member_name'=>$member_name,'member_club'=>$club_name))->getField('member_id');
		//开始删除成员
		$stu_id = M('student')->where(array('stu_number'=>$stu_number,'stu_name'=>$member_name))->getField('stu_id');
		//取得当前删除用户的角色id
		$role_id =M('relation')->where(array('relation_id'=>$stu_id))->getField('role_id');
		if (M('association_member')->delete($member_id)){//先删除，然后执行
		//当删除后的该用户在其他社团里的职位信息
		$club = M('association_member')->where(array('member_name'=>$member_name))->field('member_position,member_club')->select();
		//当前学生的关系表的信息	
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();
		//查询符合当前删除学生的学号和姓名的所在其他社团的记录
		$row =M('association_member')->where(array('stu_number'=>$stu_number,'member_name'=>$member_name))->count();
			if ($row==0){//如果他没有任何社团任职了，那就变成普通用户了。
				$role = array();
				$role['relation_id']=$relation['relation_id'];
				$role['role_id']=5;
				if (M('relation')->save($role)){
					$this->success('删除成功',U('retired_list'),3);					
				}else{
					$this->error('删除失败');					
				}
			}else{//如果在其他社团还有任职。就要遍历查询分社长和社员来删除
				//当前删除用户的所有社团信息
				$club = M('association_member')->where(array('member_name'=>$member_name))->field('member_position')->select();
				$data=array();//取到删除后他在其他社团里的职位
				for($i=0;$i<count($club);$i++){
					$data[$i]=$club[$i]['member_position'];
				}
				$club_name =array();//取到删除后他的其他社团的名称
				for($i=0;$i<count($club);$i++){
					$club_name[$i]=$club[$i]['member_club'];
				}
				//然后根据当前角色的关系来决定删除后的更改
				if ($role_id==2){//如果是社联社长,最高权是2时候----删除后还没更改权力
					//首先判断他还在社联社长吗？如果不在，那就看他在其他社团的任职来修改
					if(in_array("社团联合会",$club_name)){//还在社联
						//本身是社联最高指挥官，如果还有社联存在，那就还是
							$this->success('删除成功。',U('retired_list'),3);
					}else{//退出社联了，然后就根据看其他社团有无社长职位更改
						if(in_array("社长",$data)){//如果在其他社团有社长职位则从2变成3
							$update['relation_id']=$relation['relation_id'];
							$update['role_id']=3;
							if(M('relation')->save($update)){
								$this->success('删除成功。',U('retired_list'),3);
							}else{
								$this->error('删除失败');	
							}
						}else{//在其他社团没有社长的职位则就是社员，则从2变成4
							$update['relation_id']=$relation['relation_id'];
							$update['role_id']=4;
							if(M('relation')->save($update)){
								$this->success('删除成功。',U('retired_list'),3);
							}else{
								$this->error('删除失败');	
							}							
						}
					}
				}elseif ($role_id==3){//本身权力是3的时候----删除后还没更改权力
					if(in_array("社长",$data)){//如果在其他社团也是社长则不变。
							$this->success('删除成功。',U('retired_list'),3);
					}else{//如果没有，则从3变成4
						$update['relation_id']=$relation['relation_id'];
						$update['role_id']=4;
						if(M('relation')->save($update)){
							$this->success('删除成功。',U('retired_list'),3);
						}else{
							$this->error('删除失败');	
						}
					}
				}else{//不然就是4.社员，那就直接删除，不变。
					$this->success('删除成功',U('retired_list'),3);
				}																			
			}
		}else{
			$this->error('删除失败');
		}		
	}
	//未通过审核时候修改
	public function retired_not($id){
		$data=array();
		$data['retired_id']=$id;
		$data['remark']=2;
		if (M('retired')->save($data)){
			$this->success('未通过审核。',U('retired_list'),3);
		}else{
			$this->error('审核失败，请重新审核。');
		}
	}

	//删除申请信息
	public function  retired_del($id){
		if (M('retired')->delete($id)){
			$this->success('删除成功',U('retired_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//批量删除
	public function pl_del(){
		$data=$_POST['retiredarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('retired')->delete($data_str)){
			$this->success('批量删除成功',U('retired_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

}