<div id="connexion">
	<form method="post" enctype="multipart/form-data" action="/WeShare/Films/addStaff/">
	<h1> Nouveau membre du Casting </h1>
		<p><span><label><strong>Nom :</strong></label><input type="text" value="" id="LastName" name="LastName" /></span><br /><br /></p>
		<p><span><label><strong>Prenom :</strong></label><input type="text" value="" id="FirstName" name="FirstName" /></span><br /><br /></p>
		<p><span><label><strong>Biographie :</strong></label><br/><textarea id="Bio" name="Bio" style="width:480px;" rows="15"></textarea></span><br /><br /></p>
		<p><span><label><strong>Date de naissance (format jj/mm/aaaa):</strong></label><input type="text"  id="BornDate" name="BornDate" /></span><br /><br /></p>
		<p><span><label><strong>Image de l'acteur :</strong>
		<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
		<input name="userfile" type="file" /></br>(maximum 400ko)<br /><br /></p>
		<div class="button_submit"><input type="submit" class="button2" value="Ajouter le staff" /></div>
	</form>
</div>