<?php

// Create connection
$con=mysqli_connect('setapproject.org','csc412','csc412','student_csc412');


// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM sahithi1");

while($row = mysqli_fetch_array($result)) {
  echo $row['name'] . " " . $row['age'];
  echo "<br>";
}


mysqli_close($con);
?>


