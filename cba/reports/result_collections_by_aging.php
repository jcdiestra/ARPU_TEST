<?php 
include 'head_navbar.php';
?>


<div class="container">
	<div class="starter">
		<h2>Collections by Agings - <?php echo $operator ?></h2>	
		<h3>
			<?php echo $country ?>
		</h3>

		<!--/<div id="container" style="width:100%; height:400px;"></div>		
		</div>    This was used for the chart-->

	</div>


	<div class="container" style="zoom: 1; overflow: auto;">
		<table id='myTable' class="display table table-bordered table-striped" style="font-size: 12px;"> 
			<thead> 
				<tr>
				
					<?php				for ($i=0; $i < $numfields; $i++) // Header
							echo "<th>".mysql_field_name($result, $i)."</th>"; 

		?>
				</tr>
			</thead>

			<tbody>

						<?php				   
						   for ($i=0; $i < $num_rows; $i++){
						   echo "<tr>";
							for($a=0; $a < $numfields; $a++){
						   echo "<td>" . $dataArrayTotal[$i][$a] . "</td>";};}	
					?>


			</tbody>
		</table>

		
</div>
<div class="col-xs-5 col-xs-offset-3">
				<br>
				</div>

<div class="col-xs-5">
			<button class="btn btn-success" id='1'>Export to Excel</button>
			<br>
			</div>

			
			</div>






						<!-- /.container -->


						<!-- Bootstrap core JavaScript
    ================================================== -->
						<!-- Placed at the end of the document so the pages load faster -->
						<script src="../bootstrap/js/jquery-2.2.0.min.js"/></script>
						<script src="../jquery_sorter/jquery.tablesorter.js"/></script>
						<script src="../bootstrap/js/jquery.table2excel.min.js"/></script>
						<script src="../highcharts/js/highcharts.js"/></script>
						<script src="../jquery_sorter/addons/pager/jquery.tablesorter.pager.js"/></script>
						<script src="../bootstrap/js/bootstrap.min.js"/></script>
						<script src="../bootstrap/js/bootstrap-select.js"/></script>
						<script src="../jquery_sorter/jquery.tablesorter.widgets.js"/></script>
						<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      					<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
						<script>
$(document).ready(function() 
			{	
				$("#myTable").DataTable({
					"bPaginate": false,
			        "bFilter": false,
			        "bInfo": false,
			        fixedHeader: true
				});
	
			} 
		);  

		
			$("button").on('click',function(){
				if (this.id='1'){

		  $("#myTable").table2excel({
			// exclude CSS class
			exclude: ".noExl",
			name: "Export"
				})}

				if (this.id='2'){

		  $("#myTable_2").table2excel({
			// exclude CSS class
			exclude: ".noExl",
			name: "Export"
				})}
				; 
		}); 

		
						</script>

						<script>
	/* function myFunction() {
    window.location.href = "test/cancelations_stats_complete.php";
	}
	window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js">
								<\/script>')

	var chart = new Highcharts.Chart({
      chart: {
         renderTo: 'container'
      },

	  xAxis: {
			type: 'String',
			categories: <?php echo json_encode($dataX0array); ?>,			
			},

									<?php $monthName = date("F", mktime(0, 0, 0, $month, 10));?>

	   title: {
            text: '<?php echo $country_name ?> ARPU REPORT'
        },

      series: [{
            name: 'Total Cancellations',            
			data: <?php echo json_encode($dataY1array,JSON_NUMERIC_CHECK) ?>,			
        },

		{
            name: 'Inmediate Cancellations',            
			data: <?php echo json_encode($dataY2array,JSON_NUMERIC_CHECK) ?>,			
        }

		]


      }


	);


	*/
								</script>



							</body>
						</html>