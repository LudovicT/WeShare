<h3>Détails sur l'événement</h3>
<p>Ici vous pourrez découvrir qui participent à cet événement et voter pour
le ou les films proposés</p>
<br />

<table border='1'>
	<th> Date de l'événement </th><th> Adresse </th>
	<th> Ville </th><th> Date de création </th>
	<tr>
		<td>
<?php echo($event['DateOfEvent']); ?>	
		</td>
		<td>
<?php echo($event['Address']); ?>	
		</td>
		<td>
<?php echo($event['City']); ?>	
		</td>
		<td>
<?php echo($event['CreationDate']); ?>	
		</td>
	</tr>
</table>
<br />
<?php if ($movies != -2)
{ ?>
Voici la liste des films proposés pour cet événement : <br /><br />
<?php
	foreach($movies as $key)
	{ 
?>
<table border='1'>
	<th> Nom du film </th><th> Date de sortie </th>
	<th> Durée </th><th>Vote</th><th>Action</th>
	<tr>
		<td>
<?php echo ($key['Name']) ?>
		</td>
		<td>
<?php echo($key['DateOfRelease']); ?>	
		</td>
		<td>
<?php echo($key['Runtime']); ?>	
		</td>
		<td>
<?php echo($key['NbVote']); ?>	
		</td>
		<td>
<?php
if ($key['CheckVote'] == 0)
{?>
		<a href='/WeShare/Evenements/Voir/<?php echo $event['IdEvent'] ?>/VoterFilm/<?php echo $key['IdMovie']; ?>/' > voter </a>
<?php }
	  else if ($key['CheckVote'] == -2)
	  {?>
	  Pour voter, vous devez accepter l'invitation
	  <?php }
	  else
	  {?>
	  A voté <?php } ?>
		</td>
	</tr>
</table>
<?php }
 } 
	else
	{
		echo ("<br />Aucun film n'a été prévu pour cet événement.");
	}?>
<br />
<?php
if ($friends != -1 && $friends != -2)
{
?>
<br /><br /><p>Liste des membres participants à cet événement :</p>
<?php 
	foreach ($friends as $key)
	{
	?>
<table border='1'>
	<th> Pseudo </th><th>Status</th>
	<tr>
		<td>
<?php echo ($key['Pseudo'])?>
		</td>
		<td>
<?php if ($key['Status'] == 1)
		{
			echo ('a accepté de participer');
		}
	elseif ($key['Status'] == -1)
		{
			echo('a refusé de participer');
		}
	else
		{
			echo('ne s\'est pas encore décidé');
		}
?>
		</td>
	</tr>
</table>
<?php } 
}
else
{?>
<br /><br/>Personne d'autre que vous ne participe à cet événement.<br />
<?php } ?>