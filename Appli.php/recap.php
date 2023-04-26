<?php 

ob_start() 

?>

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
      foreach($_SESSION['products'] as $index => $product){ //Pour chaque donnée dans $_SESSION['product'] il y a 2 variable dans la boucle
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
            "</tr>"; //La boucle créera ligne <tr>+ toutes les cellules <td> nécessaire à chaque partie du produit à afficher
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

$contenu = ob_get_clean();
$titre = "Recapitulatif";
require "template.php";

?>
