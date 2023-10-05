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
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Mon Compte/Creer Un Compte</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST">
						<div class = "form-group">
							<label>Nom </label>
							<input type = "text" class = "form-control" name = "name" />
						</div>
						<div class = "form-group">
							<label>Nom d'utilisateur </label>
							<input type = "text" class = "form-control" name = "username" />
						</div>
						<div class = "form-group">
							<label>Mot de passe </label>
							<input type = "password" class = "form-control" name = "password" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "add_account" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i> Enregistrer</button>
						</div>
					</form>
					<?php require_once 'add_query_account.php'?>
				</div>
			</div>

		</div>
</main>
	</div>
	<br />
	<br />
	<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 text-center fixed-bottom">
      <label>&copy; <?php echo date("Y"); ?> Hotel AHL FES</label>
    </div>
  </div>
</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</html>