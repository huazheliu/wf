<?php
    $dir=dirname(__FILE__);           //找到当前脚本所在路径k'j
    require $dir."/Classes/PHPExcel.php";  //引入文件
    $objPHPExcel=new PHPExcel();           //实例化PHPEXcel类，相当于在桌面创建一个escel表格
    $objSheet=$objPHPExcel->getActiveSheet();//获得当前活动的sheet的对象
    $objSheet->setTitle("demo");
    $objSheet->setCellValue("A1","姓名")->setCellValue("B1","分数");  //给当前活动sheet填充数据
    $objSheet->setCellValue("A2","张三")->setCellValue("B2","50");
    $objSheet->setCellValue("A3","李四")->setCellValue("B3","60");
    $objSheet->setCellValue("A4","王五")->setCellValue("B4","70");
    $objSheet->setCellValue("A5","赵六")->setCellValue("B5","80");
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");//按照指定格式生成excel文件
    $objWriter->save($dir."/demo.xlsx");
?>
