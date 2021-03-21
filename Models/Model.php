<?php

/**
 * Model
 */
class Model
{
	
	public static function connect()
	{
		$db = new PDO("mysql:host=localhost;dbname=panier;charset=utf8", 'root', '');

		return $db;
	}
}