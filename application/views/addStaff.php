<div id="new_film">
	<form method="post" action="/WeShare/Films/addStaff/">
		<span><label>Nom</label><input type="text" value="" id="LastName" name="LastName" /></span><br /><br />
		<span><label>Prenom :</label><input type="text" value="" id="FirstName" name="FirstName" /></span><br /><br />
		<span style="text-align:left;"><label>Biographie :</label><br/><textarea id="Bio" name="Bio" style="width:480px;" rows="15"></textarea></span><br /><br />
		<span  style="text-align:left;"><label>Date de naissance (format (AAAA-MM-DD)):</label><input type="text"  id="BornDate" name="BornDate" /></span><br /><br />
		<span><label>Image de l'acteur :</label><input type="text" value="" id="Picture" name="Picture" /></span><br /><br /><br />
		<div class="button_submit"><input type="submit" value="Ajouter le staff" /></div>
	</form>
</div>