<h3>Ajouter un film : </h3>
<center><a href="#" onclick="toggle_visibility('connexion');">Afficher le formulaire</a></center>
<div id='connexion' style="display: none; opacity: 0;">
	<form method="post" action="/WeShare/Profil/Films/Ajouter/">
		<h1>Film � ajouter</h1>
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
			Les fichiers sont consid�r�s comme �tant tout le temps disponible.
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
	foreach($userMovie as $name)
	{
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
					Illimit�
				<?php
				}
				?>
			</td>
			<td>
				<form method="post" action="/WeShare/Profil/Films/supprimer/">
				<input type='hidden' name='IdMovie' value='<?php echo $name['IdMovie']?>'>
				<input type='hidden' name='support' value='<?php echo $name['Support']?>'>
				<input type='hidden' name='available' value='<?php echo $name['Available']?>'>
				<input type='submit' class="buttonDelete" value='Supprimer'>
				</form>
			</td>
		</tr>
	<?php
	}
	?>
</table>