<html>
<?php 
session_start(); 
if(isset($_SESSION['log']))
header("Location:add.php"); 
include "head.php";
?>

<link href="css/bootstrap.css" rel="stylesheet">

<body>
<div align="center" margin="center" class="form-inline">
<h3>...<br></h3>
<img src="kp.png" height="250">
<form method="post" action="" >
 <h3>ID<br></h3>
 <input class="form-control" type="text" name="id"><br>
 <h3>Password<br></h3>
 <input class="form-control" type="password" name="pw"><br><br>
 <button class="btn btn-primary btn-lg" type="submit"> Login </button>
</form>
</div>


<?php 
 include "func.php";
 include "access.php";
 $id=$_POST['id'];
 $pw=$_POST['pw'];
 if(checklog($id,$pw))
 {
   $_SESSION['log']=$id;
   header("Location:add.php"); 
 }
 else if($id!=null&&$pw!=null)
 {
   echo "<script type='text/javascript'>alert('Wrong ID or Password');</script>";
 }
?>
</body>
</html>