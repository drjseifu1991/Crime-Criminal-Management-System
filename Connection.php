<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'final_crms');
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'id19419113_crms');
// define('DB_PASSWORD', 'Ami82@r8RKEeMI*Y');
// define('DB_NAME', 'id19419113_final_crms');
 
/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if(!$db){
    // console.log("You're connected successfully");
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function CloseConn($conn){
	$conn->close();
}
?>