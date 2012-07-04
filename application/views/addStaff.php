<div id="connexion">
	<form method="post" enctype="multipart/form-data" action="/WeShare/Films/addStaff/">
	<h1> Nouveau membre du Casting </h1>
		<p><span><label><strong>Nom :</strong></label><input onkeyup='validate(this,0)' type="text" value="" id="LastName" name="LastName" /></span></p>
		<p><span><label><strong>Prenom :</strong></label><input onkeyup='validate(this,0)' type="text" value="" id="FirstName" name="FirstName" /></span></p>
		<p><span><label><strong>Biographie :</strong></label><textarea class='textarea4' onkeyup='validate(this,0)' id="Bio" name="Bio" rows="8"></textarea></span></p>
		<p><span><label><strong>Date de naissance (format jj/mm/aaaa):</strong></label><input type="text" onkeyup='validate(this,0)' id="BornDate" name="BornDate" /></span></p>
		<p><span><label><strong>Image de l'acteur :</strong>
		<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
		<input name="userfile" type="file" size='13' /></br>(maximum 400ko)</label></span></p>
		<p><input type="submit" value="Ajouter le staff" /></p>
	</form>
</div>