<h3>Ajouter un film : </h3>
</br>
<br />
<form method="post" action="/WeShare/Profil/Films/Ajouter/">
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
<br /><br />
</SELECT>


Support : 
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
Nombre d'exemplaire :
<input type='text' name='available' value='1'>
<br />
Les fichiers sont considérés comme étant tout le temps disponible.
<br />
<br />

<input type='submit' class="button2" value='Ajouter à mes films'>
</form>

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
					Illimité
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