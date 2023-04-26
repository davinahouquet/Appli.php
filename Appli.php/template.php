<?php
// Template est le "fichier type" réutilisable : ex. la barre de navigation se retrouve dans toutes les
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <title><?= $titre ?></title>
    </head>
    <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="http://localhost/Appli.php/Appli.php/index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/Appli.php/Appli.php/recap.php">Récapitulatif</a>
            </li>
          </ul>
        </div>
      </div>
      <a href="http://localhost/Appli.php/Appli.php/recap.php">
        <button type="button" class="btn btn-dark position-relative">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bag-fill" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>Panier</svg></li>
              <span class="position-static top-0 start-100 translate-middle badge rounded-pill bg-danger">
    
<?php 
  

  
  //Pour afficher la quantité de produit dans le panier
  if(empty($_SESSION['products'])){
    echo "0";
  } else {
  $totalGeneral = 0;
  foreach($_SESSION['products'] as $index => $product){
  $totalGeneral += $product['qtt'];
} echo $totalGeneral;
  }

?>

            </span>
        </button>
      </a>
    </nav>



<?= $contenu ?>



<?php

$message = (isset($_SESSION['message']))?
$_SESSION['message']: null;
echo $message;
unset($_SESSION['message']);


?>

           
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>

