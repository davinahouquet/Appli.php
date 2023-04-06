<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
        <title>Ajout produit</title>
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
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
Panier</svg></li>
  <span class="position-static top-0 start-100 translate-middle badge rounded-pill bg-danger">
    
  <?php 
  
  session_start();
  
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
<div class="container-sm">
            <h1>Ajouter un produit</h1>
            <form action="traitement.php?action=addProduct" method="post">
                <p>
                    <label>
                        Nom du produit :
                        <input type="text" name="name">
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit :
                        <input type="number" step="any" name="price">
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée :
                        <input type="number" name="qtt" value="1">
                    </label>
                </p>
                <p>
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>
            </form>    
</div>  
<?php

$message = (isset($_SESSION['message']))?
$_SESSION['message']: null;
echo $message;
unset($_SESSION['message']);


?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>      
        </body>
</html>

