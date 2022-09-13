<?php //Had to change the file type to php. This is so we can add php code!

//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


//Initialising Variables for the form! We can now store them into the values of the form inputs
$familyName = "";
$givenName = "";
$dob = "";
$address = "";
$sex = "";
$weight = "";
$height = "";
$medicalHistory = "";
$allergies = "";
$clinicalStudyID = "";
$clinicalStudyName = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $familyName = $_POST["familyName"];
    $givenName = $_POST["givenName"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $sex = $_POST["sex"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $medicalHistory= $_POST["medicalHistory"];
    $allergies = $_POST["allergies"];
    $clinicalStudyID = $_POST["clinicalStudyID"];
    $clinicalStudyName = $_POST["clinicalStudyName"];

    do {
        if (
             empty($familyName) || empty($givenName) || empty($dob) || empty($address) || empty($sex) || empty($weight) || empty($height) || empty($medicalHistory)
             || empty($allergies) || empty($clinicalStudyID) || empty($clinicalStudyName)
        )
        {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty

        // to add a new client to the database\

        //Inserting values inputted into our database table!

        $sql = "INSERT INTO patientrecords (familyName, givenName, dob, address, sex, weight, height, medicalHistory, allergies, clinicalStudyID, clinicalStudyName) " .
        "VALUES ('$familyName','$givenName','$dob','$address',
        '$sex', '$weight', '$height', '$medicalHistory', '$allergies', '$clinicalStudyID', '$clinicalStudyName')";
        //Now excuting the sql query
        $result = $connection->query($sql);

        //If we have any error during the SQL query, this error message is displayed
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        $familyName = "";
        $givenName = "";
        $dob = "";
        $address = "";
        $sex = "";
        $weight = "";
        $height = "";
        $medicalHistory = "";
        $allergies = "";
        $clinicalStudyID = "";
        $clinicalStudyName = "";

        $successMessage = "Patient added successfully";

        //To redirect the user back to the list page once a form is submitted
        header("location: /clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
	<title>Patient Medical Record</title>
	<style>
		li {
			overflow: hidden
		}

		fieldset {
			overflow: hidden
		}

		.select {
			float: left;
			clear: none;
		}

		label {
			float: left;
			clear: none;
			display: block;
			padding: 0px 1em 0px 8px;
		}

		input[type=radio],
		input.radio {
			clear: none;
			width: auto;

		}
	</style>
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
			<a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
			<a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
			<a
				href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial
				Organisation List</a>
			<a
				href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Obervation
				/ Treatment List</a>
		</div>
	</div>

	<br><br>

	<form method="post">
    <?php
            //Message that displays if the form is submitted empty
            if (!empty($errorMessage)) {
                echo "
                <div class = 'alert alert-warning alert-dismissible fade show' role = 'alert'> 
                <strong> $errorMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
                </div>
                ";
            }
            ?>
		<ul>
			<!-- <li>
				<a href="Patient Record List.html">Back to Patient Record List</a>
			</li> -->
			<li>
				<label for="familyName">Family Name:</label>
				<input type="text" id="familyName" name="familyName" placeholder="Enter family name" />
			</li>
			<li>
				<label for="givenName">Given Names:</label>
				<input type="text" id="givenName" name="givenName" placeholder = "Enter given names" />
			</li>
			<li>
				<label for="DOB">Date of birth:</label>
				<input type="date" name="dob" />
			</li>
			<li>
				<label for="address">Address:</label>
				<input type="text" id="address" name="address" placeholder="Enter address" />
			</li>
			<li>
				<label for="sex">Gender:</label>
				<label for="male">
					<input type="radio" name="sex" id="male" value = "male" checked /><span>Male</span>
				</label>
				<label for="female">
					<input type="radio" name="sex" id="female" value = "Female" checked /><span>Female</span>
				</label>
			</li>
			<li>
				<label for="weight">Weight:</label>
				<input type="text" id="weight" name="weight" placeholder="Enter weight in kilograms" />
			</li>
			<li>
				<label for="height">Height:</label>
				<input type="text" id="height" name="height" placeholder="Enter height in centimeters" />
			</li>
			<li>
				<label for="medicalHistory">Medical History:</label>
				<textarea id="medicalHistory" name="medicalHistory" placeholder="Enter patient medical history"></textarea>
			</li>
			<li>
				<label for="allergies">Allergies:</label>
				<textarea id="allergies" name="allergies" placeholder="Enter a list of allergies"></textarea>
			</li>
			<li>
				<label for="clinicalStudyID">Clinical Study ID:</label>
				<input type="text" id="clinicalStudyID" name="clinicalStudyID" value = "Unassigned" />
			</li>
			<li>
				<label for="clinicalStudyName">Clinical Study Name:</label>
				<input type="text" id="clinicalStudyName" name="clinicalStudyName" value = "Unassigned"/>
			</li>
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
                    <button type="submit" class="btn btn-outline-success">Create Patient Record</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php" role="button">Cancel</a>
			<li>
				<div class="buttonHolder">
					<input type="submit" value="Create Patient Record">
				</div>
			</li>
		</ul>
	</form>
</body>

</html>