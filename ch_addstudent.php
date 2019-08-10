
<form method="GET">
<input type="text" name="number">
<input type="submit" value="add student"> 
</form>

<?php
	include "access.php";
	include "func.php";
	//$re=mysql_query("insert into student values ('eiei','A',100,999,0,'NULL')");	
	//if($re==NULL)echo $re." fail<br>";
			
	$max=$_GET['number'];
	$fine=mysql_num_rows(mysql_query("select * from student"));
	if($max!=NULL)
	{
		
		for($i=$fine+1;$i<=$max+$fine;$i++)
		{	
			$name="student".$i;
			$re=mysql_query("insert into student values ('$name','A',70,'$i',0,0)");	
		}
	}
	
	$cmd=mysql_query("select * from student");
	
	echo '<table class="table" border=3>
 		<tr>
    		<th>Name</th>
    		<th>Class</th>
    		<th>Point</th>
    		<th>Student No</th>
    		<th>Late</th>
			<th>#</th>
  		</tr>';
  	
	while($St=mysql_fetch_array($cmd))
	{
		echo "<tr>";
		echo "<td>".$St['name']."</td>";
		echo "<td>".$St['class']."</td>";
		echo "<td>".$St['point']."</td>";
		echo "<td>".$St['num']."</td>";
		echo "<td>".$St['late']."</td>";
		echo "<td> <a href='Edite.php?stu_num=".$St['num']." '>Edite </a></td>";
		echo "</tr>";
	}
	echo "</table>";
?>
