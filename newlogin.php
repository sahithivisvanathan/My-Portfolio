<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Thank you!</title>
        <link rel="stylesheet" href="site.css">

        <style>
            table, th, td {
                border: 1px solid red;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
            }
        </style>
    </head>
   

        <?php
//Create connection
        $con = mysqli_connect('setapproject.org', 'csc412', 'csc412', 'student_csc412');

//Check connection
        if (mysqli_connect_errno($con)) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }



     $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $comm = $_POST["comm"];
        if (!empty($fname) and !empty($lname) and !empty($email) and !empty($comm)) {
            $sql = "INSERT INTO `sahithi2` (`fname`, `lname`, `address`, `comments`, `ww`) VALUES ('".$fname."', '".$lname."', '".$email."', '".$comm."', CURDATE());";

            if (mysqli_query($con, $sql)) {
                echo "Thanks for signing  " . $fname . " " . $lname . "!<br>";
                echo "Your email address is: " . $email . "<br><br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }else{
            echo " Missing Required Fields";
            die();
        }   

        echo "<table style='width:100%'>";

        echo "<tr>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Email</th>";
        echo "<th>comment</th>";
        echo "<th>Time Posted</th>";
        echo "</tr>";

        $result = mysqli_query($con, "SELECT * FROM sahithi2");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['comments'] . "</td>";
            echo "<td>" . $row['ww'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_close($con);
        session_unset();
        session_destroy();
        ?>
    </body>
</head>
</html>

   
<!--
// Create connection
$con=mysqli_connect('setapproject.org','csc412','csc412','student_csc412');


// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM pd_table");
echo "<h2><b>First Name" . " - " . "Last Name" . " - " . "Email" . " - " . "comment";
echo "<br> <br>";

while($row = mysqli_fetch_array($result)) {
  echo $row['First Name'] . ' ' . $row['Last Name'] . '    ' . $row['Email'] . '  ' . $row['comment'];
         
  echo "<br>";
}

mysqli_close($con);
?>
-->