<div id="connexion">
	<form method="post" enctype="multipart/form-data" action="/WeShare/Films/addFilms/">
	<h1> Nouveau Film </h1>
		<p><span><label><strong>Titre du film :</strong></label><input type="text" value="" id="Name" name="Name" class="recherche" /></span></p>
		<p><span><label><strong>Date Realisation :</strong></label><input type="text" value="" id="DateOfRelease" name="DateOfRelease" /></span></p>
		<p><span><label><strong>Synopsis :</strong></label></span><textarea class='textarea4' id="Synopsis" name="Synopsis" rows="8"></textarea></p>
		<p><span><label><strong>Jaquette du film :</strong>
		<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
		<input name="userfile" type="file" size='13' /></br>(maximum 400ko)</label></span></p>
		<p><input type="submit" value="Ajouter le film" /></p>
	</form>
</div>