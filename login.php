<?php 
require 'function.php';
session_start();

if (isset($_POST['submit'])) {

  $username = htmlspecialchars(strtolower($_POST['username']));
  $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('location:admin.php');
    }else{
         $error[] = 'incorrect username or password';
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
  <title>Login</title>
</style>
</head>
<body class="top">
 <div class="form-container">
  <form action="" method="POST">
    <h3>login now</h3>
    <?php 
        if(isset($error)){
            foreach($error as $error) {
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
    ?>
    <input type="username" name="username" placeholder="enter your username" class="box" required>
    <input type="password" name="password" placeholder="enter your password" class="box" required>
    <input type="submit" value="login now" name="submit" class="form-btn">
    <p>Didn't have an account? <a href="register.php">Register Now!</a></p>
  </form>
 </div>
</body>
</html>