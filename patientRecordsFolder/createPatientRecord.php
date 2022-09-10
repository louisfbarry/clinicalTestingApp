<?php //Had to change the file type to php. This is so we can add php code!

//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


//Initialising Variables for the form! We can now store them into the values of the form inputs
$patientID = "";
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
$clincalStudyName = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patientID = $_POST["patientID"];
    $familyName = $_POST["familyName"];
    $givenName = $_POST["givenName"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $sex = $_POST["sex"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $medicalHistory= $_POST["medicalHistory"];
    $address = $_POST["address"];

    do {
        if (
             empty($studyExpertise) || empty($studyPhase)
            || empty($eligibility) || empty($clinicalStudyDescription) || empty($onStudy) || empty($patientsEnrolledNumber)
        ) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty

        // to add a new client to the database\

        //Inserting values inputted into our database table!

        $sql = "INSERT INTO clinicalstudies (studyExpertise, studyPhase, eligibility, clinicalStudyDescription, onStudy, patientsEnrolledNumber) " .
        "VALUES ('$studyExpertise','$studyPhase','$eligibility','$clinicalStudyDescription',
        '$onStudy', '$patientsEnrolledNumber')";
        //Now excuting the sql query
        $result = $connection->query($sql);

        //If we have any error during the SQL query, this error message is displayed
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        $studyExpertise = "";
        $studyPhase = "";
        $eligibility = "";
        $clinicalStudyDescription = "";
        $onStudy = "Yes";
        $patientsEnrolledNumber = "";

        $successMessage = "Client added successfully";

        //To redirect the user back to the list page once a form is submitted
        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="../style.css">
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
			<a href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Patient%20Record%20List.php">Patient Record List</a>
			<a href="../Clinical%20Study%20form%20and%20list%20files/Clinical%20Studies%20List.php">Clinical Study List</a>
			<a
				href="../Trial%20Organisation%20form%20and%20files/Trial%20Organisation%20list.php">Trial
				Organisation List</a>
			<a
				href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Observation%20and%20Treatment%20list.php">Obervation
				/ Treatment List</a>
		</div>
	</div>

	<br><br>

	<form method="post">

		<ul>
			<!-- <li>
				<a href="Patient Record List.html">Back to Patient Record List</a>
			</li> -->
			<li>
				<label for="patientID">Patient ID:</label>
				<input type="number" id="patientID" name="patientID" placeholder="Enter Patient ID:">
			</li>
			<li>
				<label for="familyName">Family Name:</label>
				<input type="text" id="familyName" name="familyName" placeholder="Enter family name">
			</li>
			<li>
				<label for="givenName">Given Names:</label>
				<input type="text" id="givenName" name="givenName" placeholder="Enter given names">
			</li>
			<li>
				<label for="DOB">Date of birth:</label>
				<input type="date" name="dob">
			</li>
			<li>
				<label for="address">Address:</label>
				<input type="text" id="address" name="address" placeholder="Enter address">
			</li>
			<li>
				<label for="sex">Gender:</label>
				<label for="male">
					<input type="radio" name="sex" id="male" value = "Male" checked /><span>Male</span>
				</label>
				<label for="female">
					<input type="radio" name="sex" id="female" value = "Female" checked /><span>Female</span>
				</label>
			</li>
			<li>
				<label for="weight">Weight:</label>
				<input type="text" id="weight" name="weight" placeholder="Enter weight in kilograms">
			</li>
			<li>
				<label for="height">Height:</label>
				<input type="text" id="height" name="height" placeholder="Enter height in centimeters">
			</li>
			<li>
				<label for="medicalHistory">Medical History:</label>
				<textarea id="medicalHistory" name="medicalHistory"
					placeholder="Enter patient medical history"></textarea>
			</li>
			<li>
				<label for="allergies">Allergies:</label>
				<textarea id="allergies" name="allergies" placeholder="Enter a list of allergies"></textarea>
			</li>
			<li>
				<label for="clinicalStudyID">Clinical Study ID:</label>
				<input type="text" id="clinicalstudyID" name="clinicalStudyID" value = "Unassigned">
			</li>
			<li>
				<label for="clinicalStudyName">Clinical Study Name:</label>
				<input type="text" id="clinicalstudyName" name="clinicalStudyName" value = "Unassigned">
			</li>
			<li>
				<div class="buttonHolder">
					<input type="submit" value="Create Patient Record">
				</div>
			</li>
		</ul>
	</form>


</body>

</html>