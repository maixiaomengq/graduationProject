<?php
namespace Home\Controller;
use Think\Controller;

class FileController extends Controller {
    public function down(){
        if(IS_GET){
            if($file=I('get.file')){
                $where['file_name']=array('like',"%$file%");
            }

            //上面是分页
            $list=M('file')->where($where)->order('id desc')->select();
            $this->assign('data',$list);

        }else{
            if($file=I('get.file')){
                $where['file_name']=array('like',"%$file%");
            }
            $count=M('file')->where($where)->count();
            $Page=page($count,9,5);
            $show=$Page->show();
            $list=M('file')->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();select();
            //$list=$goodsModel->select();
            $this->assign('data',$list);
            $this->assign('page',$show);
        }
        $this->display();
    }
    public function getdown(){
        $id=I('get.id');
        echo "$id";
        $file_url=M('file')->where(array('id'=>$id))->getField('url');
        $root=getcwd();  //E:\phpStudy\phpStudy\phpStudy\WWW\association\tp
        $root=str_replace('\\','/',$root);//E:/phpStudy/phpStudy/phpStudy/WWW/association/tp
        $file=$root."/Public/".$file_url;
        var_dump($file);
     
        // $file="E:/phpStudy/phpStudy/phpStudy/WWW/association/tp/Public/Uploads/activity/585952550c9be.doc";
        download($file);
    }
}
