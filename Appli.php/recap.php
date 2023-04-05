<?php
    session_start(); //Récupère la session corresponsant à l'utilisateur
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitualtif des produits</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else {
            echo "<table>", //Tableau HTML pour bien décomposer les données de chaque produit
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

            foreach($_SESSION['products'] as $index => $product){      //Pour chaque donnée dans $_SESSION['product'] il y a 2 variable dans la boucle
                echo "<tr>",
                        "<td>".$index."</td>",                         //aura pour valeur l'index du tabl $_SESSION['product']parcouru.
                        "<td>".$product['name']."</td>",               //$product contiendra le produit sous forme de tabl, tel que créé et stocké en session fich traitement.php
                        "<td>".$product['price']."</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".$product['total']."</td>",
                    "</tr>";
            }
            echo "</tbody>",
                "</table>";
        }
    ?>

</body>
</html>