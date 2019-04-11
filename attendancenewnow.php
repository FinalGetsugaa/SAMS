<?php require 'dbconnect.php';
session_start();
if(isset($_POST['submit'])){
$_SESSION['sub']=$_POST['sub'];}
$sub=$_SESSION['sub'];
 ?>
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



<form method="post" >
<table class="table">


<thead>

<tr>
	<th>Schno</th>
	<th>Student Name</th>

</tr>


</thead>



<tbody>


<?php
            //$s=$_SESSION['subname'];

				echo $sub;

			$query="select x.schno,x.stuname from student x,studied y where x.schno=y.schno and y.scode in (select scode from subject where sname='$sub')";

			$result=mysqli_query($conn,$query);


			while($show=$result->fetch_assoc()){




 ?>

<tr>
	<td><?php echo $show['schno']; ?></td>
	<td><?php echo $show['stuname']; ?></td>

	<td>

		Present <input type="radio" name="attendance[<?php echo $show['schno']; ?>]" value="Present">
		Absent <input type="radio" name="attendance[<?php echo $show['schno']; ?>]" value="Absent" >


	</td>
</tr>
<?php } ?>




</tbody>




<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
  $att=@$_POST['attendance'];
  $date=date('Y-m-d');
  echo $date;

  $query="select distinct date(data) as atdate  from attendance where f_k_id='$sub'";

  $result=mysqli_query($conn,$query);

  //$p=$_SESSION['subname'];
  //echo $p;


  $b=false;
  if(mysqli_num_rows($result) > 0){
  while($check = mysqli_fetch_assoc($result)){

    if($date==$check['atdate']){
    $b=true;
    echo "<div class='alert alert-danger'>

      Attendance already taken today!!!;

    </div>";
  }
  }
}


					if(!$b){
						if(is_array($att)){
							foreach ($att as $key => $value) {

								if($value=="Present"){

										$query="insert into attendance(schno,att_status,f_k_id) values('$key','Present','$sub')";
										$ir=mysqli_query($conn,$query);



								}
								else {

											$query="insert into attendance(schno,att_status,f_k_id) values('$key','Absent','$sub')";
										$ir=mysqli_query($conn,$query);





								}



							}
						}

							if(@$ir){
								echo "<div class='alert alert-success'>

						Attendance  taken successfully!!!;

					</div>";
							}
							else{
								echo mysqli_error($conn);
							}

					}






			}


 ?>

</table>


<input class="btn btn-primary" type="submit" name='take_attendence' value="Take Attendance">
</form>
<?php //unset($_SESSION['sub']) ?>

</div>


<div class="panel-footer">


</div>


</div>

</body>
</html>
