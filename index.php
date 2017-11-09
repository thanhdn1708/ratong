<!DOCTYPE HTML>  
<html>
<head>
	<title>Lotus Ratong club</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
<style>
input {
height: 33px;
}
.label-success{
color: #fff!important;
background-color: #d41e8e!important;
}

.label-danger {
color: #fff!important;
background-color: #676767!important;

}

.label-info {
	background-color: #337ab7!important;

}

.generate {
	margin:auto;
	width: 200px;
}

.toolbox {
width: 400px;
margin:auto;
}
@media screen and (max-width: 767px){
	.table {zoom:0.7;}
	.label-success {font-size:12px;}
	.col-sm-3 {margin:10px;}
	.schedule-btn {margin-top:10px;}
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
	$playerPoint = array();
	$playerWinner = array();
	$playerWinnerWeek = array();
	$playerLost = array();
	$playerLostWeek = array();
	$players = array('Doan','Duy','Ha','Linh','Phuong','Tri');
	$scheduleTypes = array('Cafe','Bun','Pho','Banh canh','Hu tieu','Xoi','Mi','Bun cha ca','Ap la bo');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// init load
	$team = getSchedule($conn);

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
    			if (!empty($_POST["player"]) && (count($_POST["player"]) == 4 || count($_POST["player"]) == 6))
    			{
    				$team = generateSchedule($conn,$_POST["player"]);
    				saveSchedule($conn, $team);
    			}
    			else
    			{
    				$playerErr =  "You need to select 4 or 6 players!";
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
				$team = getSchedule($conn);
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
						$saveMsg = "We couldn't find the champions, the schedule has been generated again, plz go go go!!!";
					}
					elseif (count(array_unique($scheduleMatch)) === 1) 
					{
						// case 2: all draw but the point is not same
						$win = getWinTeam($team,$scheduleMatchPoint);
						$lost = getLostTeam($team,$scheduleMatchPoint);
						$saveMsg = "The champions is $win, thanks for donation $lost, the schedule has been generated again!!!";
					}
					else
					{
						// case 3: normal case
						$win = getWinTeam($team,$scheduleMatch);
						$lost = getLostTeam($team,$scheduleMatch);
						$saveMsg = "Congratulations! The champions is $win, thanks for donate $lost, the schedule has been generated again!!!";
					}
				}
				else
				{
					if ($orangepoint[0] > $greenpoint[0])
					{
						$win = $team[0][0] . ' - ' . $team[0][1];
						$lost = $team[1][0] . ' - ' . $team[1][1];
					}
					else
					{
						$win = $team[1][0] . ' - ' . $team[1][1];
						$lost = $team[0][0] . ' - ' . $team[0][1];
					}
					$saveMsg = "Congratulations! The champions is $win, thanks for donate $lost, the schedule has been generated again!!!";	
					saveMatch($conn, $team[0], $team[1], $orangepoint[0], $greenpoint[0]);
				}
				saveScheduleResult($conn, $win, $lost, $scheduleType);
				$team = generateSchedule($conn,$players);
				saveSchedule($conn, $team);
				$orangepoint = array(0,0,0);
				$greenpoint = array(0,0,0);
				$playerErr =  "";
			}
		}
	}

	foreach ($players as $key => $value) {
		$playerPoint[$value] = getLastTenPoint($conn, $value);
	}
	foreach ($players as $key => $value) {
		$playerWinner[$value] = getLastWin($conn, $value);
	}
	foreach ($players as $key => $value) {
		$playerWinnerWeek[$value] = getLastWinWeek($conn, $value);
	}
	foreach ($players as $key => $value) {
		$playerLost[$value] = getLastLost($conn, $value);
	}
	foreach ($players as $key => $value) {
		$playerLostWeek[$value] = getLastLostWeek($conn, $value);
	}
	arsort($playerPoint);
	arsort($playerWinner);
	arsort($playerWinnerWeek);
	arsort($playerLost);
	arsort($playerLostWeek);

	$history = getLastMatch($conn);
	$scheduleHistory =getScheduleHistory($conn);

	if ($saveMsg == '') $saveMsg = "Congratulations!!! The player of the week is ".getMostPlayer($playerWinnerWeek) .".";

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
		$max = max($array);
		$key = array_search($max, $array);
		return $key;
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

	function generateSchedule($conn,$players) {
		$team = array();
		$playerPoint = array();
		$playerRank = array();
		$type = rand(0,3);
		switch ($type) {
			case 0:
				foreach ($players as $key => $value) {
					$playerPoint[$value] = $key;
				}
				break;
			
			case 1:
				foreach ($players as $key => $value) {
					$playerPoint[$value] = getLastTenPoint($conn, $value);
				}
				break;

			case 2:
				foreach ($players as $key => $value) {
					$playerPoint[$value] = getLastWinWeek($conn, $value);
				}
				break;

			case 3:
				foreach ($players as $key => $value) {
					$playerPoint[$value] = getLastLostWeek($conn, $value);
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

	function getLastMatch($conn)
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
		$sql = "SELECT * FROM schedule WHERE (win = '$teama' OR win = '$teamb') ORDER BY id DESC LIMIT 10";
		$result = $conn->query($sql);
		$win = $result->num_rows;
		$sql = "SELECT * FROM schedule WHERE (lost = '$teama' OR lost = '$teamb') ORDER BY id DESC LIMIT 10";
		$result = $conn->query($sql);
		$lost = $result->num_rows;
		$total = $win + $lost;
		if ($total == 0 )
			return "(NA)";
		$percent =round($win / $total * 100,2);
		return "($percent%)"; 
	}

	function getLastTenPoint($conn, $player)
	{
		$sql = "SELECT * FROM livescore WHERE (greena = '$player' OR greenb = '$player' OR orangea = '$player' OR orangeb = '$player') ORDER BY id DESC LIMIT 10";
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

	function getLastWin($conn, $player)
	{
		$sql = "SELECT * FROM schedule WHERE (win LIKE '%$player%') ORDER BY id DESC";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getLastLost($conn, $player)
	{
		$sql = "SELECT * FROM schedule WHERE (lost LIKE '%$player%') ORDER BY id DESC";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getLastWinWeek($conn, $player)
	{
		$sql = "SELECT * FROM schedule WHERE (win LIKE '%$player%'  AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC ";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getLastLostWeek($conn, $player)
	{
		$sql = "SELECT * FROM schedule WHERE (lost LIKE '%$player%' AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getLastTenResult($conn, $player)
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

	function getLastTenSchedule($conn, $player)
	{
		$sql = "SELECT * FROM schedule WHERE win is not null AND lost is not null ORDER BY id DESC LIMIT 10";
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
		$win = substr_count($form,"W") / (substr_count($form,"W") + substr_count($form,"L")) * 100;
		$lost = 100 - round($win,2);
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
		return array(round($win,2) . '%',$lost . '%',$form);
	}

	function getSchedule($conn)
	{
		$sql = "SELECT * FROM schedule WHERE win IS NULL OR lost IS NULL ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);
		$team = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
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

	function saveScheduleResult($conn, $win, $lost, $scheduleType)
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

	function saveSchedule($conn, $team)
	{
		$data = serialize($team);
		$sql = "INSERT INTO schedule (schedule_data, datetime) VALUES ('$data', now())";
		$conn->query($sql);
	}
	?>
	<div class="container">
		<a href="/"><img src="/ratong-logo.jpg" width="200px" style="padding:5px 0 5px; border:0px;"></a>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><span class="label label-success"><?php echo $saveMsg;?></span></h4>
				</div>
				<div class="panel-body">
					<form method="post" class="form-inline">
						<span>Which player do you want access to?</span><span class="label label-danger"><?php echo $playerErr;?></span><br><br>
						<table class="table table-responsive table-bordered table-striped text-center">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Rank</th>
									<th class="text-center">Player</th>
									<th class="text-center">Win</th>
									<th class="text-center">Lost</th>
									<th class="text-center">Point</th>
									<th class="text-center">Result</th>
								</tr>
							</thead>
							<tbody>
								<?php $p=1;foreach ($playerPoint as $key => $value): ?>
								<?php $res = getLastTenResult($conn, $key); ?>
								<tr>
									<td><input type="checkbox" name="player[]" value="<?php echo $key ?>" checked/></td>
									<td><?php echo $p; ?></td>
									<td><?php echo $key; ?></td>
									<td><?php echo $res[0]; ?></td>
									<td><?php echo $res[1]; ?></td>
									<td><?php echo $value; ?></td>
									<td><?php echo $res[2]; $p++; ?></td>
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

	<?php if(count($team) >= 2): ?>
	<div class="container">
		<h2>Schedule</h2>
		<form class="form-horizontal panel panel-default form-inline" method="post">
			<table class="table table-responsive table-bordered table-striped text-center">
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
						<td><?php echo $team[$a][0] . ' - ' . $team[$a][1] . ' ' . getMatePercent($conn, $team[$a]); ?></td>
						<td class="col-xs-2 warning">
							<select class="form-control"  name="orangepoint[]">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</td>
						<td class="col-xs-2 success">
							<select class="form-control"  name="greenpoint[]">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</td>
						<td><?php echo $team[$b][0] . ' - ' . $team[$b][1] . ' ' . getMatePercent($conn, $team[$b]); ?></td>
					</tr>
					<?php endfor; ?>
					<?php else: ?>
					<tr>
						<td><?php echo $team[0][0] . ' - ' . $team[0][1] . ' ' . getMatePercent($conn, $team[0]); ?></td>
						<td class="col-xs-2 warning">
							<select class="form-control"  name="orangepoint[]">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</td>
						<td class="col-xs-2 success">
							<select class="form-control"  name="greenpoint[]">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</td>
						<td><?php echo $team[1][0] . ' - ' . $team[1][1] . ' ' . getMatePercent($conn, $team[1]); ?></td>
					</tr>
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

	<div class="container">
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
								<th class="text-center">Point</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Congratulations!!! The player of the week.</td>
								<td><?php echo getMostPlayer($playerWinnerWeek); ?></td>
								<td><?php echo max($playerWinnerWeek); ?></td>
							</tr>
							<tr>
								<td>2</td>
								<td>The legend of legends.</td>
								<td><?php echo getMostPlayer($playerWinner); ?></td>
								<td><?php echo max($playerWinner); ?></td>
							</tr>
							<tr>
								<td>3</td>
								<td>The smartest player.</td>
								<td><?php echo array_search(min($playerLostWeek), $playerLostWeek); ?></td>
								<td><?php echo min($playerLostWeek); ?></td>
							</tr>
							<tr>
								<td>4</td>
								<td>The loser of week, thanks mate.</td>
								<td><?php echo getMostPlayer($playerLostWeek); ?></td>
								<td><?php echo max($playerLostWeek); ?></td>
							</tr>
							<tr>
								<td>5</td>
								<td>The most of donation, thanks for sponsor.</td>
								<td><?php echo getMostPlayer($playerLost); ?></td>
								<td><?php echo max($playerLost); ?></td>
							</tr>
						</tbody>
					</table>
					<table class="table table-responsive table-bordered table-striped text-center">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Rank</th>
								<th class="text-center">Player</th>
								<th class="text-center">Win</th>
								<th class="text-center">Lost</th>
								<th class="text-center">Point</th>
								<th class="text-center">Result</th>
							</tr>
						</thead>
						<tbody>
							<?php $p=1;foreach ($playerWinner as $key => $value): ?>
							<?php $res = getLastTenSchedule($conn, $key); ?>
							<tr>
								<td></td>
								<td><?php echo $p; ?></td>
								<td><?php echo $key; ?></td>
								<td><?php echo $value; ?></td>
								<td><?php echo $playerLost[$key]; ?></td>
								<td><?php echo $res[0] . ' - ' . $res[1]; ?></td>
								<td><?php echo $res[2]; $p++; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

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
</html>