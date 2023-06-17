<?php

  include 'connect.php';
  $pdo = pdo_connect_mysql();
  $msg = '';

  // Check if POST data is not empty
  if (!empty($_POST)) {
      // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
      $username    = $_POST['usn'];
      $password    = password_hash($_POST['pswr'], PASSWORD_DEFAULT);

      // var_dump
        // var_dump($_POST['pswr']);
        // var_dump($password);
        // var_dump(password_verify($_POST['pswr'],$password));
        // die();


      // Insert new record into the user table
      $stmt = $pdo->prepare('INSERT INTO user(usern, passw) VALUES (?, ?)');
      $stmt->execute([strval($username), $password]);
      // Output message
      // $msg = 'Registered Successfully!';
      if($stmt){
        echo 
          "<script>
            alert('Created User Successfully!')
            document.location='index.php'
          </script>";
        } else {
          echo
          "<script>
            alert('Failed To Create User')
            document.location='index.php'
          </script>";
        }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">

    <title>Register</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <div class="center">
      <h1>Sign Up</h1>

      <form action="" method="post">

        <div class="txt_field">
          <input id="usn" name="usn" type="text" required>
          <span></span>
          <label for="usn">Username</label>
        </div>

        <div class="txt_field">
          <input id="pswr" name="pswr" type="password" required>
          <span></span>
          <label for="pswr">Password</label>
        </div>

          <!-- <div class="txt_field">
            <input id="pswr" name="pswr" type="password" required>
            <span></span>
            <label for="pswr">Repeat Password</label>
          </div> -->

        <div class="pass">
          <label>
            <input type="checkbox" checked="checked"> Remember Me
          </label>
        </div>
        
        <div class="sub">
          <input class="sub" type="submit" value="Sign Up">
        </div>

        <div class="signup_link">
          <a class="" href="index.php">Cancel</a>
        </div>

      </form>

      <!-- <?php if ($msg): ?>
        <p class="container__home__sub"> <?= $msg?> </p>
      <?php endif; ?> -->

    </div>

  </body>
</html>
