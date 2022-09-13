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
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record
                List</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Clinical Study List</a>
            <a
                href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial
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
					<script>
						let comment1;
						if(painScore >= 5) {
							comment1 = 'Monitored in 30 mins!'
						} else{
							comment1 = 'Patient is fine!'
						}
						document.getElementById("painScore").innerHTML = comment1;
					</script>
					<tr>
						<td>Has the Patients Temperature increased or decreased by 2+ Degrees Celcius?</td>
						<td>
							<label>Yes/No</label>
							<input type="text" id="tempQuestion" name="tempQuestion"
								placeholder="Enter Yes/No"></input>
						</td>
					</tr>
					<script>
						let comment2;
						if(tempQuestion == 'Yes') {
							comment2 = 'Monitored in 30 mins!'
						} else{
							comment2 = 'Temperature is normal!'
						}
						document.getElementById("tempQuestion").innerHTML = comment2;
					</script>
					<tr>
						<td>Has the Patient's heart rate increased OR is it abnormal?</td>
						<td><label>Yes/No</label>
							<input type="text" id="heartRateQuestion" name="heartRateQuestion"
								placeholder="Enter Yes/No"></input>
						</td>
					</tr>
					<script>
						let comment3;
						if(hearRateQuestion == 'Yes') {
							comment3 = 'Monitored in 30 mins!'
						} else{
							comment3 = 'Heart rate is normal!'
						}
						document.getElementById("heartRateQuestion").innerHTML = comment3;
					</script>
				</table>
			</li>
			<li>
				<label for="additionalObservationNotes">Additional Observation Notes:</label>
				<textarea id="additionalObservationNotes" name="additionalObservationNotes"
					placeholder="Enter any addtional notes about the Observation (Especially if the above Observation table is not applicable)"></textarea>
			</li>
			<li>
				<div class="buttonHolder">
					<input type="submit" value="Record Observation / Treatment">
				</div>
			</li>
	</ul>
	</form>
</body>

</html>
