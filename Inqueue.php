<html>
<?php 
session_start(); 
if(!isset($_SESSION['log']))
header("Location:login.php"); 
include "head.php"; 
include "access.php";
?>

<form align="center" method="GET" class="form-inline">
	<select name="queue" class="form-control" >
		<option value="q0">  - </option>
		<option value="q1"> เชิญผู้ปกครอง </option>
		<option value="q2"> ทำทัณฑ์บนครั้งที่ 1 </option>
		<option value="q3"> ทำทัณฑ์บนครั้งที่ 2 </option>
		<option value="q4"> พิจารณาเป็นกรณีพิเศษ </option>
	</select>
	<input type="submit" value="see" class="btn btn-primary">
</form>

<?php 

$re=mysql_query("select * from queue order by num");

$i=$_GET['queue'];
//echo "eiei".$i;
if($i!=NULL&&$i!="q0")
{
	echo '
		<table class="table">
  		<tr>
			<th>#</th>
    		<th>Name</th>
    		<th>Student No.</th>
			<th></th>
  		</tr>'; 
	$j=1;
	while($st=mysql_fetch_array($re))
	if($st[$i]!=0)
	{
		echo "<tr"; if($st[$i]==1)echo " class='success' >"; else echo ">";
		echo "<td><h4>".$j++."</h4></td>";
		echo "<td>".$st['name']."</td>";
		echo "<td>".$st['num']."</td>";
		echo "<td><a class='btn btn-primary' href='Doing.php?stu_num=".$st['num']."&doing=".$i." '> Do </a>&nbsp"; 
		echo "<a class='btn btn-primary' href='view.php?stu_num=".$st['num']." '> View </a></td>";
		echo "</tr>";
	}
}

?>

</html>
