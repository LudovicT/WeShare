<h3>D�tails sur l'�v�nement</h3>
<p>Ici vous pourrez d�couvrir qui participent � cet �v�nement et voter pour
le ou les films propos�s</p>
<br />

<table border='1'>
	<th> Date de l'�v�nement </th><th> Adresse </th>
	<th> Ville </th><th> Date de cr�ation </th>
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
Voici la liste des films propos�s pour cet �v�nement : <br /><br />
<?php
	foreach($movies as $key)
	{ 
?>
<table border='1'>
	<th> Nom du film </th><th> Date de sortie </th>
	<th> Dur�e </th><th>Vote</th><th>Action</th>
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
	  A vot� <?php } ?>
		</td>
	</tr>
</table>
<?php }
 } 
	else
	{
		echo ("<br />Aucun film n'a �t� pr�vu pour cet �v�nement.");
	}?>
<br />
<?php
if ($friends != -1 && $friends != -2)
{
?>
<br /><br /><p>Liste des membres participants � cet �v�nement :</p>
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
			echo ('a accept� de participer');
		}
	elseif ($key['Status'] == -1)
		{
			echo('a refus� de participer');
		}
	else
		{
			echo('ne s\'est pas encore d�cid�');
		}
?>
		</td>
	</tr>
</table>
<?php } 
}
else
{?>
<br /><br/>Personne d'autre que vous ne participe � cet �v�nement.<br />
<?php } ?>