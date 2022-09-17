<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Observation and Treatment List</title>
    <link rel="stylesheet" href="../style.css">
    <script src="/clinicalTestingWebsite/table2excel.js"></script>
</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Observation and Treatment List</h1>
    </div>
    <br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.html">Homepage</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial
                Organisation List</a>
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Observation
                / Treatment List</a>
        </div>
    </div>
    <div class="container my-5">
        <h2>List of Observation and Treatment Records <button type='button' id = "downloadexcel" class='btn btn-success'>Export list to Excel</button></h2>
        <a class="btn btn-primary" href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/createObservationandTreatment.php" role="button">New Observation/Treatment Record </a>
        <br>
        <table class="table" id = "example-table">
            <thead>
                <tr>
                    <th>Observation-and-Treatment ID</th>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Clincal Study Name</th>
                    <th>Observation Date and Time</th>
                    <th>Treatment Description</th>
                    <th>Pain Score</th>
                    <th>Temperature High?</th>
                    <th>Heart Rate High?</th>
                    <th>Additional Observation Notes</th>

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
                    die("Connection failed: " . $connection->connect_error );
                }

                //SQL to read all the rows on the clinicalstudies table
                $sql = "SELECT * FROM patientObservationAndTreatment";
                //The query will be executed and stored in the $result variable
                $result = $connection->query($sql);

                //To check if the query has been excuted or not
                if(!$result) {
                    die("Invalid query: " . $connection->connect_error ); 
                    //die means exit the excution of the query. If any errors occur, the program will exit.
                }

                //while loop to read each row of the table
                while($row = $result->fetch_assoc()) {
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
                    <td>
                        <a class='btn btn-primary btn-sm' href='/clinicalTestingWebsite/observationAndTreatmentRecordFolder/editObservationandTreatment.php?observationandTreatmentID=$row[observationandTreatmentID]'>Edit</a>
                        
                        <a class='btn btn-danger btn-sm' href='/clinicalTestingWebsite/observationAndTreatmentRecordFolder/deleteObservationandTreatment.php?observationandTreatmentID=$row[observationandTreatmentID]'>Delete</a>
                    </td>
                    </tr>
                    ";
                    //We need to provide the ID of the Clinical Trial to the Edit and delete pages (See above). This is so the program knows which row we're editing.

                }
                ?>
            </tbody>
        </table>
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#example-table"));
            });
        </script>
    </div>
</body>

</html>

