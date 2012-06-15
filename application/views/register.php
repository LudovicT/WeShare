	<!--Start of login page-->
	<form id="demoForm" method="post" action="/WeShare/register/" class="bbq">
		<div id="connexion">
		<div id="fieldWrapper">
			<span class="step" id="first">
				<h1>Obligatoire</h1>
				<p>
				<label for="pseudo">Pseudonyme : </label>
				<input class="input_field_12em pseudo required" name="pseudo" id="pseudo" />
				</p>
				<p>
				<label for="password">Mot de passe : </label>
				<input class="input_field_12em password required" name="password" id="password" type="password" />
				</p>
				<p>
				<label for="retypePassword">Confirmer mot de passe : </label>
				<input class="input_field_12em retypePassword required" name="retypePassword" id="retypePassword" type="password" />
				</p>
				<p>
				<label for="email">Email : </label>
				<input class="input_field_12em email required" name="email" id="email" />
				</p>
				<h1>Optionnel</h1>
				<p>
				<label for="nom">Nom : </label>
				<input class="input_field_12em" name="lastName" id="lastName" />
				</p>
				<p>
				<label for="prenom">Prenom : </label>
				<input class="input_field_12em" name="firstName" id="firstName" />
				</p>
				<p class = 'small'>
				<label for="day_fi">Date de naissance : </label>
				<input class="small" name="day" id="day_fi" value="" /> -
				<input class="small" name="month" id="month_fi" value="" /> - 
				<input class="small" name="year" id="year_fi" value="" /><label><br />(sous le format JJ-MM-AAAA)</label>
				</p>
				<p>
				<label for="countryPrefix_fi">Numero de telephone : </label>
				<input class="input_field_12em digits" name="phoneNumber" id="phoneNumber_fi" />
				</p>
				<p>
				<label for="adresse">Adresse : </label>
				<input class="input_field_12em" name="address" id="address" />
				</p>
				<p>
				<label for="ville">Ville : </label>
				<input class="input_field_12em" name="city" id="city" />
				</p>
				<p>
				<label for="pays">Dans quel pays habitez-vous ?</label>
				<input class="input_field_12em" name="country" id="country" />
				</p>
			</span>
			<input class="navigation_button" id="back" value="Mise à zéro" type="reset" />
			<input class="navigation_button" id="next" value="Soumettre" type="submit"/><br />
			<label>En vous inscrivant, vous acceptez les <a href='/weshare/CGU.html' target="_blank">Conditions Générales d'Utilisation</a></label>
		</div>
		</div>
	</form>
	<!--End of login page-->
	