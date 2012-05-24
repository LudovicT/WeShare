Films : 
<SELECT name='Movie' onchange='this.form.submit()'>
<?php
	foreach($movies as $key2)
	{
		if(isset($key2))
		{
		?>
			<option value='<?php echo $key['IdMovie'];?>'>
			<?php echo $key['Name'];?>
			</option>
		<?php 
		}
	} ?>
<br />
</SELECT>


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