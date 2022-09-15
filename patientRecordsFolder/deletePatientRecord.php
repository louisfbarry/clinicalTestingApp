<?php
if ( isset($_GET["patientID"]) )
{
    $patientID = $_GET["patientID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clinicaltesting2";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Delete from the clinicalstudies table the study with the specific study id!
    $sql = "DELETE FROM patientrecords WHERE patientID=$patientID";
    $connection->query($sql);
}

//Send the user back to the list page
header("location: /clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php");
exit;
?>