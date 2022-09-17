<?php
//To connect the form to the database
$servername = "localhost"; // Our server is called localhost as the server is installed on this PC
$username = "root"; // Our username is called root as that is the default username
$password = ""; // Our Password is empty as default
$database = "clinicaltesting2"; // The database is known as clinicaltesting

// Create a connection to the database
$connection = new mysqli($servername, $username, $password, $database);

$patientID = "";
$familyName = "";
$givenName = "";
$dob = "";
$address = "";
$sex = "";
$weight = "";
$height = "";
$medicalHistory = "";
$allergies = "";
$clinicalStudyID = "";
$clinicalStudyName = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET Method: To show the data of the Clinical Trial

    // IF statement to see if the ID exists in the database. If it does not, the user is redirected back to the list page
    if (!isset($_GET["patientID"])) {
        header("location: /clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php");
        exit;
    }

    //If the ID does exist in the database, 
    $patientID = $_GET["patientID"];

    //Read the row of the selected client from the database table
    $sql = "SELECT * FROM patientRecords WHERE patientID = $patientID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc(); //This reads the data of the study from the database

    if (!$row) {
        header("location: /clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php");
        exit;
    }
    //These variables are already displayed in the form
    $familyName = $row["familyName"];
    $givenName = $row["givenName"];
    $dob = $row["dob"];
    $address = $row["address"];
    $sex = $row["sex"];
    $weight = $row["weight"];
    $height = $row["height"];
    $medicalHistory = $row["medicalHistory"];
    $allergies = $row["allergies"];
    $clinicalStudyID = $row["clinicalStudyID"];
    $clinicalStudyName = $row["clinicalStudyName"];
} else {
    // POST method: to update the data of the Clinical Trial after it has been edited
    $patientID = $_POST["patientID"];
    $familyName = $_POST["familyName"];
    $givenName = $_POST["givenName"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $sex = $_POST["sex"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $medicalHistory = $_POST["medicalHistory"];
    $allergies = $_POST["allergies"];
    $clinicalStudyID = $_POST["clinicalStudyID"];
    $clinicalStudyName = $_POST["clinicalStudyName"];

    do {
        if (
            empty($patientID) || empty($familyName) || empty($givenName) || empty($dob) || empty($address) || empty($sex) || empty($weight) || empty($height) || empty($medicalHistory)
            || empty($allergies) || empty($clinicalStudyID) || empty($clinicalStudyName)
        ) {
            $errorMessage = "All the fields are required";
            break;
        } //Error message that displays if any are the inputs are submitted empty

        //Query to update the database
        $sql = "UPDATE patientRecords SET familyName = '$familyName', givenName = '$givenName', dob = '$dob', address = '$address', sex = '$sex', weight = '$weight' WHERE patientID = $patientID";


        $result = $connection->query($sql);

        //If we have any error during the SQL query, this error message is displayed
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Patient updated correctly";

        header("location: /clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php");
        exit;
    } while (false);
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Patient Medical Record</title>
    <style>
        li {
            overflow: hidden
        }

        fieldset {
            overflow: hidden
        }

        .select {
            float: left;
            clear: none;
        }

        label {
            float: left;
            clear: none;
            display: block;
            padding: 0px 1em 0px 8px;
        }

        input[type=radio],
        input.radio {
            clear: none;
            width: auto;

        }
    </style>
</head>

<body>
    <div class="header">
        <a href="../Homepage.html">
            <img src="../Images/Hospital Logo.jpg" alt="St George Logo"></a>
        <h1><a href="Homepage.html">Create A Patient Medical Record</a></h1>
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

    <br><br>

    <form method="post">
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
        <ul>
            <!-- <li>
				<a href="Patient Record List.html">Back to Patient Record List</a>
			</li> -->
            <li>
                <input type="hidden" name="patientID" value="<?php echo $patientID; ?>">
            </li>
            <li>

                <label for="familyName">Family Name:</label>
                <input type="text" id="familyName" name="familyName" value="<?php echo $familyName; ?> " placeholder="Enter family name">
            </li>
            <li>
                <label for="givenName">Given Names:</label>
                <input type="text" id="givenName" name="givenName" value="<?php echo $givenName; ?> " placeholder="Enter given names">
            </li>
            <li>
                <label for="DOB">Date of birth:</label>
                <input type="date" name="dob" value="<?php echo $dob; ?>">
            </li>
            <li>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?> " placeholder="Enter address">
            </li>
            <li>
                <label for="sex">Gender:</label>
                <label for="male">
                    <input type="radio" name="sex" id="male" value="<?php echo $sex; ?> " checked /><span>Male</span>
                </label>
                <label for="female">
                    <input type="radio" name="sex" id="female" value="<?php echo $sex; ?> " checked /><span>Female</span>
                </label>
            </li>
            <li>
                <label for="weight">Weight:</label>
                <input type="text" id="weight" name="weight" value="<?php echo $weight; ?> " placeholder="Enter weight in kilograms">
            </li>
            <li>
                <label for="height">Height:</label>
                <input type="text" id="height" name="height" value="<?php echo $height; ?>" placeholder="Enter height in centimeters">
            </li>
            <li>
                <label for="medicalHistory">Medical History:</label>
                <textarea id="medicalHistory" name="medicalHistory" placeholder="Enter patient medical history"> <?php echo $medicalHistory; ?></textarea>
            </li>
            <li>
                <label for="allergies">Allergies:</label>
                <textarea id="allergies" name="allergies" placeholder="Enter a list of allergies"> <?php echo $allergies; ?> </textarea>
            </li>
            <li>
                <label for="clinicalStudyID">Clinical Study ID:</label>
                <input type="text" id="clinicalStudyID" name="clinicalStudyID" value="<?php echo $clinicalStudyID; ?>">
            </li>
            <li>
                <label for="clinicalStudyName">Clinical Study Name:</label>
                <input type="text" id="clinicalStudyName" name="clinicalStudyName" value="<?php echo $clinicalStudyName; ?>">
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
                    <button type="submit" class="btn btn-outline-success">Edit Patient Record</button>
                    <a class="btn btn-outline-danger" href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php" role="button">Cancel</a>
            <li>
                <div class="buttonHolder">
                    <input type="submit" value="Create Patient Record">
                </div>
            </li>
        </ul>
    </form>
</body>

</html>