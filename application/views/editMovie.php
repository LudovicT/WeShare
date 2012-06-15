<div id="new_film">
		<form method="post" action="/WeShare/Films/Editer/<?php echo (generateUrl($infoMovie['Name'])."/".$infoMovie['IdMovie']); ?>/">
		<span><label>Titre du film :</label><input type="text" value="" id="Name" name="Name" class="recherche"  value="<?php echo $infoMovie['Name']; ?>" /></span><br /><br />
		<span><label>Date Realisation :</label><input type="text" value="" id="DateOfRelease" name="DateOfRelease"  value="<?php echo $infoMovie['DateOfRelease']; ?>"/></span><br /><br />
		<span style="text-align:left;"><label>Synopsis :</label><br/><textarea id="Synopsis" name="Synopsis" style="width:480px;" rows="15"><?php echo $infoMovie['Synopsis']; ?></textarea></span><br /><br />
		<span  style="text-align:left;"><label>Durée :</label><input type="text" value=""  id="Runtime" name="Runtime" style="width:23px;" size="1"  value="<?php echo $infoMovie['Runtime']; ?>"/> min</span><br /><br />
		<span><label>Poster du film :</label><input type="text" value="" id="Poster" name="Poster"  value="<?php echo $infoMovie['Poster']; ?>"/></span><br /><br /><br />
		<div class="button_submit"><input type="submit" value="Ajouter le film" /></div>
	</form>
</div>