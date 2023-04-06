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
  // Resta à faire : faire le foreach qui affichera la qtt de produit dans le badge

    $totalGeneral = 0;
    foreach($_SESSION['products'] as $index => $product){
    $totalGeneral += $product['qtt'];
}  
  echo $totalGeneral;
    ?>

    <span class="visually-hidden">unread messages</span>
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
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){      //Pour chaque donnée dans $_SESSION['product'] il y a 2 variable dans la boucle
                echo "<tr>",
                        "<td>".$index."</td>",                         //aura pour valeur l'index du tabl $_SESSION['product']parcouru.
                        "<td>".$product['name']."</td>",               //$product contiendra le produit sous forme de tabl, tel que créé et stocké en session fich traitement.php
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "</tr>";                                          //La boucle créera ligne <tr>+ toutes les cellules <td> nécessaire à chaque partie du produit à afficher
                $totalGeneral += $product['total'];
            }
            echo "<tr>",
                    "<td colspan = 4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                    "</tbody>",
                "</table>";
        }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</div>
</body>
</html>