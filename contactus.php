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



</head>
<body>

<?php require('header.php'); ?>

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">Contactez Nous</h2>

  <div class="h-line bg-dark"></div>
  <p class="text-center mt-3">
   Vous pouvez nous contactez et nous envoyez un message facilement !
  </p>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">
      <iframe class="w-100 rounded" height="320px"  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1652.7053564793655!2d-4.983125985350323!3d34.05898433610186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2zRsOocw!5e0!3m2!1sfr!2sma!4v1687134486468!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <h5>Address</h5>
        <!-- <a href="https://goo.gl/maps/jFdoRUnTvq314zJy6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <i class="bi bi-geo-alt-fill"></i> av khattabi; ville fes .
        </a> -->
        <h5 class="mt-4">Appelez Nous</h5>
        <a href="tel: +212 535555555" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 535555555</a>
        <br>
        <a href="tel: +212 535666666" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +212 535666666</a>
        <h5 class="mt-4">Email</h5>
        <a href="mailto: dineshslweb@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-fill"></i> AHLFESHTL@gmail.com</a>

        <h5 class="mt-4">Abonnés vous</h5>
        <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-twitter me-1"></i>
        </a>
        
        <a href="#" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook me-1"></i>
        </a>
        
        <a href="#" class="d-inline-block text-dark fs-5">
          <i class="bi bi-instagram me-1"></i>
          
        </a>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-5 px-4">
      <div class="bg-white rounded shadow p-4">
        <form method='post'>
          <h5>Envoyer un message</h5>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Nom</label>
          <input type="text" class="form-control shadow-none" name='nom'>
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Email</label>
          <input type="email" class="form-control shadow-none"  name='email'>
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;">Objet</label>
          <input type="text" class="form-control shadow-none" name='subject'>
          </div>
          <div class="mb-3">
          <label class="form-label" style="font-weight: 500;" >Message </label>
          <textarea class="form-control shadow-none" rows="5" style="resize: none;" name='message'></textarea>
          </div>
          <div class="d-flex justify-content-evenly mb-2">
          <!-- <input type="submit"  name="submit" class=" btn-outline-dark shadow-none" >Envoyer</i> -->
          <!-- <div class="col-lg-1 d-flex mb-lg-3 mt-4"> -->
                           
                            <button type="submit" name="submit" class="btn btn-sm btn-outline-dark shadow-none">Envoyer</button>
                        </div>

          
    					
    					
    					
    					<!-- <input name='submit' type='submit'  class="btn btn-sm btn-outline-dark shadow-none" >Envoyer</input>
    				</div> -->
        </form>
      </div>
      <?php 
// connexion avec la base donnes
require_once 'admin/connect.php';
// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les valeurs du formulaire
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
     // Préparer la requête d'insertion
     $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

     // Exécuter la requête d'insertion
     if ($conn->query($sql) === true) {
         // Succès de l'insertion, afficher la notification
         echo '<script>alert("Message envoyé avec succès.");</script>';
     } else {
         // Erreur lors de l'insertion, afficher un message d'erreur
         echo "Erreur : " . $sql . "<br>" . $conn->error;
     }
 
     // Fermer la connexion à la base de données
     $conn->close();
 }?>
    </div>
</div>
    
  </div>
</div>
<hr>
<?php require('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>