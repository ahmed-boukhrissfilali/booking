<!DOCTYPE html>
<html>
<head>
    <title>Réservation</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php require('header.php') ?>

    <div class="reservation-page">
        <div class="container">
            <h1>Réservation en ligne</h1>
            <div class="row">
                <?php
                if ($type == 1) {
                ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/classic.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chambre classique</h5>
                                <h6 class="mb-4">MAD 800</h6>
                                <!-- Caractéristiques -->
                                <!-- Services -->
                                <!-- Invités -->
                                <!-- Notation -->
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($type == 2) {
                ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/deluxe.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chambre de luxe</h5>
                                <h6 class="mb-4">MAD 1200</h6>
                                <!-- Caractéristiques -->
                                <!-- Services -->
                                <!-- Invités -->
                                <!-- Notation -->
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($type == 3) {
                ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/super.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chambre supérieur</h5>
                                <h6 class="mb-4">MAD 1000</h6>
                                <!-- Caractéristiques -->
                                <!-- Services -->
                                <!-- Invités -->
                                <!-- Notation -->
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($type == 4) {
                ?>
                    <div class="col-lg-4 col-md-5 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/jrsuite.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Junior suite</h5>
                                <h6 class="mb-4">MAD 1800</h6>
                                <!-- Caractéristiques -->
                                <!-- Services -->
                                <!-- Invités -->
                                <!-- Notation -->
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($type == 5) {
                ?>
                    <div class="col-lg-4 col-md-5 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto; center">
                            <img src="image/suite exc.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Exécutive suite</h5>
                                <h6 class="mb-4">MAD 1900</h6>
                                <!-- Caractéristiques -->
                                <!-- Services -->
                                <!-- Invités -->
                                <!-- Notation -->
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="col-md-6">
                    <div class="reservation-form-container">
                        <div class="well">
                            <form method="POST" enctype="multipart/form-data" action="add_query_reserve.php">
                                <!-- Formulaire de réservation -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php require_once 'add_query_reserve.php' ?>
        </div>
    </div>
    <br />
    <br />
    <hr>

    <?php require('footer.php') ?>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    var dateInInput = document.querySelector('input[name="datein"]');
    var dateOutInput = document.querySelector('input[name="dateout"]');

    var currentDate = new Date();
    var currentDateString = currentDate.toISOString().split('T')[0];

    dateOutInput.setAttribute('min', currentDateString);
    dateInInput.setAttribute('min', currentDateString);
</script>
</html>
