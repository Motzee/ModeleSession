<?php
function autoriseAccesUser($identifiant, $statutRequis) {
    if(checkExisteMembre($identifiant)) {
        $membre = getMembre($identifiant) ;
        switch($statutRequis) {
            case "user" :
                if(in_array($membre->{'statut'}, ["user", "modo", "admin", "superadmin"])) {
                    return true ;
                } else {
                    return false ;
                }
            break ;
            case "modo" :
                if(in_array($membre->{'statut'}, ["modo", "admin", "superadmin"])) {
                    return true ;
                } else {
                    return false ;
                }
            break ;
            case "admin" :
                if(in_array($membre->{'statut'}, ["admin", "superadmin"])) {
                    return true ;
                } else {
                    return false ;
                }
            break ;
            default : echo "problème de statut" ;
        }
        
        
        
        $membre = getMembre($identifiant) ;
        if($membre->{'statut'} == $statutRequis) {
            return true ;
        } else {
            return false ;
        }
    }
}