<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">
    <script src="/clinicalTestingWebsite/table2excel.js"></script>
          <style>
        table {
            position: absolute;
            left: -9999px;
        }
    </style>
</head>
<body>
    <div class="header">
            <a href = "Homepage.html"><img src="Images/Hospital Logo.jpg" alt="St George Logo"></a>
            <h1><a href="Homepage.html">Homepage</a></h1> 
    </div>
    <br><br>
    <div class="topnav">
        <div id="topnav">
            <a href="Homepage.php">Homepage</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial Organisation
                List</a>
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Observation
                / Treatment List</a>
        </div>
    </div>

    <div id="menu">
        <div class="column">
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">
                <h2>Patient List</h2>
                <img alt="Patient Record List" src="Images\Patient record image.png" width="100" height="100">
            </a>
        </div>
        <div class="column">
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder\observationAndTreatmentList.php">
                <h2>Observation and Treatment List</h2>
                <img alt="Observation / Treatment List" src="Images\observation.png" width="100" height="100">
            </a>

        </div>
    </div>
    <div id="menu">
        <div class="column">
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">
                <h2>Clinical Studies List</h2>
                <img alt="ClinicalStudyList" src="Images\Clinical Studies List.png" width="100" height="100">
            </a>

        </div>

        <div class="column">
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">
                <h2>Trial Organisation List</h2>
                <img alt="TrialOrgList" src="Images\Trial Organisation list image.png" width="100" height="100">
            </a>

        </div>
    </div>
    <div class="textOnForm">
        <button type='button' id="downloadexcel" class='btn btn-success'>Export All lists to Excel</button>
    </div>
    <table class="table" id="example-table">
        <thead>
            <tr>
                <th>Trial Organisation ID</th>
                <th>Trial Organisation Name</th>
                <th>Organisation Description</th>
                <th>Clinical Expertise</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost"; // Our server is called localhost as the server is installed on this PC
            $username = "root"; // Our username is called root as that is the default username
            $password = ""; // Our Password is empty as default
            $database = "clinicaltesting2"; // The database is known as clinicaltesting

            // Create a connection to the database
            $connection = new mysqli($servername, $username, $password, $database);

            // Check if the connection is successful
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            //SQL to read all the rows on the clinicalstudies table
            $sql = "SELECT * FROM trialorg";
            //The query will be executed and stored in the $result variable
            $result = $connection->query($sql);

            //To check if the query has been excuted or not
            if (!$result) {
                die("Invalid query: " . $connection->connect_error);
                //die means exit the excution of the query. If any errors occur, the program will exit.
            }

            //while loop to read each row of the table
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                <td>$row[trialOrgID]</td>
                <td>$row[trialOrgName]</td>
                <td>$row[trialOrgDesc]</td>
                <td>$row[cExpertise]</td>
                </tr>
                ";
            }
            $sql = "SELECT * FROM clinicalstudies";
            //The query will be executed and stored in the $result variable
            $result = $connection->query($sql);
            echo "<tr></tr><tr></tr>"; //This is to create a gap between the tables
            echo "<tr>
                <th>Clinical Study ID</th>
                <th>Clincal Study Name / Expertise</th>
                <th>Clinical Study Phase</th>
                <th>Eligibility</th>
                <th>Clinical Study description</th>
                <th>Are Patients On Study?</th>
                <th>Number of Patients Enrolled</th>
            </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "
    <tr>
    <td>$row[studyID]</td>
    <td>$row[studyExpertise]</td>
    <td>$row[studyPhase]</td>
    <td>$row[eligibility]</td>
    <td>$row[clinicalStudyDescription]</td>
    <td>$row[onStudy]</td>
    <td>$row[patientsEnrolledNumber]</td>
    </tr>";
            }
            $sql = "SELECT * FROM patientobservationandtreatment";
            //The query will be executed and stored in the $result variable
            $result = $connection->query($sql);
            echo "<tr></tr><tr></tr>"; //This is to create a gap between the tables
            echo "<tr>
            <th>Observation-and-Treatment ID</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Clinical Study Name</th>
            <th>Observation Date-and-Time</th>
            <th>Treatment Description</th>
            <th>Pain Score</th>
            <th>Temperature High?</th>
            <th>Heart Rate High?</th>
            <th>Additional Observation Notes</th>
        </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                <td>$row[observationandTreatmentID]</td>
                <td>$row[patientID]</td>
                <td>$row[patientName]</td>
                <td>$row[clinicalStudyName]</td>
                <td>$row[observationDateandTime]</td>
                <td>$row[treatmentDescription]</td>
                <td>$row[painScore]</td>
                <td>$row[tempQuestion]</td>
                <td>$row[heartRateQuestion]</td>
                <td>$row[additionalObservationNotes]</td>
                </tr>";
            }
            $sql = "SELECT * FROM patientrecords";
            //The query will be executed and stored in the $result variable
            $result = $connection->query($sql);
            echo "<tr></tr><tr></tr>"; //This is to create a gap between the tables
            echo "<tr>
            <th>Patient ID</th>
            <th>Family Name</th>
            <th>Given Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Weight</th>
            <th>Height</th>
            <th>Medical History</th>
            <th>Allergies</th>
            <th>Clinical Study ID</th>
            <th>Clinical Study Name</th>
        </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>$row[patientID]</td>
                    <td>$row[familyName]</td>
                    <td>$row[givenName]</td>
                    <td>$row[dob]</td>
                    <td>$row[address]</td>
                    <td>$row[sex]</td>
                    <td>$row[weight]</td>
                    <td>$row[height]</td>
                    <td>$row[medicalHistory]</td>
                    <td>$row[allergies]</td>
                    <td>$row[clinicalStudyID]</td>
                    <td>$row[clinicalStudyName]</td>
                    </tr>
                    ";
            }
            //We need to provide the ID of the Clinical Trial to the Edit and delete pages (See above). This is so the program knows which row we're editing.
            ?>
        </tbody>
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#example-table"));
            });
        </script>
</body>
</html>