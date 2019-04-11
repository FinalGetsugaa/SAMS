
<?php require 'dbconnect.php';

$sub=$_POST['sub']; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/jquery.min.js"></script>
	<link rel="shortcut icon" href="https://s.ytimg.com/yts/img/favicon-vflz7uhzw.ico" type="image/x-icon">


</head>
<body>



<div class="panel panel-default container">

<div class="panel-heading">

	<h1 style="text-align: center;">Attendance Mangement System</h1>

</div>


<div class="panel-body">

	<a href="view.php" class="btn btn-primary">View</a>
	<a href="add.php" class="btn btn-primary pull-right">Add</a>

<form method="post">
<table class="table">


<thead>

<tr>
	<th>Schno</th>
	<th>Student Name</th>
	
</tr>


</thead>



<tbody>


<?php

			$query="select x.schno,x.stuname from student x,studied y where x.schno=y.schno and y.scode in (select scode from subject where sname='$sub')";
			$result=mysqli_query($conn,$query);
			while($show=$result->fetch_assoc()){




 ?>

<tr>
	<td><?php echo $show['schno']; ?></td>
	<td><?php echo $show['stuname']; ?></td>
	
	<td>

		Present <input required type="radio" name="attendance[<?php echo $show['schno'] ?>]" value="Present">Absent <input required type="radio" name="attendance[<?php echo $show['schno']; ?>]" value="Absent" type="text">


	</td>
</tr>
<?php } ?>




</tbody>






</table>
<input class="btn btn-primary" type="submit" value="Take Attendance">
</form>


</div>


<div class="panel-footer">


</div>


</div>

</body>
</html>
