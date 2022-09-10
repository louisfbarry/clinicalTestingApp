<?php
if ( isset($_GET["studyID"]) )
{
    $studyID = $_GET["studyID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clinicaltesting2";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Delete from the clinicalstudies table the study with the specific study id!
    $sql = "DELETE FROM clinicalstudies WHERE studyID=$studyID";
    $connection->query($sql);
}

//Send the user back to the list page
header("location: /clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php");
exit;
?>