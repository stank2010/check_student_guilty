<link href="css/bootstrap.css" rel="stylesheet">

<?php

session_start(); 
if(!isset($_SESSION['log']))
header("Location:login.php"); 
include "access.php";
$NUM=$_GET['stu_num'];

//mysql_query("select * from student");
$re=mysql_query("select * from student");
while($st=mysql_fetch_array($re))
	if($NUM==$st['num'])break;

function Update($val,$col)
{
	global $NUM;
	if($val!=NULL)
	{
		$command="UPDATE student SET ".$col."='$val' WHERE num='$NUM' ";
		mysql_query($command);
	}
}

Update($_POST['name'],'name');
Update($_POST['class'],'class');

$Num=$_POST['num'];
if($Num!=NULL)
{
	$command="UPDATE student SET num='$Num' WHERE num='$NUM' ";
	mysql_query($command);
	header("Location:Edite.php?stu_num=$Num");
}


?>

<form method="post" align="center" class="form-inline">
ชื่อ <br>
<input type="text" name="name"  class="form-control" value=<?php echo $st['name']." " ?>><br>
ชั้น<br>
<input type="text" name="class" class="form-control" value=<?php echo $st['class']." " ?> ><br>
เลขประจำตัวนักเรียน <br>
<input type="text" name="num" class="form-control" value=<?php echo $st['num']." " ?> ><br>
<input type="submit" value="แก้ไข" class="btn btn-primary">
</form>