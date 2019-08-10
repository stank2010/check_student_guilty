<?php
include "access.php";
$re=mysql_query("select * from queue");
$num=$_GET['stu_num'];
$doing=$_GET['doing'];
$command="UPDATE queue SET ".$doing."=1 WHERE num='$num' ";
$re=mysql_query($command);
if($re==NULL)echo "fail!!";
else header("Location:Inqueue.php?queue=".$doing); 
?>
