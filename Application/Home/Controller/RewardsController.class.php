<?php
namespace Home\Controller;
use Think\Controller;

class RewardsController extends Controller{
	public function rewards_list(){
		$rewardslist = M('rewards')->select();//在社团成员表里面查找他的社团，然后单独取出社团名字
		$this->assign('rewardslist',$rewardslist);
		$count =M('rewards')->count();
		$this->assign('count',$count);
		$this->display();
	}
	public function rewards_add(){
		$rewardsadd =D('rewards');
		if (IS_POST){
			if($rewardsadd->create()){
				$data=I('post.');
				$row = M('rewards')->where(array('club_name'=>$data['club_name'],'begin_time'=>$data['begin_time']))->count();
				if ($row>0){//判断社团是否重复添加
					$this->error('该社团已经存在评优记录，请不要重复提交。');
				}else{
		            //平时分总分
		            $data['normal_core']=$data['met_activity_core']+$data['finance_core']+$data['club_activity_core']+$data['regiment_core']+$data['organization_core'];
		            //综合所得分
		            $data['total_core']=$data['normal_core']+$data['vote_core']+$data['judges_core'];
					if (M('rewards')->add($data)){
					$this->success('评优成绩提交成功',U('rewards_list'),3);
						exit;
					}else{
						$this->error('评优成绩提交失败');
						exit();
					}
				}
			}else{
				$this->error($rewardsadd->getError());
			}
		}

		//查看所有的社团
		$club =M('club')->select();
		$this->assign('club',$club);
		$this->display();
	}

	//社团评优表修改
	public function rewards_update($id){
		$rewardsadd =D('rewards');
		if (IS_POST){
			if($rewardsadd->create()){
				$data=I('post.');
	            //平时分总分
	            $data['normal_core']=$data['met_activity_core']+$data['finance_core']+$data['club_activity_core']+$data['regiment_core']+$data['organization_core'];
	            //综合所得分
	            $data['total_core']=$data['normal_core']+$data['vote_core']+$data['judges_core'];
	            $data['rewards_id']=$id;
				if (M('rewards')->save($data)){
				$this->success('修改评优成绩成功',U('rewards_list'),3);
					exit;
				}else{
					$this->error('修改评优成绩失败');
					exit();
				}
			}else{
				$this->error($rewardsadd->getError());
			}
		}
		//储存类型
		$arrays =array ('0'=>array('rewards_type'=>'明星社团'),'1'=>array('rewards_type'=>'优秀社团'));
		$this->assign('arrays',$arrays);
		//当前内容
		$current = M('rewards')->find($id);
		$this->assign('current',$current);
		//查看所有的社团
		$club =M('club')->select();
		$this->assign('club',$club);
		$this->display();
	}

	//查看社团评优成绩的总信息
	public function rewards_message($id){
		$current = M('rewards')->find($id);//在社团成员表里面查找他的社团，然后单独取出社团名字
		$this->assign('current',$current);
		$this->display();
	}
	//评优删除
	public function rewards_del(){
		if (M('rewards')->delete($id)){
			$this->success('删除成功',U('rewards_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//评优批量删除
	public function pl_del(){
		$data=$_POST['rewardsarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('rewards')->delete($data_str)){
			$this->success('批量删除成功',U('rewards_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

}

?>