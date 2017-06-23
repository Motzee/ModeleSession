<?php session_start(); ?>

<!DOCTYPE html>

<html>
<?php
    require_once("ressources/import.php") ;
?>

<body>
    <?php
    //Si aucune session n'est lancée, on retourne à l'index
    
    if(!autoriseAccesUser($identifiant, "admin")) {
        header('Location:index.php') ;
        http_response_code(200);
        exit ;
    } else {
        include_once('vues/v_admin.php') ;
    }
    ?>

</body>

</html>
