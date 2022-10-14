<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Clinical Studies List</title>
    <link rel="stylesheet" href="../style.css">
    <script src="/clinicalTestingWebsite/table2excel.js"></script>
</head>

<body>
    <div class="header">
        <a href="../Homepage.php">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Clinical Studies List</h1>
    </div>
    <br><br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.php">Homepage</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial
                Organisation List</a>
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Observation
                / Treatment List</a>
        </div>
    </div>
    <div class="container my-5">
        <h2>List of Clinical Studies <button type='button' id="downloadexcel" class='btn btn-success'>Export list to Excel</button></h2>
        <a class="btn btn-primary" href="/clinicalTestingWebsite/clinicalStudiesFolder/createClinicalStudy.php" role="button">New Clinical Study </a>
        <br>
        <table class="table" id="example-table">
            <thead>
                <tr>
                    <th>Clinical Study ID</th>
                    <th>Clincal Study Name / Expertise</th>
                    <th>Clinical Study Phase</th>
                    <th>Eligibility</th>
                    <th>Clinical Study description</th>
                    <th>Are Patients On Study?</th>
                    <th>Number of Patients Enrolled</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "group2clinicaltesting.info"; // Our server is called localhost as the server is installed on this PC
                $username = "group2DBuser1"; // Our username is called root as that is the default username
                $password = "group2Rocks12345"; // Our Password is empty as default
                $database = "group2clinicaltesting"; // The database is known as group2clinicaltesting

                // Create a connection to the database
                $connection = new mysqli($servername, $username, $password, $database);

                // Check if the connection is successful
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //SQL to read all the rows on the clinicalstudies table
                $sql = "SELECT * FROM clinicalstudies";
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
                    <td>$row[studyID]</td>
                    <td>$row[studyExpertise]</td>
                    <td>$row[studyPhase]</td>
                    <td>$row[eligibility]</td>
                    <td>$row[clinicalStudyDescription]</td>
                    <td>$row[onStudy]</td>
                    <td>$row[patientsEnrolledNumber]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/clinicalTestingWebsite/clinicalStudiesFolder/editClinicalStudy.php?studyID=$row[studyID]'>Edit</a>
                        
                        <a class='btn btn-danger btn-sm' href='/clinicalTestingWebsite/clinicalStudiesFolder/deleteClinicalStudy.php?studyID=$row[studyID]'>Delete</a>
                    </td>
                    </tr>
                    ";
                    //We need to provide the ID of the Clinical Trial to the Edit and delete pages (See above). This is so the program knows which row we're editing.

                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container my-5">
        <h2> List of Patient Records <button type='button' id="downloadexcel1" class='btn btn-success'>Export list to Excel</button></h2>
        <a class="btn btn-primary" href="/clinicalTestingWebsite/patientRecordsFolder/createPatientRecord.php" role="button">New Patient Record</a>
        <br>
        <table class="table" id="example-table1">
            <thead>
                <tr>
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
                $sql = "SELECT * FROM patientrecords";
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
        <script>
            document.getElementById('downloadexcel').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#example-table"));
            });
        </script>

        <script>
            //This is the script to export the 2nd table on this page (The Patient List) as an csv (The same script for both tables on 1 page does not work)
            document.getElementById('downloadexcel1').addEventListener('click', function() {
                var table2excel = new Table2Excel();
                table2excel.export(document.querySelectorAll("#example-table1"));
            });
        </script>
    </div>
</body>

</html>