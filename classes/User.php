<?php
/* USER CLASS */
class User
{
	private $db;

	public function __construct()
	{
		$this->db = new db;
	}

	public function register($login, $email, $password)
	{
		try {
			$newPass = md5($password);
			$account = $this->db->query('SELECT * FROM users WHERE username = ?', $login)->fetchArray();

			if ($account['username'] == $login or $account['email'] == $email) { //is have user
				$this->redirect('error_page');
			} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $login)) { //no match
				$this->redirect('error_page');
			} elseif (!preg_match("/^[a-zA-Z0-9]+$/", $newPass)) { //no match
				$this->redirect('error_page');
			} else {
				$user_pic = "user.png";
				$insert = $this->db->query('INSERT INTO users (username,password,email,profile_pic,user_status) VALUES (?,?,?,?,?)', $login, $newPass, $email, $user_pic, '2'); //запись в бд
				$insert->affectedRows();

				if ($insert) {
					$_SESSION['auth'] = true;
					$_SESSION['name'] = $login;
					$_SESSION['pic'] = $user_pic;
					$_SESSION['status'] = 2;
					$this->redirect('/main');
				} else {
					$this->redirect('error_page');
				}
			}
		} catch (RuntimeException $e) {
			echo $e->getMessage();
			header("Location: error_page");
		}
	}

	public function auth($login, $password)
	{
		$account = $this->db->query('SELECT * FROM users WHERE username = ? AND password = ?',  $login, $password)->fetchArray();

		if ($account) {
			$_SESSION['name'] = $login;
			$_SESSION['auth'] = true;
			$_SESSION['pic'] = $account['profile_pic'];
			$_SESSION['status'] = $account['user_status'];
			$this->redirect('/main');
		} else {
			$this->redirect('error_page');
		}
	}

	public function logOut()
	{
		session_unset();
		session_destroy();
		$this->redirect('/main');
	}

	public function redirect($url)
	{
		header('Location: ' . $url);
	}

	public function getAll($name, $field)
	{
		$q = $this->db->query('SELECT * FROM users WHERE username = ?', $name)->fetchArray();
		return print $q[$field];
	}

	public function dropAccount($name)
	{
		if ($_SESSION['auth'] && $_SESSION['name'] = $name) {

			$q = $this->db->query('DELETE FROM users WHERE username = ?', $name);

			if ($q) {
				$this->redirect('/logout');
			} else {
				$this->redirect('error_page');
			}
		} else {
			$this->redirect('error_page');
		}
	}
}
