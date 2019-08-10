<html>
<?php
session_start();
if(!$_SESSION['log'])
header("Location:login.php");
include "head.php";

echo ' 
<body background="" bgproperties="fixed">
<?php echo mysql_query("show list status");?>

<div align="center" margin="center" class="form-inline">


<form method="get" action="Printer/print.php">
	ข้อมูลรายบุคคล
	<input type="text" name="stu_num" class="form-control" placeholder="เลขประจำตัวนักเรียน">
	<input type="submit" value="Download" class="btn btn-primary">
</form>
<br>
<form method="get" action="Printer/print_grade.php">
	ข้อมูลรายระดับชั้น
	<select name="grade" class="form-control">
		<option value="1"> ม.1 </option>
		<option value="2"> ม.2 </option>
		<option value="3"> ม.3 </option>
		<option value="4"> ม.4 </option>
		<option value="5"> ม.5 </option>
		<option value="6"> ม.6 </option>
	</select>
	<input type="submit" value="Download" class="btn btn-primary">
</form>
<br> 

<form method="get" action="Printer/print_all.php">
	ข้อมูลทั้งหมด 
	<input type="submit" value="Download ALL" class="btn btn-primary">
</form>



</div> ';

?>

</body>
</html>
