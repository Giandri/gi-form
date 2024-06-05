<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="img/logo.png">
  <title>CRUD | Giandri Aditio</title>
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <!-- end Navbar -->
  <div class="container-lg">
    <div class="row">
      <!-- sidebar -->
      <?php include 'sidebar.php'; ?>
      <!-- content -->
      <?php
      if (isset($_GET['x']) && $_GET['x'] == 'home') {
        include "home.php";
      } elseif (isset($_GET['x']) && $_GET['x'] == 'form') {
        include "form.php";
      } elseif (isset($_GET['x']) && $_GET['x'] == 'datasave') {
        include "datasave.php";
      } elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
        include "report.php";
      }
      ?>

    </div>
    <!-- footer -->
    <div class="fixed-bottom text-center mb-3">
      <i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2024 | Giandri Aditio
    </div>
  </div>



</body>

</html>