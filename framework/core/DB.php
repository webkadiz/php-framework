<?php

class DB
{
	private static $connection;


	static function connect()
	{
		if ($db = Config::get('db')) {

			$opt = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false
			];

			self::$connection = new PDO("{$db['dbserver']}:host={$db['host']};dbname={$db['dbname']};charset={$db['charset']}", $db['user'], $db['password'], $opt);
		}
	}

	static function query($sql, $placeholders = [], $mode = PDO::FETCH_BOTH)
	{

		if (self::$connection) {


			$query = self::$connection->prepare($sql);
			$query->execute($placeholders);
			$result = [];

			while ($row = $query->fetch($mode)) {
				$result[] = $row;
			}

			return $result;
		}
	}

	static function queryOne($sql, $placeholders = [], $mode = PDO::FETCH_BOTH)
	{

		if (self::$connection) {


			$query = self::$connection->prepare($sql);
			$query->execute($placeholders);
			$result = [];

			while ($row = $query->fetch($mode)) {
				$result[] = $row;
			}


			$result = count($result) === 1 ? $result[0] : $result;

			if ($mode === PDO::FETCH_BOTH)
				$result = count($result) === 2 ? $result[0] : $result;

			elseif ($mode === PDO::FETCH_NUM)
				$result = count($result) === 1 ? $result[0] : $result;


			return $result;
		}
	}

	static function cols($table)
	{
		if (self::$connection) {

			return DB::query("SHOW COLUMNS FROM $table");
		}
	}
}
