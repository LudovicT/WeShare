	<!--Start of home page-->
<?php
	if($events == -1 || $events == -2)
	{
		echo "Il n'y a pas d'événements	OU ERREUR !!! AHHHH";
	}
	else
	{
?>
	<table border='1'>
	<p>  Événements dont vous êtes l'organisateur : </p>
	<th> N° de l'événement </th><th> Date de l'événement </th><th> Adresse </th>
	<th> Ville </th><th> Date de création </th>
<?php
	foreach($events[0] as $key)
	{ 
?>
	<tr>
		<!-- <td>
			<a href='/WeShare/Membres/<?php //echo $key['Pseudo']; ?>/'><?php //echo $key['Pseudo'] ?></a>
		</td> -->
		<td>
<?php echo $key['IdEvent'] ?>
		</td>
		<td>
<?php echo($key['DateOfEvent']); ?>	
		</td>
		<td>
<?php echo($key['Address']); ?>	
		</td>
		<td>
<?php echo($key['City']); ?>	
		</td>
		<td>
<?php echo($key['CreationDate']); ?>	
		</td>
	</tr>
<?php
	} ?>
	
	</table>
	<table border='1'> <br />
	<p>  Événements auxquels vous participez : </p>
	<th> N° de l'événement </th><th> Date de l'événement </th><th> Adresse </th>
	<th> Ville </th><th> Date de création </th><th> Status </th>
<?php
	foreach($events[1] as $key1)
	{
		foreach($events[0] as $key0)
		{
?>
	<tr>
		<!-- <td>
			<a href='/WeShare/Membres/<?php //echo $key['Pseudo']; ?>/'><?php //echo $key['Pseudo'] ?></a>
		</td> -->
		<td>
<?php echo $key1['IdEvent']; ?>
		</td>
		<td>
<?php echo $key0['DateOfEvent'];?>	
		</td>
		<td>
<?php echo $key0['Address'] ?>
		</td>
		<td>
<?php echo $key0['City'] ?>
		</td>
		<td>
<?php echo $key0['CreationDate'] ?>
		</td>
		<td>
<?php 
	if ($key1['Status'] == '1')
	{
		echo ("Vous y participez");
	}
	else
	{
		echo ("Vous n'y participez pas");
	}
		?>
		</td>

	</tr>
<?php
		}
	}
?>
	</table> <br> <br />
	<a href='/WeShare/Evenements/Ajouter/' > Cliquer ici pour créer un événement </a>
<?php
}
?>
	<!--End of home page-->
	