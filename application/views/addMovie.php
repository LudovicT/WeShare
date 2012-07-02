<div id="connexion">
	<form method="post" enctype="multipart/form-data" action="/WeShare/Films/addFilms/">
	<h1> Nouveau Film </h1>
		<p><span><label><strong>Titre du film :</strong></label><input type="text" value="" id="Name" name="Name" class="recherche" /></span><br /><br /></p>
		<p><span><label><strong>Date Realisation :</strong></label><input type="text" value="" id="DateOfRelease" name="DateOfRelease" /></span><br /><br /></p>
		<span style="text-align:left;"><label><strong>Synopsis :</strong></label><br/><textarea id="Synopsis" name="Synopsis" style="width:480px;" rows="15"></textarea></span><br /><br />
		<p><span><label><strong>Jaquette du film :</strong>
		<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
		<input name="userfile" type="file" /></br>(maximum 400ko)<br /><br /></p>
		<div class="button_submit"><input type="submit" class="button2" value="Ajouter le film" /></div>
	</form>
</div>