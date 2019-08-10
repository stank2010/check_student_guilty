<html>
<?php
session_start();
if(!$_SESSION['log'])
header("Location:login.php");

include "head.php";
include "access.php";
include "func.php";

$reff=htmlspecialchars($_POST['reff']);
$type=$_POST['type'];
$stnum=$_POST['num'];

if($type!=NULL && $stnum!=NULL)
{	
	$ch=add($_POST['date'],$stnum,$type,$reff);
	
	if($ch==0)
		header("Location:add.php");
		
}
else header("Location:add.php");

//add to db

echo '
<body background="" bgproperties="fixed">
<?php echo mysql_query("show list status");?>

<div align="center" margin="center" class="form-inline">
<form method="post" enctype="multipart/form-data">

<br><br><h2 >Add New Student</h2><br>

Name<br><input class="form-control" type="text" name="name"><br>

Class<br><input class="form-control" type="text" name="class"><br><br>

Student No.<br><input class="form-control" type="text" name="num" value='.$stnum.'><br><br>

<!--Upload Picture<br>
<input class="btn btn-default" type="file" name="kuy"><br> -->

<input type="hidden" name="ty" value='.$type.'>
<input type="hidden" name="ref" value="'.$reff.'">
<input type="hidden" name="datedate" value="'.$_POST['date'].'">
<input class="btn btn-default" type="submit" value="Add New Student">
</form>
</div>  ';

	$name=" ".$_POST['name'];
	$class=$_POST['class'];
	$stnum=$_POST['num'];
	
	if($name!=NULL && $class!=NULL && $stnum!=NULL)
	{	
		date_default_timezone_set("Asia/Bangkok");
		$DATE=$_POST['datedate'];//date("d/m/Y");
		$TIME;//=date("h:i:s a");
		$id=mysql_num_rows(mysql_query("SELECT * FROM list"))+1;
		$point=Pcode($_POST['ty']);
		
		$callpic =fopen($_FILES['kuy']['tmp_name'],"r");
		$readB =  fread($callpic,filesize($_FILES['kuy']['tmp_name']));
		//$image=addslashes($readB);
		
		$reff=$_POST['ref'];
		$type=$_POST['ty'];
		
		$POINT=Pcode($type);
		
		$re=mysql_query("insert into student values ('$name','$class','$POINT','$stnum',0,'$image')");	
		
		echo "<script type='text/javascript'>alert('$re');</script>";

		$re=mysql_query("insert into list values ('$id','$DATE','$TIME','$stnum','$point','$type','$reff')");		
		
		//Q($name,$stnum,$POINT);
	}
?>

</body>
</html>
