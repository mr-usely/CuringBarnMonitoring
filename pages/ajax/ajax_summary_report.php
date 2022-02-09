<?php
require_once("../../../../Initialization/initialize.php");

$farmerNo = $_GET['FarmerNo'];

$sql = "Select MonitoringDate,
            CuringBarnID,
            NumberDaysInCB,
            CuringStage,
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
            ActionPlan4PM
From tblCuringBarnTrialMonitoring
Where FarmerNo = '{$farmerNo}'
";

$data = Dynaset::load($sql);

while($row = mssql_fetch_assoc($data)){

?>

<tr class="table-summary">
    <td><?php echo $row['MonitoringDate']; ?></td>
    <td><?php echo $row['CuringBarnID']; ?></td>
    <td><?php echo $row['NumberDaysInCB']; ?></td>
    <td><?php echo $row['CuringStage']; ?></td>
    <td><?php echo $row['DryBulb8AM']; ?></td>
    <td><?php echo $row['WetBulb8AM']; ?></td>
    <td><?php echo $row['PointSpread8AM']; ?></td>
    <td><?php echo $row['ActionPlan8AM']; ?></td>
    <td><?php echo $row['DryBulb1PM']; ?></td>
    <td><?php echo $row['WetBulb1PM']; ?></td>
    <td><?php echo $row['PointSpread1PM']; ?></td>
    <td><?php echo $row['ActionPlan1PM']; ?></td>
    <td><?php echo $row['DryBulb4PM']; ?></td>
    <td><?php echo $row['WetBulb4PM']; ?></td>
    <td><?php echo $row['PointSpread4PM']; ?></td>
    <td><?php echo $row['ActionPlan4PM']; ?></td>
</tr>

<?php
}
?>