	<!--Start of login page-->
	<?php
	?>
	<form id="demoForm" method="post" action="/WeShare/register/" class="bbq">
		<div id="connexion">
		<div id="fieldWrapper">
			<span class="step" id="first">
				<h1>Obligatoire</h1>
				<p>
				<label for="pseudo">Pseudonyme : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em pseudo required" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>"/>
				</p>
				<p>
				<label for="password">Mot de passe : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em password required" name="password" id="password" type="password" />
				</p>
				<p>
				<label for="retypePassword">Confirmer mot de passe : </label>
				<input onkeyup='validate(this,password.value)' class="input_field_12em retypePassword required" name="retypePassword" id="retypePassword" type="password" />
				</p>
				<p>
				<label for="email">Email : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em email required" name="email" id="email"  value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"/>
				</p>
				<h1>Optionnel</h1>
				<p>
				<label for="nom">Nom : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em" name="lastName" id="lastName"  value="<?php if(isset($_POST['lastName'])){echo $_POST['lastName'];} ?>"/>
				</p>
				<p>
				<label for="prenom">Prenom : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em" name="firstName" id="firstName"  value="<?php if(isset($_POST['firstName'])){echo $_POST['firstName'];} ?>"/>
				</p>
				<p>
				<label for="day_fi">Date de naissance : </label>
				<input onkeyup='validate(this,0)' class="small" name="day" id="day"  value="<?php if(isset($_POST['day'])){echo $_POST['day'];} ?>" /> -
				<input onkeyup='validate(this,0)' class="small" name="month" id="month" value="<?php if(isset($_POST['month'])){echo $_POST['month'];} ?>" /> - 
				<input onkeyup='validate(this,0)' class="small" name="year" id="year" value="<?php if(isset($_POST['year'])){echo $_POST['year'];} ?>" /><label><br />(sous le format JJ-MM-AAAA)</label>
				</p>
				<p>
				<label for="countryPrefix_fi">Numero de telephone : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em digits" name="phoneNumber" id="phoneNumber" value="<?php if(isset($_POST['phoneNumber'])){echo $_POST['phoneNumber'];} ?>" />
				</p>
				<p>
				<label for="adresse">Adresse : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em" name="address" id="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" />
				</p>
				<p>
				<label for="ville">Ville : </label>
				<input onkeyup='validate(this,0)' class="input_field_12em" name="city" id="city" value="<?php if(isset($_POST['city'])){echo $_POST['city'];} ?>" />
				</p>
				<p>
				<label for="pays">Dans quel pays habitez-vous ?</label>
				<input onkeyup='validate(this,0)' class="input_field_12em" name="country" id="country" value="<?php if(isset($_POST['country'])){echo $_POST['country'];} ?>" />
				</p>
			</span>
				<p>
			<input class="navigation_button" id="back" value="Mise à zéro" type="reset" />
			<input class="navigation_button" id="next" value="Soumettre" type="submit"/><br />
				</p>
				<p id='message'>
					En vous inscrivant, vous acceptez les <a href='/weshare/CGU.html' target="_blank">Conditions Générales d'Utilisation</a>
				</p>
				<p>
				</p>
		</div>
		</div>
	</form>
	<!--End of login page-->
	