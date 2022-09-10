<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Clinical Studies List</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Clinical Studies List</h1>
    </div>
    <br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.html">Homepage</a>
            <a href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Patient%20Record%20List.php">Patient Record List</a>
            <a href="../Clinical%20Study%20form%20and%20list%20files/Clinical%20Studies%20List.php">Clinical Study List</a>
            <a href="../Trial%20Organisation%20form%20and%20files/Trial%20Organisation%20list.php">Trial
                Organisation List</a>
            <a href="../Patient%20Record%20Form%20and%20Patient%20Record%20List%20files/Observation%20and%20Treatment%20list.php">Obervation
                / Treatment List</a>
        </div>
    </div>
    <div class="container my-5">
        <h2> List of Clinical Studies </h2>
        <a class="btn btn-primary" href="/Group 2 Secret files/Group-2-s-Secret-files/clinicaltesting/Create a Clinical Study form.php" role="button">New Clinical Study </a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Clinical Study ID</th>
                    <th>Clincal Study Name / Expertise</th>
                    <th>Clinical Study Phase</th>
                    <th>Eligibility</th>
                    <th>Clinical Study description</th>
                    <th>Are Patients On Study?</th>
                    <th>Number of patients enrolled</th>
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
                $sql = "SELECT * FROM clinicalstudies";
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
                    <td>$row[studyID]</td>
                    <td>$row[studyExpertise]</td>
                    <td>$row[studyPhase]</td>
                    <td>$row[eligibility]</td>
                    <td>$row[clinicalStudyDescription]</td>
                    <td>$row[onStudy]</td>
                    <td>$row[patientsEnrolledNumber]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/Group 2 Secret files/Group-2-s-Secret-files/clinicaltesting/Edit Clinical Study.php?studyID = $row[studyID]'>Edit</a>
                        
                        <a class='btn btn-danger btn-sm' href='/clinicaltesting/deleteClinicalStudy.php?studyID = $row[studyID]'>Delete</a>
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
