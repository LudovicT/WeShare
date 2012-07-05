<h3>Détails sur l'événement</h3>
<p>Ici vous pourrez découvrir qui participent à cet événement et voter pour
le ou les films proposés</p>
<br />

<table width='60%' border='1' rules='none' cellspacing='12' style='margin-left:200px'>
	<tr>
		<td width='35%'>
		<h2>Date de l'événement : 
		</td>
		<td>
		<?php echo formateDate($event['DateOfEvent']); ?>
		</td>
	</tr>
	<tr>
		<td>
		<h2>Adresse : 
		</td>
		<td>
		<?php echo($event['Address']); ?>
		</td>
	</tr>
	<tr>
		<td>
		<h2>Ville : 
		</td>
		<td>
		<?php echo($event['City']); ?>
		</td>
	</tr>
	<tr>
		<td>
		<h2>Date de création : 
		</td>
		<td>
		<?php echo(formateDate($event['CreationDate'])); ?>
		</td>
	</tr>
</table>
<br />
<?php if ($movies != -2)
{ ?>
Voici la liste des films proposés pour cet événement : <br /><br />
<table border='0' rules='rows' width='100%'>
	<th> <h2>Nom du film</h2> </th><th> <h2>Date de sortie</h2> </th>
	<th> <h2>Durée</h2> </th><th><h2>Total des votes</h2></th>
<?php
	foreach($movies as $key)
	{ 
?>
	<tr height='35px'>
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
<div class='row-5'>
	<div class='fright3'>
		<ul>
			<li><a href='/WeShare/Evenements/Voir/<?php echo $event['IdEvent'] ?>/VoterFilm/<?php echo $key['IdMovie']; ?>/'><em><b>Voter</b></em></a></li>
		</ul>
	</div>
</div>
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
<table border='0' rules='rows' width='100%'>
	<th> <h2>Pseudo</h2> </th><th><h2>Status</h2></th>
<?php 
	foreach ($friends as $key)
	{
	?>
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