<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Ajout produit</title>
    </head>
    <body>
    <nav class="nav">
    <a class="nav-link active" aria-current="page" href="http://localhost/Appli.php/Appli.php/index.php/">Accueil</a>
    <a class="nav-link active" aria-current="page" href="http://localhost/Appli.php/Appli.php/recap.php">Récapitulatif</a>
</nav>
            <h1>Ajouter un produit</h1>
            <form action="traitement.php" method="post">
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>      
    </body>
</html>