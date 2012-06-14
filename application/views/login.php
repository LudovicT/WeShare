	<!--Start of connection page-->

	<div id="connexion">
    <form action="/WeShare/Login/" method="post">
        Veuillez entrer vos identifiants pour vous connecter:<br /></br>
        <div class="center">
            <label for="username">Nom d'utilisateur</label><input type="text" name="pseudo" id="pseudo"/><br /></br>
            <label for="password">Mot de passe</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" id="password" /><br /></br>
            <input type="submit" value="Connection" id="valider" />
		</div>
    </form>
	<p id = "message"><?php if(isset($errorConnect) && $errorConnect == 1) echo "Votre combinaison pseudo/mot de pass est incorrecte" ?></p>
</div>
	<!--End of connection page-->
	