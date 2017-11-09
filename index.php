<!DOCTYPE HTML>
<html>
<head>
	<title>Lotus Ratong club</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
	<script>
		var OneSignal = window.OneSignal || [];
		OneSignal.push(["init", {
			appId: "838c4a64-7f8a-440b-9a33-8af540d04c94",
			autoRegister: false, /* Set to true to automatically prompt visitors */
			notifyButton: {
				enable: true /* Set to false to hide */
			}
		}]);
	</script>
	<link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
	<style>
		input {
			height: 33px;
		}

		.summary tr td, .ranking tr td {
			vertical-align: middle!important;
		}
		.label-success {
			color: #fff!important;
			background-color: #d41e8e!important;
			min-width: 25px;
			border-radius: 5px;
		}

		.label-danger {
			color: #fff!important;
			background-color: #676767!important;
			min-width: 25px;
			border-radius: 5px;
		}

		.label-info {
			background-color: #337ab7!important;
			min-width: 25px;
			border-radius: 5px;
		}

		.generate {
			margin: auto;
			width: 200px;
		}

		.toolbox {
			width: 400px;
			margin: auto;
		}

		.result {
			vertical-align: middle!important;
		}
		.player span{
			background-repeat: no-repeat;
			background-size: 23%;
			min-height: 65px;
			height: 65px;
			display: block;
			line-height: 65px;
			padding-left: 25px;
		}

		.schedule .player span {
			background-size: 17%;
		}

		.fa{
			color: #d41e8e;
			cursor: pointer;
		}

		.label-success .fa {
			color: #fff;
		}
		.player #Duy{
			background-image: url(images/duy.jpeg);
		}

		.player #Ha{
			background-image: url(images/ha.jpg);
		}

		.player #Thanh{
			background-image: url(images/thanh.jpg);
		}

		.player #Tri{
			background-image: url(images/tri.jpg);
		}

		.player #Doan{
			background-image: url(images/doan.jpg);
		}

		.player #Linh{
			background-image: url(images/linh.jpg);
		}

		.player #Phuong{
			background-image: url(images/phuong.jpg);
		}

		.player #Hiep{
			background-image: url(images/hiep.jpg);
		}
		@media screen and (max-width: 767px) {
			.table {
				zoom: 0.7;
			}

			.label-success {
				font-size: 12px;
			}

			.col-sm-3 {
				margin: 10px;
			}

			.schedule-btn {
				margin-top: 10px;
			}
			.summary tr td, .ranking tr td {
				vertical-align: middle!important;
			}
			.player span {
				line-height: 18px;
			}
		}
	</style>
</head>
<body>

<?php
// Database config
$servername = "127.0.0.1";
$username = "chanacom_ratong";
$password = "0[+121%5g5@J";
$dbname = "chanacom_ratong";

// Msg config
$keyErr =  "";
$genKeyErr =  "";
$playerErr =  "";
$key = "";
$saveMsg = "";

// Schedule
$orangepoint = array(0,0,0);
$greenpoint = array(0,0,0);
$team = array();
$scheduleType = 0;

// Statify
$history = array();
$scheduleHistory = array();
// List of player goal defference
$playerGD = array();
// List of rank
$playerRank = array();
// List of winner
$playerWinner = array();
// List of winner on week
$playerWinnerWeek = array();
// List of lost
$playerLost = array();
// List of lost on week
$playerLostWeek = array();
$playerPointTenMatch = array();
$players = array('Doan','Duy','Ha','Linh','Phuong','Tri','Thanh','Hiep');
$scheduleTypes = array('Cafe','Bun','Pho','Banh canh','Hu tieu','Xoi','Mi','Bun cha ca','Op la bo','Banh cuon');
$nickNameList = array('Doan' => 'Doan Diêm Dúa','Duy' => 'Duy Dặt Dẹo','Ha' => 'Hà Hàm Hồ','Linh' => 'Linh Lạc Loài','Phuong' => 'Phương Phúng Phính','Tri' => 'Trí Trốn Tránh','Thanh' => 'Thạnh Thướt Tha','Hiep' => 'Hiệp Hư Hỏng');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// init load
$team = getTeam($conn);

// Action function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Generate schedule
	if (empty($_POST["genkey"])) {
		$genKeyErr = "Key is required";
	} else {
		$key = checkInput($_POST["genkey"]);
		if ($key != 'lt') {
			$genKeyErr = "The key is not valid!";
		}
		else
		{
			if (!empty($_POST["player"]) && (count($_POST["player"]) > 3))
			{
				$playerTeam = $_POST["player"];
				if (count($playerTeam) == 7 || count($playerTeam) == 5)
				{
					$remove = rand(0,(count($playerTeam) -1 ));
					unset($playerTeam[$remove]);
				}
				$team = generateSchedule($conn,$playerTeam);
				saveGenerateSchedule($conn, $team);
				sendMessage("The schedule has been generated!");
			}
			else
			{
				$playerErr =  "You need to input more than 3 players!";
			}
		}
	}

	// Save result
	if (empty($_POST["key"])) {
		$keyErr = "Key is required";
	} else {
		$key = checkInput($_POST["key"]);
		if ($key != 'lt') {
			$keyErr = "The key is not valid!";
		}
		else if (!empty($_POST["orangepoint"]) && !empty($_POST["greenpoint"]))
		{
			$orangepoint = $_POST["orangepoint"];
			$greenpoint = $_POST["greenpoint"];
			$team = getTeam($conn);
			$scheduleType = $_POST["schedule_type"];
			$win = $lost = '';
			$scheduleMatch = array(0,0,0);
			$scheduleMatchPoint = array(0,0,0);
			if (count($team) == 3)
			{
				for ($j=0; $j < 3; $j++) {
					$a = $j;
					if ($j == 2) $b = 0;
					else $b = $a + 1;
					if ($orangepoint[$j] > $greenpoint[$j])
					{
						$scheduleMatch[$a] = $scheduleMatch[$a] + 1;
					}
					elseif ($orangepoint[$j] < $greenpoint[$j])
					{
						$scheduleMatch[$b] = $scheduleMatch[$b] + 1;
					}
					$scheduleMatchPoint[$a] = $scheduleMatchPoint[$a] + $orangepoint[$j] - $greenpoint[$j];
					$scheduleMatchPoint[$b] = $scheduleMatchPoint[$b] + $greenpoint[$j] - $orangepoint[$j];
					saveMatch($conn, $team[$a], $team[$b], $orangepoint[$j], $greenpoint[$j]);
				}
				if (count(array_unique($scheduleMatch)) === 1 && count(array_unique($scheduleMatchPoint)) === 1)
				{
					// case 1: all draw
					$saveMsg = "We couldn't find the champions, plz go go go!!!";
				}
				elseif (count(array_unique($scheduleMatch)) === 1)
				{
					// case 2: all draw but the point is not same
					$win = getWinTeam($team,$scheduleMatchPoint);
					$lost = getLostTeam($team,$scheduleMatchPoint);
					$saveMsg = "The champions is $win, thanks for donation $lost!!!";
				}
				else
				{
					// case 3: normal case
					$win = getWinTeam($team,$scheduleMatch);
					$lost = getLostTeam($team,$scheduleMatch);
					$saveMsg = "Congratulations! The champions is $win, thanks for donate $lost!!!";
				}
			}
			else
			{
				array_pop($scheduleMatch);
				for ($j=0; $j < 3; $j++) {
					if ($orangepoint[$j] == 0 && $greenpoint[$j] == 0)
						continue;
					$a = 0;
					$b = 1;
					if ($j == 1)
					{
						$a = 1;
						$b = 0;
					}
					if ($orangepoint[$j] > $greenpoint[$j])
					{
						$scheduleMatch[$a] = $scheduleMatch[$a] + 1;
					}
					elseif ($orangepoint[$j] < $greenpoint[$j])
					{
						$scheduleMatch[$b] = $scheduleMatch[$b] + 1;
					}
					saveMatch($conn, $team[$a], $team[$b], $orangepoint[$j], $greenpoint[$j]);
				}
				$win = getWinTeam($team,$scheduleMatch);
				$lost = getLostTeam($team,$scheduleMatch);
				$saveMsg = "Congratulations! The champions is $win, thanks for donate $lost!!!";
			}
			saveSchedule($conn, $win, $lost, $scheduleType);
			$team = array();
			sendMessage($saveMsg);
			$orangepoint = array(0,0,0);
			$greenpoint = array(0,0,0);
			$playerErr =  "";
		}
	}
}

foreach ($players as $key => $value) {
	$playerGD[$value] = getPointGD($conn, $value);
}
foreach ($players as $key => $value) {
	$playerRank[$value] = getPointRank($conn, $value);
}
foreach ($players as $key => $value) {
	$playerWinner[$value] = getPointWin($conn, $value);
}
foreach ($players as $key => $value) {
	$playerWinnerWeek[$value] = getPointWinWeek($conn, $value);
}
foreach ($players as $key => $value) {
	$playerLost[$value] = getPointLost($conn, $value);
}
foreach ($players as $key => $value) {
	$playerLostWeek[$value] = getPointLostWeek($conn, $value);
}
foreach ($players as $key => $value) {
	$playerPointTenMatch[$value] = getPointTenMatch($conn, $value);
}
arsort($playerGD);
arsort($playerRank);
arsort($playerWinner);
arsort($playerWinnerWeek);
arsort($playerLost);
arsort($playerLostWeek);
arsort($playerPointTenMatch);

$history = getMatchHistory($conn);
$scheduleHistory =getScheduleHistory($conn);

if ($saveMsg == '') $saveMsg = "Congratulations!!! The player of the week is ".getAchivementPlayer(getMostPlayer($playerWinnerWeek)) .".";

// Feature function
function checkInput($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function convertTime($datetime)
{
	$dt = new DateTime($datetime);
	$tz = new DateTimeZone('Asia/Bangkok');
	$dt->setTimezone($tz);
	echo $dt->format('d-m-Y H:i:s');
}

function getMostPlayer($array) {
	$max = 0;
	$player = array();
	foreach ($array as $key => $value) {
		if ($max < $value)
		{
			$max = $value;
		}
	}
	foreach ($array as $key => $value) {
		if ($max == $value)
		{
			$player[] = $key;
		}
	}
	return $player;
}

function getPlayer($key) {
	$conn = $GLOBALS['conn'];
	$nickNameList = $GLOBALS['nickNameList'];
	$playerWinnerWeek = $GLOBALS['playerWinnerWeek'];
	$playerWinner = $GLOBALS['playerWinner'];
	$playerLostWeek = $GLOBALS['playerLostWeek'];
	$smartestList = getSmarterPlayer($conn, $playerLostWeek);
	$playerSmarter = $smartestList[0];
	$playerLost = $GLOBALS['playerLost'];
	$nickName = $nickNameList[$key];
	$achive = '';
	if (in_array($key, getMostPlayer($playerWinnerWeek)))
		$achive = $achive . " <i class='fa fa-star' data-toggle='tooltip' title='The best player of the week' aria-hidden='true'></i>";
	if (in_array($key, getMostPlayer($playerWinner)))
		$achive = $achive . " <i class='fa fa-diamond' data-toggle='tooltip' title='The legend of legends' aria-hidden='true'></i>";
	if (in_array($key, $playerSmarter))
		$achive = $achive . " <i class='fa fa-btc' data-toggle='tooltip' title='The smartest player of the week' aria-hidden='true'></i>";
	if (in_array($key, getMostPlayer($playerLostWeek)))
		$achive = $achive . " <i class='fa fa-battery-empty' data-toggle='tooltip' title='The loser of the week' aria-hidden='true'></i>";
	if (in_array($key, getMostPlayer($playerLost)))
		$achive = $achive . " <i class='fa fa-heartbeat' data-toggle='tooltip' title='The worst player ever' aria-hidden='true'></i>";
	$html = "<span id='$key' class=''>$nickName $achive</span>";
	return $html;
}

function getWinTeam($team,$array) {
	$max = max($array);
	$key = array_search($max, $array);
	return $team[$key][0] . ' - '. $team[$key][1];
}

function getLostTeam($team,$array) {
	$min = min($array);
	$key = array_search($min, $array);
	return $team[$key][0] . ' - '. $team[$key][1];
}
// ---------------- //

// Statify function
function getPointGD($conn, $player)
{
	$sql = "SELECT * FROM livescore WHERE (greena = '$player' OR greenb = '$player' OR orangea = '$player' OR orangeb = '$player') ORDER BY id DESC";
	$result = $conn->query($sql);
	$point = 0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["greena"] == $player || $row["greenb"] == $player)
			{
				$point = $point + $row["greenpoint"] - $row["orangepoint"];
			}
			else
			{
				$point = $point + $row["orangepoint"] - $row["greenpoint"];
			}
		}
	}
	return $point;
}

function getPointRank($conn, $player)
{
	$para = '"' . $player . '"';
	$sql = "SELECT * FROM schedule WHERE schedule_data LIKE '%$para%' AND win is not null AND lost is not null ORDER BY id DESC";
	$result = $conn->query($sql);
	$form = '';
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$win = explode(" - ",$row["win"]);
			$lost = explode(" - ",$row["lost"]);

			if (in_array($player, $win))
			{
				$form = $form . "W";
			}
			elseif (in_array($player, $lost))
			{
				$form = $form . "L";
			}
			else $form = $form . "D";
		}
	}
	$win = substr_count($form,"W");
	$draw = substr_count($form,"D");
	$point = $win * 3 + $draw;
	return $point;
}

function getPointWin($conn, $player)
{
	$para = '"' . $player . '"';
	$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND win LIKE '%$player%') ORDER BY id DESC";
	$result = $conn->query($sql);
	return $result->num_rows;
}

function getPointLost($conn, $player)
{
	$para = '"' . $player . '"';
	$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND lost LIKE '%$player%') ORDER BY id DESC";
	$result = $conn->query($sql);
	return $result->num_rows;
}

function getPointWinWeek($conn, $player)
{
	$para = '"' . $player . '"';
	$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND win LIKE '%$player%'  AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC ";
	$result = $conn->query($sql);
	return $result->num_rows;
}

function getPointLostWeek($conn, $player)
{
	$para = '"' . $player . '"';
	$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND lost LIKE '%$player%' AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
	$result = $conn->query($sql);
	return $result->num_rows;
}

function getPointTenMatch($conn, $player)
{
	$sql = "SELECT * FROM livescore WHERE (greena = '$player' OR greenb = '$player' OR orangea = '$player' OR orangeb = '$player') ORDER BY id DESC LIMIT 10";
	$result = $conn->query($sql);
	$win = 0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["greena"] == $player || $row["greenb"] == $player)
			{
				if ($row["greenpoint"] == 5)
				{
					$win++;
				}
			}
			else
			{
				if ($row["orangepoint"] == 5)
				{
					$win++;
				}
			}
		}
	}
	return $win;
}

function getSmarterPlayer($conn, $playerLostWeek)
{
	$min = max($playerLostWeek);
	$player = array();
	foreach ($playerLostWeek as $key => $value) {
		$para = '"' . $key . '"';
		$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($min > $value && $result->num_rows > 0)
		{
			$min = $value;
		}
	}
	foreach ($playerLostWeek as $key => $value) {
		$para = '"' . $key . '"';
		$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
		$result = $conn->query($sql);
		if ($min == $value && $result->num_rows > 0)
		{
			$player[] = $key;
		}
	}
	return array($player,$min);
}

function getAchivementPlayer($list)
{
	$achive = '';
	foreach ($list as $value) {
		if ($achive == '')
			$achive = getPlayer($value);
		else $achive = $achive . ' & ' . getPlayer($value);
	}
	return $achive;
}

function getFormTenMatch($conn, $player)
{
	$sql = "SELECT * FROM livescore WHERE (greena = '$player' OR greenb = '$player' OR orangea = '$player' OR orangeb = '$player') ORDER BY id DESC LIMIT 10";
	$result = $conn->query($sql);
	$win = 0;
	$lost = 0;
	$form = "";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["greena"] == $player || $row["greenb"] == $player)
			{
				if ($row["greenpoint"] == 5)
				{
					$win++;
					$form = $form . "W";
				}
				else
				{
					$lost++;
					$form = $form . "L";
				}
			}
			else
			{
				if ($row["orangepoint"] == 5)
				{
					$win++;
					$form = $form . "W";
				}
				else
				{
					$lost++;
					$form = $form . "L";
				}
			}
		}
	}
	$chars = str_split(strrev($form));
	$form = '';
	foreach($chars as $char){
		switch ($char) {
			case 'W':
				$form = $form . "<span class='badge label-success label-as-badge'>$char</span> ";
				break;

			case 'L':
				$form = $form . "<span class='badge label-danger label-as-badge'>$char</span> ";
				break;
			default:
				$form = $form . "<span class='badge label-info label-as-badge'>$char</span> ";
				break;
		}
	}
	return array($win,$lost,$form);
}

function getPointMatch($conn, $player)
{
	$sql = "SELECT * FROM livescore WHERE (greena = '$player' OR greenb = '$player' OR orangea = '$player' OR orangeb = '$player') ORDER BY id DESC";
	$result = $conn->query($sql);
	$win = 0;
	$lost = 0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["greena"] == $player || $row["greenb"] == $player)
			{
				if ($row["greenpoint"] == 5)
				{
					$win++;
				}
				else
				{
					$lost++;
				}
			}
			else
			{
				if ($row["orangepoint"] == 5)
				{
					$win++;
				}
				else
				{
					$lost++;
				}
			}
		}
	}
	return array($win,$lost,$result->num_rows);
}

function getFormTenSchedule($conn, $player)
{
	$para = '"' . $player . '"';
	$sql = "SELECT * FROM schedule WHERE schedule_data LIKE '%$para%' AND win is not null AND lost is not null ORDER BY id DESC LIMIT 10";
	$result = $conn->query($sql);
	$form = "";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$win = explode(" - ",$row["win"]);
			$lost = explode(" - ",$row["lost"]);

			if (in_array($player, $win))
			{
				$form = $form . "W";
			}
			elseif (in_array($player, $lost))
			{
				$form = $form . "L";
			}
			else $form = $form . "D";
		}
	}
	// $win = substr_count($form,"W") / (substr_count($form,"W") + substr_count($form,"L")) * 100;
	// $lost = 100 - round($win,2);
	$win = substr_count($form,"W");
	$draw = substr_count($form,"D");
	$point = $win * 3 + $draw;
	$chars = str_split(strrev($form));
	$form = '';
	foreach($chars as $char){
		switch ($char) {
			case 'W':
				$form = $form . "<span class='badge label-success label-as-badge'>$char</span> ";
				break;

			case 'L':
				$form = $form . "<span class='badge label-danger label-as-badge'>$char</span> ";
				break;
			default:
				$form = $form . "<span class='badge label-info label-as-badge'>$char</span> ";
				break;
		}
	}
	// return array(round($win,2) . '%',$lost . '%',$form);
	return array($point,$form);
}
// ---------------- //

// History function
function getMatchHistory($conn)
{
	$tempHistory = array();
	$sql = "SELECT * FROM livescore ORDER BY id DESC LIMIT 30";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tempHistory[] = $row;
		}
	} else {
		return '';
	}
	return $tempHistory;
}

function getScheduleHistory($conn)
{
	$sql = "SELECT * FROM schedule WHERE win is not null AND lost is not null  ORDER BY id DESC LIMIT 10";
	$result = $conn->query($sql);
	$tempHistory = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$tempHistory[] = $row;
		}
	} else {
		return '';
	}
	return $tempHistory;
}
// ---------------- //

// Generate Schedule function
function generateSchedule($conn,$players) {
	$team = array();
	$playerPoint = array();
	$playerRank = array();
	$type = rand(1,3);
	switch ($type) {
		case 0:
			foreach ($players as $key => $value) {
				$playerPoint[$value] = $key;
			}
			break;

		case 1:
			foreach ($players as $key => $value) {
				$playerPoint[$value] = getPointRank($conn, $value);
			}
			break;

		case 2:
			foreach ($players as $key => $value) {
				$playerPoint[$value] = getPointWinWeek($conn, $value);
			}
			break;

		case 3:
			foreach ($players as $key => $value) {
				$playerPoint[$value] = getPointLostWeek($conn, $value);
			}
			break;
	}

	asort($playerPoint);
	foreach ($playerPoint as $key => $value) {
		$playerRank[] = $key;
	}
	$temp = array();
	$i = 0;
	$playerDivide = count($playerRank) / 2;
	foreach ($playerRank as $key => $player) {
		if ($key < $playerDivide)
		{
			$lastMateId = array_search(getLastMate($conn, $player),$playerRank);
			$mate = -1;
			while($mate < 0) {
				if (count($temp) < ($playerDivide - 1))
				{
					if ($playerDivide == 2)
						$mate = rand(2,3);
					else $mate = rand(3,5);
					if ($mate == $lastMateId || in_array($mate, $temp)) $mate = -1;
				}
				else
				{
					if ($playerDivide == 2)
						$ar = array(2,3);
					else $ar = array(3,4,5);
					$result = array_diff($ar,$temp);
					$mateArr = array_values($result);
					$mate = $mateArr[0];
				}
			}
			$temp[] = $mate;
			$team[$i] = array($player,$playerRank[$mate]);
			$i++;
		}
	}
	return $team;
}

function getLastMate($conn, $player)
{
	$sql = "SELECT * FROM livescore WHERE (greena = '$player' OR greenb = '$player' OR orangea = '$player' OR orangeb = '$player') ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row["greena"] == $player) return $row["greenb"];
			if ($row["greenb"] == $player) return $row["greena"];
			if ($row["orangea"] == $player) return $row["orangeb"];
			if ($row["orangeb"] == $player) return $row["orangea"];
		}
	} else {
		return '';
	}
}

function getMatePercent($conn, $team)
{
	$teama = $team[0] . ' - ' . $team[1];
	$teamb = $team[1] . ' - ' . $team[0];
	$sql = "SELECT * FROM schedule WHERE (win = '$teama' OR win = '$teamb') ORDER BY id DESC";
	$result = $conn->query($sql);
	$win = $result->num_rows;
	$sql = "SELECT * FROM schedule WHERE (lost = '$teama' OR lost = '$teamb') ORDER BY id DESC";
	$result = $conn->query($sql);
	$lost = $result->num_rows;
	$total = $win + $lost;
	if ($total == 0 )
		return "(NA)";
	$percent =round($win / $total * 100);
	return "($percent%)";
}

function getTeam($conn)
{
	$sql = "SELECT * FROM schedule ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$team = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if ($row['win'] == '' && $row['lost'] == '')
				$team = unserialize($row['schedule_data']);
		}
	}
	return $team;
}

function getLastSchedule($conn)
{
	$sql = "SELECT * FROM schedule WHERE win IS NOT NULL AND lost IS NOT NULL ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$schedule = 0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$schedule = $row['id'];
		}
	}
	return $schedule;
}

function checkSchedule($conn)
{
	$sql = "SELECT * FROM schedule WHERE (datetime > (now() - interval 60 minute)) ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$team = array();
	if ($result->num_rows > 0) {
		return true;
	}
	return false;
}

function saveGenerateSchedule($conn, $team)
{
	$data = serialize($team);
	$sql = "INSERT INTO schedule (schedule_data, datetime) VALUES ('$data', now())";
	$conn->query($sql);
}
// ---------------- //

// Save Resullt function
function saveMatch($conn, $orange, $green, $orangepoint, $greenpoint)
{
	$sql = "SELECT * FROM schedule ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$id = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id = $row['id'];
		}
	}
	$sql = "INSERT INTO livescore (schedule_id, orangea, orangeb, orangepoint, greena, greenb, greenpoint, datetime) VALUES ($id,'$orange[0]', '$orange[1]', $orangepoint, '$green[0]', '$green[1]', $greenpoint, now())";
	$conn->query($sql);
}

function saveSchedule($conn, $win, $lost, $scheduleType)
{
	$sql = "SELECT * FROM schedule ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$id = array();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$id = $row['id'];
		}
	}
	$sql = "UPDATE schedule SET win='$win', lost='$lost', schedule_type=$scheduleType, datetime=now()  WHERE id=$id";
	$conn->query($sql);
}

function sendMessage($msg){
	$content = array(
		"en" => $msg
	);

	$fields = array(
		'app_id' => "838c4a64-7f8a-440b-9a33-8af540d04c94",
		'included_segments' => array('All'),
		'contents' => $content
	);

	$fields = json_encode($fields);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
		'Authorization: Basic ZjgzYmY1NDgtN2MzZi00YzM4LTgyYWMtZDkxYTUzMDFiYTFm'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_POST, TRUE);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

	$response = curl_exec($ch);
	curl_close($ch);
}
// ---------------- //
?>

<!-- The ranking block -->
<div class="container">
	<a href="/"><img src="/ratong-logo.jpg" width="200px" style="padding:5px 0 5px; border:0px;"></a>
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>Lotus Ratong table</h2>
				<h4><span class="label label-success"><?php echo $saveMsg;?></span></h4>
			</div>
			<div class="panel-body">
				<span>Win = 3 points, Drawn = 1 point, Lost = 0 point</span><br><br>
				<table class="table table-responsive table-bordered table-striped text-center ranking">
					<thead>
					<tr>
						<th class="text-center">Rank</th>
						<th class="text-center">Name</th>
						<th class="text-center">Won</th>
						<th class="text-center">Drawn</th>
						<th class="text-center">Lost</th>
						<th class="text-center">Point</th>
						<th class="text-center">Form (Last 10)</th>
					</tr>
					</thead>
					<tbody>
					<?php $p=1;foreach ($playerRank as $key => $value): ?>
						<?php $res = getFormTenSchedule($conn, $key); ?>
						<tr>
							<td><?php echo $p; ?></td>
							<td class="player"><?php echo getPlayer($key); ?></td>
							<td><?php echo $playerWinner[$key]; ?></td>
							<td><?php echo $value - $playerWinner[$key] * 3; ?></td>
							<td><?php echo $playerLost[$key]; ?></td>
							<td><?php echo $value; ?></td>
							<td><?php echo $res[1]; $p++; ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>The player summary - form table</h2>
			</div>
			<div class="panel-body">
				<form method="post" class="form-inline">
					<span>Which player do you want access to?</span><span class="label label-danger"><?php echo $playerErr;?></span><br><br>
					<table class="table table-responsive table-bordered table-striped text-center summary">
						<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Rank</th>
							<th class="text-center">Name</th>
							<th class="text-center">Won</th>
							<th class="text-center">Lost</th>
							<th class="text-center">GD</th>
							<th class="text-center">Form (Last 10)</th>
						</tr>
						</thead>
						<tbody>
						<?php $p=1;foreach ($playerPointTenMatch as $key => $value): ?>
							<?php $res = getPointMatch($conn, $key); ?>
							<?php $resTen = getFormTenMatch($conn, $key); ?>
							<tr>
								<td><input type="checkbox" name="player[]" value="<?php echo $key ?>" <?php if ($key != 'Hiep') echo 'checked'; ?>/></td>
								<td><?php echo $p; ?></td>
								<td class="player"><?php echo getPlayer($key); ?></td>
								<td><?php echo $res[0]; ?></td>
								<td><?php echo $res[1]; ?></td>
								<td><?php echo $playerGD[$key]; ?></td>
								<td><?php echo $resTen[2]; $p++; ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
					<div class="text-center">
						<div class="generate">

							<label for="ex2">Enter your key:</label>
							<input type="password" class="form-control" name="genkey" value=""><span class="label label-danger"><?php echo $genKeyErr;?></span>
							<button type="submit" style="margin-top:10px;" class="btn btn-default">Generate Schedule</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- The generate schedule block -->
<?php if(count($team) >= 2): ?>
	<div class="container">
		<h2>Schedule</h2>
		<form class="form-horizontal panel panel-default form-inline" method="post">
			<table class="table table-responsive table-bordered table-striped text-center schedule">
				<thead>
				<tr>
					<th class="text-center">ORANGE TEAM</th>
					<th class="text-center">SCORE</th>
					<th class="text-center">SCORE</th>
					<th class="text-center">GREEN TEAM</th>
				</tr>
				</thead>
				<tbody>
				<?php if(count($team) == 3): ?>
					<?php for ($j=0; $j < 3; $j++): ?>
						<?php $a = $j; if ($j == 2) $b = 0; else $b = $a + 1; ?>
						<tr>
							<td class="player"><?php echo getPlayer($team[$a][0]) .  getPlayer($team[$a][1]) ?></td>
							<td class="col-xs-2 warning result">
								<select class="form-control"  name="orangepoint[]">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select><br />
								<?php echo getMatePercent($conn, $team[$a]); ?>
							</td>
							<td class="col-xs-2 success result">
								<select class="form-control"  name="greenpoint[]">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select><br />
								<?php echo getMatePercent($conn, $team[$b]); ?>
							</td>
							<td class="player"><?php echo getPlayer($team[$b][0]) . getPlayer($team[$b][1]); ?></td>
						</tr>
					<?php endfor; ?>
				<?php else: ?>
					<?php for ($j=0; $j < 3; $j++): ?>
						<?php $a = 0; $b = 1; if ($j == 1) {$b = 0; $a = 1;} ?>
						<tr>
							<td class="player"><?php echo getPlayer($team[$a][0]) . getPlayer($team[$a][1]); ?></td>
							<td class="col-xs-2 warning result">
								<select class="form-control"  name="orangepoint[]">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select><br />
								<?php echo getMatePercent($conn, $team[$a]); ?>
							</td>
							<td class="col-xs-2 success result">
								<select class="form-control"  name="greenpoint[]">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select><br />
								<?php echo getMatePercent($conn, $team[$b]); ?>
							</td>
							<td class="player"><?php echo getPlayer($team[$b][0]) . getPlayer($team[$b][1]); ?></td>
						</tr>
					<?php endfor; ?>
				<?php endif; ?>
				<tr>
					<td colspan="4">

						<label for="paid">Schedule type:</label>
						<select name="schedule_type" class="form-control">
							<?php foreach ($scheduleTypes as $key => $value): ?>
								<option id="paid" value="<?php echo $key; ?>" <?php if ($scheduleType == $key) echo 'selected'; ?>><?php echo $value; ?></option>
							<?php endforeach; ?>
						</select>
						<label for="key">Sercet key:</label>
						<input type="password" id="key" class="form-control" name="key" value=""><span class="label label-danger"><?php echo $genKeyErr;?></span>
						<button type="submit" class="btn btn-default schedule-btn">Save</button>

					</td>
				</tr>
				</tbody>
			</table>
		</form>
	</div>
<?php endif; ?>

<!-- The achivement block -->
<div class="container achivement">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading"><h2>Achivement</h2></div>
			<div class="panel-body">
				<table class="table table-responsive table-bordered table-striped text-center">
					<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Achivement</th>
						<th class="text-center">Player</th>
						<th class="text-center"></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>The legend of legends.</td>
						<td><?php echo getAchivementPlayer(getMostPlayer($playerWinner)); ?></td>
						<td><?php echo max($playerWinner); ?> wins/total</td>
					</tr>
					<tr>
						<td>2</td>
						<td>The player of the week.</td>
						<td><?php echo getAchivementPlayer(getMostPlayer($playerWinnerWeek));?>
						</td>
						<td><?php echo max($playerWinnerWeek); ?> wins/this week</td>
					</tr>

					<tr>
						<td>3</td>
						<td>The smartest player.</td>
						<?php $smart = getSmarterPlayer($conn, $playerLostWeek) ?>
						<td><?php echo getAchivementPlayer($smart[0]); ?> </td>
						<td><?php echo $smart[1]; ?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>The loser of week, thanks mate.</td>
						<td><?php echo getAchivementPlayer(getMostPlayer($playerLostWeek)); ?></td>
						<td><?php echo max($playerLostWeek); ?> defeats/this week</td>
					</tr>
					<tr>
						<td>5</td>
						<td>The most of donation, thanks for sponsor.</td>
						<td><?php echo getAchivementPlayer(getMostPlayer($playerLost)); ?></td>
						<td><?php echo max($playerLost); ?> defeats/total</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- The history block -->
<div class="container">
	<h2>History</h2>
	<?php $lastSchedule = getLastSchedule($conn); ?>
	<table class="table table-responsive table-bordered table-striped">
		<thead>
		<tr>
			<th>Schedule</th>
			<th>Date</th>
			<th>Win</th>
			<th>Lost</th>
			<th>Type</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($scheduleHistory as $schedule): ?>
			<tr <?php if ($schedule['id'] == $lastSchedule) echo 'class="info"'; ?>>
				<td><?php echo $schedule['id']; ?></td>
				<td><?php echo convertTime($schedule['datetime']); ?></td>
				<td><?php echo $schedule['win']; ?></td>
				<td><?php echo $schedule['lost']; ?></td>
				<td><?php $typeC = $schedule['schedule_type']; echo $scheduleTypes[$typeC]; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		<table class="table table-responsive table-bordered table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>M.</th>
				<th>Date</th>
				<th>A</th>
				<th>B</th>
				<th>Score</th>
				<th>A</th>
				<th>B</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($history as $match): ?>
				<tr>
					<td <?php if ($match['schedule_id'] == $lastSchedule) echo 'class="info"'; ?>><?php echo $match['schedule_id']; ?></td>
					<td <?php if ($match['schedule_id'] == $lastSchedule) echo 'class="info"'; ?>><?php echo $match['id']; ?></td>
					<td <?php if ($match['schedule_id'] == $lastSchedule) echo 'class="info"'; ?>><?php echo convertTime($match['datetime']); ?></td>
					<td class="warning <?php if ($match['orangepoint'] > $match['greenpoint']) echo 'text-danger'; ?>"><?php echo $match['orangea']; ?></td>
					<td class="warning <?php if ($match['orangepoint'] > $match['greenpoint']) echo 'text-danger'; ?>"><?php echo $match['orangeb']; ?></td>
					<td class="danger"><?php echo $match['orangepoint'] . "-" . $match['greenpoint']; ?></td>
					<td class="success <?php if ($match['orangepoint'] < $match['greenpoint']) echo 'text-danger'; ?>"><?php echo $match['greena']; ?></td>
					<td class="success <?php if ($match['orangepoint'] < $match['greenpoint']) echo 'text-danger'; ?>"><?php echo $match['greenb']; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
</div>
<div style="text-align:center; color:#666">&copy; 2017 - Built by Thanhd</div>
<?php
$conn->close();
?>
</body>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
</html>