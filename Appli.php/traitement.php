<?php
session_start();
if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'addProduct':
            if (isset($_POST['submit'])) {            //Si l'action d'envoyer le formulaire est bien faite

                /* On filtre les inputs du formulaire */
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS); //Supprime caractères spéciaux + balises HTML
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); //Valide prix que si virgule ou point
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_SANITIZE_SPECIAL_CHARS); //Valide quantité que si c'est un entier différent de zéro


                if ($name && $price && $qtt) {

                    $product = [ //Tabl associatif 
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];
                    $_SESSION['products'][] = $product; //Doit aussi être un tableau pour pouvoir y stocker de nvx produits
                    $_SESSION['message'] = "Le produit " . $name . " a bien été ajouté";
                    $_SESSION['totalQtt']+=$qtt;
                } else {
                    $_SESSION['message'] = "Erreur, le produit n'a pas été ajouté.";
                }
                header("Location:index.php");
            }
            break;

        //Pour supprimer tous les articles
        case 'deleteAll':
            unset($_SESSION['products']);
            header("Location:recap.php");
            break;

        //Pour supprimer un article
        case 'delete':
            unset($_SESSION['products'][$_GET['index']]);
            header('Location:recap.php');

            break;
        
        //Pour augmenter la quantité d'un produit
        case 'increaseProduct':
          $_SESSION['products'][$_GET['index']]['qtt']++; //Returns $x, then increments $x by one
          $_SESSION['products'][$_GET['index']]['total'] += $_SESSION['products'][$_GET['index']]['price'];
        header("Location:recap.php");
        break;

        //Pour diminuer la quantité d'un produit
        case 'decreaseProduct':
            $_SESSION['products'][$_GET['index']]['qtt']--; //Returns $x, then decrements $x by one
            $_SESSION['products'][$_GET['index']]['total'] -= $_SESSION['products'][$_GET['index']]['price'];
        header("Location:recap.php");
        break;
    }
}