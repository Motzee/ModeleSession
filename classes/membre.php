<?php

class Membre implements JsonSerializable {
    private $_pseudo ;
    private $_statut ;
    private $_dateInscription ;
    private $_clef_hash ;
    private $_mdp_hash ;

    //fonction constructrice
    public function __construct($pseudo, $statut, $clef_hash, $mdp_hash) {
        $this -> setPseudo($pseudo) ;
        $this -> setStatut($statut) ;
        $this -> setDateInscription() ;
        $this -> setClef_hash($clef_hash) ;
        $this -> setMdp_hash($mdp_hash) ;
    }

    //fonctions SET
    private function setPseudo($pseudo) {
        $this -> _pseudo = $pseudo ;
    }
    
    private function setStatut($statut) {
        $this -> _statut = $statut ;
    }

    private function setDateInscription() {
        $maintenant = new DateTime() ;
        $this -> _dateInscription = $maintenant ;
    }

    private function setClef_hash($clef_hash) {
        $this -> _clef_hash = $clef_hash ;
    }

    private function setMdp_hash($mdp_hash) {
        $this -> _mdp_hash = $mdp_hash ;
    }

    //fonctions GET
    public function getPseudo() {
        return $this -> _pseudo ;
    }
    
    public function getStatut() {
        return $this -> _statut ;
    }

    public function getDateInscription() {
        return $this -> _dateInscription ;
    }

    public function getClef_hash() {
        return $this -> _clef_hash ;
    }

    public function getMdp_hash() {
        return $this -> _mdp_hash ;
    }

    //fonctions
    public function jsonSerialize() {
        return [
            'pseudo' => $this -> getPseudo(),
            'statut' => $this -> getStatut(),
            'dateInscription' => $this -> getDateInscription(),
            'sel' => $this -> getClef_hash(),
            'mdp_hash' => $this -> getMdp_hash()
        ] ;
    }

    public function inscription($identifiant, $objProfil) {
        //récupérer la liste des membres et en faire un objet
        $listeMembres = recupListeMembres() ;
        $listeMembres->{$identifiant} = $objProfil ;

        ecritureDansJSON($listeMembres) ;

    }

    public function identification() {
        
    }

}