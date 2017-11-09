<!DOCTYPE HTML>  
<html>
<head>
  <title>Ratong tool 2017</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
</head>
<body>  

<?php
// define variables and set to empty values
// $servername = "127.5.38.130";
// $username = "adminBbxGbTi";
// $password = "K_F8MAHWb2F7";
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ratong";
$keyErr =  "";
$playerErr =  "";
$key = "";
$saveMsg = "";
$orangepoint = array(0,0,0);
$greenpoint = array(0,0,0);
$team = array();
$history = array();
$playerPoint = array();
$playerPointShow = array();
$playerRank = array();
$players = array('Doan','Duy','Ha','Linh','Phuong','Tri');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$team = getSchedule($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate schedule
    if (!empty($_POST["player"]) && (count($_POST["player"]) == 4 || count($_POST["player"]) == 6))
    {
        $players = $_POST["player"];
        $team = generateSchedule($conn,$players,$playerPoint,$playerRank);
        saveSchedule($conn, $team);
    }
    else
    {
        $playerErr =  "You need to input 4 or 6 players!";
    }

    // Save result
    if (empty($_POST["key"])) {
          $keyErr = "Key is required";
    } else {
          $key = test_input($_POST["key"]);
          if ($key != 'lt') {
              $keyErr = "The key is not valid!"; 
          } 
          else if (!empty($_POST["orangepoint"]) && !empty($_POST["greenpoint"])) 
          {
              $orangepoint = $_POST["orangepoint"];
              $greenpoint = $_POST["greenpoint"];
              $team = $_POST["team"];
              if (count($team) == 3)
              {
                  for ($j=0; $j < 3; $j++) { 
                      $a = $j;
                      if ($j == 2) $b = 0;
                      else $b = $a + 1;
                      saveMatch($conn, $team[$a], $team[$b], $orangepoint[$j], $greenpoint[$j]);
                  }
              }
              else
              {
                  saveMatch($conn, $team[0], $team[1], $orangepoint[0], $greenpoint[0]);
              }
              $team = generateSchedule($conn,$players,$playerPoint,$playerRank);
              saveSchedule($conn, $team);
              $orangepoint = array(0,0,0);
              $greenpoint = array(0,0,0);
              $playerErr =  "";
              $saveMsg = "Saved result and schedule has been generated!!!";
        }
    }
}

foreach ($players as $key => $value) {
  $playerPointShow[$value] = getLastPoint($conn, $value);
}
arsort($playerPointShow);

$history = getLastMatch($conn);


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generateSchedule($conn,$players,$playerPoint,$playerRank) {
  $team = array();
  foreach ($players as $key => $value) {
    $playerPoint[$value] = getLastPoint($conn, $value);
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
    $sql = "SELECT * FROM livescore ORDER BY id DESC";
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

function getLastPoint($conn, $player)
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
    return array($win,$lost,strrev($form));
}

function getSchedule($conn)
{
    $sql = "SELECT * FROM schedule ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $team = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $team = unserialize($row['schedule_data']);
        }
    } 
    return $team;
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

function saveSchedule($conn, $team)
{
    $data = serialize($team);
    $sql = "INSERT INTO schedule (schedule_data, datetime) VALUES ('$data', now())";
    $conn->query($sql);
}
?>
<div class="container">
  <h2>Ratong Tool Lotus 2017 @ ThanhDN:</h2>
  <div class="panel-group">
    <div class="panel panel-info">
      <div class="panel-heading">Ranking</div>
      <div class="panel-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
          <span>Which player do you want access to?</span><span class="label label-danger"><?php echo $playerErr;?></span><br><br>
          <table class="table table-responsive table-bordered table-striped text-center">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">Rank</th>
                <th class="text-center">Player Name</th>
                <th class="text-center">Point</th>
                <th class="text-center">Win</th>
                <th class="text-center">Lost</th>
                <th class="text-center">Form</th>
              </tr>
            </thead>
            <tbody>
              <?php $p=1;foreach ($playerPointShow as $key => $value): ?>
              <?php $res = getLastTenResult($conn, $key); ?>
              <tr>
                <td><input type="checkbox" name="player[]" value="<?php echo $key ?>" checked/></td>
                <td><?php echo $p; ?></td>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
                <td><?php echo $res[0]; ?></td>
                <td><?php echo $res[1]; ?></td>
                <td><?php echo $res[2]; $p++; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
<!--           <div class="text-center">
            <button type="submit" class="btn btn-default">Generate Schedule</button>
          </div> -->
        </form>
      </div>
    </div>
  </div>
</div>
<?php if(count($team) >= 2): ?>
<div class="container">
  <h2>Schedule</h2>
  <form class="form-horizontal panel panel-default" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php 
    $j = 0;
    foreach($team as $t)
    {
        echo '<input type="hidden" name="team['. $j. '][0]" value="'. $t[0]. '">';
        echo '<input type="hidden" name="team['. $j. '][1]" value="'. $t[1]. '">';
        $j++;
    }
    ?>
    <table class="table table-responsive table-bordered table-striped text-center">
      <thead>
        <tr>
          <th class="text-center">ORANGE TEAM</th>
          <th class="text-center">ORANGE SCORE</th>
          <th class="text-center" class="text-center">GREEN SCORE</th>
          <th class="text-center">GREEN TEAM</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($team) == 3): ?>  
        <tr>
          <td><?php echo $team[0][0] . ' - ' . $team[0][1]; ?></td>
          <td class="col-xs-2 warning"><input type="text" class="form-control" name="orangepoint[]" value="<?php echo $orangepoint[0]; ?>"></td>
          <td class="col-xs-2 success"><input type="text" class="form-control" name="greenpoint[]" value="<?php echo $greenpoint[0]; ?>"></td>
          <td><?php echo $team[1][0] . ' - ' . $team[1][1]; ?></td>
        </tr>
        <tr>
          <td><?php echo $team[1][0] . ' - ' . $team[1][1]; ?></td>
          <td class="col-xs-2 warning"><input type="text" class="form-control" name="orangepoint[]" value="<?php echo $orangepoint[1]; ?>"></td>
          <td class="col-xs-2 success"><input type="text" class="form-control" name="greenpoint[]" value="<?php echo $greenpoint[1]; ?>"></td>
          <td><?php echo $team[2][0] . ' - ' . $team[2][1]; ?></td>
        </tr>
        <tr>
          <td><?php echo $team[2][0] . ' - ' . $team[2][1]; ?></td>
          <td class="col-xs-2 warning"><input type="text" class="form-control" name="orangepoint[]" value="<?php echo $orangepoint[2]; ?>"></td>
          <td class="col-xs-2 success"><input type="text" class="form-control" name="greenpoint[]" value="<?php echo $greenpoint[2]; ?>"></td>
          <td><?php echo $team[0][0] . ' - ' . $team[0][1]; ?></td>
        </tr>
        <?php else: ?>
        <tr>
          <td><?php echo $team[0][0] . ' - ' . $team[0][1]; ?></td>
          <td class="col-xs-2 warning"><input type="text" class="form-control" name="orangepoint[]" value="<?php echo $orangepoint[0]; ?>"></td>
          <td class="col-xs-2 success"><input type="text" class="form-control" name="greenpoint[]" value="<?php echo $greenpoint[0]; ?>"></td>
          <td><?php echo $team[1][0] . ' - ' . $team[1][1]; ?></td>
        </tr>
        <?php endif; ?>   
        <tr>
          <td colspan="4">
            <span>Admin sercet key: </span><input type="password" name="key" value=""><span class="label label-danger"><?php echo $keyErr;?></span>
            <span class="label label-info"><?php echo $saveMsg;?></span>
            <button type="submit" class="btn btn-default">Save</button>
          </td>
        </tr>    
      </tbody>
    </table>
  </form>
</div>
<?php endif; ?>
<div class="container">
  <h2>History</h2>
  <table class="table table-responsive table-bordered table-striped">
    <thead>
      <tr>
        <th>Schedule</th>
        <th>Match</th>
        <th>Datetime</th>
        <th>Orange A</th>
        <th>Orange B</th>
        <th>Score</th>
        <th>Green A</th>
        <th>Green B</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($history as $match): ?>
      <tr>
        <td><?php echo $match['schedule_id']; ?></td>
        <td><?php echo $match['id']; ?></td>
        <td><?php echo $match['datetime']; ?></td>
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
<?php 
$conn->close();
 ?>
</div>
</body>
</html>