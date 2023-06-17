<?php

  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['usern'])) {

  include 'functions.php';
  $pdo = pdo_connect_mysql();
  $msg = '';

  // Check if the student id exists, for example update.php?id=1 will get the student with the id of 1
  if (isset($_GET['ids'])) {
      if (!empty($_POST)) {

          // This part is similar to the create.php, but instead we update a record and not insert
          $ids = isset($_POST['ids']) ? $_POST['ids'] : NULL;
          
          $name    = isset($_POST['name']) ? $_POST['name'] : '';
          $email   = isset($_POST['email']) ? $_POST['email'] : '';
          $address = isset($_POST['address']) ? $_POST['address'] : '';
          $grade   = isset($_POST['grade']) ? $_POST['grade'] : '';
          $picture = isset($_POST['picture']) ? $_POST['picture'] : '';

          // $picture      = isset(upload_file()['picture']) ? upload_file()['picture'] : '';
          
          // // Update the record
          $stmt = $pdo->prepare('UPDATE study SET name = ?, email = ?, address = ?, grade = ?, picture = ? WHERE ids = ?');
          $stmt->execute([$name, $email, $address, $grade, $picture, $_GET['ids']]);
          
          header("Location: table.php");
      }
      // Get the student from the students table
      $stmt = $pdo->prepare('SELECT * FROM study WHERE ids = ?');
      $stmt->execute([$_GET['ids']]);
      $student = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$student) {
          exit('Student doesn\'t exist with that IDS!');
      }
  } else {
      exit('No IDS specified!');
  }

?>

<!DOCTYPE html>

  <html lang="en">
    <head>

      <meta charset="UTF-8">
      <title>Data Details</title>
      <link rel="stylesheet" href="style.css">

    </head>
    
    <body class="body__home">
      
    <div class="center">
	    <h1 class="container__home__title">Detail Student #<?=$student['ids']?></h1>

        <form action="update.php?ids=<?=$student['ids']?>" method="post">
          <p class="con">Ids</p>
            <p class="grade"><?=$student['ids']?></p>
          <p class="con">Name</p>
            <p class="grade"><?=$student['name']?></p>
          <p class="con">Email</p>
            <p class="grade"><?=$student['email']?></p>
          <p class="con">Address</p>
            <p class="grade"><?=$student['address']?></p>
          <p class="con">Grade</p>
            <p class="grade"><?=$student['grade']?></p>
          <p class="con">Picture</p>
            <p class="grade">
              <img src="img/<?=$student['picture']?>"width="300">
            </p>
        </form>
        
        <div class="signup_link">
          <a href="table.php">
            Back To Table
          </a>
        </div>

      </div>

    </body>
  </html>

  <?php 
    } else {
      header("Location: index.php");
      exit();
    }
  ?>
