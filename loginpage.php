<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="../Downloads/site.css">
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body class="something tinted-image">
        <?php
        $fname = $lname = $comm = $email = "";
        $nameErr = $emailErr = $commErr = "";
        $valid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fname"])) {
                $nameErr = "First name is required";
                $valid = false;
            } else {
                $fname = test_input($_POST["fname"]);
                $_SESSION["fname"] = $_POST["fname"];
               
                if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
                    $nameErr = "Only letters and white space allowed";
                    $valid = false;
                }
            }

            if (empty($_POST["lname"])) {
                $nameErr = "Last name is required";
                $valid = false;
            } else {
                $lname = test_input($_POST["lname"]);
                $_SESSION["lname"] = $_POST["lname"];
               
                if (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
                    $nameErr = "Only letters and white space allowed";
                    $valid = false;
                }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
                $valid = false;
            } else {
                $email = test_input($_POST["email"]);
                $_SESSION["email"] = $_POST["email"];
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    $valid = false;
                }
            }

            if (empty($_POST["comm"])) {
                $commErr = "Please enter a comment";
                $valid = false;
            } else {
                $quote = test_input($_POST["comm"]);
                $_SESSION["comm"] = $_POST["comm"];
               
//                if (!preg_match("/^[a-zA-Z ]*$/", $quote)) {
//                    $quoteErr = "Only letters and white space allowed";
//                    $valid = false;
//                }
            }

            if ($valid) {
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://thecity.sfsu.edu/~sahithiv">';
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
           
            return $data;
        }
        ?>

        <div class="wrap">
            
            <p><span class="error">* required fields.</span></p>
            <form method="post" action="newlogin.php">
                First Name: <input type="text" name="fname" value="<?php echo $fname; ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br><br>
                Last Name: <input type="text" name="lname" value="<?php echo $lname; ?>">
                <span class="error">* <?php echo $nameErr; ?></span>
                <br><br>
                E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr; ?></span>
                <br><br>
                Comment: <input type="text" name="comm" value="<?php echo $comm; ?>">
                <span class="error">* <?php echo $commErr; ?></span>
                <br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>

