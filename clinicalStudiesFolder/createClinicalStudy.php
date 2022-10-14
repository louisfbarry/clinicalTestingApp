<?php //Had to change the file type to php. This is so we can add php code!

$servername = "group2clinicaltesting.info"; // Our server is called localhost as the server is installed on this PC
$username = "group2DBuser1"; // Our username is called root as that is the default username
$password = "group2Rocks12345"; // Our Password is empty as default
$database = "group2clinicaltesting"; // The database is known as group2clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


//Initialising Variables for the form! We can now store them into the values of the form inputs
$studyExpertise = "";
$studyPhase = "";
$eligibility = "";
$clinicalStudyDescription = "";
$onStudy = "";
$patientsEnrolledNumber = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studyExpertise = $_POST["studyExpertise"];
    $studyPhase = $_POST["studyPhase"];
    $eligibility = $_POST["eligibility"];
    $clinicalStudyDescription = $_POST["clinicalStudyDescription"];
    $onStudy = $_POST["onStudy"];
    $patientsEnrolledNumber = $_POST["patientsEnrolledNumber"];

    do {
        if (
            empty($studyExpertise) || empty($studyPhase)
            || empty($eligibility) || empty($clinicalStudyDescription) || empty($onStudy) || empty($patientsEnrolledNumber)
        ) {
            $errorMessage = "All the fields are required";
            break;
        }
        $sql("SELECT studyExpertise FROM clinicalstudies");
        if ($result->num_rows <= 0) {
            $errorMessage = "A Clinical Study with that Title / Expertise already exists. Please try again with a New Clinical Study Title";
            break;
        } //Error message that displays if a clinical study already exists with that title

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
        $onStudy = "";
        $patientsEnrolledNumber = "";

        $successMessage = "Clinical Study added successfully";

        //To redirect the user back to the list page once a form is submitted
        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Create a Clinical Study Form</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="header">
        <a href="../Homepage.php">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Clinical Study Form</h1>
    </div>
    <br><br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.php">Homepage</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient
                Record
                List</a>
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical
                Study List</a>
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial
                Organisation List</a>
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Observation
                / Treatment List</a>
        </div>
    </div>
    <br>
    <br>
    <form method="post">
        <ul>
            <div class="textOnForm">
                <b>Clinical Study Information</b>
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
            <div class="inputBlackBorder">
                <form method="post">
                    <li>
                        <label for="studyExpertise">Clinical Trial Title / Expertise:</label>
                        <input type="text" id="studyExpertise" name="studyExpertise" placeholder="Enter the Title of the Clinical Study here with the Expertise." />
                    </li>
                    <li>
                        <label for="studyPhase">Clinical Study Phase:</label>
                        <input type="text" id="studyPhase" name="studyPhase" placeholder="Enter the phase of the Clinical Study here (1-5)" />
                    </li>
                    <li>
                        <label for="eligibility">Clinical Study Eligibility: </label>
                        <textarea id="eligibility" name=eligibility placeholder="E.g Patients must be 18 years old or greater"></textarea>
                    </li>
                    <li>
                        <label for="clinicalStudyDescription">Clinical Study Description:</label>
                        <textarea id="clinicalStudyDescription" name=clinicalStudyDescription placeholder="Enter the start time of the Clinical Trial here and any extra details worth noting."></textarea>
                    </li>

            </div>
            <br>
            <br>
            <div class="inputBlackBorder">
                <li>
                    <label> Patients on-study? (Yes/No)</label>
                    <input type="text" id="onStudy" name="onStudy" placeholder="Enter Yes or No here" />
                </li>

                <li>
                    <label> Number of Patients enrolled? </label>
                    <input type="text" id="patientsEnrolledNumber" name="patientsEnrolledNumber" placeholder="Enter the number of patients enrolled" />
                </li>
            </div>
            <br>
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
            <li>
                <div class="buttonHolder">
                    <button type="submit" class="btn btn-outline-success">Create Clinical Study</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php" role="button">Cancel</a>
                </div>
            </li>
        </ul>
    </form>
</body>

</html>