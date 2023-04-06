<?php
    session_start();
if(isset($_POST['submit'])){            //Si l'action d'envoyer le formulaire est bien faite

    /* On filtre les inputs du formulaire */
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS); //Supprime caractères spéciaux + balises HTML
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION); //Valide prix que si virgule ou point
    $qtt = filter_input(INPUT_POST,"qtt", FILTER_SANITIZE_SPECIAL_CHARS); //Valide quantité que si c'est un entier différent de zéro

 
    if($name && $price && $qtt){ 

            $product = [ //Tabl associatif 
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price *$qtt
            ];
            $_SESSION['products'][] = $product; //Doit aussi être un tableau pour pouvoir y stocker de nvx produits
            $_SESSION['message']= "Le produit " .$name. " a bien été ajouté";
} else {
    $_SESSION['message'] = "Message d'erreur";
}
header("Location:index.php");
}
?>