<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "sql309.infinityfree.com"; // Agar hosting pe ho to change karo
$username = "if0_38149375"; // MySQL username
$password = "omarfarooq1462"; // MySQL ka password (default XAMPP/WAMP pe blank hota hai)
$database = "if0_38149375_omar_portfolio"; // Tumhara database name

// Connection create karo
$conn = mysqli_connect($servername, $username, $password, $database);

// Connection check karo
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
