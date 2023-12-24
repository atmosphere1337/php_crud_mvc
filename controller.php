<?php
	include 'model.php';
	class Controller {
		public static function render_page() 
		{
			$context = Account::findAll();
			include 'view.php';
		}
		public static function add_account() {
			$user = new Account();
			$user->first_name = $_POST['first_name'];	
			$user->last_name = $_POST['last_name'];	
			$user->email = $_POST['email'];	
			$user->create();
			header('Location: index.php?mode=read');
		}
		public static function update_account() {
			$user = new Account();
			$user->id = $_POST['id'];
			$user->first_name = $_POST['first_name'];	
			$user->last_name = $_POST['last_name'];	
			$user->email = $_POST['email'];	
			$user->update(); 
			header('Location: index.php?mode=read');
		}
		public static function delete_account() {
			if (isset($_POST['id']))
				Account::delete($_POST['id']);
			header('Location: index.php?mode=read');
		}
	}
	/*
	if ($_POST["create"])
	{
		$params = "first_name, last_name, email";
		$values = "'$_POST[first_name]', '$_POST[last_name]', '$_POST[email]'";
		$query = "INSERT INTO account($params) VALUES ($values)";
		mysqli_query($link, $query);
	}
	if ($_POST['delete']) {
		echo "delete";
	}
	if ($_POST['update']) {
		echo "update";
	}
	 */




	/*
	include 'model.php';
	$context = Account::findAll();
	include 'view.php';
	 */
	/*
	$acc = new Account();
	$acc->first_name = 'hello';
	print_r(Account::findAll());
	 */
?>
