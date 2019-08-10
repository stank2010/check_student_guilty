<?php
include "../access.php";
include "print_func.php";
require_once '/PHPWord.php';
date_default_timezone_set("Asia/Bangkok");

$NUM=$_GET['stu_num'];
$PHPWord = new PHPWord();
$section = $PHPWord->createSection();
$check=make($NUM);

// Save File

if($check)
{
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save("$NUM.docx");
$path="$NUM.docx";  
$name="$NUM.docx";  
    if (file_exists($path)) 
	{  
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.urldecode($name)); //ตรงนี้ก็ใส่ชื่อไฟล์ตามข้างบนไป
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($path)); 
        ob_clean();
        flush();
        readfile($path); 
       
    }
}
else 
{
	echo '<script> alert("ไม่มีเลขบัตรนักเรียนในฐานข้อมูล");</script> ';
	header("Location:../printer.php");    
}	
?>