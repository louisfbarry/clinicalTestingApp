<?php
if ( isset($_GET["trialOrgID"]) )
{
    $trialOrgID = $_GET["trialOrgID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "clinicaltesting2";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    //Delete from the clinicalstudies table the study with the specific study id!
    $sql = "DELETE FROM trialOrg WHERE trialOrgID=$trialOrgID";
    $connection->query($sql);
}

//Send the user back to the list page
header("location: /clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php");
exit;
?>