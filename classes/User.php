<?php
class User
{
	private $db;
	private $username;
	private $email;
	private $is_auth = false;
	private $id;

	public function __construct($id)
	{
		session_start();

		//Создаем объект для работы с БД:
		$this->db = new db;

		if (!empty($_SESSION['name']) && $_SESSION['auth']) {
			$this->is_auth = true;
			$this->username = $_SESSION['name'];
			$this->id = $id;
		}
	}

	public function getName()
	{
		$this->db->query('SELECT username FROM users WHERE user_id = ?', $this->id)->fetchArray();
		return $this;
	}

	public function getEmail()
	{
		return $this->db->query('SELECT email FROM users WHERE user_id = ?', $this->id)->fetchArray();
	}

	public function getAll()
	{
		return $this->db->query('SELECT * FROM users WHERE user_id = ?', $this->id)->fetchArray();
	}
}
