<?php
include "../access.php";
include "print_func.php";
require_once '/PHPWord.php';
date_default_timezone_set("Asia/Bangkok");

$NUM=$_GET['grade'];
$PHPWord = new PHPWord();
$section = $PHPWord->createSection();

$re=mysql_query("select * from student");
while($st=mysql_fetch_array($re))
	if($st['class'][0]==$NUM)
	{
		$section->addText(" ");
		make($st['num']);
	}
	
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('grade.docx');

$filename = $_GET['grade.docx'];

$path="grade.docx";  
$name="grade.docx";  
    if (file_exists($path)) {  
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
?>