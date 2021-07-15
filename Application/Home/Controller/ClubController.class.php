<?php
namespace Home\Controller;
use Think\Controller;

class ClubController extends Controller{
	//社团汇总列表
	public function club_list(){
		$clublist = M('club')->where('club_status=1')->select();
		$this->assign('clublist',$clublist);
		$count = M('club')->where('club_status=1')->count();
		$this->assign('count',$count);
		$this->display();
	}
	//社团添加
	public function club_add(){
		$clubadd=new \Home\Model\ClubModel();
		if(IS_POST){
			if ($data=$clubadd->create()){
				$rows = M('student')->where(array('stu_number'=>$data['stu_number'],'stu_name'=>$data['member_name']))->count();
				if ($rows>0){
					$this->error('现任会长的姓名与学号不一致，请重新填写。');
				}
				$row = M('club')->where(array('club_name'=>$data['club_name']))->count();
				if ($row>0){//判断社团是否重复添加
					$this->error('该社团已存在，不能重复添加');
				}else{		
			$data['club_bh']='';
			$info=array();
			//上传文件
			//这是社联添加的默认通过审核为1     :0待审核，1通过审核，2未通过审核
			$data['club_status']=1;
				if($_FILES['club_logos']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'exts'     =>array('jpg', 'gif', 'png', 'jpeg'),
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

					//添加数据到数据库
					if ($return_id=$clubadd->add($data)){//返回的是本次添加记录的id值
							$info['club_bh']='M'.$return_id;//重新更改bh的内容
							$info['club_id']=$return_id;//更新的主键id
							if ($clubadd->save($info)){//更新
								$this->success('添加成功',U('club_list'),3);
								exit;
							}else{
								$this->error('添加失败');
								exit;
							}
					}else{
						$this->error('添加失败');
						exit;
					}
				}else{
					$this->error('你还没上传logo');
				}
			}
			}else{
				$this->error('你还没上传logo');
			}
		}
		$this->display();

	}
	//社团的更新
	public function club_update($id){

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
						$this->success('修改成功',U('club_list'),3);
						exit;
					}else{
						$this->error('修改失败');
						exit;
					}
				}else{
						if (M('club')->save($data)){
				 		$this->success('修改成功',U('club_list'),3);
				 		exit;
				 	}else{
				 		$this->error('修改失败');
				 		exit;
				 	}
				}
			}
		}

		//显示内容在修改页面
		$current = M('club')->find($id);
		$this->assign('current',$current);
		//取到社团类型
		$clubtype = array(
			'0'=>array('type'=>'学术科技类'),
			'1'=>array('type'=>'兴趣爱好类'),
			'2'=>array('type'=>'社公益类'),
			'3'=>array('type'=>'其他类社团'),
		);
		$this->assign('clubtype',$clubtype);
		$this->display();
	}
	//社团删除
	public function  club_del($id){
		if (M('club')->delete($id)){
			$this->success('删除成功',U('club_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//社团批量删除
	public function pl_del(){
		$data=$_POST['clubarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('club')->delete($data_str)){
			$this->success('批量删除成功',U('club_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}
}

?>