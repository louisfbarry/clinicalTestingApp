<?php
// define variables and set to empty values
$userName = "";
$pwd = "";
$errorMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $pwd = $_POST["pwd"];
    do {
        if (
            empty($userName) || empty($pwd)
        ) {
            $errorMessage = "All the fields are required!";
            break;
        } //Error message that displays if any are the inputs are submitted empty

        //To redirect the user back to the list page once a form is submitted
        header("location: /clinicalTestingWebsite/Homepage.php");
        exit;
    } while (false);
}
?>
<!DOCTYPE html>

<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8" />

    <title>Clinical Testing Website</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>

<body>
    <form method="POST">
        <div class="imgStyle">
            <img alt="Login Page Image" src="Images\Hospital Logo.jpg" width="200" height="200">
        </div>
        <br><br>
        <?php
        if (!empty($errorMessage)) {
            echo "
                <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'> 
                <strong> $errorMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
                </div>
                ";
        }
        ?>
        <h3>Welcome to St George Hospital</h3><br>
        <!-- the action of the form is sending the user to the homepage (Once they click submit) -->
        <div class="login">
            <label for="userName">Username:</label><br>
            <input type="text" id="userName" name="userName"><br>

            <label for="pwd">Password:</label><br>
            <!-- Input type is "password" to hide the input form potentential hackers (causes input to be black dots) -->
            <input type="password" id="pwd" name="pwd"><br><br>
            <!-- As login is local, no information is actually sent to the server. -->
            <input type="submit" value="Login">
            <!-- To link pages successfully, (E.g the Login page and the homepage) The file type must be html -->
            <!-- input type must also be submit-->

            <!-- Can reformat inputs later -->
        </div>
    </form>
</body>

</html>