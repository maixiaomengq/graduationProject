<?php
namespace Front\Controller;
use Think\Controller;

class IndexController extends Controller{
    public function index(){

       //活动最新5条
        $activity =M('activity')->order('create_time desc')->limit(10)->select();
        $this->assign('activity',$activity);


        //新闻
        $new = M('New')->select();
        $this->assign('new',$new);
        $this->display();
    }
}



?>