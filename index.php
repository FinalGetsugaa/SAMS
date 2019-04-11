<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
	unset($_SESSION['sub']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <style>
  #sign1{text-decoration:none;}
  body{background-image:url("classroom-1910014_1920.jpg");
    background-size:cover;}
  </style>
</head>
<body>

<div class="header">
	<h2>ATTENDANCE MANAGEMENT SYSTEM</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])&&$_SESSION['username']!='admin') : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<br>
		 Click below to select subject:<br>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "vivek";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$tn=$_SESSION['username'];
$sql = "select s.sname from subject s,teacher t where s.tid=t.tid and t.tname='$tn' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	echo '<form action="attendancenewnow.php" method="POST">';
    while($row = mysqli_fetch_assoc($result)) {
		$sub=$row["sname"];
		 echo '<input type="radio" name="sub" value="'.$sub.'" > '.$sub.'<br>';

    }
	echo '<input type="submit" class="btn" name="submit">';
} else {
    echo "0 results";
}



?>

    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
	 <?php  if (isset($_SESSION['username'])&&$_SESSION['username']=='admin') : ?>
	 <p>ADMIN PANEL <br>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	 <a href="view.php" class="btn btn-primary">View Status</a>
	 <a href="add.php" class="btn btn-primary pull-right">Add</a>
	 <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
	  <?php endif ?>

</div>

</body>
</html>
