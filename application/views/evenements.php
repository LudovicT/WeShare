	<!--Start of home page-->
<?php
	if($events == -1 || $events == -2)
	{
		echo "Il n'y a pas d'�v�nements	OU ERREUR !!! AHHHH";
	}
	else
	{
?>
	<table border='1'>
	<p>  �v�nements dont vous �tes l'organisateur : </p>
	<th> N� de l'�v�nement </th><th> Date de l'�v�nement </th><th> Adresse </th>
	<th> Ville </th><th> Date de cr�ation </th><th> Action </th>
<?php
	foreach($events[0] as $key)
	{ 
?>
	<tr>
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
		<td>	
		<a href='/WeShare/Evenements/Supprimer/<?php echo $key['IdEvent'] ?>/' > Supprimer l'�v�nement</a>
		 ou 
		<a href='/WeShare/Evenements/Manage/<?php echo $key['IdEvent'] ?>/' > G�rer l'�v�nement</a>
		</td>
	</tr>
<?php
	} ?>
	
	</table>
	<table border='1'> <br />
	<p>  �v�nements auxquels vous participez : </p>
	<th> N� de l'�v�nement </th><th> Date de l'�v�nement </th><th> Adresse </th>
	<th> Ville </th><th> Status </th><th> Action </th>
<?php
	foreach($events[1] as $key)
	{
?>
		<tr>
			<td>
	<a href='/WeShare/Evenements/Voir/<?php echo $key['IdEvent'] ?>/' ><?php echo $key['IdEvent'] ?></a>
			</td>
			<td>
	<?php echo $key['DateOfEvent'];?>	
			</td>
			<td>
	<?php echo $key['Address'] ?>
			</td>
			<td>
	<?php echo $key['City'] ?>
			</td>
			<td>
	<?php 
		if ($key['Status'] == '1')
		{
			echo ("Vous y participez");
		}
		else if ($key['Status'] == '0')
		{
			echo ("Vous n'avez pas encore d�cid�");
		}
		else if ($key['Status'] == '2')
		{
			echo ("Vous avez cr�� cet �v�nement");
		}
		else if ($key['Status'] == '-1')
		{
			echo ("Vous avez refus� d'y participer");
		}
		if ($key['Status'] != '2')
		{
		?>
			</td>
			<td>
			<a href='/WeShare/Evenements/Status/<?php echo $key['IdEvent'] ?>/' > Changer mon status </a>
			</td>
		</tr>
		<?php
		}
		else
		{
		?>
			</td>
			<td>
			Vous �tes l'organisateur
			</td>
		</tr>
		<?php
		}
	}
?>
	</table> <br> <br />
	<a href="/WeShare/Evenements/Ajouter/" class="button2">Cr�er un �v�nement</a>
<?php
}
?>
	<!--End of home page-->
	