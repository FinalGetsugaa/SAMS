
<?php include_once("dbconnect.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/jquery.min.js"></script>
	<style>
	#sign1{text-decoration:none;}
	body{background-image:url("classroom-2787754_1920.jpg");
		background-size:cover;}
		</style>

</head>
<body>



<div class="panel panel-default container">

<div class="panel-heading">

	<h1 style="text-align: center;">Attendance Mangement System</h1>

</div>


<div class="panel-body">

<?php

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$name=$_POST['name'];
				$fname=$_POST['fname'];
				$email=$_POST['email'];

				if($name=="" || $fname==""|| $email==""){
					echo "<div class='alert alert-danger'>

						Fields must not be empty;

					</div>";
				}



				else{
				$query="insert into subject values('$name','$fname','$email')";
				$result = mysqli_query($conn, $query);
				if($result){
					echo "<div class='alert alert-success'>

						Data inserted successfully;

					</div>";

			}
		}
				}

 ?>

	<form method="post">
	<a href="#" class="btn btn-primary">View</a>
	<a href="index.php" class="btn btn-primary pull-right">Back</a>


	<div class="form-group">
	<label for="name">Subject Code:</label>
	<input type="text" name="name" class="form-control">


	</div>

<div class="form-group">
	<label for="name">Subject Name</label>
	<input type="text" name="fname" class="form-control">


	</div>

<div class="form-group">
	<label for="name">Teacher Id</label>
	<input type="number" name="email" class="form-control">


	</div>

	<input type="submit" class="btn btn-primary">
</form>

</div>


<div class="panel-footer">


</div>


</div>

</body>
</html>
