<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util;

class AssociationmemberController extends Controller{
	public function members_list(){
		$memberslist = M('association_member')->where(array('member_status'=>1,'member_club'=>'社团联合会'))->select();
		$this->assign('memberslist',$memberslist);
		$email =M('association_member')->where(array('member_status'=>1,'member_club'=>'社团联合会'))->getField('member_email',true);
		$this->assign('email',$email);
		$count = M('association_member')->where(array('member_status'=>1,'member_club'=>'社团联合会'))->count();
		$this->assign('count',$count);
		$this->display();
	}
	//添加成员
	public function members_add(){
		$membersadd=new \Home\Model\Association_memberModel();
		if(IS_POST){
			if ($membersadd->create()){
				$data=I('post.');
				$data['create_time']=date("Y-m-d",NOW_TIME);
				/*获取当前时间和月份 */
				$month =date('F');//月份
				$year=date('Y');//年份
				$row = M('student')->where(array('stu_number'=>$data['stu_number'],'stu_name'=>$data['member_name']))->count();
				if ($row>0){
			//上传文件
			//这是社联添加的默认通过审核为1     :0待审核，1通过审核，2未通过审核
			$data['member_status']=1;
			$data['member_club']='社团联合会';
			$count_member = M('count_member')->where(array('time'=>$year,'club_name'=>$data['member_club']))->getField($month);//月份下的人数总和,随时间变
			$count_member=$count_member+1;//增加结束
			$count[$month]=$count_member;//对应月份下


				if($_FILES['member_logos']['error']==0){//判断接收到的文件是否有错误
					$config=array(	
						'rootPath' =>  './Public/Uploads/member/'
					);//文件上传后的保存路径
					$upload= new \Think\Upload($config);//实例化上传文件类对象
					$info = $upload->uploadOne($_FILES['member_logos']);//取到上传后的文件的信息
					//要设置添加的字段和数据库的一样
					$data['member_logo']=$info['savepath'].$info['savename'];
		//根据成员信息来修改角色id操作-----------------------------------------------------------
					$stu_id = M('student')->where(array('stu_number'=>$data['stu_number']))->getField('stu_id');//先根据添加成员的学号查询学生数据库获取学生id
					//获取到关系表里的学生角色id
					$relation_id = M('relation')->where(array('stu_id'=>$stu_id))->getField('role_id');
					if ($relation_id==5){
						if ($data['member_position']=='社长'){
							$stu_id = M('student')->where(array('stu_number'=>$data['stu_number'],'stu_name'=>$data['member_name']))->getField('stu_id');
							$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
							$juese = array();
							$juese['relation_id']=$relation['relation_id'];
							$juese['role_id'] = 2;
							if ($membersadd->add($data)){
								M('count_member')->where(array('time'=>$year,'club_name'=>$data['member_club']))->save($count);	
								if ($relation['role_id']==$juese['role_id']){
									$this->success('添加成功。',U('members_list'),3);
									exit;
								}else{
									if (M('relation')->save($juese)){
										sendMail("317389036@qq.com","社团短信","恭喜你加入我们社团");
										$this->success('添加成功。',U('members_list'),3);
										exit;
									}else{
										$this->error('添加失败。');
										exit;
									}
								}
							}else{
								$this->error('添加失败');
								exit;
							}						
						}else{
							//当前成员的信息获取其id
							$stu_id = M('student')->where(array('stu_number'=>$data['stu_number'],'stu_name'=>$data['member_name']))->getField('stu_id');
							$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
							$juese = array();
							$juese['relation_id']=$relation['relation_id'];
							$juese['role_id'] = 4;
							if ($membersadd->add($data)){
								M('count_member')->where(array('time'=>$year,'club_name'=>$data['member_club']))->save($count);	
								if ($relation['role_id']==$juese['role_id']){
									sendMail2($data['member_email'],"社团联合会","恭喜你成功加入我们社团。");
									 $this->success('添加成功。',U('members_list'),3);
									 exit;
								}else{
									if (M('relation')->save($juese)){
										sendMail2($data['member_email'],"社团联合会","恭喜你成功加入我们社团。");
										 $this->success('添加成功。',U('members_list'),3);
										 exit;
									}else{
										$this->error('添加失败。');
										exit;
									}
								}
							}else{
								$this->error('添加失败。');
								exit;
							}
						}
					}
					else{
						if ($data['member_position']=='社长'){
							$stu_id = M('student')->where(array('stu_number'=>$data['stu_number'],'stu_name'=>$data['member_name']))->getField('stu_id');
							$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
							$juese = array();
							$juese['relation_id']=$relation['relation_id'];
							$juese['role_id'] = 2;
							if ($membersadd->add($data)){
								M('count_member')->where(array('time'=>$year,'club_name'=>$data['member_club']))->save($count);	
								if ($relation['role_id']==$juese['role_id']){
									sendMail2($data['member_email'],"社团联合会","恭喜你成功加入我们社团。");
									$this->success('添加成功。',U('members_list'),3);
									exit;
								}else{
									if (M('relation')->save($juese)){
										sendMail2($data['member_email'],"社团联合会","恭喜你成功加入我们社团。");
										$this->success('添加成功。',U('members_list'),3);
										exit;
									}else{
										$this->error('添加失败。');
										exit;
									}
								}
							}else{
								$this->error('添加失败');
								exit;
							}						
						}else{
							if ($membersadd->add($data)){
								M('count_member')->where(array('time'=>$year,'club_name'=>$data['member_club']))->save($count);
								sendMail2($data['member_email'],"社团联合会","恭喜你成功加入我们社团。");
								$this->success('添加成功。',U('members_list'),3);
								exit;
							}else{
								$this->error('添加成功。');
								exit;
							}
						}		
					}
				}else{
					$this->error($upload->getError());
				}
			}else{
				$this->error('没有这个学生，请重新核对信息。');
			}
			}else{
				$this->error($membersadd->getError());
			}
		}




		//取到二级学院的院系名称
		$facultylist =M('faculty')->getField('faculty_id,faculty_name');
		$this->assign('facultylist',$facultylist);

		//获取政治面貌的名称
		$politicslist =M('politics')->select();
		$this->assign('politicslist',$politicslist);
		

		$this->display();
	}
	//修改成员信息
	public function members_update($id){
		if (IS_POST){
			if ($data=M('association_member')->create()){
				$data['member_id']=$id;
				//上传头像
				if($_FILES['member_logos']['error']==0){//判断接收到的文件是否有错误
					$config=array(
						'exts'     =>array('jpg', 'gif', 'png', 'jpeg'),	
						'rootPath' =>  './Public/Uploads/member/'
					);//文件上传后的保存路径
					$upload= new \Think\Upload($config);//实例化上传文件类对象
					$info = $upload->uploadOne($_FILES['member_logos']);//取到上传后的文件的信息
					//要设置添加的字段和数据库的一样
					$data['member_logo']=$info['savepath'].$info['savename'];

					if (!$info){//如果上传有误：则返回错误信息
                    	 $this->error($upload->getError());
                	}else{
						if ($data['member_position']=='社长'){
						$member = M('association_member')->find($id);//当前成员的信息获取其id
						$stu_id = M('student')->where(array('stu_number'=>$member['stu_number']))->getField('stu_id');
						$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
						$juese = array();
						$juese['relation_id']=$relation['relation_id'];
						$juese['role_id'] = 2;
						if (M('association_member')->save($data)){
							if ($relation['role_id']==$juese['role_id']){
								$this->success('修改成功。',U('members_list'),3);
								exit;
							}else{
								if (M('relation')->save($juese)){
									$this->success('修改成功。',U('members_list'),3);
									exit;
								}else{
									$this->error('修改失败。');
									exit;
								}
							}
						}else{
							$this->error('修改失败');
							exit;
						}						
					}else{
						$member = M('association_member')->find($id);//当前成员的信息获取其id
						$stu_id = M('student')->where(array('stu_number'=>$member['stu_number']))->getField('stu_id');
						$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
						$juese = array();
						$juese['relation_id']=$relation['relation_id'];
						$juese['role_id'] = 4;
						if (M('association_member')->save($data)){
							if ($relation['role_id']==$juese['role_id']){
								$this->success('修改成功。',U('members_list'),3);
								exit;
							}else{
								if (M('relation')->save($juese)){
									$this->success('修改成功。',U('members_list'),3);
									exit;
								}else{
									$this->error('修改失败。');
									exit;
								}
							}
						}else{
							$this->error('修改失败。');
							exit;
						}
					}

                	}
				}else{
					if ($data['member_position']=='社长'){
						$member = M('association_member')->find($id);//当前成员的信息获取其id
						$stu_id = M('student')->where(array('stu_number'=>$member['stu_number']))->getField('stu_id');
						$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
						$juese = array();
						$juese['relation_id']=$relation['relation_id'];
						$juese['role_id'] = 2;
						if (M('association_member')->save($data)){
							if ($relation['role_id']==$juese['role_id']){
								$this->success('修改成功。',U('members_list'),3);
								exit;
							}else{
								if (M('relation')->save($juese)){
									$this->success('修改成功。',U('members_list'),3);
									exit;
								}else{
									$this->error('修改失败。');
									exit;
								}
							}
						}else{
							$this->error('修改失败');
							exit;
						}						
					}else{
						$member = M('association_member')->find($id);//当前成员的信息获取其id
						$stu_id = M('student')->where(array('stu_number'=>$member['stu_number']))->getField('stu_id');
						$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息
						$juese = array();
						$juese['relation_id']=$relation['relation_id'];
						$juese['role_id'] = 4;
						if (M('association_member')->save($data)){
							if ($relation['role_id']==$juese['role_id']){
								$this->success('修改成功。',U('members_list'),3);
								exit;
							}else{
								if (M('relation')->save($juese)){
									$this->success('修改成功。',U('members_list'),3);
									exit;
								}else{
									$this->error('修改失败。');
									exit;
								}
							}
						}else{
							$this->error('修改失败。');
							exit;
						}
					}
				}
			}
		}
		//取到二级学院的院系名称
		$facultylist =M('faculty')->select();
		$this->assign('facultylist',$facultylist);
			$arrays =array ('0'=>array('status'=>0,'name'=>'不可借'),'1'=>array('status'=>1,'name'=>'可借'));
		//取到部门的名称
		$departlist = array(
			'0'=>array('depart'=>'主席团'),
			'1'=>array('depart'=>'办公室'),
			'2'=>array('depart'=>'纪检部'),
			'3'=>array('depart'=>'学习部'),
			'4'=>array('depart'=>'新闻部'),
			'5'=>array('depart'=>'宣传部'),
			'6'=>array('depart'=>'心理部'),
			'7'=>array('depart'=>'网络部'),
			'8'=>array('depart'=>'文艺部'),												
			'9'=>array('depart'=>'体育部'),
			'10'=>array('depart'=>'财务部'),
			'11'=>array('depart'=>'组织部'),						
			);
		$this->assign('departlist',$departlist);
		//取到职位名称
		$positionlist = array(
			'0'=>array('position'=>'社长'),
			'1'=>array('position'=>'副社长'),
			'2'=>array('position'=>'部长'),
			'3'=>array('position'=>'副部长'),
			'4'=>array('position'=>'干事'),
			'5'=>array('position'=>'实习干事')
			);
		$this->assign('positionlist',$positionlist);

		//获取政治面貌的名称
		$politicslist =M('politics')->select();
		$this->assign('politicslist',$politicslist);

		//显示内容在修改页面
		$current = M('association_member')->find($id);
		$this->assign('current',$current);
		$this->display();
	}

	//删除成员
	public function  members_del($id){
		//先查到当前的学生信息的学号和姓名和学生表里的id
		$stu_number = M('association_member')->where(array('member_id'=>$id))->getField('stu_number');
		$member_name = M('association_member')->where(array('member_id'=>$id))->getField('member_name');
		$stu_id = M('student')->where(array('stu_number'=>$stu_number,'stu_name'=>$member_name))->getField('stu_id');
		$role_id =M('relation')->where(array('stu_id'=>$stu_id))->getField('role_id');
		$relation=M('relation')->where(array('stu_id'=>$stu_id))->find();//当前学生用户的关系信息

		if (M('association_member')->delete($id)){//先执行删除
			$row =M('association_member')->where(array('stu_number'=>$stu_number,'member_name'=>$member_name))->count();
			if ($row==0){//如果他没有任何社团任职了，那就变成普通用户了。
				$role = array();
				$role['relation_id']=$relation['relation_id'];
				$role['role_id']=5;
				if (M('relation')->save($role)){
					$this->success('删除成功',U('members_list'),3);					
				}else{
					$this->error('删除失败');					
				}
			}else{//就是还有的时候
				$club = M('association_member')->where(array('member_name'=>$member_name))->field('member_position')->select();
				$data=array();//取到删除后他在其他社团里的职位
				for($i=0;$i<count($club);$i++){
					$data[$i]=$club[$i]['member_position'];
				}
				$club_name =array();//取到删除后他的其他社团的名称
				for($i=0;$i<count($club);$i++){
					$club_name[$i]=$club[$i]['member_club'];
				}
				if($role_id==2){//如果你是社联社长
						if(in_array("社长",$data)){//如果在其他社团有社长职位则从2变成3
							$update['relation_id']=$relation['relation_id'];
							$update['role_id']=3;
							if(M('relation')->save($update)){
								$this->success('删除成功。',U('members_list'),3);
							}else{
								$this->error('删除失败');	
							}
						}else{//在其他社团没有社长的职位则就是社员，则从2变成4
							$update['relation_id']=$relation['relation_id'];
							$update['role_id']=4;
							if(M('relation')->save($update)){
								$this->success('删除成功。',U('members_list'),3);
							}else{
								$this->error('删除失败');	
							}							
						}					
				}else{
					$this->success('删除成功。',U('members_list'),3);
				}				
			}
		}else{
			echo "你是猪";
			$this->error('删除失败');
		}
	}

	//批量删除
	public function pl_del(){
		//第一种删除方式：
		// $data=$_POST['memeberarray'];
		// foreach ($data as $v) {//循环删除
		// 	$row=M('association_member')->delete($v);
		// }
		// if ($row){
		// 	echo "成功";
		// }
		// else{
		// 	echo "失败";
		// }
		
		//第二种方式:
		$data=$_POST['memeberarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('association_member')->delete($data_str)){
			$this->success('批量删除成功',U('members_list'),3);
		}else{
			$this->error('批量删除失败');
		}
	}

	public function look_down(){
    	
    	$id = I('get.id');
    	$where['member_id'] = $id;
        $data = M('association_member')->where(array('member_status'=>1,'member_club'=>'社团联合会'))->field('member_id,member_name,member_sex,member_phone,member_yuanxi,member_major,member_class,member_club,member_depart,member_position,member_logo,member_politics')->select();

         
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
         
        $objActSheet->setCellValue('A1', '学生姓名');
        $objActSheet->setCellValue('B1', '性别');
        $objActSheet->setCellValue('C1', '联系方式');
        $objActSheet->setCellValue('D1', '所属院系');
        $objActSheet->setCellValue('E1', '所在专业');
        $objActSheet->setCellValue('F1', '所在班级');
        $objActSheet->setCellValue('G1', '社团名称');
        $objActSheet->setCellValue('H1', '所在部门');
       $objActSheet->setCellValue('I1', '部门职位');        
       $objActSheet->setCellValue('J1', '头像');     
         $objActSheet->setCellValue('K1', '政治面貌');          
        // 设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
         $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);        
         $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25); 
         $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15); 
        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
         $objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);     
         $objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);  
         $objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);  
         $objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);  
         $objPHPExcel->getActiveSheet()->getStyle('K')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER); 
        foreach($data as $k=>$v){
            $k +=2;
             
            // 表格内容
            $objActSheet->setCellValue('A'.$k, $v['member_name']);   
            $objActSheet->setCellValue('B'.$k, $v['member_sex']); 
            $objActSheet->setCellValue('C'.$k, $v['member_phone']);   
            $objActSheet->setCellValue('D'.$k, $v['member_yuanxi']);   
            $objActSheet->setCellValue('E'.$k, $v['member_major']);
            $objActSheet->setCellValue('F'.$k, $v['member_class']);
            $objActSheet->setCellValue('G'.$k, $v['member_club']);
            $objActSheet->setCellValue('H'.$k, $v['member_depart']);
            $objActSheet->setCellValue('I'.$k, $v['member_position']);


            $img = M('association_member')->where('member_id = '.$v['member_id'])->field('member_logo')->find();
            // 图片生成
            $objDrawing[$k] = new \PHPExcel_Worksheet_Drawing();
            $objDrawing[$k]->setPath('./Public/Uploads/member/'.$img['member_logo']);
            // 设置宽度高度
            $objDrawing[$k]->setHeight(50);//照片高度
            $objDrawing[$k]->setWidth(50); //照片宽度
            /*设置图片要插入的单元格*/
            $objDrawing[$k]->setCoordinates('J'.$k);
            // 图片偏移距离
            $objDrawing[$k]->setOffsetX(12);
            $objDrawing[$k]->setOffsetY(12);
            $objDrawing[$k]->setWorksheet($objPHPExcel->getActiveSheet());


             $objActSheet->setCellValue('K'.$k, $v['member_politics']);                             
            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(50);
             
        }
         
        $fileName = '社团成员信息';
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

    //导入学生表
    public function studentImportExcel(){  
 	if(IS_POST){
        if (!empty ( $_FILES)){
            $upload = new \Think\Upload();                      // 实例化上传类
            $upload->maxSize   =     10485760 ;                 // 设置附件上传大小
            $upload->exts      =     array('xls','xlsx');       // 设置附件上传类型
            $upload->rootPath  = './Public/Excel/';             // 设置附件上传根目录
            $upload->autoSub   = false;                         // 将自动生成以photo后面加时间的形式文件夹，关闭
            // 上传文件
            $info   =   $upload->upload();                                   // 上传文件
            $exts   = $info['excel']['ext'];                                 // 获取文件后缀
            $filename = $upload->rootPath.$info['excel']['savename'];        // 生成文件路径名
 
            if(!$info) {                                                     // 上传错误提示错误信息
                $this->error($upload->getError());
            }else{                                                           // 上传成功
                import("Org.Util.PHPExcel");                                 // 导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
                $PHPExcel = new \PHPExcel();                                 // 创建PHPExcel对象，注意，不能少了\
                if ($exts == 'xls') {                                        // 如果excel文件后缀名为.xls，导入这个类
                    import("Org.Util.PHPExcel.Reader.Excel5");
                    $PHPReader = new \PHPExcel_Reader_Excel5();
                } else
                    if ($exts == 'xlsx') {
                        import("Org.Util.PHPExcel.Reader.Excel2007");
                        $PHPReader = new \PHPExcel_Reader_Excel2007();
                    }
 
                $PHPExcel = $PHPReader->load($filename);                     // 载入文件
                $currentSheet = $PHPExcel->getSheet(0);                      // 获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
                $allColumn = $currentSheet->getHighestColumn();              // 获取总列数
                $allRow = $currentSheet->getHighestRow();                    // 获取总行数
                for ($currentRow = 0; $currentRow <= $allRow; $currentRow ++) {// 循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
                    for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn ++) {// 从哪列开始，A表示第一列
                        $address = $currentColumn . $currentRow;             // 数据坐标
                        $ExlData[$currentRow][$currentColumn] = $currentSheet->getCell($address)->getValue();// 读取到的数据，保存到数组$arr中
                    }
                }
                // 读数组并写入数据库操作
                for($i = 2,$j=0;$i<sizeof($ExlData);$i++,$j++){
                    import("Org.Util.PHPExcel.Shared.Date");
                    // 获取excel A的文本 这里需要转成富文本  重要
                    $username =  $ExlData[$i]['C'];
                    if (is_object($username)) {
                         $username = $username->__toString();
                    }
                    $data[] = array(
                        'stu_number'=>$ExlData[$i]['A'],
                        'member_name'  =>$ExlData[$i]['B'],
                        'member_sex'  =>$ExlData[$i]['C'],
                         'member_phone'  =>$ExlData[$i]['D'],
                        'member_email'  =>$ExlData[$i]['E'],
                       'member_yuanxi'  =>$ExlData[$i]['F'],
                        'member_major'  =>$ExlData[$i]['G'],
                        'member_class'  =>$ExlData[$i]['H'],
                         'member_club'  =>$ExlData[$i]['I'],
                         'member_depart'  =>$ExlData[$i]['J'],
                         'member_position'  =>$ExlData[$i]['K'], 
                         'member_logo'  =>'', 
                         'member_politics'  =>$ExlData[$i]['M'], 
                        'apply_reason'  =>'',                                  
                          'member_status'  =>'1'                                    
                    );
                }
 
                $users = M('association_member');                                         // 生成数据库对象
                $result = $users->addAll($data);                             // 批量写入数据库 
                if ($result) {                                               // 验证
                    $this->success("导入成功", U('members_list'),3);// 跳转页面
                } else {
                    $this->error("导入失败。或表格格式错误");// 提示错误
                }
            }
        }else {
          $this->error('还没有导入文件。');
        }

        	}
        $this->display();
	}	
	public function email_send($id){

		if(IS_POST){
			$data=I('post.');
			if(in_array("", $_POST)){//用来判断POST中获取到的是否存在没输入的
	            $this->error('存在没有输入的项！');
	        }

			if(!sendMail2($data['email_adress'],$data['email_title'],$data['content'])) {
			       $this->success('发送成功！',U('members_list'),3);
					exit();
		    } else {
			       $this->error('发送失败');
				exit();
		    }
		}
		$current = M('association_member')->find($id);
		$this->assign('current',$current);
		$this->display();
	}
	//批量发送邮件
	public function email_pl(){
		$email =M('association_member')->where(array('member_status'=>1,'member_club'=>'社团联合会'))->getField('member_email',true);

		if(IS_POST){
			$data=I('post.');
			if(in_array("", $_POST)){//用来判断POST中获取到的是否存在没输入的
				$this->error('存在没有输入的项！');
			}
			if(!sendMail_pl($email,$data['email_title'],$data['content'])) {
				$this->success('发送成功！',U('members_list'),3);
				exit();
			} else {
				$this->error('发送失败');
				exit();
			}
		}
		$this->display();
	}
}

?>