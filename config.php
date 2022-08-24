<?php
// Database credentials
$url = getenv('JAWSDB_MARIA_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection was successfully established!";

//Create tables
$sql = "CREATE TABLE reservation (
name VARCHAR(20) NOT NULL PRIMARY KEY,
email VARCHAR(30) NOT NULL,
phone INT NOT NULL,
message VARCHAR(50) NOT NULL
)";
?>
