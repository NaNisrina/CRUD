<?php 
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['usern'])) {

?>

<!DOCTYPE html>

  <html lang="en">
    <head>
      
      <meta charset="UTF-8">

      <title>Home</title>
      <link rel="stylesheet" href="style.css">
    
    </head>
    
    <body class="body__home">

      <div class="container__home">

        <h1 class="container__home__title">Hello, welcome <?php echo $_SESSION['usern']; ?></h1>
        <p class="container__home__sub">Where do you want to go?</p>
        
        <div class="container__home__action">
          <a class="container__home__action__link" 
            href="table.php">Go To Table</a>

          <a class="container__home__action__link" 
            href="logout.php">Logout</a>
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