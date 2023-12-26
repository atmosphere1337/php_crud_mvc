<?php
	require_once 'Model.php';
	class Controller {
        const PAGE_SIZE = 10;

        private static function redirectToPage($page, $error=0) {
            $query = "Location: index.php?mode=read&page=$page"; 
            if ($error != 0)
                $query .= "&error=$error";
            header($query);
            exit();
        }
		public static function renderPage() {
            if (!isset($_GET['page']) || $_GET['page'] < 1)
                self::redirectToPage(1);
            $page_amount = ceil(Account::countRows() / self::PAGE_SIZE);
            if ($_GET['page'] > $page_amount)
                self::redirectToPage($page_amount);
            $current_page = $_GET['page'];
			$context = Account::findPage($current_page - 1 , self::PAGE_SIZE);
			include 'View.php';
		}

		public static function addAccount() {
			$user = new Account();
            self::validateInput("create");
            $user->fill($_POST);
            if ($user->countEmail() != 0)
                self::redirectToPage($_GET['page'], "email_exists");
            else {
                $user->create();
                self::redirectToPage(99999999999);
            }
		}

		public static function updateAccount() {
			$user = new Account();
            self::validateInput("update");
            $user->fill($_POST);
            if ($user->countEmail() > 1)
                self::redirectToPage($_GET['page'], "email_exists");
            else {
                $user->update();
                self::redirectToPage($_GET['page']);
            }
		}

		public static function deleteAccount() {
			if (isset($_POST['id']))
				Account::delete($_POST['id']);
            self::redirectToPage($_GET['page']);
		}

        private static function validateInput($mode)
        {
            $error_flag = false;
            $error=1;
            if ($mode == "update" && (!isset($_POST['id']) || $_POST['id'] == "" || !is_numeric($_POST['id']))) {
                $error = "id";
                $error_flag = true;
            }
            else if (!isset($_POST['first_name']) || $_POST['first_name'] == "" || strlen($_POST['first_name']) > 60) {
                $error = "firstname";
                $error_flag = true;
            }
            else if (!isset($_POST['last_name']) || $_POST['last_name'] == "" || strlen($_POST['last_name']) > 60) {
                $error = "lastname";
                $error_flag = true;
            }
            else if (!isset($_POST['email']) || $_POST['email'] == "" || strlen($_POST['email']) > 100) {
                $error = "email";
                $error_flag = true;
            }
            else if (isset($_POST['company_name']) && strlen($_POST['company_name']) > 70) {
                $error = "companyname";
                $error_flag = true;
            }
            else if (isset($_POST['position']) && strlen($_POST['position']) > 100) {
                $error = "position";
                $error_flag = true;
            }
            else if ((isset($_POST['phone1']) && $_POST['phone1'] != '') && (strlen((string)$_POST['phone1']) != 11 || !is_numeric($_POST['phone1']))) {
                $error = "phone1";
                $error_flag = true;
            }
            else if ((isset($_POST['phone2']) && $_POST['phone2'] != '') && (strlen((string)$_POST['phone2']) != 11 || !is_numeric($_POST['phone2']))) {
                $error = "phone2";
                $error_flag = true;
            }
            else if ((isset($_POST['phone3']) && $_POST['phone3'] != '') && (strlen((string)$_POST['phone3']) != 11 || !is_numeric($_POST['phone3']))) {
                $error = "phone3";
                $error_flag = true;
            }
            if ($error_flag)
                self::redirectToPage($_GET['page'], "input_error_$error");
        }
	}

