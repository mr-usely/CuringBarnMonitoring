<?php
require_once("../../../../Initialization/initialize.php");

$response = "";
$farmer = $_POST['FarmerNo'];
$query = "Select DataStatus From tblCuringBarnTrialMonitoring Where DataStatus != 'SAVED' AND FarmerNo = '{$farmer}'";

$querydata = Dynaset::load($query);

while($row = mssql_fetch_assoc($querydata)){
    if($row['DataStatus'] != "SAVED"){
        $response = "UNSAVED";
    }
}

if($response == "UNSAVED"){
    echo "UNSAVED";
}
?>