<?php
session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {
    session_destroy();
    header("Location: index.php");
    die;
}

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'elearning';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

$sql = 'SELECT username, type FROM members WHERE `username`="' . $user . '" AND password="' . $pass . '";';

$result = $conn->query($sql);

$rows = array();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $_SESSION['member_username'] = $row['username'];
    $_SESSION['member_type'] = $row['type'];

    $conn->close();
	switch($row['type']){
		case 'administrator':
			header("Location: admin/admin.php");
			break;
		case 'profesor':
			header("Location: profesor/profesor.php");
			break;
		case 'elev':
			header("Location: elev/elev.php");
			break;
		default:
			header("Location: index.php");
	}
} else {
    $conn->close();
    header("Location: index.php?error=404");
}
