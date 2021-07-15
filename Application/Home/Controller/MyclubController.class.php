<?php
namespace Home\Controller;
use Think\Controller;

class MyclubController extends Controller{
	public function myclub_list(){
	

		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$myclublist = M('club')->where('club_status=1')->select();
			$this->assign('myclublist',$myclublist);
			$count=M('club')->where('club_status=1')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['club_name'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclublist = M('club')->where($tiaojian)->select();
				$this->assign('myclublist',$myclublist);
				$count=M('club')->where($tiaojian)->count();
				$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['club_name'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclublist = M('club')->where($tiaojian)->select();
				$this->assign('myclublist',$myclublist);
				$count=M('club')->where($tiaojian)->count();
				$this->assign('count',$count);
				//列出自己当社长的社团名称。
				$club_shezhang = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->field('member_club')->select();			
				$this->assign('club_shezhang',$club_shezhang);
			}elseif($role['role_id']==4){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['club_name'] = array('IN',$club_name);
				//查询条件为表中社团名称在上述条件数组中的社团名称里就查询
				$myclublist = M('club')->where($tiaojian)->select();
				$this->assign('myclublist',$myclublist);
				$count=M('club')->where($tiaojian)->count();
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
	//查看社团的信息
	public function myclub_con($id){
		$current =M('club')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//如果自己是社团长，则能修改自己是社长的社团的信。
	public function myclub_update($id){
		if (IS_POST){
			if ($data=M('club')->create()){
				$data['club_id']=$id;
				$info = array();

				//上传文件
				if($_FILES['club_logos']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'rootPath' =>  './Public/Uploads/logos/'
					);//文件上传后的保存路径
					$upload= new \Think\Upload($config);//实例化上传文件类对象
					$info = $upload->uploadOne($_FILES['club_logos']);//取到上传后的文件的信息
					//要设置添加的字段和数据库的一样
					$data['club_logo']=$info['savepath'].$info['savename'];
					//生成缩略图代码：
					$img = new \Think\Image();
					//1、打开图片
					$big_img = $upload->rootPath.$data['club_logo'];//找到上传文件后的保存路径
					$img->open($big_img);//然后打开
					//2、生成缩略图
					$img->thumb(100,100,6);//宽度，高度，（居中、右上角等生产的参数类型）
					//3、保存图片
					////设置保存的路径和名称
					$small_img =$upload->rootPath.$info['savepath'].'small_'.$info['savename'];
					$img->save($small_img);
					//要设置添加的字段和数据库的一样
					$data['club_small_logo']=$info['savepath'].'small_'.$info['savename'];

					if (M('club')->save($data)){
						$this->success('修改成功',U('myclub_list'),3);
						exit;
					}else{
						$this->error('修改失败');
						exit;
					}
				}else{
						if (M('club')->save($data)){
				 		$this->success('修改成功',U('myclub_list'),3);
				 		exit;
				 	}else{
				 		$this->error('修改失败');
				 		exit;
				 	}
				}
			}
		}
		//取到社团类型
		$clubtype = array(
			'0'=>array('type'=>'学术科技类'),
			'1'=>array('type'=>'兴趣爱好类'),
			'2'=>array('type'=>'社公益类'),
			'3'=>array('type'=>'其他类社团'),
		);
		$this->assign('clubtype',$clubtype);
		//获取社团信息
		$current =M('club')->find($id);
		$this->assign('current',$current);
		$this->display();
	}

	//退社申请
	public function retired_apply($club_id){
		$shenfen =session('shenfen');
		if ($shenfen =="系统管理员"){
			$this->success('您是系统管理员，不能提交退社申请。',U('myclub_list'),3);
		}
		if(IS_POST){
			if(in_array("", $_POST)){//用来判断POST中获取到的是否存在没输入的
	        	$this->error('理由不能为空。');
			}
			$data=I('post.');
			$row =M('retired')->where(array('stu_number'=>$data['stu_number'],'member_name'=>$data['member_name'],'club_name'=>$data['club_name']))->count();
			if ($row>0){
				$this->error('您已提交过该社团的退社申请，请勿重复提交。');
				exit;
			}
			$data['apply_time']=date("Y-m-d H:i:s",NOW_TIME);
			if(M('retired')->add($data)){
				$this->success('提交申请成功,请等候审核。',U('myclub_list'),3);
				exit;
			}else{
				$this->error('提交申请失败。');
				exit;
			}
	    }

		//取到当前学生当前退出的社团对应的成员信息表
		$stu_id = session('stu_id');//当前学生用户的id
		$stu_number = M('student')->where(array('stu_id'=>$stu_id))->getField('stu_number');
		$stu_name = M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
		$club_name = M('club')->where(array('club_id'=>$club_id))->getField('club_name');
		$member_con = M('association_member')->where(array('member_number'=>$stu_number,'member_name'=>$stu_name,'club_name'=>$club_name))->find();
		$this->assign('member_con',$member_con);
		$this->display();
	}
}

?>