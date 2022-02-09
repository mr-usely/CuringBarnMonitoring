<?php
require_once("../../../../Initialization/initialize.php");

$superior           = $_GET['Superior'];
$harvestingDate     = $_GET['HarvestingDate'];
$FarmerName         = $_GET['FarmerName'];

$filter = ($harvestingDate == "" && $FarmerName == "") ? " AND ProjectManager Like '%PEREZ%'" : " AND ProjectManager Like '%{$superior}%' AND (Name = '{$FarmerName}' OR HSDateEntry Like '%{$harvestingDate}%')";

$sql = "Select TOP 10 A.FarmerNo, Name, FarmAddress, HSDateEntry HarvestingDate, MonitoringDate, CuringStage, RainFallReading, ISNULL(DataStatus, 'No Data Saved') DataStatus From tblULFS A
    Left Join ( Select FarmerNo, HSDateEntry From tblChecklistDetails ) B ON B.FarmerNo = A.FarmerNo
    Left Join ( Select FarmerNo, MonitoringDate, CuringStage, RainFallReading, DataStatus From tblCuringBarnTrialMonitoring ) C On C.FarmerNo = A.FarmerNo
    Where BackOut = 0 and ApprovalStatus = 'APPROVED'".$filter;

    $data = Dynaset::load($sql);
    while($row = mssql_fetch_assoc($data)){

?>

<tr class="table-row" data-farmerno="<?php echo $row['FarmerNo']; ?>" style="cursor: pointer;">
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['FarmAddress']; ?></td>
    <td><?php echo ($row['HarvestingDate'] == "") ? "0000-00-00" : $row['HarvestingDate']; ?></td>
    <td><?php echo ($row['DataStatus'] != "NOT SAVED" && $row['DataStatus'] != "No Data Saved") ? $row['MonitoringDate'] : ""; ?></td>
    <td><?php echo ($row['DataStatus'] != "NOT SAVED" && $row['DataStatus'] != "No Data Saved") ? $row['CuringStage'] : ""; ?></td>
    <td><?php echo ($row['DataStatus'] != "NOT SAVED" && $row['DataStatus'] != "No Data Saved") ? $row['RainFallReading'] : ""; ?></td>
</tr>

<?php

    }

?>

<script>

    var farmerNo = '';

    openEachModal();

    function openEachModal(){
        $('tr.table-row').each(function(){
            $(this).click(function(){
                $('#encoding-modal-form').modal('show')
                $('#farmer-name').val($(this).find('td:nth-child(1)').html())
                $('#farm-address').val($(this).find('td:nth-child(2)').html())
                $('#harvesting-date').val($(this).find('td:nth-child(3)').html())
                farmerNo = $(this).data("farmerno")
                $('#tbl-summary-report').load('pages/ajax/ajax_summary_report.php?FarmerNo='+farmerNo)
                clearData()

                // Check if there's unsaved data from the farmers record
                $.ajax({
                    url: 'pages/ajax/check_saved_data.php',
                    type: 'POST',
                    data: {FarmerNo: farmerNo},
                    success: function(data){
                        if(data == "UNSAVED"){
                            $('div.alert').show()
                        } else {
                            $('div.alert').hide()
                        }
                    } 
                })
            })
        }); 
    }
</script>