<table border="1">
<tr>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Email</td>
	<td>Company</td>
	<td>Position</td>
	<td>Phone 1</td>
	<td>Phone 2</td>
	<td>Phone 3</td>
</tr>
<?php foreach ($context as $account) { ?>
<tr>
	<form method="POST" action="index.php?mode=update&page=<?= $_GET['page'] ?>">
		<td><input name="first_name" value=<?= $account->first_name ?> ></td>
		<td><input name="last_name" value=<?= $account->last_name ?> ></td>
		<td><input name="email" value=<?= $account->email ?> ></td>
		<td><input name="company_name" value=<?= $account->company_name ?> ></td>
		<td><input name="position" value=<?= $account->position ?> ></td>
		<td><input name="phone1" value=<?= $account->phone1 ?> ></td>
		<td><input name="phone2" value=<?= $account->phone2 ?> ></td>
		<td><input name="phone3" value=<?= $account->phone3 ?> ></td>
		<td>
				<input hidden name="id" value=<?= $account->id ?> >
				<input type="submit" name="update" value="Update"/>
		</td>
	</form>
    <form method="POST" action="index.php?mode=delete&page=<?= $_GET['page'] ?>">
		<td>
			<input hidden name="id" value=<?= $account->id ?> />
			<input type="submit" name="delete" value="Delete"/>
		</td>
	</form>
</tr>
<?php } ?>
<form method="POST" action="index.php?mode=create&page=<?= $_GET['page'] ?>">
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

<table border="1">
    <tr>
        <td>
            <a href="index.php?mode=read&page=<?= $_GET['page']-1 ?>">Back</a>  
        <td>
        <?php foreach (range(1, $page_amount) as $page_number) { ?>
            <td>
                <a href="index.php?mode=read&page=<?= $page_number ?>"><?= $page_number ?></a>
            </td>
        <?php } ?>
        <td>
            <a href="index.php?mode=read&page=<?= $_GET['page']+1 ?>">Next</a>  
        <td>
    </tr>
</table>
