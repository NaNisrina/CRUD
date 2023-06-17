<?php

  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['usern'])) {

  // Read Table
  include "functions.php";
  // Database Connection
  $pdo  = pdo_connect_mysql();
  $page = isset($_GET['page']) && is_numeric($_GET['page'])
    ? (int)$_GET['page'] : 1;
  $records_per_page = 100;

  // SQL Statement
  $stmt = $pdo->prepare('SELECT * FROM study ORDER BY ids LIMIT :current_page, :record_per_page');
  $stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
  $stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
  $stmt->execute();
  // Fetch the records so we can display them in our template.
  $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Get the total number of students, this is so we can determine whether there should be a next and previous button
  $num_students = $pdo->query('SELECT COUNT(*) FROM study')->fetchColumn();
  
?>

<!DOCTYPE html>

  <html lang="en">
    <head>

      <meta charset="UTF-8">
      <title>Read Table Data</title>
      <link rel="stylesheet" href="style.css">

      <style>
        table, th, td {
            border: 1px solid;
            text-align: center;
            padding-top: 8px;
            padding-bottom: 7px;
            border-collapse: collapse;
        }
        /* .button {
          background-color: #226ea1;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
        } */
      </style>

    </head>

    <body class="body__home">
      
      <!-- <div class="container__home"> -->
      <div class="container__table">

        <h2 class="container__home__title">Table Data</h2>

        <div>
          <a href="create.php" class="container__home__action__link">
            Create New Data
          </a>

          <a href="home.php" class="container__home__action__link">
            Back To Home
          </a>
        </div>

      <table>
        <thead>

          <tr>
              <td class="number">#</td>
              <td class="email">Name</td>
              <td class="number">Grade</td>
              <td class="number">Picture</td>
              <td class="number">Action</td>
              <td class="number">More</td>
          </tr>

        </thead>

        <tbody>

          <?php 
          $index = 1;

          foreach ($students as $student):
          ?>
          <tr>

            <td><?=$index++?></td>
            <td><?=$student['name']?></td>
            <td><?=$student['grade']?></td>
            <td><img src="img/<?=$student['picture']?>"width="50"></td>

            <td>
              <button class="star">    
                <a href="update.php?ids=<?=$student['ids']?>" class="">Edit</a>
              </button>

              <button class="stir">
                <a href="delete.php?ids=<?=$student['ids']?>" class="">Delete</a>
              </button>
            </td>

            <td>
              <button class="stor">    
                <a href="detail.php?ids=<?=$student['ids']?>" class="">Details</a>
              </button>
            </td>

          </tr>
          <?php endforeach; ?>

        </tbody>

      </table>

      <div class="">
        <?php if ($page > 1): ?>
          <a href="table.php?page=<?=$page-1?>">
            <i class=""></i>
          </a>
        <?php endif; ?>

        <?php if ($page*$records_per_page < $num_students): ?>
          <a href="table.php?page=<?=$page+1?>">
            <i class=""></i>
          </a>
        <?php endif; ?>
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
