<h3>Ajouter un film : </h3>
</br>
<br />
<form method="post" action="/WeShare/Profil/Films/Ajouter/">
<SELECT name='Movie'>
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
<SELECT name="Support" size="1">
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
<input type='text' name='Available' value='1'>
<br />
Les fichiers sont considérés comme étant tout le temps disponible.
<br />
<br />

<input type='submit' value='Ajouter à mes films'>
</form>

<br />
<br />
<h3>Mes films mis en partage :</h3>
<table border='1' width="100%">
<th> Titre </th><th> Support </th><th> Nombre d'exemplaire </th> <th> Supprimer </th>
<?php
	foreach($userMovie as $name)
	{
	?>
		<tr>
			<td>
				<a href='/WeShare/Profil/Films/<?php echo $name['Name']?>/'><?php echo $name['Name']?></a>
			</td>
			<td>
				<a href='/WeShare/Profil/Films/<?php echo $name['Name']?>/'><?php echo $name['Support']?></a>
			</td>
			<td>
				<a href='/WeShare/Profil/Films/<?php echo $name['Name']?>/'><?php echo $name['Available']?></a>
			</td>
		</tr>
	<?php
	}
	?>
</table>