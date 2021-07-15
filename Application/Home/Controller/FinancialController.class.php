<?php
namespace Home\Controller;
use Think\Controller;

class FinancialController extends Controller{
	public function financial_list(){
		$shenfen=session('shenfen');
		if ($shenfen=="系统管理员"){
			$financiallist = M('financial')->select();
			$this->assign('financiallist',$financiallist);
			//总记录条数
			$count = M('financial')->count();
			$this->assign('count',$count);
		}elseif ($shenfen=="学生用户"){
			$stu_id = session('stu_id');//当前学生用户的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if($role['role_id']==2){//等于社联社长时候能查看所有信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name))->getField('member_club');
			$financiallist = M('financial')->select();
			$this->assign('financiallist',$financiallist);
			//总记录条数
			$count = M('financial')->count();
			$this->assign('count',$count);
			}elseif ($role['role_id']==3){//普通社长的时候只能查看自己社团的信息
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);
				$tiaojian['club_name']=array('IN',$club_name);
				$financiallist = M('financial')->where($tiaojian)->select();
				$this->assign('financiallist',$financiallist);
				//总记录条数
				$count = M('financial')->where($tiaojian)->count();
				$this->assign('count',$count);
			}
		}
		$this->display();
	}
	//添加财务记录
	public function financial_add(){
		$financialadd=D('financial');
		if (IS_POST){
			if ($financialadd->create()){
				$data=I('post.');
				if(in_array("", $_POST)){//用来判断POST中获取到的是否存在没输入的
	                $this->error('存在没有输入的项！');
	            }
	            $stu_row = M('student')->where(array('stu_number'=>$data['stu_number'],'stu_name'=>$data['stu_name']))->count();
	            if ($stu_row==0){
	            	$this->error('学生姓名或学号与您填写的不一致，请重新填写。');
	            }
				$month =date('F');//月份
				$year=date('Y');//年份
				if ($data['in_out_type']=='支入'){//当类型是支入时候查询当前表的记录
					$rows=M('in_financial')->where(array('time'=>$year,'club_name'=>$data['club_name']))->count();
					if($rows==0){//如果当前社团当前年没有记录则先增加社团当前年的数据然后再加
						$arr= array();
						$arr['club_name']=$data['club_name'];
						$arr['time']=$year;
						M('in_financial')->add($arr);
					}
					//如果有记录则直接加
					$in_money = M('in_financial')->where(array('time'=>$year,'club_name'=>$data['club_name']))->getField($month);//月份下的人数总和,随时间变
					$in_money=$in_money+$data['in_out_money'];//增加结束
					$count[$month]=$in_money;//对应月份下
				}
				elseif($data['in_out_type']=='支出'){
					$rows=M('out_financial')->where(array('time'=>$year,'club_name'=>$data['club_name']))->count();
					if($rows==0){//如果当前社团当前年没有记录则先增加社团当前年的数据然后再加
						$arr= array();
						$arr['club_name']=$data['club_name'];
						$arr['time']=$year;
						M('out_financial')->add($arr);
					}
					//如果有记录则直接加
					$in_money = M('out_financial')->where(array('time'=>$year,'club_name'=>$data['club_name']))->getField($month);//月份下的人数总和,随时间变
					$in_money=$in_money+$data['in_out_money'];//增加结束
					$count[$month]=$in_money;//对应月份下
				}

	            if (M('financial')->add($data)){
	            	if($data['in_out_type']=='支入'){
						M('in_financial')->where(array('time'=>$year,'club_name'=>$data['club_name']))->save($count);
	            	}elseif($data['in_out_type']=='支出'){
						M('out_financial')->where(array('time'=>$year,'club_name'=>$data['club_name']))->save($count);
	            	}
	            	$this->success('添加财务记录成功',U('financial_list'),3);
	            	exit();
	            }else{
					$this->error('添加财务记录失败');
					exit();
				}
			}else{
				$this->error($financialadd->getError());
			}
		}



		$shenfen= session('shenfen');
		if ($shenfen=='系统管理员'){
			$role_id=1;
			$this->assign('role_id',$role_id);
		}else{
			$stu_id = session('stu_id');//当前学生用户在社团的id
			$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();
			//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
			$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club');
			$role_id=$relation['role_id'];
			$this->assign('role_id',$role_id);
			$this->assign('club_name',$club_name);
		}
			//列出社团
			$clublist = M('club')->select();
			$this->assign('clublist',$clublist);
		$this->display();
	}
	//查看财务记录详细信息
	public function financial_con($id){
		$current = M('financial')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//财务记录的修改
	public function financial_update($id){
		$financialadd =D('financial');
		if (IS_POST){
			if($financialadd->create()){
				$data=I('post.');
				if(in_array("", $_POST)){//用来判断POST中获取到的是否存在没输入的
	                $this->error('存在没有输入的项！');
	            }
	            $data['financial_id']=$id;
	            if (M('financial')->save($data)){
	            	$this->success('修改财务记录成功',U('financial_list'),3);
	            	exit();
	            }else{
					$this->error('修改财务记录失败');
					exit();
				}
			}else{
				$this->error($financialadd->getError());
			}
		}
		$stu_id = session('stu_id');//当前学生用户在社团的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();
		//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
		$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club');
		$role_id=$relation['role_id'];
		$this->assign('role_id',$role_id);
		$this->assign('club_name',$club_name);


		//储存类型
		$arrays =array ('0'=>array('in_out_type'=>'支入'),'1'=>array('in_out_type'=>'支出'));
		$this->assign('arrays',$arrays);
		//财务的信息
		$current = M('financial')->find($id);
		$this->assign('current',$current);
		//列出社团
		$clublist = M('club')->select();
		$this->assign('clublist',$clublist);
		$this->display();
	}
	//财务删除
	public function financial_del($id){
		if (M('financial')->delete($id)){
			$this->success('删除成功',U('financial_list'),3);
		}else{
			$this->error('删除失败');
		}
	}

	//财务批量删除
	public function financial_pldel(){
		$data=$_POST['financialarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('financial')->delete($data_str)){
			$this->success('批量删除成功',U('financial_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}


	//导出
	public function look_down(){
		$shenfen = session('shenfen');
    	if ($shenfen=='系统管理员'){
	    	$id = I('get.id'); 
	        $data = M('financial')->field('club_name,in_out_type,in_out_money,in_out_time,stu_name,remark')->select();
    	}elseif($shenfen=='学生用户'){
    		$stu_id = session('stu_id');//当前学生用户的id
    		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
			$role=M('role')->find($relation['role_id']);//对应的角色id
			if ($role['role_id']==2){
		    	$id = I('get.id'); 
		        $data = M('financial')->field('club_name,in_out_type,in_out_money,in_out_time,stu_name,remark')->select();
			}elseif($role['role_id']==3){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);
				$tiaojian['club_name']=array('IN',$club_name);
				$id = I('get.id');
		    	$where['member_id'] = $id;
		        $data = M('financial')->where($tiaojian)->field('club_name,in_out_type,in_out_money,in_out_time,stu_name,remark')->select();
			} 		
    	}
    	
    	// $id = I('get.id'); 
     //    $data = M('financial')->field('club_name,in_out_type,in_out_money,in_out_time,stu_name,remark')->select();

         
        // 导出Exl
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Worksheet.Drawing");
        import("Org.Util.PHPExcel.Writer.Excel2007");
        $objPHPExcel = new \PHPExcel();
         
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
     
        $objActSheet = $objPHPExcel->getActiveSheet();
         
        // 水平居中（位置很重要，建议在最初始位置）
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
         
        $objActSheet->setCellValue('A1', '社团名称');
        $objActSheet->setCellValue('B1', '财务类型');
        $objActSheet->setCellValue('C1', '支出收入金额');
        $objActSheet->setCellValue('D1', '支出收入时间');
        $objActSheet->setCellValue('E1', '经手人姓名');
        $objActSheet->setCellValue('F1', '备注');        
        // 设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

        foreach($data as $k=>$v){
            $k +=2; 
            // 表格内容
            $objActSheet->setCellValue('A'.$k, $v['club_name']);   
            $objActSheet->setCellValue('B'.$k, $v['in_out_type']); 
            $objActSheet->setCellValue('C'.$k, $v['in_out_money']);   
            $objActSheet->setCellValue('D'.$k, $v['in_out_time']);   
            $objActSheet->setCellValue('E'.$k, $v['stu_name']);
            $objActSheet->setCellValue('F'.$k, $v['remark']);                        
            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(50);
             
        }
         
        $fileName = '社团财务报表';
        $date = date("Y-m-d",time());
        $fileName .= "_{$date}.xls";
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        // END   
    }
    public function in_out(){
    	if(IS_POST){
   			$data=I('post.');
            if(!preg_match('/^[1-9]\d*$/', $data['time'])){
				$this->success('你输入的年份格式不正确，请重新输入。',U('in_out'),3);
				exit;
            }
			$row = M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->count();//支入
			$rows = M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->count();//支出
			if($row>0){
				if($rows>0){
					//支入的数据
					$in_January=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('January');
					$in_February=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('February');
					$in_March=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('March');
					$in_April=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('April');
					$in_May=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('May');
					$in_June=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('June');
					$in_July=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('July');		
					$in_August=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('August');	
					$in_September=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('September');	
					$in_October=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('October');
					$in_November=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('November');
					$in_December=M('in_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('December');
					$in_count =$in_January+$in_February+$in_March+$in_April+$in_May+$in_June+$in_July+$in_August+$in_September+$in_October+$in_November+$in_December;
					$this->assign('in_January',$in_January);
					$this->assign('in_February',$in_February);
					$this->assign('in_March',$in_March);
					$this->assign('in_April',$in_April);
					$this->assign('in_May',$in_May);
					$this->assign('in_June',$in_June);
					$this->assign('in_July',$in_July);
					$this->assign('in_August',$in_August);
					$this->assign('in_September',$in_September);
					$this->assign('in_October',$in_October);
					$this->assign('in_November',$in_November);
					$this->assign('in_December',$in_December);
					$this->assign('in_count',$in_count);//支入的总数
					//支出的数据
					$out_January=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('January');
					$out_February=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('February');
					$out_March=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('March');
					$out_April=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('April');
					$out_May=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('May');
					$out_June=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('June');
					$out_July=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('July');		
					$out_August=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('August');	
					$out_September=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('September');	
					$out_October=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('October');
					$out_November=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('November');
					$out_December=M('out_financial')->where(array('club_name'=>$data['club_name'],'time'=>$data['time']))->getField('December');
					$out_count =$out_January+$out_February+$out_March+$out_April+$out_May+$out_June+$out_July+$out_August+$out_September+$out_October+$out_November+$out_December;
					$this->assign('out_January',$out_January);
					$this->assign('out_February',$out_February);
					$this->assign('out_March',$out_March);
					$this->assign('out_April',$out_April);
					$this->assign('out_May',$out_May);
					$this->assign('out_June',$out_June);
					$this->assign('out_July',$out_July);
					$this->assign('out_August',$out_August);
					$this->assign('out_September',$out_September);
					$this->assign('out_October',$out_October);
					$this->assign('out_November',$out_November);
					$this->assign('out_December',$out_December);
					$this->assign('out_count',$out_count);//支出的总数
					$this->assign('time',$data['time']);
					$this->assign('club_name',$data['club_name']);
				}else{
					$this->success('该社团没有这个年份的支出财务统计，请重新查询。',U('in_out'),3);
					exit;
				}
			}else{
				$this->success('该社团没有这个年份的支入财务统计，请重新查询。',U('in_out'),3);
				exit;				
			}
		}

		//查看社团开始：
		$shenfen = session('shenfen');
		$stu_id = session('stu_id');//当前学生用户的id
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
		$role=M('role')->find($relation['role_id']);//对应的角色id
		if ($shenfen=='系统管理员'){
			//获取所有的社团名称
			$clublsit = M('club')->select();
			$this->assign('clublsit',$clublsit);
		}elseif ($shenfen =='学生用户'){
			if ($role['role_id']==2){
				$clublsit = M('club')->select();
				$this->assign('clublsit',$clublsit);			
			}elseif ($role['role_id']==3){
				$stu_name= M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
				$club_name = M('association_member')->where(array('member_name'=>$stu_name,'member_position'=>'社长'))->getField('member_club',true);//先取得用户所在的所有社团名称放进一维数组
				$tiaojian['club_name'] = array('IN',$club_name);
				$clublsit = M('club')->where($tiaojian)->select();
				$this->assign('clublsit',$clublsit);
			}
		}
    	$this->display();
    }
}

?>