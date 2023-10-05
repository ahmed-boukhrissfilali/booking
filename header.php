<nav class="navbar navbar-expand-lg bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container  cint">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">
      <img src="./image/Logo.png" style="width: 70px; height: 70px;" alt="Logo de votre site">
    </a>

    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse container d-flex align-items-center rounded" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="aboutus.php">À Propos de Nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="gallery.php">Galerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="rooms.php">Nos Chambres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="contactus.php">Contactez-Nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="rulesandregulation.php">Règles et Conditions</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
#navbarSupportedContent {
  display: flex;
  align-items: center;
  justify-content: center;
}

.navbar-nav .nav-item {
  position: relative;
}

.navbar-nav .nav-link {
  padding: 10px 20px;
  color: #333;
  transition: color 0.3s;
}

.navbar-nav .nav-link:hover {
  color: #080202;
}

.navbar-nav .nav-link::before {
  content: "";
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0%;
  height: 2px;
  background-color: #F29727;
  transition: width 0.3s;
}

.navbar-nav .nav-link:hover::before {
  width: 100%;
}

.navbar-brand img {
  transition: transform 0.3s;
}

.navbar-brand img:hover {
  transform: rotate(360deg);


}
</style>
