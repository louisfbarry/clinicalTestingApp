<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">
    <script src="/clinicalTestingWebsite/table2excel.js"></script>
</head>

<body>
    <div class="header">
            <a href = "Homepage.html"><img src="Images/Hospital Logo.jpg" alt="St George Logo"></a>
            <h1><a href="Homepage.html">Homepage</a></h1> 
    </div>
    <br><br>
    <div class="topnav">
        <div id="topnav">
            <a href="Homepage.html">Homepage</a>
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">Patient Record List</a>
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">Clinical Study List</a>
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">Trial Organisation
                List</a>
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder/observationAndTreatmentList.php">Observation
                / Treatment List</a>
        </div>
    </div>

    <div id="menu">
        <div class="column">
            <a href="/clinicalTestingWebsite/patientRecordsFolder/patientRecordList.php">
                <h2>Patient List</h2>
                <img alt="Patient Record List" src="Images\Patient record image.png" width="100" height="100">
            </a>
        </div>
        <div class="column">
            <a href="/clinicalTestingWebsite/observationAndTreatmentRecordFolder\observationAndTreatmentList.php">
                <h2>Observation and Treatment List</h2>
                <img alt="Observation / Treatment List" src="Images\observation.png" width="100" height="100">
            </a>

        </div>
    </div>
    <div id="menu">
        <div class="column">
            <a href="/clinicalTestingWebsite/clinicalStudiesFolder/clinicalStudyList.php">
                <h2>Clinical Studies List</h2>
                <img alt="ClinicalStudyList" src="Images\Clinical Studies List.png" width="100" height="100">
            </a>

        </div>

        <div class="column">
            <a href="/clinicalTestingWebsite/trialOrganisationsFolder/trialOrganisationsList.php">
                <h2>Trial Organisation List</h2>
                <img alt="TrialOrgList" src="Images\Trial Organisation list image.png" width="100" height="100">
            </a>

        </div>
    </div>
    <div class="textOnForm">
    <button type='button' id="downloadexcel" class='btn btn-success'>Export All lists to Excel</button>
    </div>
    <script>
        document.getElementById('downloadexcel').addEventListener('click', function () {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#example-table"));
        });
    </script>
</body>

</html>