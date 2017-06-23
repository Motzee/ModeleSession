<?php
class User implements JsonSerializable {
    protected $identifiant ;
    protected $pseudo ;
    private $_statut ;
    protected $dateInscription ;

    //fonction constructrice
    public function __construct($ide, $pseudo, $dateInscript) {
        $this -> setIdentifiant($ide) ;
        $this -> setPseudo($pseudo) ;
        $this -> setStatut() ;
        $this -> setDateInscription($dateInscript) ;
    }

    //fonctions SET
    protected function setIdentifiant($id) {
        $this -> identifiant = $id ;
    }
    
    protected function setPseudo($pseudo) {
        $this -> pseudo = $pseudo ;
    }

    private function setStatut() {
        $this -> _statut = "user" ;
    }

    protected function setDateInscription($date) {
        $this -> dateInscription = $date ;
    }



    //fonctions GET

    public function getIdentifiant() {
        return $this -> identifiant ;
    }
    
    public function getPseudo() {
        return $this -> pseudo ;
    }

    public function getStatut() {
        return $this -> _statut ;
    }

    public function getDateInscription() {
        return $this -> dateInscription ;
    }


    //fonctions
    public function jsonSerialize() {
        return [
            'identifiant' => $this -> getIdentifiant(),
            'pseudo' => $this -> getPseudo(),
            'statut' => $this -> getStatut(),
            'dateInscription' => $this -> getDateInscription()
        ] ;
    }

    public function deconnexion() {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();

        //redirection vers l'accueil
        header('Location:index.php') ;
        http_response_code(200);
        exit ;
    }

    public function supprimerCompte($ide) {

        //suppression du membre dans la liste des membres
        $membres = recupListeMembres($ide) ;

        unset($membres->{$ide}) ;

        $membres = json_encode($membres, JSON_PRETTY_PRINT);

        ecritureDansJSON($membres) ;

        $this -> deconnexion() ;

    }
}