<?php session_start(); ?>

<!DOCTYPE html>

<html>
<?php
    require_once("ressources/import.php") ;
?>

<body>
    <?php
    //Si aucune session n'est lancée, on retourne à l'index
    
    if(!autoriseAccesUser($identifiant, "user")) {
        header('Location:index.php') ;
        http_response_code(200);
        exit ;
    } else {
        ?>
        <p>Vous êtes autorisé/e à consulter cette page</p>
        <p>
            <a href="deconnexion.php" title="Se déconnecter">[X]</a><br/><br/>
            <a href="desinscription.php" title="Effacer le compte">[Supprimer le compte]</a>
        </p>
        <?php
    }
    ?>

</body>

</html>
