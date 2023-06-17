<!-- not used -->

<?php

  // not used
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
      echo "<script>alert('Hello')</script>";
      // header("Location: index.php?error=Username is required");
        // exit();
    }else if(empty($pas)){
          // header("Location: index.php?error=Password is required");
        // exit();
    }else{
      $sql = "SELECT * FROM user WHERE usern='$usr' AND passw='$pas'";
      $result = mysqli_query($connect, $sql);

      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
              if ($row['usern'] === $usr && $row['passw'] === $pas) {
                $_SESSION['usern'] = $row['usern'];
        //         $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
              }else{
                echo "<script>alert('Hello')</script>";
                // header("Location: index.php?error=Incorect User name or password");
                // exit();
        }
      }else{
        echo "<script>alert('Hello')</script>";
        // header("Location: index.php?error=Incorect Username or Password");
        //   exit();
      }
    }
    
  }else{
    header("Location: index.php");
    exit();
  }
