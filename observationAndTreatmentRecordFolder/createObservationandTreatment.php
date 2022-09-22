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
$patientName = "";
$clinicalStudyName = "";
$observationDateandTime = "";
$treatmentDescription = "";
$painScore = "";
$tempQuestion = "";
$heartRateQuestion = "";
$addtionalObservationNotes = "";



$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$patientID = $_POST["patientID"];
	$patientName = $_POST["patientName"];
	$clinicalStudyName = $_POST["clinicalStudyName"];
	$observationDateandTime = $_POST["observationDateandTime"];
	$treatmentDescription = $_POST["treatmentDescription"];
	$painScore = $_POST["painScore"];
	$tempQuestion = $_POST["tempQuestion"];
	$heartRateQuestion = $_POST["heartRateQuestion"];
	$additionalObservationNotes = $_POST["additionalObservationNotes"];

	do {
		if (
			empty($patientID) || empty($patientName)
			|| empty($clinicalStudyName) || empty($observationDateandTime)
			|| empty($treatmentDescription)
			|| empty($painScore) || empty($tempQuestion) || empty($heartRateQuestion) || empty($additionalObservationNotes)
		) {
			$errorMessage = "All the fields are required";
			break;
		} //Error message that displays if any are the inputs are submitted empty

		// to add a new client to the database\

		//Inserting values inputted into our database table!

		$sql = "INSERT INTO patientobservationandtreatment (patientID, patientName, clinicalStudyName,
		 observationDateandTime, treatmentDescription, painScore, tempQuestion, heartRateQuestion, additionalObservationNotes) " .
			"VALUES ('$patientID','$patientName','$clinicalStudyName',
        '$observationDateandTime', '$treatmentDescription', '$painScore', '$tempQuestion', '$heartRateQuestion', '$additionalObservationNotes')";
		//Now excuting the sql query
		$result = $connection->query($sql);

		//If we have any error during the SQL query, this error message is displayed
		if (!$result) {
			$errorMessage = "Invalid query: " . $connection->error;
			break;
		}

		$patientID = "";
		$patientName = "";
		$clinicalStudyName = "";
		$observationDateandTime = "";
		$treatmentDescription = "";
		$painScore = "";
		$tempQuestion = "";
		$heartRateQuestion = "";
		$additionalObservationNotes = "";

		$successMessage = "Observation / Treatment Recorded successfully";

		//To redirect the user back to the list page once a form is submitted
		header("location: /clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php");
		exit;
	} while (false);
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Record Observation / Treatment form</title>
	<link rel="stylesheet" href="../style.css">

</head>

<body>
	<div class="header">
		<a href="../Homepage.html">
			<img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
		<h1>Observation and Treatment Form</h1>
	</div>
	<br>
	<div class="topnav">
		<div id="topnav">
			<a href="Homepage.html">Homepage</a>
			<a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
			<a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
			<a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial Organisation List</a>
			<a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Observation / Treatment List</a>
		</div>
	</div>
	<br>
	<br>
	<ul>
		<form method="post">
			<ul>
				<div class="textOnForm">
					<b>Observation / Treatment Record Form</b>
				</div>
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
				<br>
				<li>
					<label for="patientID">Patient ID:</label>
					<input type="number" id="patientID" name="patientID" placeholder="Enter patientID (Number)" />
				</li>
				<li>
					<label for="patientName">Patient Name:</label>
					<input type="text" id="patientName" name="patientName" placeholder="Enter Patient Name" />
				</li>
				<li>
					<label for="clinicalStudyName">Clinical Study Name:</label>
					<input type="text" id="clinicalStudyName" name="clinicalStudyName" placeholder="Enter the title of the Clinical Study" />
				</li>
				<li>
					<label for="observationDateandTime">Observation Date and Time:</label>
					<input type="datetime-local" name="observationDateandTime">
				</li>
				<li>
					<label for="treatmentDescription">Treatment Description:</label>
					<textarea id="treatmentDescription" name="treatmentDescription" placeholder="Enter the type of treatment and any further details regarding it here"></textarea>
				</li>
				<li>
					<table>
						<tr>
							<th>Observation</th>
							<th>Result</th>
						</tr>
						<tr>
							<td>From a rating (1-10) Did the patient feel any pain from the treatment? <br><br>(If the Pain Score is 5 or above, monitor the patient for 30min after treatment)</td>
							<td><label for="painScore"> Pain Score</label>
								<input type="number" id="painScore" name="painScore" min="1" max="10" placeholder="Enter a digit between 1-10" />
							</td>
						</tr>
						<tr>
							<td><br>Has the Patients Temperature increased or decreased by +2 Degrees Celcius? <br><br>(If the answer is 'YES' apply a cool treatment to the patient)</td>
							<td>
								<label>Yes/No</label>
								<input type="text" id="tempQuestion" name="tempQuestion" placeholder="Enter Yes/No"></input>
							</td>
						</tr>
						<tr>
							<td><br>Has the Patient's heart rate increased OR is it abnormal? <br><br>(If the answer is 'YES' calm the patient down and re-check their heart rate after 30min</td>
							<td><label>Yes/No</label>
								<input type="text" id="heartRateQuestion" name="heartRateQuestion" placeholder="Enter Yes/No"></input>
								<p class="output" id="output3"></p>
							</td>
						</tr>
					</table>
				</li>
				<li>
					<label for="additionalObservationNotes">Additional Observation Notes:</label>
					<textarea id="additionalObservationNotes" name="additionalObservationNotes" placeholder="Enter any addtional notes about the Observation (Especially if the above Observation table is not applicable)"></textarea>
				</li>
				<li>
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
					<div class="buttonHolder">
						<button type="button" onclick="myFunction()" class="btn btn-outline-dark">Automatically Mark Answers</button>
						<br>
						<br>
						<button type="submit" class="btn btn-outline-success">Record Observation/Treatment</button>
						<a class="btn btn-outline-danger" href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/ObservationAndTreatmentlist.php" role="button">Cancel</a>
					</div>
				</li>
			</ul>
		</form>
		<script>
			//This is the function to automatically mark the Observation / Treatment form answers.
			function myFunction() {
				//Here we are retrieveing the value of the inputs by their ID (E.g heartRateQuestion input)
				var painScore = parseInt(document.getElementById('painScore').value);
				var tempQuestion = document.getElementById('tempQuestion').value;
				var heartRateQuestion = document.getElementById('heartRateQuestion').value;
				//Here we are comparing the inputs and displaying outputs based on their values / automatically marking them
				//Making the text inputs (To lowercase) to accept multiple cases of inputs e.g YES, yes or Yes etc.
				if (painScore >= 5 && tempQuestion.toLowerCase() == "yes" && heartRateQuestion.toLowerCase() == "yes") {
					alert("Answer's have been automatically marked!\n1.Pain score is at 5 or above! Monitor Patient for 30min.\n2.Temperature has increased by 2+ degree's celcius! Apply a cool treatment to the patient.\n3.Heart Rate has increased / is abnormal! Calm the patient down and check in after 30min.");
				} else if (painScore < 5 && tempQuestion.toLowerCase() == "no" && heartRateQuestion.toLowerCase() == "no") {
					alert("Answer's have been automatically marked!\n1.Pain score is low\n2.Temperature is stable.\n3.Heart Rate is stable.");
				} else if (painScore >= 5 && tempQuestion.toLowerCase() == "no" && heartRateQuestion.toLowerCase() == "no") {
					alert("Answer's have been automatically marked!\n1.Pain score is at 5 or above! Monitor Patient for 30min.\n2.Temperature is stable.\n3.Heart Rate is stable.");
				} else if (painScore >= 5 && tempQuestion.toLowerCase() == "no" && heartRateQuestion.toLowerCase() == "yes") {
					alert("Answer's have been automatically marked!\n1.Pain score is at 5 or above! Monitor Patient for 30min.\n2.Temperature is stable.\n3.Heart Rate has increased / is abnormal! Calm the patient down and check in after 30min.");
				} else if (painScore >= 5 && tempQuestion.toLowerCase() == "yes" && heartRateQuestion.toLowerCase() == "no") {
					alert("Answer's have been automatically marked!\n1.Pain score is at 5 or above! Monitor Patient for 30min.\n2.Temperature has increased by 2+ degree's celcius! Apply a cool treatment to the patient\n3.Heart Rate is stable.");
				} else if (painScore < 5 && tempQuestion.toLowerCase() == "yes" && heartRateQuestion.toLowerCase() == "yes") {
					alert("Answer's have been automatically marked!\n1. Pain Score is low.\n2.Temperature has increased by 2+ degrees celcius! Apply a cool treatment to the patient.\n3.Heart Rate has increased / is abnormal! Calm the patient down and check in after 30min.");
				} else if (painScore < 5 && tempQuestion.toLowerCase() == "no" && heartRateQuestion.toLowerCase() == "yes") {
					alert("Answer's have been automatically marked!\n1.Pain score is low.\n2.Temperature is stable.\n3.Heart Rate has increased / is abnormal! Calm the patient down and check in after 30min");
				} else if (painScore < 5 && tempQuestion.toLowerCase() == "yes" && heartRateQuestion.toLowerCase() == "no") {
					alert("Answer's have been automatically marked!\n1.Pain score is low.\n2.Temperature has increased by 2+ degree's celcius! Apply a cool treatment to the patient.\n3.Heart Rate is stable.");
				}
			}
		</script>
</body>

</html>