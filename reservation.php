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
	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
			<strong> <h2 class="fw-bold h-font text-center">RESERVER MAINTENANT </h2></strong>
			<br/>
			<br/>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysql_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "well" style = "height:300px; width:100%;">
						<div style = "float:left;">
							<img src = "image/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3><?php echo $fetch['room_type']?></h3>
							<h4 style = "color:#00ff00;"><?php echo "Prix: MAD ".$fetch['price'].".00"?></h4>
							<br /><br /><br /><br /><br /><br />
							<a style = "margin-left:580px;" href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i> Reserver</a>
						</div>
					</div>
				<?php
					}
				?>
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