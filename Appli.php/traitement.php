<?php
session_start();

if(isset($_POST['submit'])){            //Limite l'accès à traitrement.php ppar les seules requêtes HTTP de la soumission du formulaire

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING); //Supprime caractères spéciaux + balises HTML
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION); //Valide prix que si virgule ou point
    $qtt = filter_input(INPUT_POST,"qtt", FILTER_VALIDATE_INT); //Valide quantité que si c'est un entier différent de zéro

    if($name && $price && $qtt){ //Vérifie que les données sont nettoyées (valeur jugée positive par php)

            $product = [ //Tabl associatif 
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price *qtt
            ];

            $_SESSION['product'][] = $product;
    }
}
header("Location:index.php");
?>