<?php
namespace Home\Controller;
use Think\Controller;

class IntroductionController extends Controller{
	public function introduction_list(){
		$club = M('club')->where("club_name = '社团联合会'")->select();
		$shelian =$club['0'];
		$this->assign('shelian',$shelian);
		$this->display();
	}

	public function introduction_update($id){
		if (IS_POST){
			if ($data=M('club')->create()){
				$data['club_id']=$id;
				$info=array();

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
				 		$this->success('修改成功',U('introduction_list'),3);
				 		exit;
				 	}else{
				 		$this->error('修改失败');
				 		exit;
				 	}


				}else{
					if (M('club')->save($data)){
				 		$this->success('修改成功',U('introduction_list'),3);
				 		exit;
				 	}else{
				 		$this->error('修改失败');
				 		exit;
				 	}
				 }
			}
		}



		//显示内容在网页上
		$current = M('club')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
}
?>