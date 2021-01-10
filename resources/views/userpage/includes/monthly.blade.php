<div id="monthlyeventreport" class="my-3" style="height: 300px; width: 100%;"></div>
<div id="monthlyittraining" class="my-3" style="height: 300px; width: 100%;"></div>
<div id="monthlyaccr" class="my-3" style="height: 300px; width: 100%;"></div>

<script type="text/javascript">
  $(document).ready(function () {
	
	monthlyreport();
    
      $(document).on('change', '#submitmonthly', function(event){
        event.preventDefault();
        $('.monthlyshow').html('');
        $.ajax({
          url:"/monthlyreport",
          type:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data){
          
          $('.monthlyshow').html(data);
          
          // anualreport();

          }
        });
      });

      $('.monthly').datepicker({
            minViewMode: 1,
            format: 'yyyy-mm'
      });


    
        
      


      function monthlyreport(){
        //event graph report
        var pending =   {{ count($monthevent->where('event_registration_status', 1)) }};
        var audition =  {{ count($monthevent->where('event_registration_status', 2)) }};
        var passed =    {{ count($monthevent->where('event_registration_status', 3)) }};
        var failed =    {{ count($monthevent->where('event_registration_status', 4)) }};

        var total = parseInt(pending+audition+passed+failed);

        var pendingPercent = (pending/total)*100; 
        var auditionPercent = (audition/total)*100; 
        var passedPercent = (passed/total)*100; 
        var failedPercent = (failed/total)*100; 

        var finalpending = pendingPercent.toString().substr(0, 5);
        var finalaudition = auditionPercent.toString().substr(0, 5);
        var finalpassed = passedPercent.toString().substr(0, 5);
        var finalfailed = failedPercent.toString().substr(0, 5);

        
        
        var chart = new CanvasJS.Chart("monthlyeventreport", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: true,
          title: {
            text: "Anilag Event Report for the Month of {{ \Carbon\Carbon::parse($month)->format('M Y')}} "
          },

          data: [{
            type: "bar",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{} ",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
              { color:"#f5365c", y: parseFloat(finalfailed), label: "Failed" },
              { color:"#2dce89", y: parseFloat(finalpassed), label: "Passed" },
              { color:"#fb6340", y: parseFloat(finalaudition), label: "For Screening" },
              { color:"#172b4d", y: parseFloat(finalpending), label: "Pending Applicant" },
            ]
          }]
        });
        chart.render();




        //it training graph report
        var itpending =   {{ count($monthtesda->where('tesda_status', 1)) }};
        var unfinish =  {{ count($monthtesda->where('tesda_status', 2)) }};
        var completed =    {{ count($monthtesda->where('tesda_status', 3)) }};

        var total1 = parseInt(itpending+unfinish+completed);

        var pendingPercentIT = (itpending/total1)*100; 
        var unfinishpercent = (unfinish/total1)*100; 
        var completedPercent = (completed/total1)*100; 

        var finalpendingIT = pendingPercentIT.toString().substr(0, 5);
        var finalunfinish = unfinishpercent.toString().substr(0, 5);
        var finalcompleted = completedPercent.toString().substr(0, 5);

        

        var chart = new CanvasJS.Chart("monthlyittraining", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: true,
          title: {
            text: "IT Training Program Report for the Month of {{ \Carbon\Carbon::parse($month)->format('M Y')}}"
          },

          data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{} ",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
              { color:"#2dce89", y: parseFloat(finalcompleted), label: "Completed Trainees" },
              { color:"#fb6340", y: parseFloat(finalunfinish), label: "Unfinish Trainees" },
              { color:"#172b4d", y: parseFloat(finalpendingIT), label: "Pending Applicant" },
            ]
          }]
        });
        chart.render();






        //accreditation graph report
        var pendingAcc =   {{ count($monthaccreditation->where('status', 0)) }};
        var accredited =  {{ count($monthaccreditation->where('status', 1)) }};
        var renewal =    {{ count($monthaccreditation->where('status', 2)) }};
        var approval =    {{ count($monthaccreditation->where('status', 3)) }};

        var total2 = parseInt(pendingAcc+accredited+renewal+approval);

        var pendingPercentAcc = (pendingAcc/total2)*100; 
        var accreditedPercent = (accredited/total2)*100; 
        var renewalPercent = (renewal/total2)*100; 
        var approvalPercent = (approval/total2)*100; 

        var finalpendingAcc = pendingPercentAcc.toString().substr(0, 5);
        var finalAccredited = accreditedPercent.toString().substr(0, 5);
        var finalrenewal = renewalPercent.toString().substr(0, 5);
        var finalapproval = approvalPercent.toString().substr(0, 5);

        

        var chart = new CanvasJS.Chart("monthlyaccr", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: true,
          title: {
            text: "Accreditation Report for the Month of {{ \Carbon\Carbon::parse($month)->format('M Y')}} "
          },

          data: [{
            type: "column",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{} ",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: [
              { color:"#172b4d", y: parseFloat(finalpendingAcc), label: "Pending Applicant" },
              { color:"#2dce89", y: parseFloat(finalAccredited), label: "Accredited" },
              { color:"#f5365c", y: parseFloat(finalrenewal), label: "For Renewal" },
              { color:"#5e72e4", y: parseFloat(finalapproval), label: "For approval of renewal" },
              
              
              
            ]
          }]
        });
        chart.render();
      }

    
  });
            
  </script>