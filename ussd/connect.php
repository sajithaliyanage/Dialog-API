 <?php
$servername = "ap-cdbr-azure-southeast-b.cloudapp.net";
$username = "b9b628f925527f";
$password = "a95e14b1";
$db = "takeyourleave";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 