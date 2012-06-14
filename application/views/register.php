	<!--Start of login page-->
	<form id="demoForm" method="post" action="/WeShare/register/" class="bbq">
		<div id="connexion">
		<div id="fieldWrapper">
			<span class="step" id="first">
				<h1>Obligatoire</h1><br />
				<label for="pseudo">Pseudonyme : </label><br />
				<input class="input_field_12em pseudo required" name="pseudo" id="pseudo" /><br />
				<label for="password">Mot de passe : </label><br />
				<input class="input_field_12em password required" name="password" id="password" type="password" /><br />
				<label for="retypePassword">Confirmer mot de passe : </label><br />
				<input class="input_field_12em retypePassword required" name="retypePassword" id="retypePassword" type="password" /><br />
				<label for="email">Email : </label><br />
				<input class="input_field_12em email required" name="email" id="email" /><br />
				<h1>Optionnel</h1><br />
				<label for="nom">Nom : </label><br />
				<input class="input_field_12em" name="lastName" id="lastName" /><br />
				<label for="prenom">Prenom : </label><br />
				<input class="input_field_12em" name="firstName" id="firstName" /><br />
				<label for="day_fi">Date de naissance : </label><br />
				<div class="small">
				<input class="small" name="day" id="day_fi" value="" /> -
				<input class="small" name="month" id="month_fi" value="" /> - 
				<input class="small" name="year" id="year_fi" value="" /></div><label>(sous le format JJ-MM-AAAA)</label><br />
				<label for="countryPrefix_fi">Numero de telephone : </label><br />
				<input class="input_field_12em digits" name="phoneNumber" id="phoneNumber_fi" /><br />
				<label for="adresse">Adresse : </label><br />
				<input class="input_field_12em" name="address" id="address" /><br />
				<label for="ville">Ville : </label><br />
				<input class="input_field_12em" name="city" id="city" /><br />
				<label for="pays">Dans quel pays habitez-vous ?</label><br />
				<input class="input_field_12em" name="country" id="country" /><br />
			</span>
		</div>
		</div>
		<div id="demoNavigation">
			<input class="navigation_button" id="back" value="Mise à zéro" type="reset" />
			<input class="navigation_button" id="next" value="Soumettre" type="submit"/>
		</div>
	</form>
	<!--End of login page-->
	