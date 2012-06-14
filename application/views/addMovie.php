<div id="new_film">
	<form method="post" action="/WeShare/Films/addFilms/">
		<span><label>Titre du film :</label><input type="text" value="" id="Name" name="Name" class="recherche" /></span><br /><br />
		<span><label>Date Realisation :</label><input type="text" value="" id="DateOfRelease" name="DateOfRelease" /></span><br /><br />
		<span style="text-align:left;"><label>Synopsis :</label><br/><textarea id="Synopsis" name="Synopsis" style="width:480px;" rows="15"></textarea></span><br /><br />
		<span  style="text-align:left;"><label>Durée :</label><input type="text" value=""  id="Runtime" name="Runtime" style="width:23px;" size="1" /> min</span><br /><br />
		<span><label>Poster du film :</label><input type="text" value="" id="Poster" name="Poster" /></span><br /><br /><br />
		<div class="button_submit"><input type="submit" value="Ajouter le film" /></div>
	</form>
</div>