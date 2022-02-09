<?php
require_once("../../../../Initialization/initialize.php");

$pm                 = $_POST['PM'];
$farmerno           = $_POST['FarmerNo'];
$name               = $_POST['Name'];  
$farmaddress        = $_POST['FarmAddress'];
$harvestingdate     = $_POST['HarvestingDate'];
$monitoringdate     = $_POST['MonitoringDate'];
$curingstage        = $_POST['CuringStage'];
$rainfallreading    = $_POST['RainFallreading'];
$numberstalks       = $_POST['NumberStalks'];
$curingbarnID   = $_POST['CuringBarnID'];
$numberdaysinCb     = $_POST['NumberDaysInCB'];
$drybulb8           = $_POST['DryBulb8AM'];
$wetbulb8           = $_POST['WetBulb8AM'];
$pointspread8       = $_POST['PointSpread8AM'];
$actionplan8        = $_POST['ActionPlan8AM'];
$drybulb1           = $_POST['DryBulb1PM'];
$wetbulb1           = $_POST['WetBulb1PM'];
$pointspread1       = $_POST['PointSpread1PM'];
$actionplan1        = $_POST['ActionPlan1PM'];
$drybulb4           = $_POST['DryBulb4PM'];
$wetbulb4           = $_POST['WetBulb4PM'];
$pointspread4       = $_POST['PointSpread4PM'];
$actionplan4        = $_POST['ActionPlan4PM'];


$sql = "
    INSERT INTO tblCuringBarnTrialMonitoring (
                PM,
                BranchID,
                FarmerNo,
                Name,
                FarmAddress,
                HarvestingDate,
                MonitoringDate,
                CuringStage,
                RainFallReading,
                NumberStalks,
                CuringBarnID,
                NumberDaysInCB,
                DryBulb8AM,
                WetBulb8AM,
                PointSpread8AM,
                ActionPlan8AM,
                DryBulb1PM,
                WetBulb1PM,
                PointSpread1PM,
                ActionPlan1PM,
                DryBulb4PM,
                WetBulb4PM,
                PointSpread4PM,
                ActionPlan4PM,
                DataStatus
    ) VALUES (
                '{$pm}',
                'RM',
                '{$farmerno}',
                '{$name}',
                '{$farmaddress}',
                '{$harvestingdate}',
                '{$monitoringdate}',
                '{$curingstage}',
                {$rainfallreading},
                {$numberstalks},
                '{$curingbarnID}',
                {$numberdaysinCb},
                {$drybulb8},
                {$wetbulb8},
                {$pointspread8},
                '{$actionplan8}',
                {$drybulb1},
                {$wetbulb1},
                {$pointspread1},
                '{$actionplan1}',
                {$drybulb4},
                {$wetbulb4},
                {$pointspread4},
                '{$actionplan4}',
                'NOT SAVED'
    )
";

$execute = Dynaset::execute($sql);

if($execute){
    echo "Data Added";
}
?>