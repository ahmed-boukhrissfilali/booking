<!DOCTYPE html>
<html>
<head>
	<title>Hotel AHL FES</title>
	<!-- CSS only -->
<?php require('links.php'); ?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<link rel="shortcut icon" href="./image/Logo.png" type="image/x-icon">


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

<?php require('header.php'); ?>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body text-center">
           
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="well col-md-4 text-center">
                    <h3>CONSULTEZ VOTRE BOITE EMAIL POUR VERIFIER VOTRE INFORMATIONS DE RESERVATION</h3>
                    <br>
                    <h4>MERCI A VOUS !</h4>
                    <br>
                    <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Retour au Réservation</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>



	<br />
	<br />
	<hr>
 <?php require('footer.php') ?>
	
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>