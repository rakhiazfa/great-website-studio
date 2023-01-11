<?php

namespace GreatWebsiteStudio\Database;

use PDO;
use PDOException;
use PDOStatement;

/**
 * 
 * Great Website Studio
 * 
 * @author Rakhi Azfa Rifansya
 * 
 */

class Database
{
	/**
	 * @var string
	 */
	private string $driver;

	/**
	 * @var string
	 */
	private string $host;

	/**
	 * @var int
	 */
	private int $port;

	/**
	 * @var string
	 */
	private string $database;

	/**
	 * @var string
	 */
	private string $username;

	/**
	 * @var string
	 */
	private string $password;

	/**
	 * @var PDO
	 */
	public PDO $connection;

	/**
	 * @var PDOStatement
	 */
	public PDOStatement $statement;

	/**
	 * Create a new Database instance.
	 * 
	 */
	public function __construct()
	{
		$this->driver = env('DATABASE_DRIVER');

		$this->host = env('DATABASE_HOST');

		$this->port = env('DATABASE_PORT');

		$this->database = env('DATABASE_NAME');

		$this->username = env('DATABASE_USERNAME');

		$this->password = env('DATABASE_PASSWORD');

		/**
		 * Get database connection.
		 * 
		 */

		$this->getConnection();
	}

	/**
	 * Get database connection.
	 * 
	 * @return void
	 */
	public function getConnection()
	{
		$dataSourceName = "$this->driver:host=$this->host;port=$this->port;dbname=$this->database";

		try {

			$this->connection = new PDO($dataSourceName, $this->username, $this->password);

			/**
			 * Set PDO attributes.
			 * 
			 */

			$this->connection->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);

			$this->connection->setAttribute(
				PDO::ATTR_DEFAULT_FETCH_MODE,
				PDO::FETCH_ASSOC
			);

			// 
		} catch (PDOException $error) {

			die("Connection failed : " . $error->getMessage());
		}
	}
}
