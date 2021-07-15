<?php
namespace Home\Controller;
use Think\Controller;

class ActivityController extends Controller{

	public function activity_list(){
		$activitylist = M('activity')->where("activity_status=1 and activity_club='社团联合会'")->select();
		$this->assign('activitylist',$activitylist);
		$this->display();
	}
	public function activity_add(){
		$activitydd=D('activity');

		if(IS_POST){
			if ($data=$activitydd->create()){
			$data['activity_status']=1;
				if($_FILES['urls']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'exts'		   =>array('doc','wps','xls','ppt','txt','rar'),
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
							$this->success('添加成功',U('activity_list'),3);
							exit;
						}else{
							$this->error('添加失败');
							exit();
						}
                	}
				}else{//如果没有收到添加信息则，返回信息
					$this->error('您还没有上传附件');
				}
			}else{
				$this->error($activitydd->getError());
			}
		}
		$this->display();
	}
	//修改---------------------------------------------------------------------------------
	public function activity_update($id){
		$activitydd=D('activity');
		if(IS_POST){
			if ($data=$activitydd->create()){
			$data['activity_id']=$id;
			$data['activity_status']=1;
				if($_FILES['urls']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'exts'		   =>array('doc','wps','xls','ppt','txt','rar'),
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
						if (M('activity')->save($data)){
							$this->success('修改成功',U('activity_list'),3);
							exit;
						}else{
							$this->error('修改失败');
							exit();
						}
                	}
				}else{//如果没有收到添加信息则，返回信息
					if (M('activity')->save($data)){
							$this->success('修改成功',U('activity_list'),3);
							exit;
						}else{
							$this->error('修改失败');
							exit();
						}
					
				}
			}else{
				$this->error($activitydd->getError());
			}
		}

		//显示内容在修改页面
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
			$this->success('删除成功',U('activity_list'),3);
		}else{
			$this->error('删除失败');
		}
	}

		public function pl_del(){

		$data=$_POST['activityarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('activity')->delete($data_str)){
			$this->success('批量删除成功',U('activity_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

}

?>