<?php
namespace Home\Controller;
use Think\Controller;

class GoodsController extends Controller{
	//物品汇总
	public function goods_list(){
		$count = M('goods')->count();
		$this->assign('count',$count);
		$goodslist = M('goods')->select();
		$this->assign('goodslist',$goodslist);
		$this->display();
	}
	//添加物品
	public function goods_add(){
		$goodsadd = D('goods');
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){
			if (IS_POST){
				if($goodsadd->create()){
					$data=I('post.');
					$row = M('goods')->where(array('goods_name'=>$data['goods_name']))->count();
					if ($row>0){
	        	        $this->error('该物品已存在，请不要重复添加。');
					}else{
						if ($return_id=M('goods')->add($data)){
							$data['goods_id']=$return_id;
							$data['goods_bh']='G'.$return_id;
							if (M('goods')->save($data)){
								$this->success('添加物品成功',U('goods_list'),3);
								exit;
							}else{
								$this->error('添加物品失败');
								exit;
							}
						}else{
							$this->error('添加物品失败');
							exit;
						}
					}
				}else{
					$this->error($goodsadd->getError());
				}
			}
			$this->display();
		}else{
			$this->success('您没有这个权限。',U('goods_list'),3);
		}
	}
	//物品修改
	public function goods_update($id){
		$goodsadd =D('goods');
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){
			if (IS_POST){
				if($goodsadd->create()){
					$data=I('post.');
					$data['goods_id']=$id;
					if (M('goods')->save($data)){
						$this->success('物品修改成功',U('goods_list'),3);
				    	exit;
					}else{
						$this->error('物品修改失败');
						exit;
					}
				}else{
					$this->error($goodsadd->getError());
				}
			}
			//储存状态
			$arrays =array ('0'=>array('status'=>0,'name'=>'不可借'),'1'=>array('status'=>1,'name'=>'可借'));
			$this->assign('arrays',$arrays);
			$current =M('goods')->find($id);
			$this->assign('current',$current);
			$this->display();
		}else{
			$this->success('您没有这个权限。',U('goods_list'),3);
		}
	}
	//物品删除
	public function  goods_del($id){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){
			if (M('goods')->delete($id)){
				$this->success('删除成功',U('goods_list'),3);
			}else{
				$this->error('删除失败');
			}
		}else{
			$this->error('您没有这个权限。');			
		}
	}
	//物品批量删除
	public function pl_del(){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){

			$data=$_POST['goods'];//获取表单的memeberarray数组
			$data_str =join(',',$data);//把数组以','为分割线连接成字符串
			if(M('goods')->delete($data_str)){
				$this->success('批量删除成功',U('goods_list'),3);
			}else{
				$this->error('批量删除失败');
			}
		}else{
			$this->error('您没有这个权限。');
		}
	}
	//物品购置表
	public function buy_list(){
		$buylist=M('buy_goods')->select();
		$this->assign('buylist',$buylist);
		$count =M('buy_goods')->count();
		$this->assign('count',$count);
		$this->display();
	}
	//添加购置物品记录
	public function buy_add(){
		$buyadd = new \Home\Model\Buy_goodsModel();
		if (IS_POST){
			if($buyadd->create()){
				$data=I('post.');
				if (in_array("",$_POST)){
					$this->error('存在没有输入的项！');
				}
				if (M('buy_goods')->add($data)){
					$this->success('添加购置记录成功',U('buy_list'),3);
					exit;
				}else{
					$this->error('添加购置记录失败');
					exit;
				}
			}else{
				$this->error($buyadd->getError());
			}
		}
		//物品编号
		$bh=M('goods')->field('goods_bh')->select();//查询数据表里某个属性列的所有记录
		$this->assign('bh',$bh);
		$this->display();
	}
	//修改购置物品记录
	public function buy_update($id){
		$buyadd = new \Home\Model\Buy_goodsModel();
		if (IS_POST){
			if($buyadd->create()){
				$data=I('post.');
				if(in_array("",$_POST)){
					$this->error('存在没有输入的项！');
				}
				$data['buy_id']=$id;
				if (M('buy_goods')->save($data)){
					$this->success('修改购置记录成功',U('buy_list'),3);
					exit;
				}else{
					$this->error('添修改购置记录失败');
					exit;
				}
			}else{
				$this->error($buyadd->getError());
			}
		}
		$current=M('buy_goods')->find($id);
		$this->assign('current',$current);
		//物品编号
		$bh=M('goods')->field('goods_bh')->select();//查询数据表里某个属性列的所有记录
		$this->assign('bh',$bh);
		$this->display();
	}
	//购置物品记录删除
	public function  buy_del($id){
		if (M('buy_goods')->delete($id)){
			$this->success('删除成功',U('buy_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//购置物品批量删除
	public function buy_pldel(){
		$data=$_POST['buyarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('buy_goods')->delete($data_str)){
			$this->success('批量删除成功',U('buy_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}
	//借出物品申请
	public function lend_apply($id){
		if (IS_POST){
			$data=I('post.');
			if (in_array("",$_POST)){
				$this->error('存在没有输入的项！');
			}
			$data['lend_status']=0;
			if (M('lend_goods')->add($data)){
				$this->success('申请借出成功，请等候审核',U('goods_list'),3);
				exit;
			}else{
				$this->error('申请借出失败。');
				exit;
			}
		}
		$current = M('goods')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//借出审核列表------------------------------------------------------------------------------
	public function lend_checklist(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$checklist = M('lend_goods')->select();
			$this->assign('checklist',$checklist);
			$count = M('lend_goods')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$checklist = M('lend_goods')->select();
				$this->assign('checklist',$checklist);
				$count = M('lend_goods')->count();
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);
				$tiaojian['lend_club']=array('IN',$club_name);
				$checklist = M('lend_goods')->where($tiaojian)->select();
				$this->assign('checklist',$checklist);
				$count = M('lend_goods')->where($tiaojian)->count();
				$this->assign('count',$count);
			}
		}		

		// $checklist = M('lend_goods')->select();
		// $this->assign('checklist',$checklist);
		$this->display();
	}
	//审核借出物品信息
	public function lend_checkgoods($id){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){
			$current = M('lend_goods')->find($id);
			$this->assign('current',$current);
			$this->display();
		}else{
			$this->error('您没有这个权限。');
		}
	}
	//审核通过：goods_pass
	public function goods_pass($id){
		//当前借出物品的信息
		$lend_current =M('lend_goods')->find($id);
		//从借出列表的参数到物品列表对应的物品
		$goods_lend=M('goods')->where(array('goods_name'=>$lend_current['lend_name']))->select();
		//储存借出数量信息
		$goods=array();
		$goods['goods_id']=$goods_lend['0']['goods_id'];
		$goods['lend_number']=$goods_lend['0']['lend_number']+$lend_current['lend_number'];
		//--------------------------这是借出表lend_goods的改动数据
		$data=array();
		$data['lend_id']=$id;
		$data['lend_status']=1;//1.通过审核
		$data['return_status']=0;//0.待归还
		//-----------------------------------
		if (M('lend_goods')->save($data)){
			if (M('goods')->save($goods)){
				$this->success('通过审核。',U('lend_checklist'),3);
			}else{
				$this->error('审核失败，请重新审核。');
			}
		}else{
			$this->error('审核失败，请重新审核。');
		}
	}
	//未审核通过：goods_notpass
	public function goods_notpass($id){
		$data=array();
		$data['lend_id']=$id;
		$data['lend_status']=2;//2.未通过审核
		if (M('lend_goods')->save($data)){
			$this->success('未通过审核。',U('lend_checklist'),3);
		}else{
			$this->error('审核失败，请重新审核。');
		}
	}
	//审核表的删除
	public function check_del($id){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		if ($role['role_id']==1||$role['role_id']==2){
			if (M('lend_goods')->delete($id)){
				$this->success('删除成功',U('lend_record'),3);
			}else{
				$this->error('删除失败');
			}
		}else{
			$this->error('对不起，您没有这个权限。');
		}		
	}
	//审核表的批量删除
	public function check_pldel(){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		if ($role['role_id']==1||$role['role_id']==2){
			$data=$_POST['checkarray'];//获取表单的memeberarray数组
			$data_str =join(',',$data);//把数组以','为分割线连接成字符串
			if(M('lend_goods')->delete($data_str)){
				$this->success('批量删除成功',U('lend_record'),3);
			}else{
				$this->error('批量删除失败');
			}
		}else{
			$this->error('对不起，您没有这个权限。');
		}	
	}
	//借出物品记录表
	public function lend_record(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$recordlist = M('lend_goods')->where(array('lend_status'=>'1'))->select();
			$this->assign('recordlist',$recordlist);
			$count = M('new')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
				$recordlist = M('lend_goods')->where(array('lend_status'=>'1'))->select();
				$this->assign('recordlist',$recordlist);
				$count = M('new')->count();//记录总数
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);
				$tiaojian['lend_club']=array('IN',$club_name);
				$recordlist = M('lend_goods')->where($tiaojian)->where(array('lend_status'=>'1'))->select();
				$this->assign('recordlist',$recordlist);
				$count = M('lend_goods')->where($tiaojian)->where(array('lend_status'=>'1'))->count();//记录总数
				$this->assign('count',$count);
			}
		}
		$this->display();
	}
	//审核借出物品信息
	public function lend_con($id){
		$current = M('lend_goods')->find($id);
		$this->assign('current',$current);
		$this->display();
	}

	//归还物品内容表
	public function return_goods($id){
		$current = M('lend_goods')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//归还物品操作
	public function return_pass($id){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id		
		if ($role['role_id']==1||$role['role_id']==2){
			//当前归还物品的信息
			$lend_current =M('lend_goods')->find($id);
			//从借出列表的参数到物品列表对应的物品
			$goods_lend=M('goods')->where(array('goods_name'=>$lend_current['lend_name']))->select();
			//储存借出数量信息
			$goods=array();
			$goods['goods_id']=$goods_lend['0']['goods_id'];
			$goods['lend_number']=$goods_lend['0']['lend_number']-$lend_current['lend_number'];

			$data=array();
			$data['lend_id']=$id;
			$data['return_status']=1;//1.已归还
			if (M('lend_goods')->save($data)){
				if (M('goods')->save($goods)){
					$this->success('归还物品成功。',U('lend_record'),3);
				}else{
					$this->error('归还物品失败。');
				}
			}else{
				$this->error('该物品已归还。');
			}
		}else{
			$this->error('您没有这个权限。');
		}
	}
	//借出物品记录表的删除---------------------------------------------
	public function  record_del($id){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		if ($role['role_id']==1||$role['role_id']==2){
			if (M('lend_goods')->delete($id)){
				$this->success('删除成功',U('lend_record'),3);
			}else{
				$this->error('删除失败');
			}
		}else{
			$this->error('对不起，您没有这个权限。');
		}
	}
	//借出物品记录表批量删除-------------------------------------------------
	public function record_pldel(){
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		if ($role['role_id']==1||$role['role_id']==2){
			$data=$_POST['recordarray'];//获取表单的memeberarray数组
			$data_str =join(',',$data);//把数组以','为分割线连接成字符串
			if(M('lend_goods')->delete($data_str)){
				$this->success('批量删除成功',U('lend_record'),3);
			}else{
				$this->error('批量删除失败');
			}
		}else{
			$this->error('对不起，您没有这个权限。');
		}
	}
}

?>