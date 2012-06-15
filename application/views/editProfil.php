<div id="connexion">
	<form id="edit-profile-form" method="post" action="/WeShare/Profil/Edit/ModifierProfil/">
		<h1>Modifier votre profil</h1>	
		<fieldset>
			<p><label>Nom :</label><input type="text" name="lastName" id="lastName" value="<?php echo $profil['LastName'];?>"/></p>
			<p><label>Prénom :</label><input type="text" name="firstName" id="firstName" value="<?php echo $profil['FirstName'];?>"/></p>
			<!--<label>Date de Naissace:</label><input type="text" value=""/><br />-->
			<p><label>Date de Naissance:</label>
				<select name="day">
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
				<select name="month">
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
				<select name="year">
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
			<p><label>Adresse Postale :</label><input type="text" name="address" value="<?php echo $profil['Address'];?>"/></p>
			<p><label>Ville :</label><input type="text"  name="city" value="<?php echo $profil['City'];?>"/></p>
			<p><label>Pays :</label><input type="text"  name="country" value="<?php echo $profil['Country'];?>"/></p>
			<p><label>N° de Téléphone :</label><input type="text" name="phoneNumber" value="<?php echo $profil['Phone'];?>"/></p>
			<p><label>Adresse mail :</label><input type="text" value="<?php echo $profil['Mail'];?>"/></p>
			<p><label>Mot de Passe :</label><input type="password" name="password" value="<?php echo $profil['Password'];?>"/></p>
			<p><label>Confirmer mot de Passe :</label><input type="password" name="retypePassword" value="<?php echo $profil['Password'];?>"/>
			<p><label>Votre Avatar :</label><input type="text" name ="avatar" value="<?php echo $profil['Avatar'];?>"/><br /><br />
			<input type="submit" value="Enregistrer"><br /><br />
			<a href='/weshare/profil/supprimer/'>Supprimer mon compte</a>
		</fieldset>
	</form>
</div>