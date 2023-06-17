<?php

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

          if($_FILES['picture']['error'] === 4){
            $stmt = $pdo->prepare('UPDATE study SET name = ?, email = ?, address = ?, grade = ? WHERE ids = ?');
            $stmt->execute([$name, $email, $address, $grade, $_GET['ids']]);
            $msg = 'Updated Successfully!';
          } else {
            $picture = upload_file();
            $stmt = $pdo->prepare('UPDATE study SET name = ?, email = ?, address = ?, grade = ?, picture = ? WHERE ids = ?');
            $stmt->execute([$name, $email, $address, $grade, $picture, $_GET['ids']]);
            $msg = 'Updated Successfully!';
          }
          
          // Update the record
          // $stmt = $pdo->prepare('UPDATE study SET name = ?, email = ?, address = ?, grade = ?, picture = ? WHERE ids = ?');
          // $stmt->execute([$name, $email, $address, $grade, $picture, $_GET['ids']]);
          // $msg = 'Updated Successfully!';

          if($stmt){
            echo 
              "<script>
                alert('Updated Data Successfully!')
                document.location='table.php'
              </script>";
            } else {
              echo
              "<script>
                alert('Failed To Update Data')
                document.location='table.php'
              </script>";
            }
          
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
      <title>Update Data</title>
      <link rel="stylesheet" href="style.css">

    </head>
    
    <body>
      
      <div class="center">
	      <h1>Update Student #<?=$student['ids']?></h1>

        <form action="update.php?ids=<?=$student['ids']?>" 
          method="post" enctype="multipart/form-data">
          
          <!-- <input type="hidden" name="ids" value="<?= $student['ids'] ?>" > -->
          <!-- <input type="hidden" name="picture_old" value="<?= $student['picture'] ?>" > -->

          <div class="txt_field">
            <p class="container__home__sub">Student Id = <?=$student['ids']?></p>
          </div>

          <!-- <label for="ids">Ids</label> -->
          <!-- <input type="text" name="ids" value="<?=$student['ids']?>" id="ids"> -->

          <div class="txt_field">
            <input type="text" name="name" value="<?=$student['name']?>" id="name" required>
            <span></span>
            <label for="name">Name</label>
          </div>

          <div class="txt_field">
            <input type="text" name="email" value="<?=$student['email']?>" id="email" required>
            <span></span>
            <label for="email">Email</label>
          </div>
          
          <div class="txt_field">
            <input type="text" name="address" value="<?=$student['address']?>" id="address" required>
            <span></span>
            <label for="address">Address</label>
          </div>

          <div class="picture">
              <label for="grade">Grade</label>
            </div>


            <div class="grade" value="">
              <input <?=$student['grade'] == "10" ? "checked" : ""?>
                value="10" type="radio" name="grade" id="10" required>
                  <label for="10">10</label>          
              <input <?=$student['grade'] == "11" ? "checked" : ""?>
                value="11" type="radio" name="grade" id="11" required>  
                  <label for="11">11</label>
              <input <?=$student['grade'] == "12" ? "checked" : ""?>
                value="12" type="radio" name="grade" id="12" required>
                  <label for="12">12</label>
            </div>

           <!-- <div class="txt_field">
            <input type="text" name="grade" value="<?=$student['grade']?>" id="grade">
            <span></span>
            <label for="grade">Grade</label>
          </div> -->

          <div class="picture">
            <label for="picture">Picture</label>
          </div>

          <div class="txt_field">
            <img src="img/<?= $student['picture']?>" width="300">
            <input type="file" name="picture" id="picture">
            <span></span>
          </div>

          <br> <br>
        <div class="sub">
          <input class="sub" type="submit" value="Update">
        </div>
          
        <div class="signup_link">
          <a class="" href="table.php">Back To Table</a>
        </div>

        </form>

        <?php if ($msg): ?>
          <p class="container__home__sub"> <?=$msg?> </p>
        <?php endif; ?>

      </div>

    </body>
  </html>
