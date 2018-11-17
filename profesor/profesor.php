<?php {
	session_start();
	if ( empty( $_SESSION['member_type'] ) || $_SESSION['member_type'] != 'profesor' ) {
		header( "Location: ../index.php" );
	}
} ?>
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
				Username: <?php echo $_SESSION['member_username']?><br>
				<a href = "../logout.php">LogOut</a>
				
            </label>
            <img class="logo" src="../images/utcn_logo.png">
				<center>
				<?php if ( isset( $_GET['elev'] ) && $_GET['elev'] == 404 ): ?>
						<div style="font-size: 14px; color: red">Elevul nu a fost adaugat!</div>
					<?php endif; ?><br>
				<?php if ( isset( $_GET['elev'] ) && $_GET['elev'] == 403 ): ?>
						<div style="font-size: 14px; color: red">Elevul nu a fost sters!</div>
					<?php endif; ?><br>
				<a href="adaugaElev.php">adauga elev</a><br>
				<a href="stergeElev.php">sterge elev</a></center>
				
        </div>
    </body>
</html>