	<!--Start of home page-->
	<?php
	if($membres == "")
	{
		echo "Il n'y a pas de membres";
	}
	else
	{
	?>
		<table cellspacing='7' width='100%'>
		<th width='33%'><h2> Pseudo </h2></th><th width='33%'><h2> Date d'inscription </h2></th><th width='33%'><h2> Ajouter un ami </h2></th>
		<?php
		foreach($membres as $key)
		{ ?>
			<tr height='25px'>
				<td>
					<a href='/WeShare/Membres/<?php echo generateUrl($key['Pseudo']); ?>/'><?php echo $key['Pseudo'] ?></a>
				</td>
				<td>
					<?php echo $key['RegisterDate'] ?>
				</td>
				<td>
				<?php 	/* status : null : pas d'entré
									0 : demande envoyé
									1 : demande accepté
									2 : demande refusé
									3 : demande ignoré
						*/
				if($key['Status'] == null)
				{
				?>
					<a href='/WeShare/Membres/AddFriend/<?php echo generateUrl($key['Pseudo']) ?>/'>
						<img src='<?php echo DIR_PUBLICS; ?>/images/plusIcon.jpg'>
					</a>
				<?php
				}
				elseif($key['Status'] == 0 || $key['Status'] == 2 || $key['Status'] == 3)
				{
					echo "<strong>Demande envoyé</strong>";
				}
				elseif($key['Status'] == 1)
				{
					echo "<strong>Déjà ami</strong>";
				}
				?>
				
				</td>
			</tr>
			<?php
		}?>
		</table>
	<?php
	}
	?>
	<!--End of home page-->
	