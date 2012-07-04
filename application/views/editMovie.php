<div id="connexion">
	<div id="new_film">
		<form method="post" action="/WeShare/Films/Editer/<?php echo (generateUrl($infoMovie['Name'])."/".$infoMovie['IdMovie']); ?>/">
			<h1> Editer le film </h1>
			<p><span><label><strong>Titre du film :</strong></label><input onkeyup='validate(this,0)' type="text" id="Name" name="Name" class="recherche" value="<?php echo $infoMovie['Name']; ?>" /></span></p>
			<p><span><label><strong>Date Realisation :</strong></label><input onkeyup='validate(this,0)' type="text" id="DateOfRelease" name="DateOfRelease" value="<?php echo $infoMovie['DateOfRelease']; ?>"/></span></p>
			<p><span><label><strong>Synopsis :</strong></label><textarea onkeyup='validate(this,0)' class='textarea4' id="Synopsis" name="Synopsis" rows="8"><?php echo $infoMovie['Synopsis']; ?></textarea></span></p>
			<p><span><label><strong>Durée :</strong></label><input onkeyup='validate(this,0)' type="text" id="Runtime" name="Runtime"  size="1" value="<?php echo $infoMovie['Runtime']; ?>"/></span>
			<br /><strong><em><small>Sous le format hh:mm:ss</small></em></strong>
			</p>
			<p><span><label><strong>Jaquette du film :</strong>
			<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
			<input name="userfile" type="file" size='13' /></br>(maximum 400ko)</label></span></p>
			<p><input type="submit" value="Ajouter le film" /></p>
		</form>
	</div>
</div>