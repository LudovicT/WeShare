<div id="new_film">
	<form method="post" enctype="multipart/form-data" action="/WeShare/Films/addFilms/">
		<span><label>Titre du film :</label><input type="text" value="" id="Name" name="Name" class="recherche" /></span><br /><br />
		<span><label>Date Realisation :</label><input type="text" value="" id="DateOfRelease" name="DateOfRelease" /></span><br /><br />
		<span style="text-align:left;"><label>Synopsis :</label><br/><textarea id="Synopsis" name="Synopsis" style="width:480px;" rows="15"></textarea></span><br /><br />
		<span><label>Jaquette du film :
		<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
		fichier : <input name="userfile" type="file" />(maximum 400ko)<br /><br />
		<div class="button_submit"><input type="submit" value="Ajouter le film" /></div>
	</form>
</div>