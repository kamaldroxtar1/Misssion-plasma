@extends('master')
@section('body')
<div class="content-wrapper">
    <div class="container">
    <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Status', 'Numbers', { role: 'style' }],
         ['Donor',<?=$donor?>,'green'],
         ['Requester',<?=$requester?>,'red']
      ]);
        var options = {
          title: 'Total Number of Donors & Requesters'
        };

        var chart = new google.visualization.BarChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" class="container text-center pt-4" style="width: 900px; height: 300px"></div>
  </body>
</html>

<div class="row">
    <div class="col-6">
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
        
                var data = google.visualization.arrayToDataTable([
                  ['State', 'Donors'],
                  <?php echo $donorData?>
                ]);
        
                var options = {
                  title: 'No of Donors Statewise'
                };
        
                var chart = new google.visualization.PieChart(document.getElementById('donorchart'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="donorchart" class="container py-5" style="width: 600px; height: 400px;"></div>
            <div class="text-center pb-3"><h3>State Wise Donors Data</h3></div>
          </body>
        </html>
    </div>
    
    <div class="col-6">
        <html>
          <head>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
        
              function drawChart() {
        
                var data = google.visualization.arrayToDataTable([
                  ['State', 'Requesters'],
                  <?php echo $requesterData?>
                ]);
        
                var options = {
                  title: 'No of Requesters Statewise'
                };
        
                var chart = new google.visualization.PieChart(document.getElementById('requestchart'));
        
                chart.draw(data, options);
              }
            </script>
          </head>
          <body>
            <div id="requestchart" class="container py-5" style="width: 600px; height: 400px;"></div>
            <div class="text-center pb-3"><h3>State Wise Requesters Data</h3></div>
          </body>
        </html>
    </div>
</div>
    </div>
</div>
@endsection()