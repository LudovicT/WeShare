<div id="connexion">
	<form enctype="multipart/form-data" id="edit-profile-form" method="post" action="/WeShare/Profil/Edit/ModifierProfil/">
		<h1>Modifier votre profil</h1>	
		<fieldset>
			<p><label>Nom :</label><input onkeyup='validate(this,0)' type="text" name="lastName" id="lastName" value="<?php echo $profil['LastName'];?>"/></p>
			<p><label>Prénom :</label><input onkeyup='validate(this,0)' type="text" name="firstName" id="firstName" value="<?php echo $profil['FirstName'];?>"/></p>
			<!--<label>Date de Naissace:</label><input type="text" value=""/><br />-->
			<p><label>Date de Naissance:</label>
				<select class='small' name="day">
					<?php
						for($i=1;$i<32;$i++)
						{
							if($i == $day)
							{
								echo "<option value='$i' SELECTED>$i</option>";
							}
							else
							{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
				</select>
				<select class='small' name="month">
					<?php
						for($i=1;$i<13;$i++)
						{
						if($i == $mounth)
							{
								echo "<option value='$i' SELECTED>$i</option>";
							}
							else
							{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
				</select>
				<select class='small' name="year">
					<?php
						for($i=1901;$i<2013;$i++)
						{
							if($i == $year)
							{
								echo "<option value='$i' SELECTED>$i</option>";
							}
							else
							{
								echo "<option value='$i'>$i</option>";
							}
						}
					?>
				</select>
			<br /></p>
			<p><label>Adresse Postale :</label><input onkeyup='validate(this,0)' id='address' type="text" name="address" value="<?php echo $profil['Address'];?>"/></p>
			<p><label>Ville :</label><input type="text" onkeyup='validate(this,0)' id='city' name="city" value="<?php echo $profil['City'];?>"/></p>
			<p><label>Pays :</label><input type="text" onkeyup='validate(this,0)' id='country' name="country" value="<?php echo $profil['Country'];?>"/></p>
			<p><label>N° de Téléphone :</label><input onkeyup='validate(this,0)' id='phoneNumber' type="text" name="phoneNumber" value="<?php echo $profil['Phone'];?>"/></p>
			<p><label>Adresse mail :</label><input onkeyup='validate(this,0)' id='email' type="text" value="<?php echo $profil['Mail'];?>"/></p>
			<p><label>Mot de Passe :</label><input onkeyup='validate(this,0)' id='password' type="password" name="password" value="<?php echo $profil['Password'];?>"/></p>
			<p><label>Confirmer mot de Passe :</label><input onkeyup='validate(this,password.value)' id='retypePassword' type="password" name="retypePassword" value="<?php echo $profil['Password'];?>"/>
			<p><label>Votre Avatar :</label><input type="hidden" name="MAX_FILE_SIZE" value="400000" /><input name="userfile" type="file" size='13'/><br />(maximum 400ko)<br /><br />
			<input type="submit" value="Enregistrer"><br /><br />
			<a href='/weshare/profil/supprimer/'>Supprimer mon compte</a>
		</fieldset>
	</form>
</div>