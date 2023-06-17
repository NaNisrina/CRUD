<?php

  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['usern'])) {

  include 'functions.php';
  $pdo = pdo_connect_mysql();
  $msg = '';
  // Check that the contact ID exists

  if (isset($_GET['ids'])) {
      // Select the record that is going to be deleted
      $stmt = $pdo->prepare('SELECT * FROM study WHERE ids = ?');
      $stmt->execute([$_GET['ids']]);
      $student = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$student) {
          exit('Student doesn\'t exist with that ID!');
      }
      // Make sure the user confirms beore deletion
      if (isset($_GET['confirm'])) {
          if ($_GET['confirm'] == 'yes') {
              // User clicked the "Yes" button, delete record
              $stmt = $pdo->prepare('DELETE FROM study WHERE ids = ?');
              $stmt->execute([$_GET['ids']]);
              // $msg = 'You have deleted the student data!';

              if($stmt){
                echo 
                  "<script>
                    alert('Deleted Data Successfully!')
                    document.location='table.php'
                  </script>";
                } else {
                  echo
                  "<script>
                    alert('Failed To Delete Data')
                    document.location='table.php'
                  </script>";
                }

            //   header("Location: table.php");
          } else {
              // User clicked the "No" button, redirect them back to the read page
              header('Location: table.php');
              exit;
          }
      }
  } else {
      exit('No IDS specified!');
  }

?>

<!DOCTYPE html>

  <html lang="en">
    <head>

      <meta charset="UTF-8">
      <title>Delete Data</title>
      <link rel="stylesheet" href="style.css">
      
    </head>

    <body class="body__home">
      
      <div class="container__home">
      <h1 class="container__home__title">
        Delete Data #<?=$student['ids']?>
      </h1>

      <p class="container__home__sub"> 
        Are you sure you want to delete student data? #<?=$student['ids']?>?
      </p>
        
        <div class="container__home__action">
          <a class="container__home__action__link" 
            href="delete.php?ids=<?=$student['ids']?>&confirm=yes">
            Yes
          </a>
        </div>

        <div class="container__home__action">
          <a class="container__home__action__link" 
            href="delete.php?ids=<?=$student['ids']?>&confirm=no">
            No
          </a>
        </div>

        <!-- <?php if ($msg): ?>
          <p class="container__home__sub"> <?=$msg?> </p>
          
          <div class="signup_link">
            <a class="" href="table.php">Back To Table</a>
          </div>
        <?php else: ?>

      <p class="container__home__sub"> 
        Are you sure you want to delete student data? #<?=$student['ids']?>?
      </p>
        
        <div class="container__home__action">
          <a class="container__home__action__link" 
            href="delete.php?ids=<?=$student['ids']?>&confirm=yes">
            Yes
          </a>
        </div>

        <div class="container__home__action">
          <a class="container__home__action__link" 
            href="delete.php?ids=<?=$student['ids']?>&confirm=no">
            No
          </a>
        </div>
        
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
