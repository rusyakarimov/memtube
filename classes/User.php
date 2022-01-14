<?php
	class User
	{
		private $id;
		private $db;

        public $username;
        public $email; 

		public function __construct($id)
		{
			$this->id = $id;

			//Создаем объект для работы с БД:
			$this->db = new db;
		}

		public function getName()
		{
            return $this->db->query('SELECT username FROM users WHERE user_id = ?', $this->id)->fetchArray();
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
?>