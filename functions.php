<!-- new -->

<?php

// session_start();
// if (isset($_SESSION['id']) && isset($_SESSION['usern'])) {

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

// function submit($data){
//   global $connect;

//   // $ids      = htmlspecialchars($data["ids"]);
//   $name     = htmlspecialchars($data["name"]);
//   $email    = htmlspecialchars($data["email"]);
//   $address  = htmlspecialchars($data["address"]);
//   $grade    = htmlspecialchars($data["grade"]);
//   $picture  = htmlspecialchars($data["picture"]);

//   $query = "INSERT INTO study VALUES 
//             ('', 'name', 'email', 'address', 'grade', 'picture')";
//   mysqli_query($connect, $query);
// }

function upload_file(){
  // upload
  $file_name  = $_FILES['picture']['name'];
  $file_size  = $_FILES['picture']['size'];
  $file_error = $_FILES['picture']['error'];
  $file_tmp   = $_FILES['picture']['tmp_name'];

  // check error
  if($file_error === 4){
    echo
    "<script>
      alert('Please select an image');
    </script>";
    return false;
  }

  // check file is an image
  $ext_picture_valid = ['jpg', 'jpeg', 'png'];
  $ext_picture       = explode('.', $file_name);
  $ext_picture       = strtolower(end($ext_picture));
  
  if(!in_array($ext_picture, $ext_picture_valid)){
    echo
    "<script>
      alert('Your file is not an image');
      document.location='create.php'
    </script>";
    return false;
  }

  // check file size
  if($file_size > 1000000){
    echo
    "<script>
      alert('File is too big');
      document.location='create.php'
    </script>";
    return false;
  }

  // upload pic
  // generate new file name
  $file_name_new = uniqid();
  $file_name_new .= '.';
  $file_name_new .= $ext_picture;

  move_uploaded_file($file_tmp, 'img/' . $file_name_new);

  return $file_name_new;
}


// function edit() {
//   a;
// }

// }

// ak nyerah
// gk jadi nyerah
// oke ak nyerah lg (file is not an image tp masih kesimpen)
// fix capek
// nesu

// function $stmt($data) {
//   //upload
//   $picture = upload();

//   if( !$picture ){
//     return false;
//   }
// }

?>

<!-- old -->

<!-- <?php
  //connection
  $host       = "localhost";
  $us         = "root";
  $pswrd      = "";
  $db         = "attend";

    // session_start();

  $connect = mysqli_connect($host, $us, $pswrd, $db);
  if (!$connect){ //check
      die("Connection FAILED :".mysqli_connect_error());
  }

  // function  template_header($title){
  //   echo <<<EOT
  //   <!DOCTYPE html>

  //     <html lang="en">
  //       <head>

  //         <meta charset="UTF-8">
  //         <title>$title</title>
  //         <link href="style.css" rel="stylesheet" type="text/css">

  //       </head>
        
  //       <body>

  //         <nav class="navtop">
  //           <div>
  //             <h1>Homepage</h1>

  //               <a href="index.php">
  //                 <i class="fas fa-home"></i>
  //                 Home
  //               </a>

  //               <a href="read.php">
  //                 <i class="fas fa-address-book"></i>
  //                 Student
  //               </a>

  //           </div>
  //         </nav>

  //         EOT;
  //         }

  //         function  template_footer(){
  //           echo <<<EOT

  //       </body>
  //     </html>
        
  //     EOT;
  //   }

?> -->
