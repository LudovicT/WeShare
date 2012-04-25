	<!--Start of home page-->
	<table border='1'>
		<th> Pseudo </th><th> Date d'inscription </th><th> Ajouter un ami </th>
	<?php
	foreach($membres as $key)
	{ ?>
		<tr>
			<td>
				<a href='/WeShare/Membres/<?php echo $key['Pseudo']; ?>/'><?php echo $key['Pseudo'] ?></a>
			</td>
			<td>
				<?php echo $key['RegisterDate'] ?>
			</td>
		</tr>
		<?php
	}
	?>
	</table>
	<!--End of home page-->
	