Films : 
<?php
	foreach($movie as $key)
	{
		if(isset($key))
		{
		?>
			<option value='<?php echo $key['IdMovie'];?>'>
			<?php echo $key['Films'];?>
			</option>
		<?php 
		}
	} ?>
<br />


Support : 
<SELECT name="Support" size="1">
    <OPTION>cd
    <OPTION>mp3
    <OPTION>mp4
    <OPTION>Blue-ray
    <OPTION>Dvd
</SELECT>
<br />

<input type='submit' value='Ajouter'>