<?php




if(isset($_SESSION['identifiant']) && $_SESSION['identifiant'] != null && checkExisteMembre($_SESSION['identifiant'])) {
    //on crée un objet issu de ses données
    $identifiant = $_SESSION['identifiant'] ;
    $membre = getMembre($identifiant) ;
    $pseudo = $membre->{'pseudo'} ;
    $statut = $membre->{'statut'} ;
    $dateInscription = $membre->{'dateInscription'} ;

    switch($statut) {
        case "admin" :
            $utilisateur = new Admin($identifiant, $pseudo, $dateInscription) ;
        break ;
        case "modo" :
            $utilisateur = new Modo($identifiant, $pseudo, $dateInscription) ;
        break ; 
        case "user" :
            $utilisateur = new User($identifiant, $pseudo, $dateInscription) ;
        break ;
        default : "une erreur de statut est survenue" ;
    }
    

}