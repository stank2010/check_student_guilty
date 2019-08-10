
<form method="GET">
<input type="hidden" name="set1" value="ok">
<input type="submit" value="reset list">
</form>

<form method="GET">
<input type="hidden" name="set2" value="ok">
<input type="submit" value="reset student">
</form>

<form method="GET">
<input type="hidden" name="set3" value="ok">
<input type="submit" value="reset queue">
</form>

<?php
include "access.php";

if($_GET['set1']=="ok")echo "list=".mysql_query("delete from list");
if($_GET['set2']=="ok")echo "student=".mysql_query("delete from student");
if($_GET['set3']=="ok")echo "queue=".mysql_query("delete from queue");
?>
