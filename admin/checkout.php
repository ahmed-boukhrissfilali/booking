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
			<?php
				$q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
				$f_ci = $q_ci->fetch_array();
			?>
			<div class = "panel-body">
				<a class = "btn btn-success" href = "reserve.php"><span class = "badge"><?php echo $f_p['total']?></span> En attente</a>
				<a class = "btn btn-info" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
				<a class = "btn btn-warning disabled"><i class = "glyphicon glyphicon-eye-open"></i> Check Out</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Type Chambre</th>
							<th>N° Chambre</th>
							<th>Check In</th>
							<th>NB Jour</th>
							<th>Check Out</th>
							<th>Status</th>
							<th>Lit Supplémentaire</th>
							<th>Facture</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check Out'") or die(mysqli_query());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['room_type']?></td>
							<td><?php echo $fetch['room_no']?></td>
							<td><?php echo "<label style = 'color:#00ff00;'>".date("M d, Y", strtotime($fetch['checkin']))."</label>"." / "."<label>".date("h:i a", strtotime($fetch['checkin_time']))."</label>"?></td>
							<td><?php echo $fetch['days']?></td>
							<td><?php echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkin']."+".$fetch['days']."DAYS"))."</label>"." @ "."<label>".date("h:i A", strtotime($fetch['checkout_time']))."</label>"?></td>
							<td><?php echo $fetch['status']?></td>
							<td><?php if($fetch['extra_bed'] == "0"){ echo "None";}else{echo $fetch['extra_bed'];}?></td>
							<td><?php echo "MAD ".$fetch['bill'].".00"?></td>
							<td><label class = "">Payé</label></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
						</main>
	<br />
	<br />
	<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 text-center fixed-bottom">
      <label>&copy; <?php echo date("Y"); ?>Hotel AHL FES</label>
    </div>
  </div>
</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>