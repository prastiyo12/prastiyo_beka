<?php
	include('calculate.php');
	$calc = new calculate();
?>
<form method="post" action="" style="padding:10px;">
	<table style="border:1px solid #444444;width:100%;border-collapse: collapse;padding:4px;" width="90%">
		<tr>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:2px;">Person A Age of death</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:2px;">:</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;"><input type="number" name="age_of_death_a" value="10" /></td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;">Year of Death</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;">:</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;"><input type="number" name="year_of_death_a" value="12" /></td>
		</tr>
		<tr>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;">Person B Age of death</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;">:</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;"><input type="number" name="age_of_death_b" value="13" /></td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;">Year of Death</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;">:</td>
			<td style="border:1px solid #444444;border-collapse: collapse;padding:4px;"><input type="number" name="year_of_death_b" value="17" /></td>
		</tr>
		<tr>
			<td colspan="8" align="right" style="border:1px solid #444444;width:100%;border-collapse: collapse;padding:4px;"><button type="submit" name="submit">Generate</button></td>
		</tr>
	</table>
</form>

<?php
	if(isset($_POST['submit']) ){
	    $formData = $_POST; 
	    $calc->get_averate($formData);
	}
?>

<?php
	echo $calc->getTable(25);
?>


