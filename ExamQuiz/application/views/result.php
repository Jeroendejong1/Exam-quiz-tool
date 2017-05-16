	<div class="row">
		<h1> Quiz Results </h1>
		<hr>
		<div class="col-lg-12"><h2 class="text-center"><strong>Passed/not passed</strong></h2></div>
			<div class= "col-lg-6">
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="padding-title">Results per subject</h3></div>
					<div class="panel-body" id="barchart_div"></div>
				</div>
			</div>	
			<div class= "col-lg-6">		
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="padding-title">Total result</h3></div>
					<div class="panel-body" id="piechart_div"></div>
				</div>
			</div>
	</div>
	<hr>
	<a class="btn btn-primary" href="index.php">Save as pdf</a>
	<a class="btn btn-primary" href="index.php">Check wrong answers</a>
	<a class="btn btn-primary" href="<?php echo base_url();?>index.php" style="float:right;">Back to Home</a>

	
	
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	// Load Charts and the corechart and barchart packages.
		google.charts.load('current', {'packages':['corechart']});
		google.charts.load('current', {'packages': ['corechart', 'bar']});
    // Draw the pie chart and bar chart when Charts is loaded.
		google.charts.setOnLoadCallback(drawChart);
		google.charts.setOnLoadCallback(drawBasic);

 function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Correct', 7],
          ['Wrong', 2],
        ]);

        // Set chart options
        var options = {'title':'',
                       'width':500,
                       'height':375,
					   'colors':['dodgerblue','orange']
					   };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        chart.draw(data, options);
      }

		
		function drawBasic() {
			var bardata = google.visualization.arrayToDataTable([
				['Subject', 'Score',],
				['Subject A', 75],
				['Subject B', 100],
				['Subject C', 60],
				['Subject D', 33]
				]);

			var options = {
					'title': '',
					'width':500,
					'height':375,
					'colors':['dodgerblue'],
					chartArea: {width: '50%'},
					hAxis: {
						title: '%',
						minValue: 0
					},
					vAxis: {
						title: 'Subject'
					}
			};
				
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(bardata, options);
      }
</script>