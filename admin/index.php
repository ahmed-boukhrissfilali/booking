<!DOCTYPE html>
<?php require_once "connect.php"?>

<html>
<head>
    <title>Hotel AHL FES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="shortcut icon" href="../image/Logo.png" type="image/x-icon">
    <!-- Additional CSS -->
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

    <style type="text/css">
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }

        .custom-form {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <br>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="panel panel-danger custom-form">
                <div class="navbar-header">
                    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">HÔTEL AHL FES</a>
                </div>
                <div class="panel-heading">
                    <h4>Administrateur</h4>
                </div>
                <div class="panel-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="username" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" required="required">
                        </div>
                        <br>
                        <div class="form-group">
                            <button name="login" class="form-control btn btn-primary">
                                <i class="glyphicon glyphicon-log-in"></i> Se Connecter
                            </button>
                        </div>
                    </form>
                    <?php require_once 'login.php'?>
                </div>
            </div>
            <br>
            <br>
            <div class="container">
  <div class="row justify-content-center">
    <div class="col-12 text-center fixed-bottom">
      <label>&copy; <?php echo date("Y"); ?> HÔTEL AHL FES</label>
    </div>
        </div>
    </div>
</div>

<!-- JavaScript dependencies -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>
</html>
