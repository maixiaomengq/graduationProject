<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function addAdmin(){
        if(IS_POST){
            $info=I('post.'); 
            if($info['admin_name']==''){
                $this->error('用户名不能为空！');
            }
            
            if(!preg_match('/^[_0-9a-z]{4,6}$/i', $info['admin_name'])){
                $this->error('用户名必须是字母数字_，长度为4-6！');
            }
            if($info['admin_pw']==''){
                $this->error('密码不能为空！');
            }
            if(!preg_match('/^[_0-9a-z]{6,10}$/i', $info['admin_pw'])){
                $this->error('密码必须是字母数字_,长队为6-10！');
            }
            if($info['admin_pw1']==''){
                $this->error('确认密码不能为空！');
            }
            if($info['admin_pw']!==$info['admin_pw1']){
                $this->error('两次输入的密码不一致！');
            }
            $re=$Model->add(array(
                'admin_name'=>$info['admin_name'],
                'admin_pw'=>$info['admin_pw'],
            ));
            if($re){
                $this->success('添加成功',U('listAdmin'));
                exit();
            }else{
                $this->error('添加失败',U('listAdmin'));
            }
        }
        $this->display();
    }
    public function listAdmin(){
        $list=M('admin')->select();
        $this->assign('data',$list);
        $this->display();
    }
    public function editAdmin(){
        $id=I('get.id');
        $Model=M('admin');
        $info=$Model->find($id);
        $this->assign('row',$info);
        
        if(IS_POST){
            $info=I('post.'); 
            if($info['admin_name']==''){
                $this->error('用户名不能为空！');
            }
            
            if(!preg_match('/^[_0-9a-z]{6,8}$/i', $info['admin_name'])){
                $this->error('用户名必须是字母数字_，长度为4-6！');
            }
            if($info['admin_pw']==''){
                $this->error('密码不能为空！');
            }
            if(!preg_match('/^[_0-9a-z]{6,10}$/i', $info['admin_pw'])){
                $this->error('密码必须是字母数字_,长队为6-10！');
            }
            if($info['admin_pw1']==''){
                $this->error('确认密码不能为空！');
            }
            if($info['admin_pw']!==$info['admin_pw1']){
                $this->error('两次输入的密码不一致！');
            }
            $re=M('admin')->save(array(
                'id'=>$id,
                'admin_name'=>$info['admin_name'],
                'admin_pw'=>$info['admin_pw'],
            ));
            if(FALSE!==$re){
                $this->success('修改成功',U('listAdmin'));
                exit();
            }else{
                $this->error('修改失败',U('listAdmin'));
            }
        }
        $this->display();
    }
    public function delAdmin(){
        $id=I('get.id');
        $Model=M('admin');
        $info=$Model->delete($id);
        if(FALSE!==$info){
            $this->success('删除成功',U('listAdmin'));
            exit();
        }else{
            $this->error('删除失败');
        }
    }
}
