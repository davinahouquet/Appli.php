<?php
    session_start();
if(isset($_POST['submit'])){            //Limite l'accès à traitrement.php ppar les seules requêtes HTTP de la soumission du formulaire

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS); //Supprime caractères spéciaux + balises HTML
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION); //Valide prix que si virgule ou point
    $qtt = filter_input(INPUT_POST,"qtt", FILTER_SANITIZE_SPECIAL_CHARS); //Valide quantité que si c'est un entier différent de zéro

    if($name && $price && $qtt){ //Vérifie que les données sont nettoyées (valeur jugée positive par php)

            $product = [ //Tabl associatif 
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price *$qtt
            ];
            $_SESSION['products'][] = $product; //Doit aussi être un tableau pour pouvoir y stocker de nvx produits
    }
}
header("Location:index.php");
?>