<div id="connexion">
		<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
			<h1>Cr�er un nouvel �v�nement</h1>	
				<fieldset>
					<p><label><strong>Date de l'�v�nement :</strong></label><input type="text" onkeyup='validate(this,0)' name="DateOfEvent" id="DateOfEvent" value=""/><br />
					<strong><small>Sous le format jj/mm/aaaa</small></strong></p>
					<p><label><strong>Adresse Postale :</strong></label><input type="text" onkeyup='validate(this,0)' id='address' name="create_Address" value=""/>
					<br /><small>Utiliser votre addresse<input type='checkbox' onclick='info(this)' id='ownAddress' value='address'></small></p>
					<p><label><strong>Ville :</strong></label><input type="text" onkeyup='validate(this,0)' id='city' name="create_City" value=""/>
					<br /><small>Utiliser votre addresse<input type='checkbox' onclick='info(this)' id='ownCity' value='city'></small></p>
					<p><input type="submit" value="Cr�er l'�v�nement"></p>
				</fieldset>
		</form>
</div>