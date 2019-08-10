<html>
<?php 
session_start(); 
if(!isset($_SESSION['log']))
header("Location:login.php"); 
include "head.php";
include "access.php";
$re=mysql_query("select * from list order by id desc");
?>
<table class="table">
  <tr>
    <th>Date</th>
    <!-- <th>Time</th> -->
    <th>Student No.</th>
    <th>Type</th>
    <th>Point</th>
    <th>หมายเหตุ</th>
    <th></th>
  </tr>

<?php 
while($st=mysql_fetch_array($re))
{ 
  echo "<tr>";
  echo "<td>".$st['date']."</td>";
  //echo "<td>".$st['time']."</td>";
  echo "<td>".$st['num']."</td>";
  echo "<td>".$st['type']."</td>";
  echo "<td>".$st['point']."</td>";
  echo "<td>".$st['ref']."</td>";
  
  echo "<td><a class='btn btn-primary' target='_blank' href='view.php?stu_num=".$st['num']."' >view</a></td>";
  echo "</tr>";	
} 
?>

</table>
</html>
