<?php
if(isset($_POST['userEdit']) && $_POST['userEdit'] != null && isset($_POST['droits']) && $_POST['droits'] != null) {
// on récupère le membre

//on édite son statut

//on le restocke

//enfin, à faire ailleurs...
}
?>
<h2>Donner des droits supplémentaires à un utilisateur</h2>

<form action="#" method="POST">
<p><label for="userEdit">Choisissez la personne</label>
<!--Boucle à faire pour intégrer les personnes-->
    <select name="userEdit" id="userEdit">
        <option value="sophie">Sophie</option>
        <option value="test">Test</option>
        <option value=""></option>
    </select> </p>

<p><label for="droits">Droits à octroyer</label>
    <select name="droits" id="droits">
        <option value="banni">Banni(e)</option>
        <option value="user" selected >Utilisateur/trice simple</option>
        <option value="modo">Modérateur/trice</option>
        <option value="admin">Administrateur/trice</option>
    </select> </p>

<p><input type="submit" value="Attribuer la permission" /></p>

</form>