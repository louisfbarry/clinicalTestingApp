<?php
if ( isset($_GET["observationID"]) )
{
    $studyID = $_GET["observationID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clinicaltesting2";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Delete from the clinicalstudies table the study with the specific study id!
    $sql = "DELETE FROM patientobservationandtreatment WHERE observationID=$observationID";
    $connection->query($sql);
}

//Send the user back to the list page
header("location: /clinicalTestingWebsite/observationAndTreatmentRecordFolder/recordObservationandTreatment.php");
exit;
?>