<table border="1">
<tr>
	<td>first_name</td>
	<td>last_name</td>
	<td>email</td>
	<td>company_name</td>
	<td>position</td>
	<td>phone1</td>
	<td>phone2</td>
	<td>phone3</td>
</tr>
<?php foreach ($context as $account) { ?>
<tr>
	<form method="POST" action="index.php?mode=update">
		<td><input name="first_name" value=<?php echo $account->first_name; ?> ></td>
		<td><input name="last_name" value=<?php echo $account->last_name; ?> ></td>
		<td><input name="email" value=<?php echo $account->email; ?> ></td>
		<td><input name="company_name" value=<?php echo $account->company_name; ?> ></td>
		<td><input name="position" value=<?php echo $account->position; ?> ></td>
		<td><input name="phone1" value=<?php echo $account->phone1; ?> ></td>
		<td><input name="phone2" value=<?php echo $account->phone2; ?> ></td>
		<td><input name="phone3" value=<?php echo $account->phone3; ?> ></td>
		<td>
				<input hidden name="id" value=<?php echo $account->id; ?> />
				<input type="submit" name="update" value="Update"/>
		</td>
	</form>
	<form method="POST" action="index.php?mode=delete">
		<td>
			<input hidden name="id" value=<?php echo $account->id; ?> />
			<input type="submit" name="delete" value="Delete"/>
		</td>
	</form>
</tr>
<?php } ?>
<form method="POST" action="index.php?mode=create">
	<tr>
		<td><input type="text" name="first_name" required></td>
		<td><input type="text" name="last_name" required></td>
		<td><input type="email" name="email" required></td>
		<td><input type="text" name="company_name"></td>
		<td><input type="text" name="position"></td>
		<td><input type="tel" name="phone1"></td>
		<td><input type="tel" name="phone2"></td>
		<td><input type="tel" name="phone3"></td>
		<td><input type="submit" name="create" value="Create"></td>
	<tr>
</form>
</table>
<a href="other.php">Other</a>
