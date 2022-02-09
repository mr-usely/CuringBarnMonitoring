<?php
require_once("../../../../Initialization/initialize.php");

$farmerNo           = $_POST['FarmerNo'];
$curingBarnID       = $_POST['CuringBarnID'];

$sql = "Select NumberStalks, CONVERT(date, HarvestingDate) HarvestingDate From tblCuringBarnTrialMonitoring Where FarmerNo = '{$farmerNo}' AND CuringBarnID = '{$curingBarnID}'";
$data = Dynaset::load($sql);
$row = mssql_fetch_assoc($data);

echo $row['NumberStalks'].",".$row['HarvestingDate'];
?>