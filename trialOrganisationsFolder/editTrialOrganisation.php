<?php
//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);


$trialOrgID = "";
$trialOrgName = "";
$trialOrgDesc = "";
$cExpertise = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET Method: To show the data of the Clinical Trial

    // IF statement to see if the ID exists in the database. If it does not, the user is redirected back to the list page
    if (!isset($_GET["trialOrgID"])) {
        header("location: /clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php");
        exit;
    }

    //If the ID does exist in the database, 
    $trialOrgID = $_GET["trialOrgID"];

    //Read the row of the selected client from the database table
    $sql = "SELECT * FROM trialOrg WHERE trialOrgID = $trialOrgID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc(); //This reads the data of the study from the database

    if (!$row) {
        header("location: /clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php");
        exit;
    }
    //These variables are already displayed in the form
    $trialOrgName = $row["trialOrgName"];
    $trialOrgDesc = $row["trialOrgDesc"];
    $cExpertise = $row["cExpertise"];
} else {
    // POST method: to update the data of the Clinical Trial after it has been edited
    $trialOrgID = $_POST["trialOrgID"];
    $trialOrgName = $_POST["trialOrgName"];
    $trialOrgDesc = $_POST["trialOrgDesc"];
    $cExpertise = $_POST["cExpertise"];


    do {
        if (
             empty($trialOrgID) || empty($trialOrgName) || empty($trialOrgDesc) || empty($cExpertise)) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty\


        //Query to update the database
        $sql = "UPDATE trialOrg SET trialOrgName = '$trialOrgName', trialOrgDesc = '$trialOrgDesc', cExpertise = '$cExpertise' WHERE trialOrgID = $trialOrgID";


        $result = $connection->query($sql);

         //If we have any error during the SQL query, this error message is displayed
         if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Trial Organisation updated correctly";

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
        <h1>Edit Trial Organisation form</h1>
    </div>
    <br><br>
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
            <input type="hidden" name="trialOrgID" value = <?php echo $trialOrgID;?> />
            <li>
                <label for="trialOrgName">Trial Organisation Name:</label>
                <input type="text" id="trialOrgName" name="trialOrgName" value = <?php echo $trialOrgName;?> />
            </li>
            <li>

            </li>
            <li>
                <label for="trialOrgDesc">Trial Organisation Description</label>
                <textarea id="trialOrgDesc" name="trialOrgDesc" placeholder="Enter any extra details about the Trial Organisation here"><?php echo $trialOrgDesc;?></textarea>
            </li>
            <li>
                <label for="cExpertise">Clinical Trial Expertise:</label>
                <textarea id="cExpertise" name="cExpertise" placeholder="Enter the Expertise of the Clinical Trials here E.g Caridology"><?php echo $cExpertise;?></textarea>
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
                    <button type="submit" class="btn btn-outline-success">Edit Trial Organisation</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Cancel</a>
                </div>
            </li>
        </ul>
    </form>
</body>

</html>