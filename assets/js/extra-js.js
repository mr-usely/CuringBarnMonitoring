jQuery(function(){
    var curingstage = "";

    // Load Farmer Records
    $('#searchable').load('pages/ajax/ajax_farmer_list.php?Superior='+$('#dashboard').data("superior"))


    // Apply Filter Button
    $('#filter').click(function(){
        // $('#dashboard').data("superior")
        farmerRecords('PEREZ, KATHLYN', $('#harvesting-date-filter').val(), $('#farmer-name-filter').val())
    })


    // Clear Filter Button
    $('#clear').click(function(){
        $('#harvesting-date-filter').val("%")
        $('#farmer-name-filter').val("")
    })


    // Add Button for Summary Report
    $('#add-summary').click(function(){
        $.ajax({
            url: 'pages/ajax/add_report.php',
            type: 'POST',
            data: {
                PM: $('#dashboard').data("superior"),
                FarmerNo: farmerNo,
                Name: $('#farmer-name').val(),
                FarmAddress: $('#farm-address').val(),
                HarvestingDate: $('#harvesting-date').val(),
                MonitoringDate: $('#monitoring-date').val(),
                CuringStage: curingstage,
                RainFallreading: $('#rain-fall-mm').val(),
                NumberStalks: $('#number-of-stalks').val(),
                CuringBarnID: $('#curing-barn-number').val(),
                NumberDaysInCB: $('#number-days-cb').val(),
                DryBulb8AM: $('#dry-bulb-8am').val(),
                WetBulb8AM: $('#wet-bulb-8am').val(),
                PointSpread8AM: $('#point-spread-8am').val(),
                ActionPlan8AM: $('#action-plan-8am').val(),
                DryBulb1PM: $('#dry-bulb-1pm').val(),
                WetBulb1PM: $('#wet-bulb-1pm').val(),
                PointSpread1PM: $('#point-spread-1pm').val(),
                ActionPlan1PM: $('#action-plan-1pm').val(),
                DryBulb4PM: $('#dry-bulb-4pm').val(),
                WetBulb4PM: $('#wet-bulb-4pm').val(),
                PointSpread4PM: $('#point-spread-4pm').val(),
                ActionPlan4PM: $('#action-plan-4pm').val()
            },
            success: function(data){
                console.log(data)
                if(data == "Data Added"){
                    $('#tbl-summary-report').load('pages/ajax/ajax_summary_report.php?FarmerNo='+farmerNo)
                    clearData()
                }
            }
        })
    })



    // ------ Getting the value of each radio buttons
    $('#flexRadioDefault1').click(function(){
        curingstage = $('#flexRadioDefault1').val()
    })

    $('#flexRadioDefault2').click(function(){
        curingstage = $('#flexRadioDefault2').val()
    })

    $('#flexRadioDefault3').click(function(){
        curingstage = $('#flexRadioDefault3').val()
    })
    // ------ End Radio Buttons ------- //

    
    // Save Curing Barn Monitoring Form
    $('#save-button').click(function(){
        $.ajax({
            url: 'pages/ajax/save_monitoring_data.php',
            type: 'POST',
            data: {FarmerNo: farmerNo},
            success: function(data){
                if(data == "SAVED"){
                    $('div.alert').hide()
                } else {
                }
            }
        })
    })


    // To generate value for the number of stalks and harvesting date.
    // note: for condition, if the response data is not empty then 
    // turn the number of stalks to read only and cannot be edited.
    // and turn the harvesting date into read only because it already encoded it's
    // final harvesting date.
    $('#curing-barn-number').change(function(){
        $.ajax({
            url: 'pages/ajax/check_data.php',
            type: 'POST',
            data: {
                FarmerNo: farmerNo,
                CuringBarnID: $('#curing-barn-number').val()
            },
            success: function(data){
                var val = data.split(",")
                if(val[0] != "" && val[1] != ""){
                    $('#number-of-stalks').prop('readonly', true)
                    $('#harvesting-date').prop('readonly', true)
                    $('#number-of-stalks').val(val[0])
                    $('#harvesting-date').val(val[1])
                } else {
                    $('#number-of-stalks').prop('readonly', false)
                    $('#harvesting-date').prop('readonly', false)
                    $('#number-of-stalks').val("")
                    $('#harvesting-date').val("")
                }
            }
        })
    })


    // To generate value for number of days in curing barn
    $('#monitoring-date').change(function(){
        var start = $('#harvesting-date').val()
        var end   = $('#monitoring-date').val()
        var diff  = new Date(Date.parse(end) - Date.parse(start))
        var days  = diff/1000/60/60/24;
        $('#number-days-cb').val(days)
    })


    // Farmer records function filter
    function farmerRecords(superior, harvestingDate, farmerName){
        var sup = superior.replace(/ /g,"%20")
        var farmer = farmerName.replace(/ /g, "%20")
        console.log('pages/ajax/ajax_farmer_list.php?Superior='+sup+'&HarvestingDate='+harvestingDate+'&FarmerName='+farmer)
        $('#searchable').load('pages/ajax/ajax_farmer_list.php?Superior='+sup+'&HarvestingDate='+harvestingDate+'&FarmerName='+farmer)
    }


   
});


 // function for clearing inputs
 function clearData(){
    $('#harvesting-date').val("");
    $('#monitoring-date').val("");
    $('#rain-fall-mm').val("");
    $('#number-of-stalks').val("");
    $('#curing-barn-number').val("");
    $('#number-days-cb').val("");
    $('#dry-bulb-8am').val("");
    $('#wet-bulb-8am').val("");
    $('#point-spread-8am').val("");
    $('#action-plan-8am').val("");
    $('#dry-bulb-4pm').val("");
    $('#wet-bulb-4pm').val("");
    $('#point-spread-4pm').val("");
    $('#action-plan-4pm').val("");
    $('#dry-bulb-1pm').val("");
    $('#wet-bulb-1pm').val("");
    $('#point-spread-1pm').val("");
    $('#action-plan-1pm').val("");
}
