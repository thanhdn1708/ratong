<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/3/2017
 * Time: 5:17 PM
 */

echo 'thanhd 3';
=======
<?php
$servername = "172.31.58.54";
$username = "admin";
$password = "123456";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
>>>>>>> origin/master
