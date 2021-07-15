<?php
    function array_merge_arr($arr1,$arr2){
        $arr = array();
        foreach($arr1 as $k=>$r){
            $arr[] = array_merge($r,$arr2[$k]);
        }
        return $arr;
    }
    function digui($data,$pat_id=0){
        foreach($data as $k=>$v){
            if($v['pid']==$pat_id){
                foreach ($data as $key => $val){
                    if($val['pid']==$v['id']){
                        $v['children'][]=$val;
                    }
                }
            }
        }
        return $v;
    }
    function merge($arr,$attr){
        $arr1=array();
        foreach($arr as $k=>$v){
          $arr1[]=$v[$attr];
        }
        return $arr1;
    }
    function getExcel($fileName,$headArr,$data){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
            import("Org.Util.PHPExcel");
            import("Org.Util.PHPExcel.Writer.Excel5");
            import("Org.Util.PHPExcel.IOFactory.php");
            //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("数据不能为空，请勾选你要导出的数据！");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";

            //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }

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
        exit;
    }
    function page($count,$listpage,$rollpage){
        $Page      =new \Think\Page($count,$listpage);//总记录数和每页显示的记录数
        /*修饰页码的样式*/
       $Page->lastSuffix=true;//最后一页是否显示总页数
       $Page->rollPage=$rollpage;//页面显示多少页
       $Page->setConfig('header','条记录');
       $Page->setConfig('first','[首页]');
       $Page->setConfig('prev','[上一页]');
       $Page->setConfig('next','[下一页]');
       $Page->setConfig('last','[末页]');
       return $Page;
    }
    function month(){
       $m=date('m');//找到当前月
        switch ($m) {
            case '1':  $m='january';break;
            case '2':  $m='february';break;
            case '3':  $m='march';break;
            case '4':  $m='april';break;
            case '5':  $m='may';break;
            case '6':  $m='june';break;
            case '7':  $m='july';break;
            case '8':  $m='august';break;
            case '9':  $m='september';break;
            case '10': $m='october';break;
            case '11': $m='november';break;
            case '12': $m='december';break;
            default:
                $m='january';
                break;
        }
        return $m;
    }
    /**
     * 下载文件
     * @param string $file
     *               被下载文件的路径
     * @param string $name
     *               用户看到的文件名
     */
    function download($file,$name=''){
        $fileName = $name ? $name : pathinfo($file,PATHINFO_FILENAME);
        $filePath = realpath($file);  //规范化路径

        $fp = fopen($filePath,'rb');

        if(!$filePath || !$fp){
            header('HTTP/1.1 404 Not Found');
            echo "Error: 404 Not Found.(server file path error)<!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding -->";
            echo $filePath;
            echo $fp;
            exit;
        }

        $fileName = $fileName .'.'. pathinfo($filePath,PATHINFO_EXTENSION);
        $encoded_filename = urlencode($fileName);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);
        //$file_path = iconv('UTF-8', 'gb2312', $filename);
        header('HTTP/1.1 200 OK');
        header( "Pragma: public" );
        header( "Expires: 0" );
        header("Content-type: application/octet-stream");
        header("Content-Length: ".filesize($filePath));
        header("Accept-Ranges: bytes");
        header("Accept-Length: ".filesize($filePath));

        $ua = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/MSIE/", $ua)) {
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        } else if (preg_match("/Firefox/", $ua)) {
            header('Content-Disposition: attachment; filename*="utf8\'\'' . $fileName . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        }

        ob_end_clean();// <--有些情况可能需要调用此函数
        // 输出文件内容
        fpassthru($fp);
        exit;
    }
