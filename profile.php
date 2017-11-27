<!DOCTYPE HTML>  
<html>
<head>
	<title>Lotus Ratong Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
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
	<link rel="shortcut icon" href="/favicon.png" type="image/x-icon"/>
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
.player .avatar {
	min-height: 65px;
    height: 65px;
    width: 65px;
    background-repeat: no-repeat;
    background-size: 100%;
    border-radius: 70px;
    margin-right: 5px;
	border:1px #d41e8e solid;
}
.player span{
	font-weight: bold;
    display: block;
    float: left;
    line-height: 65px;
}

.schedule .player span {
	background-size: 100%;
}

.schedule .player .avatar {
	clear:both;
	margin-top: 5px;
	
}

.fa{
	color: #d41e8e;
	cursor: pointer;
}

.label-success .fa {
	color: #fff;
}
.player #Duy{
	background-image: url(/images/duy.jpg);
}

.player #Ha{
	background-image: url(/images/ha.jpg);
}

.player #Thanh{
	background-image: url(/images/thanh.jpg);
}

.player #Tri{
	background-image: url(/images/tri.jpg);
}

.player #Doan{
	background-image: url(/images/doan.jpg);
}

.player #Linh{
	background-image: url(/images/linh.jpg);
}

.player #Phuong{
	background-image: url(/images/phuong.jpg);
}

.player #Hiep{
	background-image: url(/images/hiep.jpg);
}
@media screen and (max-width: 767px) {
  .panel-heading .label-success{
    font-size: 12px;
    width: 100%;
    display: grid;
    line-height: 20px;
    text-align: left;
    background-color: #fff!important;
    color: #999!important;
  } 		
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
  .badge {
  	margin-bottom: 1px!important;
  }
  .player .avatar {margin-left: 20px;}
}
</style>
</head>
<body>  
	<?php
	include("config.php");
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
	$players = array('Doan','Duy','Ha','Linh','Phuong','Tri','Thanh');
	$scheduleTypes = array('Cafe','Bún','Phở','Bánh canh','Hủ tiếu','Xôi','Mì','Bún chả cá','Ốp la bò','Bánh cuốn','Bánh tiêu','Bánh chuối','Bánh bao');
	$nickNameList = array('Doan' => 'Doan Dễ Dãi','Duy' => 'Duy Dâm Dê','Ha' => 'Hà Hàm Hồ','Linh' => 'Linh Lạc Loài','Phuong' => 'Phương Phúng Phính','Tri' => 'Trí Trốn Tránh','Thanh' => 'Thạnh Thướt Tha','Hiep' => 'Hiệp Hư Hỏng');
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	// init load
	$players = getPlayerList($conn);
	if ($_GET["p"])
		if (checkGetPlayer($conn, $_GET["p"]) !== '')
			$keyPlayer = checkGetPlayer($conn, $_GET["p"]);
		else $keyPlayer = 'Thanh';
	else $keyPlayer = 'Thanh';

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

	$history = getMatchHistory($conn,$keyPlayer);
	$scheduleHistory =getScheduleHistory($conn,$keyPlayer);

	// Feature function
	function convertTime($datetime)
	{
		$dt = new DateTime($datetime);
		$tz = new DateTimeZone('Asia/Bangkok'); 
		$dt->setTimezone($tz);
		echo $dt->format('h:ia d/m');
	}

	function getMostPlayer($array) {
		$max = 1;
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
			$achive = $achive . " The best player of the week <i class='fa fa-trophy' data-toggle='tooltip' title='The best player of the week' aria-hidden='true'></i>";
		if (in_array($key, getMostPlayer($playerWinner)))
			$achive = $achive . " The legend of legends <i class='fa fa-diamond' data-toggle='tooltip' title='The legend of legends' aria-hidden='true'></i>";
		if (in_array($key, $playerSmarter))
			$achive = $achive . " The smartest player of the week <i class='fa fa-star' data-toggle='tooltip' title='The smartest player of the week' aria-hidden='true'></i>";
		if (in_array($key, getMostPlayer($playerLostWeek)))
			$achive = $achive . " The loser of the week <i class='fa fa-battery-empty' data-toggle='tooltip' title='The loser of the week' aria-hidden='true'></i>";
		if (in_array($key, getMostPlayer($playerLost)))
			$achive = $achive . " The worst player ever <i class='fa fa-heartbeat' data-toggle='tooltip' title='The worst player ever' aria-hidden='true'></i>";
		if ($key == 'Thanh') $achive = $achive . " The game master <i class='fa fa-gamepad' data-toggle='tooltip' title='The game master' aria-hidden='true'></i> (Retired) ";
		$html = "<span id='$key' class='avatar'></span><span class=''> $nickName $achive</span>";
		return $html;
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
		$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND win LIKE BINARY '%$player%') ORDER BY id DESC";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getPointLost($conn, $player)
	{
		$para = '"' . $player . '"';
		$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND lost LIKE BINARY '%$player%') ORDER BY id DESC";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getPointWinWeek($conn, $player)
	{
		$para = '"' . $player . '"';
		$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND win LIKE BINARY '%$player%'  AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC ";
		$result = $conn->query($sql);
		return $result->num_rows;
	}

	function getPointLostWeek($conn, $player)
	{
		$para = '"' . $player . '"';
		$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND lost LIKE BINARY '%$player%' AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
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
			$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND Lost is not NULL AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
			$result = $conn->query($sql);
			if ($min > $value && $result->num_rows > 0)
			{
				$min = $value;
			}
		}
		foreach ($playerLostWeek as $key => $value) {
			$para = '"' . $key . '"';
			$sql = "SELECT * FROM schedule WHERE (schedule_data LIKE '%$para%' AND Lost is not NULL  AND YEARWEEK(datetime) = YEARWEEK(NOW())) ORDER BY id DESC";
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
	function getMatchHistory($conn, $key)
	{
		$tempHistory = array();
		$sql = "SELECT * FROM livescore WHERE orangea = '$key' OR orangeb = '$key' OR greena = '$key' OR greenb = '$key'  ORDER BY id DESC LIMIT 30";
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

	function getScheduleHistory($conn, $key)
	{
		$para = '"' . $key . '"';
		$sql = "SELECT * FROM schedule WHERE win is not null AND lost is not null AND schedule_data LIKE '%$para%'  ORDER BY id DESC LIMIT 10";
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
	function getPlayerList($conn)
	{
		$sql = "SELECT * FROM player ORDER BY id DESC";
		$result = $conn->query($sql);
		$player = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$player[] = $row['name'];
			}
		} 
		return $player;
	}

	function checkGetPlayer($conn,$key)
	{
		$sql = "SELECT * FROM player WHERE name LIKE '$key%'  ORDER BY id DESC";
		$result = $conn->query($sql);
		$player = '';
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$player = $row['name'];
			}
		} 
		return $player;
	}
	// ---------------- //
	?>

	<!-- The ranking block -->
	<div class="container">
		<a href="/"><img src="/ratong-logo.jpg" width="200px" style="padding:5px 0 5px; border:0px;"></a>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Lotus Ratong Profile</h2>
				</div>
				<div class="panel-body">
					<table class="table table-responsive table-bordered table-striped text-center ranking">
						<thead>
							<tr>
								<th class="text-center player" colspan="2"><?php echo getPlayer($keyPlayer); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Last 10 form schedule: </td>
								<td><?php $res = getFormTenSchedule($conn, $keyPlayer); echo $res[1]; ?></td>
							</tr>
							<tr>
								<td>Last 10 form match: </td>
								<td><?php $res = getFormTenMatch($conn, $keyPlayer); echo $res[2]; ?></td>
							</tr>
							<tr>
								<td>App</td>
								<td><?php echo (int)($playerWinner[$keyPlayer] + $playerLost[$keyPlayer] + ($playerRank[$keyPlayer] - $playerWinner[$keyPlayer] * 3)); ?></td>
							</tr>
							<tr>
								<td>Win</td>
								<td><?php echo $playerWinner[$keyPlayer]; ?></td>
							</tr>
							<tr>
								<td>Draw</td>
								<td><?php echo $playerRank[$keyPlayer] - $playerWinner[$keyPlayer] * 3; ?></td>
							</tr>
							<tr>
								<td>Lost</td>
								<td><?php echo $playerLost[$keyPlayer]; ?></td>
							</tr>
							<tr>
								<td>Point</td>
								<td><?php echo $playerRank[$keyPlayer]; ?></td>
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
		<table class="table table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Date</th>
					<th>Won</th>
					<th>Lost</th>
					<th>Type</th>
					<th>Result</th>
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
					<td class="text-danger"><?php if (strrpos($schedule['win'], $keyPlayer) !== false) echo 'WIN'; elseif (strrpos($schedule['lost'], $keyPlayer) !== false) echo 'LOST'; else echo 'DRAW'; ?></td>
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
					<td><?php echo $match['schedule_id']; ?></td>
					<td><?php echo $match['id']; ?></td>
					<td><?php echo convertTime($match['datetime']); ?></td>
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