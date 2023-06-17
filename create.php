<?php

  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['usern'])) {

  include 'functions.php';
  // require 'functions.php';
  $pdo = pdo_connect_mysql();
  $msg = '';

  // Check if POST data is not empty
  if (!empty($_POST)) {
    // var_dump($_POST);
    // var_dump($_FILES); 
    // die;

      // Post data not empty insert a new record
      // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
      $ids = isset($_POST['ids']) && !empty($_POST['ids']) 
      && $_POST['ids'] != 'auto' ? $_POST['ids'] : NULL;
      
      // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
      $name     = isset($_POST['name']) ? $_POST['name'] : '';
      $email    = isset($_POST['email']) ? $_POST['email'] : '';
      $address  = isset($_POST['address']) ? $_POST['address'] : '';
      $grade    = isset($_POST['grade']) ? $_POST['grade'] : '';
      
      //$picture  = isset(upload_file()['picture']) ? upload_file()['picture'] : '';

      $picture = upload_file();
      if(!$picture) {
        return false;
      }

      // Insert new record into the students table
      $stmt = $pdo->prepare('INSERT INTO study VALUES (?, ?, ?, ?, ?, ?)');
      $stmt->execute([$ids, $name, $email, $address, $grade, $picture]);
      // Output message
      // $msg = 'Created Successfully!';

      if($stmt){
        echo 
          "<script>
            alert('Created Data Successfully!')
            document.location='table.php'
          </script>";
        } else {
          echo
          "<script>
            alert('Failed To Create Data')
            document.location='table.php'
          </script>";
        }

  }

?>

<!DOCTYPE html>

  <html lang="en">
    <head>

      <meta charset="UTF-8">
      <title>Create Data</title>
      <link rel="stylesheet" href="style.css">

    </head>

    <body>
      
      <div class="center">
        <h1>Create New Data</h1>

          <form action="create.php" method="post" enctype="multipart/form-data">
            
            <!-- <div class="txt_field">
              <input type="text" name="ids" value="auto" id="ids" disabled>
              <span></span>
              <label for="ids">Ids</label>
            </div> -->

            <div class="txt_field">
              <input type="text" name="name" id="name" required>
              <span></span>
              <label for="name">Name</label>
            </div>

            <div class="txt_field">
              <input type="text" name="email" id="email" required>
              <span></span>
              <label for="email">Email</label>
            </div>

            <div class="txt_field">
              <input type="text" name="address" id="address" required>
              <span></span>
              <label for="address">Address</label>
            </div>


            <div class="picture">
              <label for="grade">Grade</label>
              <!-- <span></span> -->
            </div>

            <div class="grade">
              <input value="10" type="radio" name="grade" id="10" required>
                <label for="10">10</label>          
              <input value="11" type="radio" name="grade" id="11" required>
                <label for="11">11</label>
              <input value="12" type="radio" name="grade" id="12" required>
                <label for="12">12</label>
            </div>

            <div class="picture">
              <label for="picture">Picture</label>
            </div>
            <div class="txt_field">
              <input type="file" name="picture" id="picture" required>
                <!-- <br> <br> -->
                <!-- <label for="picture"></label> -->
                <!-- <br> <br>  -->
                <!-- <span></span> -->

            </div>
        
        <div class="sub">
          <input class="sub" type="submit" value="Create" name="submit">
        </div>
          
        <div class="signup_link">
          <a class="" href="table.php">Back To Table</a>
        </div>
      </form>

      <!-- <?php if ($msg): ?>
        <p class="container__home__sub"> <?= $msg?> </p>
      <?php endif; ?> -->

      </div>

    </body>
  </html>

  <?php 
    } else {
      header("Location: index.php");
      exit();
    }
  ?>
