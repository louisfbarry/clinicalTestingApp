<?php
if ( isset($_GET["observationandTreatmentID"]) )
{
    $observationandTreatmentID = $_GET["observationandTreatmentID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clinicaltesting2";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Delete from the clinicalstudies table the study with the specific study id!
    $sql = "DELETE FROM patientobservationandtreatment WHERE observationandtreatmentID=$observationandTreatmentID";
    $connection->query($sql);
}

//Send the user back to the list page
header("location: /clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationandTreatmentList.php");
exit;
?>