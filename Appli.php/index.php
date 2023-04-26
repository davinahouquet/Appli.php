<!-- L'important est de garder le "coeur" de la page. = ce qui change !
Ce qui ne change pas va dans le template -->


<!-- ob_start commence l'enregistrement -->
<?php 

ob_start()

?>

<div class="container-sm">
  <h1>Ajouter un produit</h1>
    <form action="traitement.php?action=addProduct" method="post">
      <p>
        <label>Nom du produit :
          <input type="text" name="name">
        </label>
      </p>
      <p>
        <label>Prix du produit :
          <input type="number" step="any" name="price">
        </label>
      </p>
      <p>
        <label>Quantité désirée :
          <input type="number" name="qtt" value="1">
        </label>
      </p>
      <p>
        <label>Description :
          <textarea type="text" name="details"  rows="1" cols="25"></textarea>
        </label>
      </p>
      <p>
        <input type="submit" name="submit" value="Ajouter le produit">
      </p>
    </form>    
</div>  


<?php
// ob_get_clean arrête l'enregistrement et stocke les infos dans la variable $contenu
$contenu = ob_get_clean();

// $titre est dans le template
$titre = "Ajout produit";

// require est comme une une fonction copier/coller du template
require "template.php";