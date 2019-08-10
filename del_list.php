<?php

session_start(); 
if(!isset($_SESSION['log']))
header("Location:login.php"); 
include "access.php";

$ID=$_GET['id'];
$NUM=$_GET['stu_num'];
echo $ID." ".$NUM;
$command="delete from list where id='$ID'";
mysql_query($command);
$command="Location:view.php?stu_num=".$NUM;
header($command);
?>