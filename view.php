
<?php include_once("dbconnect.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/jquery.min.js"></script>
	<link rel="shortcut icon" href="https://s.ytimg.com/yts/img/favicon-vflz7uhzw.ico" type="image/x-icon">
	<style>
	#sign1{text-decoration:none;}
	body{background-image:url("classroom-1910014_1920.jpg");
		background-size:cover;}
		</style>

</head>
<body>



<div class="panel panel-default container">

<div class="panel-heading">

	<h1 style="text-align: center;">Attendance Mangement System</h1>

</div>


<div class="panel-body">

	<a href="#" class="btn btn-primary">View</a>
	<a href="add.php" class="btn btn-primary pull-right">Add</a>

<form method="post">
<table class="table">


<thead>

<tr>
	<th>Sr No.</th>
	<th>Date</th>
	<th>View</th>
</tr>


</thead>

			<?php

				$query="select distinct date(data) as adate from attendance ";
				$result=mysqli_query($conn,$query);

				if(mysqli_num_rows($result) > 0){
					$i=0;
					while ($val = mysqli_fetch_assoc($result)) {
						$i++;


			 ?>

<tr>

	<td><?php echo $i; ?></td>

	<td><?php echo $val['adate']; ?></td>

	<td><a href="viewp.php?date=<?php echo $val['adate'] ?>" class="btn btn-primary" >View </a></td>


</tr>
<?php } } ?>



</div>


<div class="panel-footer">


</div>


</div>

</body>
</html>
