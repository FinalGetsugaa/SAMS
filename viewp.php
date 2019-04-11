
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
	<th>Subject</th>
	<th>Strength</th>

</tr>


</thead>

			<?php

			if($_GET['date']){
				$date=$_GET['date'];

				$query="select f_k_id,count(*) from attendance where date(data)='$date' and att_status='Present' group by f_k_id";
				$result=mysqli_query($conn,$query);

				if(mysqli_num_rows($result) > 0){
					$i=0;
					while ($val = mysqli_fetch_assoc($result)) {
						$i++;


			 ?>

<tr>



	<td><?php echo $val['f_k_id']; ?></td>

	<td><?php echo $val['count(*)']; ?></td>






</tr>
<?php } } } ?>



</div>


<div class="panel-footer">


</div>


</div>

</body>
</html>
