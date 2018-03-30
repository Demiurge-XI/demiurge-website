<?php
	function db_connect()
	{
		static $connection;

		if (!isset($connection))
		{
			$config = parse_ini_file('..\..\ffxidb\db_conf.ini');
			$connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
		}

		if ($connection === false)
		{
			return mysqli_connect_error();
		}
		return $connection;
	}

	function db_query($query)
	{
		$connection = db_connect();
		$result = mysqli_query($connection,$query);

		return $result;
	}

	// TODO: move above functions to a common location for use in multiple scripts.

	// TODO: fix queryUnique, it's wrong.
	$queryCount = db_query("SELECT * FROM accounts_sessions;");
	$resultCount = mysqli_num_rows($queryCount);
	// $queryUnique = db_query("SELECT DISTINCT(client_addr) FROM accounts_sessions;");
	// $resultUnique = mysqli_num_rows($queryUnique)
	//if ($queryCount === false || $queryUnique === false)
	if ($queryCount === false)
	{
		echo '<span style="color:#FF0000;"><strong>ERROR</strong></span>';
	}
	else
	{
		// echo '<span style="color:#008000;"><strong>'.$resultCount.'</strong></span><span style="color:#F0F000;"><strong>('.$resultUnique.')</strong></span>';
		echo '<span style="color:#008000;"><strong>'.$resultCount.'</strong></span><br>(wip: player listing and unique count)';
	}
?>