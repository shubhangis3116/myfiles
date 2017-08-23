 <?php
$servername = "localhost";
$username = "shubhangis";
$password = "password";
$dbname = "shubhangis_products";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
echo "Connection Established!";
?>
