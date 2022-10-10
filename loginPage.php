<?php
// define variables and set to empty values
$password = "";
$username = "";
//Error message that displays if any are the inputs are submitted empty
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />

    <title>Nurse Authentication Page</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <form action="Homepage.php" method="POST">
        <div class="imgStyle">
            <img alt="Login Page Image" src="Images\Hospital Logo.jpg" width="200" height="200">
        </div>
        <br><br>
        <h3>Welcome to St George Hospital</h3><br>
        <!-- the action of the form is sending the user to the homepage (Once they click submit) -->
        <div class="login">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username"><br>

            <label for="pwd">Password:</label><br>
            <!-- Input type is "password" to hide the input form potentential hackers (causes input to be black dots) -->
            <input type="password" id="pwd" name="pwd"><br><br>
            <!-- As login is local, no information is actually sent to the server. -->
            <input type="submit" value="Login">
            <!-- To link pages successfully, (E.g the Login page and the homepage) The file type must be html -->
            <!-- input type must also be submit-->

            <!-- Can reformat inputs later -->
        </div>
</body>
</form>

</html>