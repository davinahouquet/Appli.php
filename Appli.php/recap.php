<?php
    session_start(); //Récupère la session corresponsant à l'utilisateur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitualtif des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    
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
          <a class="nav-link" href="http://localhost/Appli.php/Appli.php/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/Appli.php/Appli.php/recap.php">Récapitulatif</a>
</li>
      </ul>
    </div>
  </div>
 <a href="http://localhost/Appli.php/Appli.php/recap.php">
  <button type="button" class="btn btn-dark position-relative">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg></li>
  <span class="position-static top-0 start-100 translate-middle badge rounded-pill bg-danger">

  <?php 
  //if le panier est rempli sinon 
  if(empty($_SESSION['products'])){
    echo "0";
  } else {
    $totalGeneral = 0;
    foreach($_SESSION['products'] as $index => $product){
    $totalGeneral += $product['qtt'];
}  
  echo $totalGeneral;
  }
    ?>

  </span>
</button>
</a>
</nav>
<div class="container-sm">
        <h1>Récapitulatif des produits</h1>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else {
            echo "<table class='table container'>", //Tableau HTML pour bien décomposer les données de chaque produit
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th> </th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){      //Pour chaque donnée dans $_SESSION['product'] il y a 2 variable dans la boucle
                echo "<tr>",
                        "<td>".$index."</td>",                         
                        "<td><a href='traitement.php?action=details&index=$index'><button type='button' class='btn btn-light' data-toggle='modal' data-target='#productModal'>".$product['name']."</button></a>

                        <div id='productModal' class='modal fade' role='dialog'>
                          <div class='modal-dialog'>

                            <div class='modal-content'>
                              <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>".$product['name']."</h4>
                              </div>
                              <div class='modal-body'>
                                <p>".$product['details']."</p>
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                              </div>
                            </div>
                          
                          </div>
                        </div>
                        </td>
                        <td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='traitement.php?action=decreaseProduct&index=$index'><button type='button' class='btn btn-outline-dark'>  -  </button></a>   ".$product['qtt']."   <a href='traitement.php?action=increaseProduct&index=$index'><button type='button' class='btn btn-outline-dark'> + </button></a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='traitement.php?action=delete&index=$index'><button type='button' class='btn-close' aria-label='Close'></button></a>";
                    "</tr>";                                          //La boucle créera ligne <tr>+ toutes les cellules <td> nécessaire à chaque partie du produit à afficher
                $totalGeneral += $product['total'];
            }
            echo "<tr>",
                    "<td colspan = 4><strong>Total général : </strong></td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "<td><a href='traitement.php?action=deleteAll'><button type='button' class='btn-close' aria-label='Close'></button></a></td>",
                    "</tr>",
                    "</tbody>",
                "</table>";
                
            }
        
       ?>
       
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>