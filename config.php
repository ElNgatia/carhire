<?php
// Database credentials
define('DB_HOST', 'sql8.freesqldatabase.com');
define('DB_USERNAME', 'sql8510477');
define('DB_PASSWORD', 'zVE7aGj1YU');
define('DB_NAME', 'sql8510477');

// Attempt to connect to MySQL database
$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
