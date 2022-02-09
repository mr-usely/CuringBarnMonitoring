<?php
require_once("../../../../Initialization/initialize.php");

$farmerno = $_POST['FarmerNo'];

$sql = "Update tblCuringBarnTrialMonitoring Set DataStatus = 'SAVED' Where FarmerNo IN
(Select FarmerNo From tblCuringBarnTrialMonitoring Where DataStatus != 'SAVED' AND FarmerNo = '{$farmerno}')";

$data = Dynaset::execute($sql);

if($data){
    echo "SAVED";
}
?>