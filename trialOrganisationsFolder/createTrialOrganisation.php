<?php //Had to change the file type to php. This is so we can add php code!

//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


//Initialising Variables for the form! We can now store them into the values of the form inputs
$trialOrgName = "";
$trialOrgDesc = "";
$cExpertise = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trialOrgName = $_POST["trialOrgName"];
    $trialOrgDesc = $_POST["trialOrgDesc"];
    $cExpertise = $_POST["cExpertise"];

    do {
        if (
            empty($trialOrgName) || empty($trialOrgDesc) || empty($cExpertise)
) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty

        // to add a new client to the database\

        //Inserting values inputted into our database table!

        $sql = "INSERT INTO trialOrganisations (trialOrgName, trialOrgDesc, cExpertise) " .
        "VALUES ('$trialOrgName','$trialOrgDesc','$cExpertise')";
        //Now excuting the sql query
        $result = $connection->query($sql);

        //If we have any error during the SQL query, this error message is displayed
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        $trialOrgName = "";
        $trialOrgDesc = "";
        $cExpertise = "";

        $successMessage = "Trial Organisation added successfully";

        //To redirect the user back to the list page once a form is submitted
        header("location: /clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Create a Trial Organisation form</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Clinical Study Form</h1>
    </div>
    <br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.html">Homepage</a>
            <a href="http://localhost/Group%202%20Secret%20files/Group-2-s-Secret-files/Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Patient%20Record%20List.php">Patient
                Record
                List</a>
            <a href="http://localhost/Group%202%20Secret%20files/Group-2-s-Secret-files/Clinical%20Study%20form%20and%20list%20files/Clinical%20Studies%20List.php">Clinical
                Study List</a>
            <a href="http://localhost/Group%202%20Secret%20files/Group-2-s-Secret-files/Trial%20Organisation%20form%20and%20files/Trial%20Organisation%20list.php">Trial
                Organisation List</a>
            <a href="http://localhost/Group%202%20Secret%20files/Group-2-s-Secret-files/Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Observation%20and%20Treatment%20list.php">Obervation
                / Treatment List</a>
        </div>
    </div>
    <br>
    <br>
    <!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Trial Organisation form</title>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<div class="header">
		<a href="../Homepage.html">
			<img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
		<h1><a href="Homepage.html">Create A Patient Medical Record</a></h1>
	</div>
	<br>
	<div class="topnav">
		<div id="topnav">
			<a href="../Homepage.html">Homepage</a>
			<a href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Patient%20Record%20List.php">Patient Record
				List</a>
			<a
				href="../Clinical%20Study%20form%20and%20list%20files/Clinical%20Studies%20List.php">Clinical
				Study List</a>
			<a
				href="../Trial%20Organisation%20form%20and%20files/Trial%20Organisation%20list.php">Trial
				Organisation List</a>
			<a
				href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Observation%20and%20Treatment%20list.php">Obervation
				/ Treatment List</a>
		</div>
	</div>
	<br>
	<form action="Process_Create_a_Trial_Organisation_form.php" method="POST">
		<ul>
			<label for="trialorgid">Trial Organisation ID:</label>
			<input type="number" id="trialorgid" name="trialorgid" />
			<li>
				<label for="trialorgname">Trial Organisation Name:</label>
				<input type="text" id="trialorgname" name="trialorgname" />
			</li>
			<li>

			</li>
			<li>
				<label for="trialorgdesc">Trial Organisation Description</label>
				<textarea id="trialorgdesc" name="trialorgdesc"
					placeholder="Enter any extra details about the Trial Organisation here"></textarea>
			</li>
			<li>
				<label for="cexpertise">Clinical Trial Expertise: :</label>
				<textarea id="cexpertise" name="cexpertise"
					placeholder="Enter the Expertise of the Clinical Trials here E.g Caridology"></textarea>
			</li>
			<li>
				<div class="buttonHolder">
					<input type="submit" value="Create Trial Organisation">
				</div>
			</li>
		</ul>
	</form>
</body>

</html>
            <br>
            <?php
            if (!empty($successMessage)) {
                //We use the javascript sourced from the Bootstrap website (See header) here. It allows us to remove the alerts once they have been read.
                echo "
                <div class = 'alert alert-success alert-dismissible fade show' role = 'alert'> 
                <strong>$successMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
                </div>
                ";
            }
            ?>
            <li>
                <div class="buttonHolder">
                    <button type="submit" class="btn btn-outline-success">Create Clinical Study</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php" role="button">Cancel</a>
                </div>
            </li>
        </ul>
    </form>
</body>

</html>
