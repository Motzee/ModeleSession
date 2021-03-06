<?php


/*Fonctions à appel de données*/

//récupérer un objet contenant les membres
function recupListeMembres() {
    $membres = file_get_contents('admin/membres.json') ;
    $membres = json_decode($membres) ; 
    return $membres ;
}

//ouvrir le fichier contenant les membres
function ouvrirListeMembres() {
    $fichier = fopen("admin/membres.json", "w") ;
    return $fichier ;
}


/*Gestion de l'authentification */

//vérifier qu'une personne est bien dans la liste des membres
function checkExisteMembre($membreTeste) {
    $listeMembres = recupListeMembres() ;

    if(isset($listeMembres->{$membreTeste})) {
        return true ;
    } else {
        return false ;
    }
}

function getMembre($identifiant) {
    $membres = recupListeMembres() ;
    $membre = $membres->{$identifiant} ;

    return $membre ;
}

//Ecriture d'une liste de membres dans le fichier JSON
function ecritureDansJSON($nouvelleListe) {
    $nouvelleListe = json_encode($nouvelleListe, JSON_PRETTY_PRINT);
    $fichier = ouvrirListeMembres() ;
    fwrite($fichier, $nouvelleListe) ;
    fclose($fichier) ;
}

function salageHashage($mdp, $sel) {
    $mdpCuisine = $mdp.$sel ;
    return hash('sha256', $mdpCuisine) ;
}

function checkMDP($identifiant, $mdp) {
    if(checkExisteMembre($identifiant)) {
        $listeMembres = recupListeMembres() ;
        
        $sel = $listeMembres->{$identifiant}->{'sel'} ;
        
        $mdpHashe = salageHashage($mdp, $sel) ;

        if($listeMembres->{$identifiant}->{'mdp_hash'} == $mdpHashe) {
            return true ;
        } else {
            return false ;
        }
    } else {
        return false ;
    }
}

/* Gestion de session */

function chargeSession($identifiant) {
    $_SESSION['identifiant'] = $identifiant ;
    header('Location:index.php') ;
    http_response_code(200);
    exit ;
}

