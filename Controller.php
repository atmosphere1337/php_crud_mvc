<?php
	require_once 'Model.php';
	class Controller {
		public static function renderPage() 
		{
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
			$context = Account::findAll();
			include 'View.php';
		}

		public static function addAccount() {
			$user = new Account();
            Controller::validateInput("create");
            $user->fill($_POST);
			$user->create();
			header('Location: index.php?mode=read');
		}

		public static function updateAccount() {
			$user = new Account();
            Controller::validateInput("update");
            $user->fill($_POST);
			$user->update();
			header('Location: index.php?mode=read');
		}

		public static function deleteAccount() {
			if (isset($_POST['id']))
				Account::delete($_POST['id']);
			header('Location: index.php?mode=read');
		}

        private static function validateInput($mode)
        {
            $error_flag = false;
            $error=1;
            if ($mode == "update" && (!isset($_POST['id']) || $_POST['id'] == "" || !is_numeric($_POST['id']))) {
                $error_flag = true;
            }
            else if (!isset($_POST['first_name']) || $_POST['first_name'] == "" || strlen($_POST['first_name']) > 60) {
                $error_flag = true;
            }
            else if (!isset($_POST['last_name']) || $_POST['last_name'] == "" || strlen($_POST['last_name']) > 60) {
                $error_flag = true;
            }
            else if (!isset($_POST['email']) || $_POST['email'] == "" || strlen($_POST['email']) > 100) {
                $error_flag = true;
            }
            else if (isset($_POST['company_name']) || strlen($_POST['company_name']) > 70) {
                $error_flag = true;
            }
            else if (isset($_POST['position']) || strlen($_POST['position']) > 100) {
                $error_flag = true;
            }
            else if (isset($_POST['phone1']) || strlen($_POST['phone1']) != 11 || !is_numeric($_POST['phone1'])) {
                $error_flag = true;
            }
            else if (isset($_POST['phone2']) || strlen($_POST['phone2']) != 11 || !is_numeric($_POST['phone2'])) {
                $error_flag = true;
            }
            else if (isset($_POST['phone3']) || strlen($_POST['phone3']) != 11 || !is_numeric($_POST['phone3'])) {
                $error_flag = true;
            }
            if ($error_flag)
                header("Location: index.php?mode=read&error=$error");    
        }
	}

