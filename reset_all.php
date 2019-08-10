<?php
session_start();
if(!$_SESSION['log'])
header("Location:login.php");
include "head.php";
include "access.php";
echo '
<div align="center" margin="center" class="form-inline">
<form method="get">
	<input type="submit" value="Reset" class="btn btn-danger">
	<input type="hidden" value="ok" name="reset">
	</form>
';

if($_GET['reset']=="ok")
{
	echo "list=".mysql_query("delete from list")."<br>";
	echo "student=".mysql_query("delete from student")."</div>";
}
?>