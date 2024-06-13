<?php
require 'function.php';
session_start();

if (isset($_POST['submit'])) {

    if(register($_POST)> 0 ) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
        header("Location: login.php");
    } else {
        echo mysqli_error($conn);
    }

}     
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <title>Register</title>
</style>
</head>
<body >
 <div class="form-container">
  <form action="" method="POST">
    <h3>register now</h3>
    <?php 
        if(isset($error)){
            foreach($error as $error) {
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
    ?>
    <input type="email" name="usermail" placeholder="enter your email" class="box" required>
    <input type="username" name="username" placeholder="enter your username" class="box" required>
    <input type="password" name="password" placeholder="enter your password" class="box" required>
    <input type="password" name="password2" placeholder="confirm your password" class="box" required>
    <input type="submit" value="register now" name="submit" class="form-btn">
    <p>Already have an account? <a href="login.php">Login Now!</a></p>
  </form>
 </div>
</body>
</html>