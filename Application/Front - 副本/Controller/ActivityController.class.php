<?php
namespace Front\Controller;
use Think\Controller;

class ActivityController extends Controller{
    public function activity_list(){
        $recordcount = M('activity')->count();//数据表的总记录数
        //第一个参数是总记录数，第二个是每页显示几个记录即页面大小
        $page= new \Think\Page($recordcount,10);//实例化分页类对象

        //自定义分页的样式
        $page->lastSuffix=false;//最后一页是否显示总页数
        $page->rollPage=0;//分页栏每页显示的页数
        $page->setConfig('prev','【上一页】');
        $page->setConfig('next','【下一页】');
        $page->setConfig('first','【首页】');
        $page->setConfig('last','【末页】');
        //完全自定义分页
        $page->setConfig('theme',' 共 %TOTAL_ROW% 条记录，当前是 %NOW_PAGE%/%TOTAL_PAGE%  %UP_PAGE% %DOWN_PAGE% %END% %FIRST%');//可以在这里调换样式顺序

        $startno = $page->firstRow;//起始行数，从哪行开始
        $pagesize = $page->listRows;//页面大小,的多少条记录
        $activitylist=M('activity')->order("create_time desc")->limit("$startno,$pagesize")->select();
        $pagestr = $page->show();//自动组装分页字符串
        $this->assign('activitylist',$activitylist);
        $this->assign('pagestr',$pagestr);


        $this->display();
    }
    public function activity_con($id){
        $current =M('activity')->find($id);
        $this->assign('current',$current);
        $this->display();
    }


}

?>