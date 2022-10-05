<?php
//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


$studyID = "";
$studyExpertise = "";
$studyPhase = "";
$eligibility = "";
$clinicalStudyDescription = "";
$onStudy = "";
$patientsEnrolledNumber = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET Method: To show the data of the Clinical Trial

    // IF statement to see if the ID exists in the database. If it does not, the user is redirected back to the list page
    if (!isset($_GET["studyID"])) {
        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php");
        exit;
    }

    //If the ID does exist in the database, 
    $studyID = $_GET["studyID"];

    //Read the row of the selected client from the database table
    $sql = "SELECT * FROM clinicalstudies WHERE studyID = $studyID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc(); //This reads the data of the study from the database

    if (!$row) {
        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php");
        exit;
    }
    //These variables are already displayed in the form
    $studyExpertise = $row["studyExpertise"];
    $studyPhase = $row["studyPhase"];
    $eligibility = $row["eligibility"];
    $clinicalStudyDescription = $row["clinicalStudyDescription"];
    $onStudy = $row["onStudy"];
    $patientsEnrolledNumber = $row["patientsEnrolledNumber"];
} else {
    // POST method: to update the data of the Clinical Trial after it has been edited
    $studyID = $_POST["studyID"];
    $studyExpertise = $_POST["studyExpertise"];
    $studyPhase = $_POST["studyPhase"];
    $eligibility = $_POST["eligibility"];
    $clinicalStudyDescription = $_POST["clinicalStudyDescription"];
    $onStudy = $_POST["onStudy"];
    $patientsEnrolledNumber = $_POST["patientsEnrolledNumber"];

    do {
        if (
             empty($studyID) || empty($studyExpertise) || empty($studyPhase)
            || empty($eligibility) || empty($clinicalStudyDescription) || empty($onStudy) || empty($patientsEnrolledNumber)) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty\


        //Query to update the database
        $sql = "UPDATE clinicalstudies SET studyExpertise = '$studyExpertise', studyPhase = '$studyPhase', eligibility = '$eligibility', clinicalStudyDescription = '$clinicalStudyDescription', onStudy = '$onStudy', patientsEnrolledNumber = '$patientsEnrolledNumber' WHERE studyID = $studyID";


        $result = $connection->query($sql);

         //If we have any error during the SQL query, this error message is displayed
         if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Clinical Study updated correctly";

        header("location: /clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php");
        exit;

    } while (false);
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Edit Clinical Study Form</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="header">
        <a href="../Homepage.php">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Edit Clinical Study Form</h1>
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
                        <input type="hidden" name = "studyID" value="<?php echo $studyID; ?>">
                    </li>
                    <li>
                        <label for="studyExpertise">Clinical Trial Title / Expertise:</label>
                        <input type="text" id="studyExpertise" name="studyExpertise" value="<?php echo $studyExpertise; ?> " placeholder="Enter the Title of the Clinical Study here with the Expertise." />
                    </li>
                    <li>
                        <label for="studyPhase">Clinical Study Phase:</label>
                        <input type="text" id="studyPhase" name="studyPhase" value="<?php echo $studyPhase; ?>" placeholder="Enter the phase of the Clinical Study here (1-5)" />
                    </li>
                    <li>
                        <label for="eligibility">Clinical Study Eligibility:</label>
                        <textarea id="eligibility" name=eligibility placeholder="E.g Patients must be 18 years old or greater"><?php echo $eligibility;?></textarea>
                    </li>
                    <li>
                        <label for="clinicalStudyDescription">Clinical Study Description:</label>
                        <textarea id="clinicalStudyDescription" name=clinicalStudyDescription placeholder="Enter the start time of the Clinical Trial here and any extra details worth noting."><?php echo $clinicalStudyDescription;?></textarea>
                    </li>

            </div>
            <br>
            <br>
            <div class="inputBlackBorder">
                <li>
                    <label> Patients on-study? (Yes/No)</label>
                    <input type="text" id="onStudy" name="onStudy" placeholder="Enter Yes or No here" value="<?php echo $onStudy; ?> " />
                </li>

                <li>
                    <label> Number of Patients enrolled? </label>
                    <input type="text" id="patientsEnrolledNumber" name="patientsEnrolledNumber" value="<?php echo $patientsEnrolledNumber; ?> " placeholder="Enter the number of patients enrolled" />
                </li>
            </div>
            <br>
            <?php
            if (!empty($successMessage)) {
                //We use the javascript sourced from the Bootstrap website (See header) here. It allows us to remove the alerts once they have been read.
                echo "
                <div class = 'alert alert-success alert-dismissible fade show' role = 'alert'> 
                <strong> $successMessage</strong>
                <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button>
                </div>
                ";
            }
            ?>
            <li>
                <div class="buttonHolder">
                    <button type="submit" class="btn btn-outline-success">Edit Clinical Study</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php" role="button">Cancel</a>
                </div>
            </li>
        </ul>
    </form>
</body>

</html>
