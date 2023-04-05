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
          <a class="nav-link" href="http://localhost/Appli.php/Appli.php/index.php/">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/Appli.php/Appli.php/recap.php/">Récapitulatif</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
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

</body>
</html>