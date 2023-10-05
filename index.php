<?php session_start(); ob_start();
require_once 'admin/connect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hotel AHL FES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
        .animate-letter {
  animation: animate-letter 0.5s linear forwards;
}

@keyframes animate-letter {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.carousel-caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    text-align: center;
    color: #fff;
}



.carousel-inner .carousel-item img {
    filter: brightness(50%);
}
.animated-text {
  animation: textAnimation 0.5s ease-in-out forwards;
  opacity: 0;
}

@keyframes textAnimation {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}



    </style>
    <script>
   $(document).ready(function() {
  var welcomeTitle = $("#welcome-title");
  var text = welcomeTitle.text();
  var newText = "";

  for (var i = 0; i < text.length; i++) {
    newText += "<span class='animated-letter'>" + text.charAt(i) + "</span>";
  }

  welcomeTitle.html(newText);

  $(".animated-letter").each(function(index) {
    var letter = $(this);
    setTimeout(function() {
      letter.addClass("animate-letter");
    }, 100 * index);
  });
});


    </script>
</head>

<body>

    <?php require('header.php'); ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="image/a.jpg" style="height: 100vh;" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
        <h2 id="welcome-title">BIENVENUE A HOTEL AHL FES</h2>
        <p>Environnement Marocaine Traditionnelle de Luxe a Prix Economique </p>
    </div>
</div>

        <div class="carousel-item">
            <img src="image/gallery/44.jpg" style="height: 100vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h2 id="welcome-title">BIENVENUE A HOTEL AHL FES</h2>
                <p>Environnement Marocaine Traditionnelle de Luxe a Prix Economique </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="image/vue.jpg" style="height: 100vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h2 style="  font-size: 40px;">BIENVENUE A HOTEL AHL FES</h2>
               <p>Environnement Marocaine Traditionnelle de Luxe a Prix Economique </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
    <script>
        // Sélectionnez l'élément h2 avec l'id "welcome-title"
const welcomeTitle = document.getElementById('welcome-title');

// Récupérez le texte à animer
const text = welcomeTitle.innerText;

// Effacez le contenu de l'élément h2
welcomeTitle.innerText = '';

// Pour chaque caractère dans le texte
for (let i = 0; i < text.length; i++) {
  // Créez un élément span pour envelopper chaque caractère
  const char = document.createElement('span');
  char.innerText = text[i];

  // Ajoutez une classe CSS pour l'animation
  char.classList.add('animated-text');

  // Définissez la durée de délai pour chaque caractère
  char.style.animationDelay = `${i * 0.1}s`;

  // Ajoutez le caractère animé à l'élément h2
  welcomeTitle.appendChild(char);
}

    </script>
    
   
</div>


    <!-- check avilability form-->
    <div class="container availability-form " id="availability">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="col-lg-6">Vérifier la disponibilité de la réservation</h5>
                <br>
                <form method="post">
                    <div class="row align-items-end">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Date d'arrivée</label>
                            <input type="date" class="form-control shadow-none " name="checkin">
                        </div>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        <div class="col-lg-4 mb-3">
                            <label class="form-label" style="font-weight: 500;">Date de départ</label>
                            <input type="date" class="form-control shadow-none" name="checkout">
                        </div>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <div class="col-lg-4 mb-3">
                            <?php
                            //  Requête SQL pour récupérer les room_type
                            $sql2 = "SELECT  *   FROM room";

                            // Exécuter la requête
                            $result1 = $conn->query($sql2);

                            // Vérifier si des résultats ont été trouvés
                            if ($result1->num_rows > 0) {
                                // Créer un élément <select> pour afficher les room_type
                                echo '<select name="room_type" id="room_type" class="form-control shadow-none ">';

                                // Parcourir les résultats et afficher chaque room_type dans une option
                                while ($row = $result1->fetch_assoc()) {
                                    echo '<option value="' . $row['room_id'] . '">' . $row['room_type'] . '</option>';
                                }

                                echo '</select>';
                            }



                            ?>
                        </div>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;

                        <div class="col-lg-1 d-flex mb-lg-3 mt-4">
                            <!-- <button type="submit" name="Reserver" class="btn text-dark shadow-none custom-bg">RESERVER</button> -->
                            <!-- </div>
					 <div class="d-flex justify-content-evenly mb-2"> -->

                            <!-- <a href="add_reserve.php?roomId=" . $roomId class="btn btn-sm btn-outline-dark shadow-none">RESERVER</a>  -->
                            <button type="submit" name="Reserver" class="btn btn-sm btn-outline-dark shadow-none">Vérifier</button>
                        </div>
                    </div>
                    <?php 
                    if (isset($_POST["Reserver"])) {

                        function boolToString($value) {
                            return $value ? '<script>alert("succes");</script>' : '<script>alert("desoler ilya pas des chambre disponible ");</script>';
                        }

                        if(!empty($_POST['checkin'] )&& !empty($_POST['room_type']) && !empty($_POST['checkout'])){

                            $roomType = $_POST['room_type'];
                            $checkInDate = $_POST['checkin'];
                            $checkOutDate = $_POST['checkout'];
    
                            //conversion  checkInDate et checkOutDate en type date 
                            $convertedDateout = date('Y-m-d', strtotime($checkOutDate));
                            $convertedDatein = date('Y-m-d', strtotime($checkInDate));
                            $roomid  = $roomType;
                            $_SESSION['roomid'] =  $roomid;
                            $Chambretotal = "SELECT total_chambres  FROM room WHERE room_id = '$roomid'";
 
                            $q_Chambretotal = $conn->query($Chambretotal);
                            // Vérification si des résultats ont été retournés
                            if ($q_Chambretotal->num_rows > 0) {
                                // Récupération du nombre total de chambres
                                $row = $q_Chambretotal->fetch_assoc();
                                $r_Chambretotal = (int) $row['total_chambres'];
                            }
                                  
                            // requete qui permet de afficher nomre du chambre_livre et convertire en int 
                
                            $r_vR = "SELECT chambre_livree FROM room WHERE room_id = '$roomid'";
                            $q_chambreLivre = $conn->query($r_vR);
                
                            if ($q_chambreLivre->num_rows > 0) {
                                // Récupérer la valeur de chambre_livree
                                $row = $q_chambreLivre->fetch_assoc();
                                $r_chambreLivre = (int) $row['chambre_livree'];
                            }
                            $chambredisponible = $r_Chambretotal  - $r_chambreLivre;
                            // requette qui permet de compte les nombre du status  = pending  dans room_type = '$roomType'
    
                           //  $NPIO =   Nombre du status pending entre date entre et date sortire (date in / date out)
                           $NPIO = "SELECT COUNT(*) AS total_rooms
                           FROM transaction AS t
                           JOIN room AS r ON t.room_id = r.room_id
                           WHERE t.status = 'Pending' AND r.room_id = '$roomid'
                           AND  t.checkin < '$convertedDateout' AND t.checkout >='$convertedDatein'";
                                
                           $qN_S = $conn->query($NPIO);
    
                               // Vérification si la requête s'est exécutée avec succès
                               if ($qN_S->num_rows > 0) {
                                   // Récupération du nombre de chambres en attente
                                   $row = $qN_S->fetch_assoc();
                                   $rN_p = (int) $row['total_rooms'];
                                // echo '<script>alert("en pending    : ' . $rN_p . '");</script>';} 
                                }   
                                
                                $NPIP = "SELECT COUNT(*) AS total_rooms
                                FROM transaction AS t
                                JOIN room AS r ON t.room_id = r.room_id
                                WHERE t.status = 'Check In' AND r.room_id = '$roomid'
                                AND  t.checkin < '$convertedDateout' AND t.checkout >='$convertedDatein'";
                                     
                                $qN_S1 = $conn->query($NPIP);
         
                                    // Vérification si la requête s'est exécutée avec succès
                                    if ($qN_S1->num_rows > 0) {
                                        // Récupération du nombre de chambres en attente
                                        $row = $qN_S1->fetch_assoc();
                                        $rN_p1 = (int) $row['total_rooms'];
                                    //  echo '<script>alert("en Check In    : ' . $rN_p1 . '");</script>';
                                     }

                            
                            if(($rN_p >= 0 ) || $chambredisponible>=1 ){
                                $resultatschambre =$r_Chambretotal > $rN_p;
                                //  echo '<script>alert("resultats : ' . $resultatschambre . '");</script>';
                                 $me = $r_Chambretotal -$rN_p1  > 0;
                                //  echo '<script>alert("resultats : ' . $me . '");</script>';

                                if($resultatschambre){

                                         if($me)  
                                            {  
                                                 header('location:add_reserve.php');
                                            }else{
                                                echo boolToString(false);
                                            };           
                                    
                                
                                }
                                else
                                { 
                                   echo  boolToString(false);
                                }
                            

                            }else{ echo boolToString(false); }


                        }else{
                            echo '<script>alert("veuillez replire tout les champ ");</script>';
                        }

                        

                    
                    }
                    ?>

               
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">NOS Chambres</h2>
    <div class="container">
        <div class="row">

        <div class="col-lg-4 col-md-6 my-3">
 			<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
			  <img src="image/stand.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title">Standard chambre</h5>
			    <h6 class="mb-4">MAD 700 </h6>
			    <div class="features mb-4">
			    	<h6 class="mb-1">Caractéristiques</h6>
			    	<span class="badge rounded-pill bg-light text-dark text-wrap">
			    		1chambre
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
    				<div class="d-flex justify-content-evenly mb-2">
    					
    					<a href="#availability" class="btn btn-sm btn-outline-dark shadow-none">RESERVER</a>
    				</div>
			  </div>
			</div>
 		</div>

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
    				<div class="d-flex justify-content-evenly mb-2">
    					
    					<a href="#availability" class="btn btn-sm btn-outline-dark shadow-none">RESERVER</a>
    				</div>
			    </div>
			  </div>
			</div>
 		</div>

 		<div class="col-lg-4 col-md-6 my-3">
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
    				<div class="d-flex justify-content-evenly mb-2">
    			
    					<a href="#availability" class="btn btn-sm btn-outline-dark shadow-none">RESERVER</a>

    				</div>

			    </div>
			  </div>
			</div>
 		</div>

            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Plus de
                    Chambres >>></a>
            </div>
        </div>
    </div>



    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nos Services</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="image/transfert.jpg" width="130px">
                <h5 class="mt-3">Transferts aéroport en voiture et visite spéciale de la ville</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="image/salle.jpg" width="170px">
                <h5 class="mt-3">Salles de réunion</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="image/service.jpg" width="170px">
                <h5 class="mt-3">Services chambre 24h/24h</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="image/piscine.jpg" width="170px">
                <h5 class="mt-3">Piscine</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="image/parking.jpg" width="120px">
                <h5 class="mt-3">Parking gratuit pour les clients</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="aboutus.php" class="btn btn-sm btn-outline-dark rounded rounded-0 fw-bold shadow-none">Plus de
                    Services >>></a>
            </div>
        </div>
    </div>

    <!-- Testimonials -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Témoignages</h2>

<div class="container mt-5">
    <!-- Swiper -->
    <div class="swiper swiper-testimonials">
        <div class="swiper-wrapper mb-5">

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="image/t1.jpg" width="30px">
                    <h6 class="m-0 ms-2">sabrin</h6>
                </div>
                <p>
                Hôtel très bien situé, le personnel est disponible et aimable. Le petit déjeuner est varié et frais. Les chambres sont propres, calmes, confortables et jolies.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="image/t2.jpg" width="30px">
                    <h6 class="m-0 ms-2">ahmed</h6>
                </div>
                <p>
                Sejour impecable personnel au top.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

            <div class="swiper-slide bg-white p-4">
                <div class="profile d-flex align-items-center mb-3">
                    <img src="image/t3.jpg" width="30px">
                    <h6 class="m-0 ms-2">inaya</h6>
                </div>
                <p>
                L’hôtel est bien réglé, la chambre impeccable , le service excellent , le personnel est très gentil ,aimable et prêt a aider chaque fois que j'ai demandé d'aide et pour finir l’hôtel est très bien situé.
                </p>
                <div class="rating">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

    <!-- REach us-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Contacts et Localisation </h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1652.7053564793655!2d-4.983125985350323!3d34.05898433610186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2zRsOocw!5e0!3m2!1sfr!2sma!4v1687134486468!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4 ">
                <div class="bg-white p-4 rounded">
                    <h5>Appelez Nous</h5>
                    <a href="tel: +212 535555555" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 535555555</a>
                    <br>
                    <a href="tel: +212 535666666" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 535666666</a>
                </div>
                <div class="bg-white p-4 rounded">
                    <h5>Abonnés Vous </h5>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i>Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i>Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php require('footer.php') ?>
    <!-- JavaScript Bundle with Popper -->


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

        <script>
    // Récupérer l'élément input date
    var dateInInput = document.querySelector('input[name="checkin"]');
    var dateOutInput = document.querySelector('input[name="checkout"]');

    // Obtenir la date courante
    var currentDate = new Date();
    var currentDateString = currentDate.toISOString().split('T')[0]; // Format YYYY-MM-DD

    // Définir la valeur minimale de l'élément input date
    dateOutInput.setAttribute('min', currentDateString);
    dateInInput.setAttribute('min', currentDateString);

        </script>
</body>

</html>