<html>
<?php
session_start();
if(!$_SESSION['log'])
header("Location:login.php");
include "head.php";
include "access.php";
include "func.php";

echo ' 
<body background="" bgproperties="fixed">
<?php echo mysql_query("show list status");?>

<div align="center" margin="center" class="form-inline">
<form method="post" action="newstudent.php">

วันที่<br>
<input class="form-control" type="text" name="date"  placeholder="วันที่/เดือน/ปี"><br><br>

รหัสนักเรียน<br>
<input class="form-control" type="text" name="num" ><br><br>

รหัสความผิด<br>
<input class="form-control" type="text" name="type"  placeholder=""><br><br>

รายละเอียด<br>
<input class="form-control" type="text" name="reff"  placeholder=""><br><br>

<input class="btn btn-default" type="submit" value="OK">
</form>
</div> ';

?>

</body>
</html>
