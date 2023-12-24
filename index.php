<?php
	include 'controller.php';
	$route = $_GET['mode'];
	if ($route == 'read' || !isset($_GET['mode']))
		Controller::render_page();
	else if ($route == 'create')
		Controller::add_account();
	else if ($route == 'update')
		Controller::update_account();
	else if ($route == 'delete')
		Controller::delete_account();
?>

