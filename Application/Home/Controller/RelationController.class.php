<?php
namespace Home\Controller;
use Think\Controller;

class RelationController extends Controller{
	public function relation_list(){
		//连接学生表、角色表、关系表
	$relationlist=M('student')->join( 'tp_relation ON tp_student.stu_id = tp_relation.stu_id')->join('tp_role ON tp_relation.role_id=tp_role.role_id')->select();
	$this->assign('relationlist',$relationlist);
	$count = M('student')->join('tp_relation ON tp_student.stu_id = tp_relation.stu_id')->join('tp_role ON tp_relation.role_id=tp_role.role_id')->count();
	$this->assign('count',$count);
		$this->display();

	}
	//角色的修改
	public function relation_update($stu_id){
		if(IS_POST){
			//根据当前学生的id先找到当前学生用户对应在关系表相对应的关系id
			$relation_id = M('relation')->where(array('stu_id'=>$stu_id))->getField('relation_id');
			$data=I('post.');
			//根据上查询到的关系id作为主键修改相对应的学生关系
			$data['relation_id']=$relation_id;
			//然后修改关系表的角色
			if (M('relation')->save($data)){
				$this->success('角色修改成功。',U('relation_list'),3);
				exit;
			}else{
				$this->success('角色修改失败。',U('relation_list'),3);
				exit;
			}
		}
		//根据当前用户的学生id来查询关系表里对应的关系信息
		$current = M('relation')->where(array('stu_id'=>$stu_id))->find();
		$this->assign('current',$current);
		//角色的类别
		$role = M('role')->select();
		$this->assign('role',$role);
		//当前学生的姓名
		$stu_name = M('student')->where(array('stu_id'=>$stu_id))->getField('stu_name');
		$this->assign('stu_name',$stu_name);
		$this->display();
	}
	//添加用户和角色
	public function relation_add(){
		if (IS_POST){
			$data=I('post.');
			//查询学生表有没有这个学生
			$row = M('student')->where(array('stu_name'=>$data['stu_name']))->find();
			if ($row){
				//查询关系表里存在不存在这个学生，如果存在则不能重复添加
				$rows =M('relation')->where(array('stu_id'=>$row['stu_id']))->find();
				if ($rows){
					$this->error('该学生用户已存在，请不要重复添加。');
				}else{
					$data['stu_id']=$row['stu_id'];//学生的id
					if (M('relation')->add($data)){
						$this->success('添加用户和角色成功',U('relation_list'),3);
						exit;
					}else{
						$this->error('添加用户和角色失败。');
					}
				}
			}else{
				$this->error('没有您填写的学生，请重新检查');
			}
		}
		//角色的类别
		$role = M('role')->select();
		$this->assign('role',$role);
		$this->display();
	}
	//删除用户角色
	public function relation_del($stu_id){
		//查找当前学生id对应在关系表里面的关系id，根据这个关系id来删除。
		$realtion_id=M('relation')->where(array('stu_id'=>$stu_id))->getField('relation_id');
		if (M('relation')->delete($realtion_id)){
			$this->success('删除成功',U('relation_list'),3);
		}else{
			$this->error('删除失败');
		}
	}
	//批量删除
		public function relation_pldel(){
		$data=$_POST['relationarray'];//获取表单的memeberarray数组
		$data_str =join(',',$data);//把数组以','为分割线连接成字符串
		if(M('auth')->delete($data_str)){
			$this->success('批量删除成功',U('authlist'),3);
		}else{
			$this->error('批量删除失败');
		}
	}
	//导入Excel
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
                        'stu_id'=>$ExlData[$i]['A'],
                        'role_id'  =>$ExlData[$i]['B']
                    );
                }
 
                $users = M('relation');                                         // 生成数据库对象
                $result = $users->addAll($data);                             // 批量写入数据库 
                if ($result) {                                               // 验证
                    $this->success("导入成功", U('relation_list'),3);// 跳转页面
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



}

?>