<?php
if ( isset($_GET["observationandTreatmentID"]) )
{
    $observationandTreatmentID = $_GET["observationandTreatmentID"];

    $servername = "group2clinicaltesting.info"; // Our server is called localhost as the server is installed on this PC
    $username = "group2DBuser1"; // Our username is called root as that is the default username
    $password = "group2Rocks12345"; // Our Password is empty as default
    $database = "group2clinicaltesting"; // The database is known as group2clinicaltesting

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Delete from the clinicalstudies table the study with the specific study id!
    $sql = "DELETE FROM patientobservationandtreatment WHERE observationandtreatmentID=$observationandTreatmentID";
    $connection->query($sql);
}

//Send the user back to the list page
header("location: /clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationandTreatmentList.php");
exit;
