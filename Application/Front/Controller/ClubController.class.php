<?php
namespace Front\Controller;
use Think\Controller;

class ClubController extends Controller{
    public function club_list(){

        $club =M('club')->select();
        $this->assign('club',$club);
        $this->display();
    }
    public function club_con($id){
        $current = M('club')->find($id);
        $this->assign('current',$current);
        $this->display();
    }

}

?>