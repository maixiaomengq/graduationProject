<?php
namespace Home\Controller;
use THink\Controller;

class AuthController extends Controller{
	public function authlist(){
		$authlist = M('auth')->select();
		$this->assign('authlist',$authlist);
		$count=M('auth')->count();
		$this->assign('count',$count);
		$this->display();
	}
	//修改权限
	public function updateAuth($auth_id){
		$model=M('auth');
		if ($data=$model->create()){
			 if ($data['auth_pid']==0){
				$data['auth_c']='';
				$data['auth_a']='';
				$data['auth_level']='0';
				$data['auth_path']=$auth_id;
			}else{
				 	$data['auth_path']= $data['auth_pid'].'-'.$auth_id;
			 }
			 $data['auth_id']=$auth_id;
			 if ($model->save($data)){
				$this->success('修改权限成功。',U('authlist'),3);
				exit;
			 }else{
				$this->error('修改权限失败。');
			 }
		}

		//获取当前的权限信息
		$current_auth = $model->find($auth_id);
		$this->assign('current_auth',$current_auth);

		//取到父级的数据
		$parent_auth=$model->where('auth_level=0')->select();
		$this->assign('parent_auth',$parent_auth);


		$this->display();
	}

	//添加权限
	public function addAuth(){
		$model=M('auth');
		if (IS_POST){
			$data=$model->create();
			$data['auth_path']='';
			$data['auth_level']='0';
			$info=array();
			if($auth_id=$model->add($data)){//添加后返回添加后数据的id
				if ($data['auth_pid']==0){
					$info['auth_path']=$auth_id;
					$info['auth_level']='0';
				}else{
					$info['auth_path']=$data['auth_pid'].'-'.$auth_id;
					$info['auth_level']=1;
				}
				$info['auth_id']=$auth_id;
				if($model->save($info)){
					$this->success('添加成功',U('authlist'),3);
					exit;
				}else{
					$this->error('添加失败');
				}
			}
		}

		//取到父级的数据
		$parent_auth=$model->where('auth_level=0')->select();
		$this->assign('parent_auth',$parent_auth);
		$this->display();	
	}
	//权限删除
	public function Auth_del($auth_id){
		if (M('auth')->delete($auth_id)){
			$this->success('删除成功',U('authlist'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//批量删除
	public function Auth_pldel(){
		$data=$_POST['autharray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('auth')->delete($data_str)){
			$this->success('批量删除成功',U('authlist'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

}

?>