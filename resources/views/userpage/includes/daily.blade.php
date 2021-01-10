<div id="dailyeventreport" class="my-3" style="height: 300px; width: 100%;"></div>
<div id="dailyittraining" class="my-3" style="height: 300px; width: 100%;"></div>
<div id="dailyaccr" class="my-3" style="height: 300px; width: 100%;"></div>

<script type="text/javascript">
  $(document).ready(function () {
	
	dailyreport();
    
      $(document).on('change', '#submitdaily', function(event){
        event.preventDefault();
        $('.dailyshow').html('');
        $.ajax({
          url:"/dailyreport",
          type:"POST",
          data: new FormData(this),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data){
          
          $('.dailyshow').html(data);
          
          // anualreport();

          }
        });
      });

      $('.daily').datepicker({
            minViewMode: 0,
            format: 'yyyy-mm-dd'
      });


    
        
      


      function dailyreport(){
        //event graph report
        var pending =   {{ count($dayevent->where('event_registration_status', 1)) }};
        var audition =  {{ count($dayevent->where('event_registration_status', 2)) }};
        var passed =    {{ count($dayevent->where('event_registration_status', 3)) }};
        var failed =    {{ count($dayevent->where('event_registration_status', 4)) }};

        var total = parseInt(pending+audition+passed+failed);

        var pendingPercent = (pending/total)*100; 
        var auditionPercent = (audition/total)*100; 
        var passedPercent = (passed/total)*100; 
        var failedPercent = (failed/total)*100; 

        var finalpending = pendingPercent.toString().substr(0, 5);
        var finalaudition = auditionPercent.toString().substr(0, 5);
        var finalpassed = passedPercent.toString().substr(0, 5);
        var finalfailed = failedPercent.toString().substr(0, 5);

        
        
        var chart = new CanvasJS.Chart("dailyeventreport", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: true,
          title: {
            text: "Anilag Event Report for {{ \Carbon\Carbon::parse($day)->format('M d, Y')}} "
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
        var itpending =   {{ count($daytesda->where('tesda_status', 1)) }};
        var unfinish =  {{ count($daytesda->where('tesda_status', 2)) }};
        var completed =    {{ count($daytesda->where('tesda_status', 3)) }};

        var total1 = parseInt(itpending+unfinish+completed);

        var pendingPercentIT = (itpending/total1)*100; 
        var unfinishpercent = (unfinish/total1)*100; 
        var completedPercent = (completed/total1)*100; 

        var finalpendingIT = pendingPercentIT.toString().substr(0, 5);
        var finalunfinish = unfinishpercent.toString().substr(0, 5);
        var finalcompleted = completedPercent.toString().substr(0, 5);

        

        var chart = new CanvasJS.Chart("dailyittraining", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: true,
          title: {
            text: "IT Training Program Report for {{ \Carbon\Carbon::parse($day)->format('M d, Y')}} "
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
        var pendingAcc =   {{ count($dayaccreditation->where('status', 0)) }};
        var accredited =  {{ count($dayaccreditation->where('status', 1)) }};
        var renewal =    {{ count($dayaccreditation->where('status', 2)) }};
        var approval =    {{ count($dayaccreditation->where('status', 3)) }};

        var total2 = parseInt(pendingAcc+accredited+renewal+approval);

        var pendingPercentAcc = (pendingAcc/total2)*100; 
        var accreditedPercent = (accredited/total2)*100; 
        var renewalPercent = (renewal/total2)*100; 
        var approvalPercent = (approval/total2)*100; 

        var finalpendingAcc = pendingPercentAcc.toString().substr(0, 5);
        var finalAccredited = accreditedPercent.toString().substr(0, 5);
        var finalrenewal = renewalPercent.toString().substr(0, 5);
        var finalapproval = approvalPercent.toString().substr(0, 5);

        

        var chart = new CanvasJS.Chart("dailyaccr", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: true,
          title: {
            text: "Accreditation Report for {{ \Carbon\Carbon::parse($day)->format('M d, Y')}} "
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