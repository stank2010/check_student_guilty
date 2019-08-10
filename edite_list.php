<link href="css/bootstrap.css" rel="stylesheet">

<?php

session_start(); 
if(!isset($_SESSION['log']))
header("Location:login.php"); 
include "access.php";

$ID=$_GET['id'];

//mysql_query("select * from student");
$re=mysql_query("select * from list");
while($st=mysql_fetch_array($re))
	if($ID==$st['id'])break;


function Update($val,$col)
{
	global $ID;
	if($val!=NULL)
	{
		$command="UPDATE list SET ".$col."='$val' WHERE id='$ID' ";
		mysql_query($command);
	}
}

Update($_POST['date'],'date');
Update($_POST['num'],'num');
Update($_POST['point'],'point');
Update($_POST['ref'],'ref');

?>

<form method="post" align="center" class="form-inline">
วันเดือนปี <br>
<input type="text" name="date"  class="form-control" value=<?php echo $st['date']." "; ?>><br>
เลขประจำตัวนักเรียน<br>
<input type="text" name="num" class="form-control" value=<?php echo $st['num']." "; ?> ><br>
คะแนนที่ถูกหัก <br>
<input type="text" name="point" class="form-control" value=<?php echo $st['point']." "; ?> ><br>
รายละเอียด <br>
<input type="text" name="ref" class="form-control" value=<?php echo $st['ref']." "; ?> ><br>

<input type="submit" value="แก้ไข" class="btn btn-primary">
</form>