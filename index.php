<?php
	require_once 'Controller.php';
	$route = $_GET['mode'];
	if ($route == 'read' || !isset($_GET['mode']))
		Controller::renderPage();
	else if ($route == 'create')
		Controller::addAccount();
	else if ($route == 'update')
		Controller::updateAccount();
	else if ($route == 'delete')
		Controller::deleteAccount();

