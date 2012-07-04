<h3>Ajouter un film : </h3>
<div class='row-4'>
	<div class='fright2'>
		<ul>
			<li><a href="#" onclick="toggle_visibility('connexion');"><em><b>Afficher le formulaire</b></em></a></li>
		</ul>
	</div>
</div>
<div id='connexion' class='fade' style="display: none; opacity: 0;">
	<form method="post" action="/WeShare/Profil/Films/Ajouter/">
		<h1>Film à ajouter</h1>
		<p>
			<strong>Film :</strong>
			<SELECT name='IdMovie'>
				<OPTION value=''></option>
			<?php
				foreach($movies[0] as $key)
				{
					if(isset($key))
					{
					?>
						<option value='<?php echo $key['IdMovie'];?>'>
						<?php echo $key['Name'];?>
						</option>
					<?php 
					}
				} ?>
			</SELECT>
		</p>
		<p id='message'>
		Votre film n'est pas dans la liste ? <a href="#" onclick="newPopup('/WeShare/Films/addFilms/')">Ajouter un film</a>
		<h1>Support du film</h1>
		<p>
			<strong>Support :</strong>
			<SELECT name="support" size="1">
				<OPTION value=''></option>
				<OPTION value='fichier'>fichier</option>
				<OPTION value='cd'>cd</option>
				<OPTION value='dvd'>dvd</option>
				<OPTION value='blue-ray'>blue-ray</option>
				<OPTION value='hd-dvd'>hd-dvd</option>
				<OPTION value='divx'>divx</option>
				<OPTION value='VHS'>VHS</option>
			</SELECT>
		</p>
		<h1>Nombre d'exemplaires</h1>
		<p>
			<strong>Exemplaires disponible :</strong>
			<input type='text' name='available' value='1'>
		</p>
		<p id="message">
			Les fichiers sont considérés comme étant tout le temps disponible.
		</p>
		<p>
		<input type='submit' value='Ajouter'>
		</p>
	</form>
</div>

<br />
<br />
<h3>Mes films mis en partage :</h3>
<table border='0' rules='rows' width="100%">
<th> Titre </th><th> Support </th><th> Nombre d'exemplaires </th> <th> Supprimer </th>
<?php
	$i = 0;
	foreach($userMovie as $name)
	{
	$i++;
	?>
		<tr>
			<td>
				<a href='/WeShare/Profil/Films/<?php echo $name['Name']?>/'><?php echo $name['Name']?></a>
			</td>
			<td>
				<?php echo $name['Support']?>
			</td>
			<td>
				<?php
				if($name['Available'] != -1)
				{
					echo $name['Available'];
				}
				else
				{
				?>
					Illimité
				<?php
				}
				?>
			</td>
			<td>
				<form name='form<?php echo $i; ?>' method="post" action="/WeShare/Profil/Films/supprimer/">
				<input type='hidden' name='IdMovie' value='<?php echo $name['IdMovie']?>'>
				<input type='hidden' name='support' value='<?php echo $name['Support']?>'>
				<input type='hidden' name='available' value='<?php echo $name['Available']?>'>
				</form>
				<div class='row-5'>
					<div class='fright3'>
						<ul>
							<li><a href='javascript:document.form<?php echo $i; ?>.submit();'><em><b>Supprimer</b></em></a></li>
						</ul>
					</div>
				</div>
			</td>
		</tr>
	<?php
	}
	?>
</table>