<div class="indent2">
		<form id="edit-profile-form" method="post" action="/WeShare/Profil/Edit/ModifierProfil/">
			<h3>Modifier votre profil</h3>	
				<fieldset>
					<div class="field"><label>Nom :</label><input type="text" name="lastName" id="lastName" value=""/></div><br />
					<div class="field"><label>Prénom :</label><input type="text" name="firstName" id="firstName" value=""/></div><br />
					<!--<div class="field"><label>Date de Naissace:</label><input type="text" value=""/></div><br />-->
					<div class="field"><label>Date de Naissance:</label>
						<select name="day">
							<?php
								for($i=1;$i<32;$i++)
								{
							?><option value='Jour'><?php echo $i ?></option>
							<?php
								}
							?>
						</select>
						<select name="month">
							<?php
								for($i=1;$i<13;$i++)
								{
							?><option value='Mois'><?php echo $i ?></option>
							<?php
								}
							?>
						</select>
						<select name="year">
							<?php
								for($i=1901;$i<2013;$i++)
								{
							?><option value='Année'><?php echo $i ?></option>
							<?php
								}
							?>
						</select>
					</div><br />
					<div class="field"><label>Adresse Postale :</label><input type="text" name="address" value=""/></div><br />
					<div class="field"><label>Ville :</label><input type="text"  name="city" value=""/></div><br />
						Pays<select name="country" id="country">
						   <option value="" SELECT></option>
						   <option value="france">France</option>
						   <option value="espagne">Espagne</option>
						   <option value="italie">Italie</option>
						   <option value="royaume-uni">Royaume-Uni</option>
						   <option value="canada">Canada</option>
						   <option value="etats-unis">Etats-Unis</option>
						   <option value="chine">Chine</option>
						   <option value="japon">Japon</option>
					   </select>
					   <br /><br />
					<div class="field"><label>N° de Téléphone :</label><input type="text" name="phoneNumber" value=""/></div><br />
					<div class="field"><label>Adresse mail :</label><input type="text" value=""/></div><br />
					<div class="field"><label>Mot de Passe :</label><input type="text" name="password" type="password" value=""/></div><br />
					<div class="field"><label>Confirmer mot de Passe :</label><input type="text" name="retypePassword" type="password" value=""/></div><br />
					<div class="field"><label>Votre Avatar :</label><input type="text" name ="avatar" value=""/></div><br />
					<div class="wrapper"><input type="submit" value="Enregistrer les modifications"></div>
				</fieldset>
		</form>
</div>