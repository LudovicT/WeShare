<h3>Accepter ou Refuser une invitation</h3>
<p>Veuillez confirmer si oui ou non vous voulez participer à cet événement : </p>

<table border='1'>
	<th> N° de l'événement </th><th> Date de l'événement </th><th> Adresse </th>
	<th> Ville </th><th> Date de création </th>
	<tr>
		<td>
<?php echo $event['IdEvent'] ?>
		</td>
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
<table>
	<tr>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
			<input type="hidden" name="RefusEvent" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Refuser l'invitation">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
			<input type="hidden" name="AcceptEvent" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Accepter l'invitation">
			</form>
		</td>
	</tr>
</table>
<!--<a href='/WeShare/Evenements/Supprimer/<?php echo $event['IdEvent'] ?>/' > Supprimer cet événement</a>-->