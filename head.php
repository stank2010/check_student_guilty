
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620" /> 
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<nav class="navbar navbar-default"> 
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li><img align="left" src="kp.png"  style="width:40px;height:60px;"> </li>
<li><a class="btn btn-primary" href="add.php" role="button"   style="width:100px;height:60px;overflow-x:auto" textcolor="FFFFFF"> Add  </a></li>
<li><a class="btn btn-default" href="list.php" role="button"  style="width:100px;height:60px;"> List </a></li>
<li><a class="btn btn-default" href="search.php" role="button"style="width:100px;height:60px;" >Search </a></li> 
<li><a class="btn btn-default" href="printer.php" role="button"  style="width:100px;height:60px;"> Print </a></li>
<li><a class="btn btn-default" href="data.pdf" role="button"  style="width:100px;height:60px;"> Data </a></li>
<!-- <li><a class="btn btn-default" href="Inqueue.php" role="button"  style="width:100px;height:60px;"> Queue </a></li> -->

</ul>

<?php session_start(); if($_SESSION['log']!=NULL){?> 
	<ul class="nav navbar-nav navbar-right">
	<li><a class="btn btn-default" href="reset_all.php" role="button"  style="width:100px;height:60px;"> reset </a></li>
	<li><a class="btn btn-danger" href="logout.php"  role="button" style="width:100px;height:60px;" >Logout</a></li>
<?php } ?>

</div> 
</nav>
</head>

