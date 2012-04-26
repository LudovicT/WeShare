	<!--Start of home page-->
	<table border='1'>
		<th> Nom des Films </th>
		<div class="add_films"><a href="/WeShare/Films/addFilms/">Ajouter un film</a></div>
	<?php
	if($films == NULL)
	{
		echo "Il n'y a pas de films";
	}
	else
	{
		foreach($films as $key)
		{ ?>
			<tr>
				<td>
					<a href='/WeShare/films/<?php echo $key['films']; ?>/'></a>
				</td>
			</tr>
			<?php
		}
		}
	?>
	</table>
	<!--End of home page-->
	