<?php
	require_once 'Model.php';
	class Controller {
        private static $PAGE_SIZE = 3;
		public static function renderPage() {
            //$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            if (!isset($_GET['page']) || $_GET['page'] < 1)
                header('Location: index.php?mode=read&page=1');
            $page_amount = ceil(Account::countRows() / self::$PAGE_SIZE);
            if ($_GET['page'] > $page_amount)
                header("Location: index.php?mode=read&page=$page_amount");
            $page = $_GET['page'];
			$context = Account::findPage($page - 1 ,self::$PAGE_SIZE);
			include 'View.php';
		}

		public static function addAccount() {
			$user = new Account();
            Controller::validateInput("create");
            $user->fill($_POST);
            if (!$user->verifyEmail())
                header("Location: index.php?mode=read&page=$_GET[page]&error=$error");    
            else {
                $user->create();
                header('Location: index.php?mode=read&page=9999999999');
            }
		}

		public static function updateAccount() {
			$user = new Account();
            Controller::validateInput("update");
            $user->fill($_POST);
            if (!$user->verifyEmail())
                header("Location: index.php?mode=read&page=$_GET[page]&error=$error");    
            else {
                $user->update();
                header("Location: index.php?mode=read&page=$_GET[page]");
            }
		}

		public static function deleteAccount() {
			if (isset($_POST['id']))
				Account::delete($_POST['id']);
			header("Location: index.php?mode=read&page=$_GET[page]");
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
                header("Location: index.php?mode=read&page=$_GET[page]&error=$error");    
        }
	}

