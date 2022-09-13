<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Patient Record List</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Patient Record List</h1>
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
        <h2> List of Patient Records </h2>
        <a class="btn btn-primary" href="/clinicalTestingWebsite/patientRecordsFolder/createPatientRecord.php" role="button">New Patient Record</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Family Name</th>
                    <th>Given Name</th>
                    <th>Date of Birth</th>
                    <th>address</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Medical History</th>
                    <th>allergies</th>
                    <th>Clinical Study ID</th>
                    <th>Clinical Study Name</th>

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

                //SQL to read all the rows on the patientrecords table
                $sql = "SELECT * FROM patientrecords";
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
                    <td>
                        <a class='btn btn-primary btn-sm' href='/clinicalTestingWebsite/patientRecordsFolder/editPatientRecord.php?patientID=$row[patientID]'>Edit</a>
                        
                        <a class='btn btn-danger btn-sm' href='/clinicalTestingWebsite/patientRecordsFolder/deletePatientRecord.php?patientID=$row[patientID]'>delete</a>
                    </td>
                    </tr>
                    ";
                    //We need to provide the ID of the Clinical Trial to the Edit and delete pages (See above). This is so the program knows which row we're editing.

                }
                ?>
            </tbody>
        </table>
    </div>

    
</body>

</html>
