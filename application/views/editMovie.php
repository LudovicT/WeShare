<div id="new_film">
			<form method="post" action="/WeShare/Films/Editer/<?php echo (generateUrl($infoMovie['Name'])."/".$infoMovie['IdMovie']); ?>/">
				<span><label>Titre du film :</label><input type="text" value="<?php echo $infoMovie['Name']; ?>" id="Name" name="Name" class="recherche" /></span><br /><br />
				<span><label>Realisateur :</label><input type="text" value="" id="realisateur" name="realisateur" /></span><br /><br />
				<span><label>Acteurs :</label><input type="text" value="" id="acteurs" name="acteurs" /></span><br /><br />
				<span><label>Date Realisation :</label><input type="text" value="<?php echo $infoMovie['DateOfRelease']; ?>" id="DateOfRelease" name="DateOfRelease" /></span><br /><br />
				<span><label>Genre :</label><input type="text" value="" id="genre" name="genre" /></span><br /><br /><br />
				<span style="text-align:left;"><label>Synopsis :</label><br/><textarea id="Synopsis" name="Synopsis" style="width:480px;" rows="15"><?php echo $infoMovie['Synopsis']; ?></textarea></span><br /><br />
				<span  style="text-align:left;"><label>Dur�e :</label><input type="text" value="<?php echo $infoMovie['Runtime']; ?>"  id="Runtime" name="Runtime" style="width:100px;" size="1" /> min</span><br /><br />
				<span  style="text-align:left;"><label>Note :</label><input type="text" value=""  id="note" style="width:18px;" size="1"  name="note" /> / 10</span><br /><br />
				<span><label>Poster du film :</label><input type="text" value="<?php echo $infoMovie['Poster']; ?>" id="Poster" name="Poster" /></span><br /><br /><br />
				<input type="hidden" id="affiche" name="affiche" /></span>
				<div class="button_submit"><input type="submit" value="Modifier le film" /></div>
			</form>
		</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>