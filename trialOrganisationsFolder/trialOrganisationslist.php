<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Trial Organisations List</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Trial Organisations List</h1>
    </div>
    <br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.html">Homepage</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
            <a href="../Trial%20Organisation%20form%20and%20files/Trial%20Organisation%20list.php">Trial
                Organisation List</a>
            <a href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Observation%20and%20Treatment%20list.php">Obervation
                / Treatment List</a>
        </div>
    </div>
    <div class="container my-5">
        <h2> Trial Organisations List </h2>
        <a class="btn btn-primary" href="/clinicalTestingWebsite/trialOrganisationsFolder/createTrialOrganisation.php" role="button">New Trial Organisation </a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>trialOrgID</th>
                    <th>trialOrgName</th>
                    <th>trialOrgDesc</th>
                    <th>cExpertise</th>
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
                $sql = "SELECT * FROM trialorg";
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
                    <td>$row[trialOrgID]</td>
                    <td>$row[trialOrgName]</td>
                    <td>$row[trialOrgDesc]</td>
                    <td>$row[cExpertise]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/clinicalTestingWebsite/trialOrganisationsFolder/editTrialOrganisation.php?trialOrgID=$row[trialOrgID]'>Edit</a>
                        
                        <a class='btn btn-danger btn-sm' href='/clinicalTestingWebsite/trialOrganisationsFolder/deleteTrialOrganisation.php?trialOrgID=$row[trialOrgID]'>Delete</a>
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
