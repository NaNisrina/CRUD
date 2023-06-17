<!-- index -->

<!DOCTYPE html>

  <html lang="en">
    <head>

      <meta charset="UTF-8">
      
      <title>Login</title>
      <link rel="stylesheet" href="style.css">

    </head>

    <body>

    <!-- login -->
      <?php

      // session_start(); 
      include "connect.php";

      if (isset($_POST['usn']) && isset($_POST['psw'])) {

        function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $usr = validate($_POST['usn']);
        $pas = validate($_POST['psw']);


        if (empty($usr)) {
          echo "<script>alert('Username is required')</script>";
          // header("Location: index.php?error=Username is required");
            // exit();
        }else if(empty($pas)){
          echo "<script>alert('Password is required')</script>";
              // header("Location: index.php?error=Password is required");
            // exit();
        }else{
          $sql = "SELECT * FROM user WHERE usern='$usr'";
          $result = mysqli_query($connect, $sql);

          if (mysqli_num_rows($result) === 1) {
              $row    = mysqli_fetch_assoc($result);


              $verify = password_verify($_POST['psw'], $row['passw']);

              // var_dump($verify);
              // var_dump($_POST['psw']);
              // var_dump($row['passw']);


            if ($verify) {
              $_SESSION['usern'] = $row['usern'];
              //         $_SESSION['name'] = $row['name'];
                      $_SESSION['id'] = $row['id'];
                      header("Location: home.php");
                      exit();
            } else {
              echo "<script>alert('Incorrect Username or Password')</script>";
            }
          } else {
            echo "<script>alert('Incorrect Username or Password')</script>";

          }

          // if (mysqli_num_rows($result) === 1) {
          //   $row = mysqli_fetch_assoc($result);
          //         if ($row['usern'] === $usr && $row['passw'] === $pas) {
          //           $_SESSION['usern'] = $row['usern'];
          //   //         $_SESSION['name'] = $row['name'];
          //           $_SESSION['id'] = $row['id'];
          //           header("Location: home.php");
          //           exit();
          //         }else{
          //           echo "<script>alert('Incorrect Username or Password')</script>";
          //           // header("Location: index.php?error=Incorect User name or password");
          //           // exit();
          // //   }
          // }else{
          //   echo "<script>alert('Incorrect Username or Password')</script>";
          //   // header("Location: index.php?error=Incorect Username or Password");
          //   //   exit();
          // }
        }
        
      }else{
        // header("Location: index.php");
        // exit();
      }

      ?>
    <!-- login -->

      <div class="center">
        <h1>Login</h1>

        <form action="" method="post">

          <!-- <?php if (isset($_GET['error'])) { ?>
     		    <p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?> -->

          <div class="txt_field">
            <input type="text" id="usn" name="usn" required>
            <span></span>
            <label for="usn">Username</label>
          </div>

          <div class="txt_field">
            <input type="password" id="psw" name="psw" required>
            <span></span>
            <label for="psw">Password</label>
          </div>

          <div class="pass">
            <label>
              <input type="checkbox"> Remember Me
            </label>
            <!-- <a href="#">Forgot Password?</a> -->
          </div>

          <button type="submit" class="sub">Login</button>
          
          <!-- <div class="sub">
            <input class="sub" type="submit" value="Submit">
          </div> -->

          <div class="signup_link">
            Don't have an account? <a href="signup.php">Register</a>
          </div>

        </form>
      </div>

    </body>
  </html>
