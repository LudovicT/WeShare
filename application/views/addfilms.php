<div id="new_film">
			<form method="post" action="/WeShare/Films/addFilms/">
				<span><label>Titre du film :</label><input type="text" value="" id="Name" name="titre" class="recherche" /></span><br /><br />
				<span><label>Realisateur :</label><input type="text" value="" id="realisateur" name="realisateur" /></span><br /><br />
				<span><label>Acteurs :</label><input type="text" value="" id="acteurs" name="acteurs" /></span><br /><br />
				<span><label>Date Realisation :</label><input type="text" value="" id="DateOfRelease" name="date_realisation" /></span><br /><br />
				<span><label>Genre :</label><input type="text" value="" id="genre" name="genre" /></span><br /><br /><br />
				<span style="text-align:left;"><label>Synopsis :</label><br/><textarea id="Synopsis" name="synopsis" style="width:480px;" rows="15"></textarea></span><br /><br />
				<span  style="text-align:left;"><label>Durée :</label><input type="text" value=""  id="duree" name="duree" style="width:23px;" size="1" /> min</span><br /><br />
				<span  style="text-align:left;"><label>Note :</label><input type="text" value=""  id="note" style="width:18px;" size="1"  name="note" /> / 10</span><br /><br />
				<input type="hidden" id="affiche" name="affiche" /></span>
				<div class="button_submit"><input type="submit" value="Ajouter le film" /></div>
			</form>
		</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>