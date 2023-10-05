<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Dashboard Administrateur</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">

    

    <!-- Bootstrap core CSS -->
<link href="./theme/assets/dist/css/bootstrap.min.css" rel="stylesheet">



<!-- Custom fonts for this template-->
<link href="./theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./theme/css/sb-admin-2.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./theme/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
    



<?php require_once './theme/temp/nav.php'; require_once './theme/temp/header.php' ;require_once 'connect.php';
 ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

<div class="row mt-5 mb-5">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">

            <?php
// Inclure le fichier de connexion à la base de données
require_once('connect.php');

// Requête SQL pour compter les réservations en statut "checkin" pour chaque jour
$query = "SELECT COUNT(*) AS nombre_reservations
          FROM transaction
          WHERE status = 'Check In' AND checkin >= CURDATE()";

// Exécuter la requête
$result = $conn->query($query);

// Vérifier si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Récupérer la première ligne de résultats
    $row = $result->fetch_assoc();
    $nombreReservations = $row['nombre_reservations'];}
?>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                  
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total reservation /jour </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">         <?php  echo '<center>'. $nombreReservations . '</center>' ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-info  shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Revenu (Annuel)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$800,000</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              Total  des Message  (Annuel)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">580</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
        



<!-- Content Row -->
</main>
    
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      


      <h2>ESPACE ADMINISTRATEUR</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <?php
// Assuming you have already established a MySQLi database connection
require_once './connect.php';
// Query to retrieve the latest pending commands
$query = "SELECT * FROM transaction WHERE status = 'pending' ORDER BY checkout DESC LIMIT 10";
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    // HTML table structure
    echo '
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Check-in</th>
          <th>Check-out</th>
          <th>Jours</th>
        </tr>
      </thead>
      <tbody>
    ';

    // Loop through the rows of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Extracting the data from the row
        $transactionId = $row['transaction_id'];
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        $days = $row['days'];

        // Outputting the data within table rows
        echo '
        <tr>
          <td>'.$transactionId.'</td>
          <td>'.$checkin.'</td>
          <td>'.$checkout.'</td>
          <td>'.$days.'</td>
        </tr>
        ';
    }

    // Closing the table structure
    echo '
      </tbody>
    </table>
    ';
} else {
    // Display an error message if the query fails
    echo 'Error: '.mysqli_error($connection);
}

// Close the database connection
?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="./theme/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="./theme/dashboard.js"></script>
  </body>
</html>
