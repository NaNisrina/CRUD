<!-- new -->

<?php
function pdo_connect_mysql() {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'attend';
    try {
    	return new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . 
        ';charset=utf8', $db_user, $db_pass);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

?>

<!-- simple -->

<!-- <?php
  //connection
  $host       = "localhost";
  $us         = "root";
  $pswrd      = "";
  $db         = "attend";

    session_start();

  $connect = mysqli_connect($host, $us, $pswrd, $db);
  if (!$connect){ //check
      die("Connection FAILED :".mysqli_connect_error());
  }

?> -->
