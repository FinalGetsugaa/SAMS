<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "pdemo";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "select s.sname from subject s,teacher t where s.tid=t.tid and t.tname='jtc' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	<form action="sub_button.php" method="POST">
    while($row = mysqli_fetch_assoc($result)) {
        $sub=$row["sname"];

		<input type="submit" value="$sub" name="$sub"><br>
    }
	</form>
} else {
    echo "0 results";
}
?>
</body>
</html>