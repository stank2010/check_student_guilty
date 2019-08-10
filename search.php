<html>
<?php
session_start();
//if(!$_SESSION['log'])header("Location:login.php");
include "head.php";
include "access.php";
?>

<body>
<form method="get">
<div class="input-group input-group">
  <span class="input-group-addon" id="sizing-addon1">Search</span>
  <input name="find" type="text" class="form-control" placeholder="Name, student No. ,class" aria-describedby="sizing-addon1">
</div>
</form>

<?php 
$find=$_GET['find'];
$re=mysql_query("select * from student");


echo "
<table class='table'>
  <tr>
    <th>Name</th>
    <th>Class</th>
    <th>Student No.</th>;
    <th></th>
  </tr>
";

while($st=mysql_fetch_array($re))
{
  if((stripos($st['name'],$find)==0 && $find!=$st['class'] && $find!=$st['num'])&&$find!=NULL)continue;
  echo "<tr>";
  echo "<td>".$st['name']."</td>";
  echo "<td>".$st['class']."</td>";
  echo "<td>".$st['num']."</td>";
  echo "<td><a class='btn btn-primary' target='_blank' href='view.php?stu_num=".$st['num']."' >view</a></td>";
  echo "</tr>";	
}
?>
</table>

</body>
<html>
