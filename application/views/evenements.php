	<!--Start of home page-->
	<div class='row-4'>
		<div class='fright2'>
			<ul>
				<li><a href="/WeShare/Evenements/Ajouter/" ><em><b>Cr�er un �v�nement</b></em></a></li>
			</ul>
		</div>
	</div>
<?php
	if($events == -1 || $events == -2)
	{
		echo "Il n'y a pas d'�v�nements ";
	}
	else
	{
?>
	<table border='0' rules='rows' width='100%'>
	<h3> �v�nements dont vous �tes l'organisateur : </h3>
	<th> <h2>Date de l'�v�nement </h2></th><th> <h2>Adresse</h2> </th><th> <h2>Ville</h2> </th><th> <h2>Date de cr�ation</h2> </th><th> <h2>Action</h2> </th>
<?php
	foreach($events[0] as $key)
	{ 
?>
	<tr style='height:35px'>
		<td>
<?php echo(formateDate($key['DateOfEvent'])); ?>	
		</td>
		<td>
<?php echo($key['Address']); ?>	
		</td>
		<td>
<?php echo($key['City']); ?>	
		</td>
		<td>
<?php echo(formateDate($key['CreationDate'])); ?>	
		</td>
		<td>	
		<a href='/WeShare/Evenements/Supprimer/<?php echo $key['IdEvent'] ?>/' > Supprimer l'�v�nement</a>
		 ou 
		<a href='/WeShare/Evenements/Manage/<?php echo $key['IdEvent'] ?>/' > G�rer l'�v�nement</a>
		</td>
	</tr>
<?php
	} ?>
	
	</table><br /><br /><br />
	<h3>  �v�nements auxquels vous participez : </h3>
	</table>
	<table border='0' rules='rows' width='100%'> 
	<th> Acc�der � l'�v�nement </th><th> Date de l'�v�nement </th><th> Adresse </th>
	<th> Ville </th><th> Status </th><th> Action </th>
<?php
	foreach($events[1] as $key)
	{
?>
		<tr style='height:35px'>
			<td>
	<a href='/WeShare/Evenements/Voir/<?php echo $key['IdEvent'] ?>/' >Cliquez ici</a>
			</td>
			<td>
	<?php echo formateDate($key['DateOfEvent']);?>	
			</td>
			<td>
	<?php echo $key['Address']; ?>
			</td>
			<td>
	<?php echo $key['City']; ?>
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
<?php
}
?>
	<!--End of home page-->
	