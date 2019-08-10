<form method="GET">
<input type="hidden" name="eiei" value="clear">
<input type="submit" value="add queue"> 
</form>

<?php
	include "access.php";
	if($_GET['eiei']=="clear")
	{
	$cd=mysql_query("select * from student");
	
	//echo $cmd."ei";
	
	while($Stank=mysql_fetch_array($cd))
	{
		echo $Stank['name']."<br>";
		if($Stank['point']<=0)$i="q4";
		else if($Stank['point']<=20)$i="q3";
		else if($Stank['point']<=50)$i="q2";
		else if($Stank['point']<=70)$i="q1";
		else $i="q0";
		
		if($i!="q0")
		{
			$cmd="insert into queue(name,num,".$i.") values (' ".$Stank['name']." ',' ".$Stank['num']."',2)";
			if(mysql_query($cmd)==NULL)echo "kuy<br>";
		}
	}
	
	}
	$cmd=mysql_query("select * from queue");
	
	echo '<table class="table" border=3>
 		<tr>
    		<th>Name</th>
    		<th>num</th>
    		<th>q1</th>
    		<th>q2</th>
    		<th>q3</th>
    		<th>q4</th>
  		</tr>';
  	
	while($St=mysql_fetch_array($cmd))
	{
		echo "<tr>";
		echo "<td>".$St['name']."</td>";
		echo "<td>".$St['num']."</td>";
		echo "<td>".$St['q1']."</td>";
		echo "<td>".$St['q2']."</td>";
		echo "<td>".$St['q3']."</td>";
		echo "<td>".$St['q4']."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>
