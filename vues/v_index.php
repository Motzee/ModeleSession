<h1>Authentifiez-vous</h1>
<form id="formAuthentifie" action="index.php" method="POST">
    <p><label for="identifiant" required >Identifiant</label>
        <input id="identifiant" name="identifiant" type="text" required /></p>

    <p><label for="mdp" required >Mot de passe</label>
        <input id="mdp" name="mdp" type="password" required /></p>

    <p>
        <input type="radio" name="authentifie" value="login" id="login" checked /> <label for="login">Se connecter</label>
        <input type="radio" name="authentifie" value="signin" id="signin" /> <label for="signin">Créer un compte</label>
    </p>

    <p><input type="submit" value="S'authentifier" /></p>
</form>