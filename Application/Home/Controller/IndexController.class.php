<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if (IS_POST){
			$obj=new \Think\Verify();
			if($obj->check(I('post.yzm','','trim'))){//检查验证码是否正确
				$shenfen = I('post.shenfen');
				if ($shenfen =="系统管理员"){
					$data['mg_name']=I('post.user');
					$data['mg_pwd']=I('post.pw');
					$row=M('manager')->where($data)->find();
					if ($row){
						session('mg_id',$row['mg_id']);//会话中获取到当前登录用户id储存起来
						session('mg_role_id',$row['mg_role_id']);
						session('name',$row['mg_name']);//获取当前用户的名字
						session('shenfen',"系统管理员");
						$this->redirect('Manager/index');
					}else{
						$this->error('用户名或者密码错误',U('index'),4);
					}
				}elseif ($shenfen =="学生用户"){
					$data['stu_number']=I('post.user');
					$data['stu_pwd']=I('post.pw');
					$row=M('student')->where($data)->find();
					if ($row){
						session('stu_number',$row['stu_number']);
						session('stu_id',$row['stu_id']);//会话中获取到当前登录用户id储存起来
						session('shenfen',"学生用户");
						session('name',$row['stu_name']);
						$this->redirect('Manager/index');
					}else{
						$this->error('用户名或者密码错误',U('index'),4);
					}					
				}else{
					$this->error('请选择用户身份',U('index'),4);
				}
//-------------------------------------------------------------------------------
			}else{
				$this->error('验证码错误',U('index'),4);
			}
		}
		$this->display();
	}
	public function verifyImg(){//生成验证码
		 $arrayName = array(
		 	'imageW' => 120 , 
		 	'imageH' =>40 ,
		 		'fontSize'=>15  ,
		 		'length'=>4,
		 		'fontttf'  =>'4.ttf'
		 	);
		// $config   =   arry(
		// 	'imageW' =>120,
		// 	'imageH' =>40 ,
		// 	'fontSize'=>20  ,
		// 	'fontttf'  =>'3.tttf'
		// 	);	
		ob_clean();
		$obj = new \Think\Verify($arrayName);//创建一个新对象
		$obj->entry();//生产验证码的函数
	}
}