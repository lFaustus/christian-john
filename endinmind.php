<?php
	function db_connect()
	{
		return new PDO('mysql:host=localhost;dbname=endinmind','root','');
	}
?>