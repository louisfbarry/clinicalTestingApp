<?php //Had to change the file type to php. This is so we can add php code!

//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


//Initialising Variables for the form! We can now store them into the values of the form inputs
$trialOrgName = "";
$trialOrgDesc = "";
$cExpertise = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trialOrgName = $_POST["trialOrgName"];
    $trialOrgDesc = $_POST["trialOrgDesc"];
    $cExpertise = $_POST["cExpertise"];

    do {
        if (
            empty($trialOrgName) || empty($trialOrgDesc) || empty($cExpertise)
        ) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty

        // to add a new client to the database\

        //Inserting values inputted into our database table!

        $sql = "INSERT INTO trialOrg (trialOrgName, trialOrgDesc, cExpertise) " .
            "VALUES ('$trialOrgName','$trialOrgDesc','$cExpertise')";
        //Now excuting the sql query
        $result = $connection->query($sql);

        //If we have any error during the SQL query, this error message is displayed
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }


        $trialOrgName = "";
        $trialOrgDesc = "";
        $cExpertise = "";

        $successMessage = "Trial Organisation added successfully";

        //To redirect the user back to the list page once a form is submitted
        header("location: /clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Create a Trial Organisation form</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1>Trial Organisation form</h1>
    </div>
    <br>
    <div class="topnav">
        <div id="topnav">
            <a href="../Homepage.html">Homepage</a>
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
                <b>Trial Organisation Information</b>
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
            <li>
                <label for="trialOrgName">Trial Organisation Name:</label>
                <input type="text" id="trialOrgName" name="trialOrgName" />
            </li>
            <li>

            </li>
            <li>
                <label for="trialOrgDesc">Trial Organisation Description</label>
                <textarea id="trialOrgDesc" name="trialOrgDesc" placeholder="Enter any extra details about the Trial Organisation here"></textarea>
            </li>
            <li>
                <label for="cExpertise">Clinical Trial Expertise: :</label>
                <textarea id="cExpertise" name="cExpertise" placeholder="Enter the Expertise of the Clinical Trials here E.g Caridology"></textarea>
            </li>
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
                    <button type="submit" class="btn btn-outline-success">Create Trial Organisation</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Cancel</a>
                </div>
            </li>
        </ul>
    </form>
</body>

</html>