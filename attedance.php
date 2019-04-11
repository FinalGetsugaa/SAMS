<?php

require 'dbconnect.php';

$sub=$_POST['sub'];
$qry="select x.schno,x.stuname from student x,studied y where x.schno=y.schno and y.scode in (select scode from subject where sname='$sub')";
$res=mysqli_query($conn,$qry);
if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        echo $row["schno"].' '.$row["stuname"]."<br>";
    }
	
} else {
    echo "0 results";
}
?>