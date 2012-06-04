<strong>Mes Films : </strong>
</br>
<br />
<form method="post" action="/WeShare/Profil/Films/Ajouter/">
<SELECT name='Movie'>
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
    <OPTION>cd
    <OPTION>mp3
    <OPTION>mp4
    <OPTION>Blue-ray
    <OPTION>Dvd
</SELECT>
Nombre d'exemplaire :
<SELECT name="exemplaire" size="1">
    <OPTION>1
    <OPTION>2
    <OPTION>3
    <OPTION>4
    <OPTION>5
	<OPTION>6
	<OPTION>7
	<OPTION>8
	<OPTION>9
	<OPTION>10
</SELECT>
<br />
<br />

<input type='submit' value='Ajouter à mes films'>
</form>

<br />
<br />
<table border='1' width="100%">
<th> Jaquette </th><th> Titre </th><th> Support </th><th> Nombre d'exemplaire </th> <th> Supprimer </th>
<?php
	foreach($movies[0] as $name)
	{
	?>
		<tr>
			<td>
				<a href='/WeShare/Profil/Films/<?php echo $name['IdMovie']?>/'><?php echo $name['IdMovie']?></a><br />
			</td>
		</tr>
	<?php
	}
	?>
</table>