<?php {
	session_start();
	if ( empty( $_SESSION['member_type'] ) || $_SESSION['member_type'] != 'profesor' ) {
		header( "Location: ../index.php" );
	}
} ?>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'elearning';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(empty($_POST['username'] )){?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>eLearning | Profesor</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css"/>
        <style>
            body {
                background-image: url("https://i.ytimg.com/vi/v1SabYdIlZI/maxresdefault.jpg"); /* The image used */
				background-color: #cccccc; /* Used if the image is unavailable */
				background-repeat: no-repeat; /* Do not repeat the image */
				background-size: cover; /* Resize the background image to cover the entire container */
            }

            .center {
                background-color: #fff;
                border: 1px solid #d0d0d0;
                height: 400px;
                width: 600px;
                margin: auto;
                padding: 20px;
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                top: 0;
            }

            .logo {
                height: 80px;
                text-align: center;
                margin: 0 auto 10px;
                display: block;
            }

            .center div {
                margin: 2px;
            }
        </style>
    </head>
    <body>
        <div class="center">
			<label>
				Username: <?php echo $_SESSION['member_username']?>
            </label>
            <img class="logo" src="../images/utcn_logo.png">
				<form action="adaugaElev.php" method="POST">
					<center><table>
					<tr>
						<td> Username: </td>
						<td> <input type = "text" name = "username"> </td>
					</tr><tr>
						<td> Password: </td>
						<td> <input type = "password" name = "password"> </td>
					</tr><tr>
						<td> Nume: </td>
						<td> <input type = "text" name = "nume"> </td>
					</tr><tr>
						<td> Prenume: </td>
						<td> <input type = "text" name = "prenume"> </td>
					</tr><tr>
						<td> Clasa: </td>
						<td> <input type = "text" name = "materie"> </td>
					</tr></tr>
						<td> Email: </td>
						<td> <input type = "text" name = "email"> </td>
					</tr><tr>
						<td> Telefon: </td>
						<td> <input type = "text" name = "telefon"> </td>
					</tr>
					</table>
					
					<input type="submit" value="Adauga elev"></center>
					
				</form>
        </div>
    </body>
</html>
<?php }else{
	
	
	
$var = 'SELECT * FROM members WHERE username = "'.$_POST['username'].'";';
$result = $conn->query($var);

if ($result->num_rows == 0) {		
	$sql = "INSERT INTO students (username, nume, prenume, clasa, email, telefon) 
			VALUES ('".$_POST['username']."', '".$_POST['nume']."', '".$_POST['prenume']."',
			'".$_POST['clasa']."', '".$_POST['email']."', '".$_POST['telefon']."');";
	$sqll = "INSERT INTO members (username, password, type) VALUES ('".$_POST['username']."', '".$_POST['password']."', 'elev');";
		
	if ($conn->query($sql) === TRUE && $conn->query($sqll) === TRUE) {
		$conn->close();
		header("Location: profesor.php");
	} else {
		$conn->close();
		header("Location: profesor.php?elev=404");
	}
} else {
	$conn->close();
	header("Location: profesor.php?elev=404");
}}
?>
