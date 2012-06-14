<div class="indent2">
	<form id="edit-profile-form" method="post" action="/WeShare/Profil/Edit/ModifierProfil/">
		<h3>Modifier votre profil</h3>	
		<fieldset>
			<div class="field"><label>Nom :</label><input type="text" name="lastName" id="lastName" value="<?php echo $profil['LastName'];?>"/></div><br />
			<div class="field"><label>Prénom :</label><input type="text" name="firstName" id="firstName" value="<?php echo $profil['FirstName'];?>"/></div><br />
			<!--<div class="field"><label>Date de Naissace:</label><input type="text" value=""/></div><br />-->
			<div class="field"><label>Date de Naissance:</label>
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
			</div><br />
			<div class="field"><label>Adresse Postale :</label><input type="text" name="address" value="<?php echo $profil['Address'];?>"/></div><br />
			<div class="field"><label>Ville :</label><input type="text"  name="city" value="<?php echo $profil['City'];?>"/></div><br />
			<div class="field"><label>Pays :</label><input type="text"  name="country" value="<?php echo $profil['Country'];?>"/></div><br /><br />
			<div class="field"><label>N° de Téléphone :</label><input type="text" name="phoneNumber" value="<?php echo $profil['Phone'];?>"/></div><br />
			<div class="field"><label>Adresse mail :</label><input type="text" value="<?php echo $profil['Mail'];?>"/></div><br />
			<div class="field"><label>Mot de Passe :</label><input type="password" name="password" value="<?php echo $profil['Password'];?>"/></div><br />
			<div class="field"><label>Confirmer mot de Passe :</label><input type="password" name="retypePassword" value="<?php echo $profil['Password'];?>"/></div><br />
			<div class="field"><label>Votre Avatar :</label><input type="text" name ="avatar" value="<?php echo $profil['Avatar'];?>"/></div><br />
			<div class="wrapper"><input type="submit" value="Enregistrer les modifications"></div>
		</fieldset>
	</form>
</div>