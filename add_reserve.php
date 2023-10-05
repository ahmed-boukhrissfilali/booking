<?php session_start();   ?>

<!DOCTYPE html>
<html>
<head>
	<title>Hotel AHL FES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="shortcut icon" href="./image/Logo.png" type="image/x-icon">

    <!-- CSS only -->
    <?php require('links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

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

        .room-info-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            justify-content: flex-start;
        }

        .room-info-image {
            flex: 0 0 400px;
            margin-right: 10px;
        }

        .room-info-image img {
            width: 100%;
            height: auto;
        }

        .room-info-details {
            flex: 1;
        }

        .reservation-form-container {
            flex: 1;
            margin-left: 30px;
        }
    </style>
</head>
<body>
    <?php require('header.php');
    require_once 'admin/connect.php';
    ?>
    <div style="margin-left:0;" class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                        <div class="container">

                <strong><h3>RESERVER</h3></strong>
                <br />
                <?php 
                    $type = $_SESSION['roomid'];
                ?>

                <div class="row">
                <?php
                if ($type == 1) {
                ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/stand.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Standard chambre</h5>
                                <h6 class="mb-4">MAD 700 </h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Caractéristiques</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 chambre
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 douche
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Balcon
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 canapé
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Lit Standard
                                    </span>
                                </div>
                                <div class="Facilities mb-4">
                                    <h6 class="mb-1">Services</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Television
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Climatiseur
                                    </span>
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">invité(e)(s)</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Adulte
                                    </span>
                                </div>  
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Notation</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($type == 3) {
                ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/6.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chambre de luxe</h5>
                                <h6 class="mb-4">MAD 1600 </h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Caractéristiques</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 chambre
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 salle de bain
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Balcon(agréable vue)
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 canapés
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        coffre fort
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Lit grande taille
                                    </span>
                                </div>
                                <div class="Facilities mb-4">
                                    <h6 class="mb-1">Services</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Television
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Climatiseur
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Petit déjeuner
                                    </span>
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">Invité(e)(s)</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 Adultes
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Enfant
                                    </span>
                                </div>
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Notation</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif ($type == 2) {
                ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="image/super.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Chambre supérieur</h5>
                                <h6 class="mb-4">MAD 1000</h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Caractéristiques</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 chambre
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 douches
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Balcon(vue agreable)
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        coffre fort
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 canapés
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Lit grande taille
                                    </span>
                                </div>
                                <div class="Facilities mb-4">
                                    <h6 class="mb-1">Services</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Television
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Climatiseur
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Service à café...
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        petit déjeuner
                                    </span>
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">invité(e)(s)</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 Adultes
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 enfant
                                    </span>
                                </div>   
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Notation</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
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
                                <h6 class="mb-4">MAD 1800 </h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Caractéristiques</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 chambres
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 douches
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Balcon(vue agreable)
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        3 canapés
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        coin salon
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Lit king-size
                                    </span>
                                </div>
                                <div class="Facilities mb-4">
                                    <h6 class="mb-1">Services</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Television
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Climatiseur
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Petit déjeuner
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        mini bar
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Service café...
                                    </span>
                                </div>
                                <div class="guests mb-4">
                                    <h6 class="mb-1">invité(e)(s)</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 Adultes
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 enfants
                                    </span>
                                </div>
                                <div class="rating mb-4">
                                    <h6 class="mb-1">Notation</h6>
                                    <span class="badge rounded-pill bg-light">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    </span>
                                </div>
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
                                <h6 class="mb-4">MAD 1900  </h6>
                                <div class="features mb-4">
                                    <h6 class="mb-1">Caractéristiques</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 Chambres
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        2 salles de bain
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        1 Balcon(grande espace avec vue agreable)
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        4 canapés
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        coffre fort
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Lit king-size
                                    </span>
                                </div>
                                <div class="Facilities mb-4">
                                    <h6 class="mb-1">Services</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Wifi
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Television
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        Climatiseur
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        petit déjeuner
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        service café...
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        mini bar
                                    </span>

                                    <div class="guests mb-4">
                                        <h6 class="mb-1">Invité(e)(s)</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            2Adultes
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            2 Enfants
                                        </span>
                                    </div>
                                    
                                    <div class="rating mb-4">
                                        <h6 class="mb-1">Notation</h6>
                                        <span class="badge rounded-pill bg-light">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </span>
                                    </div>
                                </div>
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
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="firstname" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input type="text" class="form-control" name="lastname" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="address" required="required">
                                </div>
                                <div class="form-group">
                                    <label>N° Tlph</label>
                                    <input type="tel" class="form-control" name="contactno" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Date d'arrivée</label>
                                    <input type="date" class="form-control" name="datein" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Date de départ</label>
                                    <input type="date" class="form-control" name="dateout" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="ageCheck" name="ageCheck" required>
                                    <label for="ageCheck">Vous avez plus de 18 ans </label>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="ruleCheck" name="ruleCheck" required>
                                    <label for="ruleCheck">J'accepte toutes les conditions et règles du site</label>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lfa5-gmAAAAAGM4c8f-NTMZ96tvAMGseAXD__hr"></div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info form-control" name="add_guest">
                                        <i class="glyphicon glyphicon-save"></i> Envoyer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php  require_once 'add_query_reserve.php'?>
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
