<?php
require_once 'connect.php';

// Récupérer les messages de contact
$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

?>

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
	
	
</style>
</head>
<body>


<?php require_once './theme/temp/nav.php'; require_once './theme/temp/header.php' ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">


	<br />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages clients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <h1>Messages des utilisateurs</h1>

        <?php if ($result->num_rows > 0) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Objet</th>
                        <th>Message</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                <?php  
							$query = $conn->query("SELECT * FROM `contact`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
                        <tr>
                            <td><?php echo $fetch["name"]; ?></td>
                            <td><?php echo $fetch["email"]; ?></td>
                            <td><?php echo $fetch["subject"]; ?></td>
                            <td><?php echo $fetch["message"]; ?></td>
                            <td><center><a class = "btn btn-danger" href = "deletemsg.php?id=<?php echo $fetch['id']?>"><i class = "glyphicon glyphicon-edit"></i>Supprimer</a></center></td>
                        </tr>
                          <?php  }?>
                   
                        
                </tbody>
            </table>
        <?php else : ?>
            <p>Aucun message de utilisateur .</p>
        <?php endif; ?>

    </div>
        </main>

</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>

