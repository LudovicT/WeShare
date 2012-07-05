<h3>Accepter ou Refuser une invitation</h3>
<p>Veuillez confirmer si oui ou non vous voulez participer à cet événement : </p>

<table border='0' rules='rows' width='100%'>
	<th> <h2>Date de l'événement</h2> </th><th> <h2>Adresse</h2> </th><th> <h2>Ville</h2> </th><th> <h2>Date de création</h2> </th>
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
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/Voir/<?php echo $event['IdEvent'] ?>/">
			<input type="hidden" name="AcceptEvent" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Accepter l'invitation">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
			<input type="hidden" name="IsNotSure" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Décider plus tard">
			</form>
		</td>
		<td>
			<form id="edit-profile-form" method="post" action="/WeShare/Evenements/">
			<input type="hidden" name="RefusEvent" value="<?php echo $event['IdEvent'] ?>">
			<input type="submit" value="Refuser l'invitation">
			</form>
		</td>
	</tr>
</table>