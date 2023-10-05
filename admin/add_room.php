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
				<div class = "alert alert-info">Transaction / Chambre / Modifier Chambre</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Type Chambre </label>
							<select class = "form-control" required = required name = "room_type">
								<option value = "">Choisir option</option>
								<option value = "Standard">Standard</option>
								<option value = "Superior">Superieur</option>
								<option value = "Super Deluxe">Super De luxe</option>
								<option value = "Jr. Suite">Jr. Suite</option>
								<option value = "Executive Suite">Executive Suite</option>
							</select>
						</div>
						<div class = "form-group">
							<label>Prix </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "price" />
						</div>
						<div class = "form-group">
							<label>Photo </label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<center id = "lbl">[Photo]</center>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "add_room" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i> Enregistrer</button>
						</div>
					</form>
					<?php require_once 'add_query_room.php'?>
				</div>
			</div>
		</div>
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
</main>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>