<?php
    date_default_timezone_set("Asia/Shanghai");
    $dir=dirname(__FILE__);
    require $dir."/db.php";
    require $dir."/Classes/PHPExcel.php";
    $db=new db($phpexcel);//实例化db类，链接数据库
    $objPHPExcel=new PHPExcel();//实例化PHPExcel类，等同于在桌面上新建一个excel表格
    $objSheet=$objPHPExcel->getActiveSheet();//获得当前活动的sheet的对象
    $objSheet->setTitle("test");
    $data=$db->getData();//查询数据

    //居中显示

	$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	//宽高自适应

	$objPHPExcel->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('F')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('G')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('I')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('J')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('K')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('L')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('M')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('N')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('O')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('P')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('Q')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('R')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('S')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('T')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('U')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('V')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	$objPHPExcel->getActiveSheet()->getStyle('W')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    //

	$objSheet->getColumnDimension('C')->setAutoSize(true);
	$objSheet->getColumnDimension('D')->setAutoSize(true);
	$objSheet->getColumnDimension('F')->setAutoSize(true);
	$objSheet->getColumnDimension('G')->setAutoSize(true);
	$objSheet->getColumnDimension('H')->setAutoSize(true);
	$objSheet->getColumnDimension('I')->setAutoSize(true);
	$objSheet->getColumnDimension('J')->setAutoSize(true);
	$objSheet->getColumnDimension('K')->setAutoSize(true);
	$objSheet->getColumnDimension('L')->setAutoSize(true);
	$objSheet->getColumnDimension('M')->setAutoSize(true);
	$objSheet->getColumnDimension('N')->setAutoSize(true);
	$objSheet->getColumnDimension('O')->setAutoSize(true);
	$objSheet->getColumnDimension('P')->setAutoSize(true);
	$objSheet->getColumnDimension('Q')->setAutoSize(true);
	$objSheet->getColumnDimension('R')->setAutoSize(true);
	$objSheet->getColumnDimension('S')->setAutoSize(true);
	$objSheet->getColumnDimension('T')->setAutoSize(true);
	$objSheet->getColumnDimension('U')->setAutoSize(true);
	$objSheet->getColumnDimension('V')->setAutoSize(true);
	$objSheet->getColumnDimension('W')->setAutoSize(true);
	

	$objSheet->setCellValue("A1","姓名")->setCellValue("B1","性别")->setCellValue("C1","年龄")->setCellValue("D1","QQ")->setCellValue("E1","学号")->setCellValue("F1","学院")->setCellValue("G1","学校")->setCellValue("H1","生源地")->setCellValue("I1","联系方式")->setCellValue("J1","紧急联系人电话")->setCellValue("K1","来访媒介")->setCellValue("L1","愿意程度")->setCellValue("M1","紧急程度")->setCellValue("N1","是否接受过心理咨询")->setCellValue("O1","是否服用过精神药物")->setCellValue("P1","想预约的咨询师")->setCellValue("Q1","想回避的咨询师")->setCellValue("R1","预约地点")->setCellValue("S1","方便的咨询时间")->setCellValue("T1","来访目的")->setCellValue("U1","自我评价")->setCellValue("V1","填表日期")->setCellValue("W1","填表时间");

    $j=2;

    foreach($data as $key=>$val){
        $objSheet->setCellValue("A".$j,$val['name'])->setCellValue("B".$j,$val['sex'])->setCellValue("C".$j,$val['age'])->setCellValue("D".$j,$val['qq'])->setCellValue("E".$j,$val['num'])->setCellValue("F".$j,$val['colloge'])->setCellValue("G".$j,$val['school'])->setCellValue("H".$j,$val['address'])->setCellValue("I".$j,$val['consn'])->setCellValue("J".$j,$val['emconsn'])->setCellValue("K".$j,$val['medium'])->setCellValue("L".$j,$val['self'])->setCellValue("M".$j,$val['degree'])->setCellValue("N".$j,$val['consult'])->setCellValue("O".$j,$val['meidicinal'])->setCellValue("P".$j,$val['want'])->setCellValue("Q".$j,$val['avoids'])->setCellValue("R".$j,$val['place'])->setCellValue("S".$j,$val['time'])->setCellValue("T".$j,$val['aim'])->setCellValue("U".$j,$val['evaluation'])->setCellValue("V".$j,$val['date'])->setCellValue("W".$j,$val['times']);
        $j++;
    }

    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
    //$objWriter->save($dir."/test.xlsx");

    browser_export('Excel2007','预约统计.xlsx');
    $objWriter->save("php://output");

    function browser_export($type,$filename){
        if($type=="Excel5"){
            header('Content-Type: application/vnd.ms-excel');
        } else{
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        }
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
    }
