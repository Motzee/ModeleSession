<?php session_start(); ?>

<!DOCTYPE html>

<html>
<?php
    require_once("ressources/import.php") ;
?>

<body>
    <?php

    //si la session existe, on charge un objet correspondant 
    if(isset($_SESSION['identifiant'])) {
        header('Location:pagemembre.php') ;
        http_response_code(200);
        exit ;      

    //sinon si le formulaire est rempli, on identifie ou inscrit la personne, on crée une session et un objet correspondant
    } elseif(isset($_POST['identifiant']) && isset($_POST['mdp']) && isset($_POST['authentifie'])) {
        //on prépare les variables (A SECURISER)
        $ide = $_POST['identifiant'] ;
        $authentifie = $_POST['authentifie'] ;
        $mdp = $_POST['mdp'] ;


        switch($authentifie) {
            case 'login' :
                if(!checkExisteMembre($ide) || !checkMDP($ide, $mdp)) {
                    echo "Identifiant et/ou mot de passe incorrect(s)" ;
                } else {
                    //chargement d'une session
                    chargeSession($ide) ;
                }
            break ;

            case 'signin' :
                //on vérifie que le pseudo ne soit pas déjà pris
                if(checkExisteMembre($ide)) {
                    echo "Ce pseudo est déjà pris, veuillez en choisir un autre" ;
                } else {
                    //préparation du mdp avec son hash
                    $sel = "!!!!!!!!!!" ; //il faudra en générer un aléatoirement
                    $mdpHashe = salageHashage($mdp, $sel) ;
                    $pseudo = $ide ;
                   
                    //création d'un objet membre
                    $nouveauMembre = new Membre($pseudo, "user", $sel, $mdpHashe) ;
                    
                    //ajout de l'objet nouveau membre dans la liste actuelle JSON
                    ajoutMembreDansJSON($ide, $nouveauMembre) ;

                    //chargement d'une session
                    chargeSession($ide) ;
                }
            break ;
            default : echo "Une erreur dans la méthode d'authentification est survenue" ;
        }

    //sinon on affiche le formulaire d'authentification
    } else {
        include_once("vues/v_index.php") ;
    }