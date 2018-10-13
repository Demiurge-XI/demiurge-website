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

	$jobClassIDs = array(
		0  => '---', // None
		1  => 'WAR', // Warrior
		2  => 'MNK', // Monk
		3  => 'WHM', // White Mage
		4  => 'BLM', // Black Mage
		5  => 'RDM', // Red mage
		6  => 'THF', // Thief
		7  => 'PLD', // Paladin
		8  => 'DRK', // Dark Knight
		9  => 'BST', // Beastmaster
		10 => 'BRD', // Bard
		11 => 'RNG', // Ranger
		12 => 'SAM', // Samurai
		13 => 'NIN', // Ninja
		14 => 'DRG', // Dragoon
		15 => 'SMN', // Summoner
		16 => 'BLU', // Blue Mage
		17 => 'COR', // Corsair
		18 => 'PUP', // Puppetmaster
		19 => 'DNC', // Dancer
		20 => 'SCH', // Scholar
		21 => 'GEO', // Geomancer
		22 => 'RUN', // Rune fencer
		23 => 'MON', // Monster
		24 => 'MON', // Monster
		25 => 'MON', // Monster
		26 => 'MON', // Monster
		27 => 'MON', // Monster
		28 => 'MON', // Monster
		29 => 'MON', // Monster
		30 => 'MON', // Monster
		31 => 'MON', // Monster
	);

	// TODO: move above functions to a common location for use in multiple scripts.

	$qstring = "SELECT charname, mjob, mlvl, sjob, slvl, zone_settings.name, bazaar_message
		FROM chars, zone_settings, char_stats
		WHERE chars.charid in (SELECT charid from accounts_sessions) and chars.pos_zone = zone_settings.zoneid and chars.charid = char_stats.charid
		ORDER BY charname DESC;";
	$dbq = db_query($qstring);
	while ($row = mysqli_fetch_array($dbq, MYSQLI_BOTH))
	{
		$roster[]=$row;
	}

	if ($roster === false)
	{
		echo '<span style="color:#FF0000;"><strong>ERROR</strong></span>';
	}
	else
	{
		echo '<strong>', 'online player roster :  work in progress', '</strong><br>';
		$resultCount = mysqli_num_rows($dbq);
		echo "<table>";
		echo '<tr><td><strong>There are <span style="color:#00C000;">', $resultCount, '</span><br>Players Online</strong></td></tr>';

		foreach ($roster as &$player)
		{
			echo '<tr>';
			echo '<td>', $player["charname"], ' ', '</td>';
			echo '<td>&nbsp</td>';
			echo '<td>', $jobClassIDs[$player["mjob"]], '</td>';
			echo '<td>', '(', $player["mlvl"], ')', '</td>';
			echo '<td>', ' / ', '</td>';
			echo '<td>', $jobClassIDs[$player["sjob"]], '</td>';
			echo '<td>', '(', $player["slvl"], ')', '</td>';
			echo '<td>&nbsp</td>';
			// echo '<td>', '[', $player["zone_settings.name"], ']', '</td>';
			echo '<td>', $player["bazaar_message"], '</td>';
			echo '</tr>';
		}
		echo "</table>";
	}
?>