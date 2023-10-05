<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html>
<head>
	<title>Hotel AHL FES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
  

   
	<!-- CSS only -->
<?php require('../links.php'); ?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<style type="text/css">
	
	.availability-form{
		margin-top: -50px;
		z-index: 2;
		position: relative;
	}

	@media screen and (max-width: 575px) {
	.availability-form{
		margin-top: 25px;
		padding: 0 35px;
	}

	}
</style>
</head>
<body>


<?php require_once './theme/temp/nav.php'; require_once './theme/temp/header.php' ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


	<br />
	<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="alert alert-info">Remplir ce formulaire</div>
      <?php
        $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
        $fetch = $query->fetch_array();
      ?>
      <br>
      <form method="POST" enctype="multipart/form-data" action="save_form.php?transaction_id=<?php echo $fetch['transaction_id']?>">
        <div class="form-group">
          <label for="firstname">Nom</label>
          <input type="text" id="firstname" value="<?php echo $fetch['firstname']?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="lastname">Prénom</label>
          <input type="text" id="lastname" value="<?php echo $fetch['lastname']?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="roomType">Type Chambre</label>
          <input type="text" id="roomType" value="<?php echo $fetch['room_type']?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="roomNo">N° Chambre</label>
          <input type="number" id="roomNo" min="0" max="999" name="room_no" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="days">NB Jour</label>
          <input type="number" id="days" min="0" max="99" name="days" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="extraBed">Lit Supplémentaire</label>
          <input type="number" id="extraBed" min="0" max="99" name="extra_bed" class="form-control">
          <small class="text-danger">*Lit Supplémentaire coût 800</small>
        </div >
        <button type="submit" name="add_form" class="btn btn-primary btn-lg w-5 "><i class="glyphicon glyphicon-save"></i> Enregistrer</button>
      </form>
    </div>
  </div>
</div>

			</div>
		</div>
	</div>
</main>
	<br />
	<br />
	<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 text-center fixed-bottom">
      <label>&copy; <?php echo date("Y"); ?> HÔTEL AHL FES</label>
    </div>
  </div>
</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>