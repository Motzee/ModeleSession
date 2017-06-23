<?php session_start(); ?>

<!DOCTYPE html>

<html>
<?php
    require_once("ressources/import.php") ;
?>

<?php
    echo $_SESSION['identifiant'] ;

    if(isset($_POST['suppr'])) {
        echo "Attention, ça supprime..." ;
        $utilisateur->supprimerCompte($identifiant) ;
    } elseif(isset($_POST['reset'])) {
        header('Location:index.php') ;
        http_response_code(200);
        exit ;
    } else {
    ?>
    <body>
        <form method="POST" action="desinscription.php">

            <p>Attention, la suppression d'un compte est définitive, êtes-vous sûr/e de votre décision ?</p>
                <input name="reset" type="submit" value="Non, annuler" />
                <input name="suppr" type="submit" value="Oui, Supprimer" />

        </form>

    </body>
    </html>

    <?php
    }

?>