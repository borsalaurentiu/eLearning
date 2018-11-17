<?php 
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>eLearning | Login</title>
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
                height: 200px;
                width: 170px;
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
            <img class="logo" src="./images/utcn_logo.png">
            <form action="login.php" method="POST">
                <div>
                    <label>
                        Username: <input type="text" name="username">
                    </label>
                </div>
                <div>
                    <label>
                        Password: <input type="password" name="password">
                    </label>
                </div>
					<center><input type="submit" value="Login"></center>
				<?php if ( isset( $_GET['error'] ) && $_GET['error'] == 404 ): ?>
                    <div style="font-size: 14px; color: red">Invalid user or password!</div>
				<?php endif; ?>
            </form>
        </div>
    </body>
</html>