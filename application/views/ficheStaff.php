<div Align="center">
	<div>
		<br />
		<span style="font-size:2.0em">
		<b> <?php echo $staffInfo['FirstName']." ".$staffInfo['LastName']; ?> </b>
		</span>
		<br /><br />
	</div>
	<div> <!-- css affiche film -->
		<img src="<?php echo DIR_PUBLICS."/images/staff_pic/".$staffInfo['Picture']; ?>"/>
		<br /><br />
	</div>
		<div id="tab_infos">
			<table width="100%" border="1">
				<tr>
					<td width="50%">
						<!-- requêtes SQL sur les infos du films (titre original, date sortie etc... -->
						<p> 
						<b>Nom :</b> <?php echo $staffInfo['LastName']; ?> <br />
						<b>Prénom :</b> <?php echo $staffInfo['FirstName']; ?> <br />
						<b>Date de Naissance :</b> <?php echo formateDate($staffInfo['BornDate']); ?> <br />
						</p>
						<p>
						<b>Biographie :</b><br />
						<?php echo $staffInfo['Bio']; ?>
						</p>
					</td> 
				</tr>
			</table>
		</div>
		<br /><br />
	<br />
</div>