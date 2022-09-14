<?php //Had to change the file type to php. This is so we can add php code!

//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


//Initialising Variables for the form! We can now store them into the values of the form inputs
$observationID = "";
$patientID = "";
$patientName = "";
$clinicalStudyName = "";
$clinicalStudyDescription = "";
$observationDateandTime = "";
$treatmentDescription = "";
$painScore = "";
$tempQuestion = "";
$heartRateQuestion = "";



$errorMessage = "";
$successMessage = "";

f ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET Method: To show the data of the Observation andTreatment

    // IF statement to see if the ID exists in the database. If it does not, the user is redirected back to the list page
    if (!isset($_GET["observationID"])) {
        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/observationAndTreatmentList.php");
        exit;
    }

    //If the ID does exist in the database, 
    $observationID = $_GET["observationID"];

    //Read the row of the selected client from the database table
    $sql = "SELECT * FROM patientobservationandtreatment WHERE observationID=$observationID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc(); //This reads the data of the study from the database

    if (!$row) {
        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/observationAndTreatmentList.php");
        exit;
    }

    $observationID = $row["observationID"];
    $patientID = $row["patientID"];
    $patientName = $row["patientName"];
    $clinicalStudyName = $row["clinicalStudyName"];
    $clinicalStudyDescription = $row["clinicalStudyDescription"];
    $observationDateandTime = $row["observationDateandTime"];
    $treatmentDescription = $row["treatmentDescription"];
    $painScore = $row["painScore"];
    $tempQuestion = $row["tempQuestion"];
    $heartRateQuestion = $row["heartRateQuestion"];
    $additionalObservationNotes = $row["additionalObservationNotes"];
} else {
    // POST method: to update the data of the Clinical Trial after it has been edited
    $observationID = $_POST["observationID"];
	$patientID = $_POST["patientID"];
    $patientName = $_POST["patientName"];
    $clinicalStudyName = $_POST["clinicalStudyName"];
    $clinicalStudyDescription = $_POST["clinicalStudyDescription"];
    $observationDateandTime = $_POST["observationDateandTime"];
    $treatmentDescription = $_POST["treatmentDescription"];
    $painScore = $_POST["painScore"];
    $tempQuestion = $_POST["tempQuestion"];
    $heartRateQuestion = $_POST["heartRateQuestion"];
    $additionalObservationNotes = $_POST["additionalObservationNotes"];

    do {
        if (
			empty($observationID) || empty($patientID) || empty($patientName)
            || empty($clinicalStudyName) || empty($clinicalStudyDescription) || empty($observationDateandTime) 
            || empty($treatmentDescription) 
            || empty($painScore) || empty($tempQuestion) || empty($heartRateQuestion) || empty($additionalObservationNotes)
        ) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty

         //Query to update the database
         $sql = "UPDATE observationandtreatment SET clinicalStudyName = '$clinicalStudyName',
          clinicalStudyDescription = '$clinicalStudyDescription', eligibility = '$eligibility', clinicalStudyDescription = '$clinicalStudyDescription'
          , treatmentDescription = '$treatmentDescription', painScore = '$painScore',
          painScore = '$painScore', tempQuestion = '$tempQuestion',
          heartRateQuestion = '$heartRateQuestion', additionalObservationNotes = '$additionalObservationNotes'
          WHERE studyID = $studyID";


         $result = $connection->query($sql);
 
          //If we have any error during the SQL query, this error message is displayed
          if (!$result) {
             $errorMessage = "Invalid query: " . $connection->error;
             break;
         }
 
         $successMessage = "Client updated correctly";
 
         header("location: /clinicalTestingWebsite/clinicalStudiesFolder/observationAndTreatmentList.php");
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
            <a href="../Homepage.html">Homepage</a>
            <a href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Patient%20Record%20List.php">Patient Record
                List</a>
            <a href="../Clinical%20Study%20form%20and%20list%20files/Clinical%20Studies%20List.php">Clinical Study List</a>
            <a
                href="../Trial%20Organisation%20form%20and%20files/Trial%20Organisation%20list.php">Trial
                Organisation List</a>
            <a
                href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Observation%20and%20Treatment%20list.php">Obervation
                / Treatment List</a>
        </div>
    </div>
	<br>
	<br>
	<ul>
		<form action="Process_Observation_and_Treatment_form.php" method="post">
			<br>
			<li>
				<label for="observationID:">Patient ID:</label>
				<input type="number" id="observationID" name="observationID" placeholder="Enter Observation ID (Number)" />
			</li>
			<li>
				<label for="patientID:">Patient ID:</label>
				<input type="number" id="patientID" name="patientID" placeholder="Enter Patient ID (Number)" />
			</li>
			<li>
				<label for="patientName:">Patient Name:</label>
				<input type="text" id="patientName" name="patientName" placeholder="Enter Patient Name" />
			</li>
			<li>
				<label for="clinicalStudyName">Clinical Study Name:</label>
				<input type="text" id="clinicalStudyName" name="clinicalStudyName"
					placeholder="Enter the title of the Clinical Study" />
			</li>
			<li>
				<label for="observationDateandTime">Observation Date and Time:</label>
				<input type="datetime-local" name="observationDateandTime">
			</li>
			<li>
				<label for="treatmentDescription">Treatment Description:</label>
				<textarea id="treatmentDescription" name="treatmentDescription"
					placeholder="Enter the type of treatment and any further details regarding it here"></textarea>
			</li>
			<li>
				<table>
					<tr>
						<th>Observation</th>
						<th>Result</th>
					</tr>
					<tr>
						<td>From a rating (1-10) Did the patient feel any pain from the treatment?</td>
						<td><label for="painScore"> Pain Score</label>
							<input type="number" id="painScore" name="painScore" min="1" max="10"
								placeholder="Enter a digit between 1-10">
						</td>
						</td>
					</tr>
					<?php
					$painScore = $_REQUEST['painScore'];
					if($painScore >= 5){
						echo "Monitored in 30 mins later!"
					} else{
						echo"Patient is normal!"
					}
					?>
					<tr>
						<td>Has the Patients Temperature increased or decreased by 2+ Degrees Celcius?</td>
						<td>
							<label>Yes/No</label>
							<input type="text" id="tempQuestion" name="tempQuestion"
								placeholder="Enter Yes/No"></input>
						</td>
					</tr>
					<?php
					$tempQuestion = $_REQUEST['tempQuestion'];
					if($tempQuestion >= 5){
						echo "Monitored in 30 mins later!"
					} else{
						echo"Patient is normal!"
					}
					?>
					<tr>
						<td>Has the Patient's heart rate increased OR is it abnormal?</td>
						<td><label>Yes/No</label>
							<input type="text" id="heartRateQuestion" name="heartRateQuestion"
								placeholder="Enter Yes/No"></input>
							<p class ="output" id="output3"></p>
						</td>
					</tr>
					<?php
					$heartRateQuestion = $_REQUEST['heartRateQuestion'];
					if($heartRateQuestion >= 5){
						echo "Monitored in 30 mins later!"
					} else{
						echo"Patient is normal!"
					}
					?>
				</table>
			</li>
			<li>
				<label for="additionalObservationNotes">Additional Observation Notes:</label>
				<textarea id="additionalObservationNotes" name="additionalObservationNotes"
					placeholder="Enter any addtional notes about the Observation (Especially if the above Observation table is not applicable)"></textarea>
			</li>
			<li>
				<div class="buttonHolder">
					<input type="submit" value="Record Observation / Treatment" onclick="myFunction()">
				</div>
			</li>
	</ul>
	</form>
</body>

</html>