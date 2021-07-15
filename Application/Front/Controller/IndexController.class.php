<?php
namespace Front\Controller;
use Think\Controller;

class IndexController extends Controller{
    public function index(){
        $time =  date('Y年m月d日 ',time());
        $this->assign('time',$time);
       //活动最新5条
        $activity =M('activity')->order('create_time desc')->limit(8)->select();
        $this->assign('activity',$activity);


        //新闻
        $new = M('new')->order('new_time desc')->limit(10)->select();
        $this->assign('new',$new);
        $this->display();
    }
}



?>