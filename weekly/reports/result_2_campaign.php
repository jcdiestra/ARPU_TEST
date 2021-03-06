
<?php
include 'head_navbar.php';?>


<div class="container">
	<div class="starter">

		<div class='row'>

		<div class='col-md-8 col-md-offset-2'>
		<h2>Arpu Report - <?php 
		switch ($report_type) {
		    case 'summary':
		        echo "Summary";
		        break;
	    	case 'cancellation':
		        echo "% New User Cancellation";
		        break;
		    case 'collectionrate':
		        echo "Collection Rate";
		        break;
		    case 'arpu':
		        echo "ARPU (ROI)";
		        break;
		    case 'arpuroi':
		        echo "ARPU (ROI-NET)";
		        break;
		}
		?> </h2>
</div></div>
		
		<div class='row'>
			<div class='col-md-8 col-md-offset-2'>
			<h3>
				<?php echo $country_name ?></h3>
			</div>
			<div class='col-md-2'>
			<a href='form_vivo_kantoo_2_campaigns.php' class="btn btn-primary btn-xs">Back to Reports</a>
			</div>
		</div>

		<!--/<div id="container" style="width:100%; height:400px;"></div>		
		</div>    This was used for the chart-->

	</div>

<div class="container">
			<form action="form_vivo_kantoo_2_campaigns_result.php" method="post" id='summary'>
    <input type="hidden" name="report" value="summary" />
    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id ?>" />
    <input type="hidden" name="campaign_id_2" value="<?php echo $campaign_id_2 ?>" />
  </form>

  <form action="form_vivo_kantoo_2_campaigns_result.php" method="post" id='cancellation'>
    <input type="hidden" name="report" value="cancellation" />
    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id ?>" />
    <input type="hidden" name="campaign_id_2" value="<?php echo $campaign_id_2 ?>" />
  </form>

  <form action="form_vivo_kantoo_2_campaigns_result.php" method="post" id='collectionrate'>
    <input type="hidden" name="report" value="collectionrate" />
    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id ?>" />
    <input type="hidden" name="campaign_id_2" value="<?php echo $campaign_id_2 ?>" />
  </form>

  <form action="form_vivo_kantoo_2_campaigns_result.php" method="post" id='arpu'>
    <input type="hidden" name="report" value="arpu" />
    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id ?>" />
    <input type="hidden" name="campaign_id_2" value="<?php echo $campaign_id_2 ?>" />
  </form>

  <form action="form_vivo_kantoo_2_campaigns_result.php" method="post" id='arpuroi'>
    <input type="hidden" name="report" value="arpuroi" />
    <input type="hidden" name="campaign_id" value="<?php echo $campaign_id ?>" />
    <input type="hidden" name="campaign_id_2" value="<?php echo $campaign_id_2 ?>" />
  </form>
  

  <ul class="nav nav-tabs nav-justified"> 
  <li <?php if ($report_type=='summary') {
   echo "class='active'";} ?> ><a href="javascript:{}" onclick="document.getElementById('summary').submit(); return false;">Summary</a></li>
   <li <?php if ($report_type=='cancellation') {
   echo "class='active'";} ?> ><a href="javascript:{}" onclick="document.getElementById('cancellation').submit(); return false;" data-toggle="tab">%NewUser Cancellation</a></li> 
   <li <?php if ($report_type=='collectionrate') {
   echo "class='active'";} ?> ><a data-toggle="tab" href="javascript:{}" onclick="document.getElementById('collectionrate').submit(); return false;">Collection Rate</a></li>
   <li <?php if ($report_type=='arpu') {
   echo "class='active'";} ?> ><a data-toggle="tab" href="javascript:{}" onclick="document.getElementById('arpu').submit(); return false;">ARPU (ROI)</a></li>
   <li <?php if ($report_type=='arpuroi') {
   echo "class='active'";} ?> ><a data-toggle="tab" href="javascript:{}" onclick="document.getElementById('arpuroi').submit(); return false;">ARPU (ROI-NET)</a></li>
    </ul>
		</div>

	<div class="container">
		<table id='myTable' class="display table table-striped table-bordered" style="font-size: 12px;"> 
			<thead> 
				<?php 
				if($report_type!='summary'){
			echo '<tr>
					<th colspan='; 
		switch ($report_type) {
		    case 'summary':
		        echo "3";
		        break;
	    	case 'cancellation':
		        echo "4";
		        break;
		    case 'collectionrate':
		        echo "3";
		        break;
		    case 'arpu':
		        echo "3";
		        break;
		    case 'arpuroi':
		        echo "3";
		        break;
		}
		echo '></th>
				<th class="text-center" colspan=';
				for ($i=0; $i < $numfields; $i++){
					if($i==2)
					{
						$resta = $numfields-$i;
						echo $resta;
					}
				}
				echo '>'; 
		switch ($report_type) {
		    case 'summary':
		        echo "Summary";
		        break;
	    	case 'cancellation':
		        echo "% New User Cancellation by days bracket";
		        break;
		    case 'collectionrate':
		        echo "% Collection Rate Accumulate by days bracket";
		        break;
		    case 'arpu':
		        echo "Average Revenue Per User by days bracket";
		        break;
		    case 'arpuroi':
		        echo "Average Revenue Per User Net by days bracket";
		        break;
		};
		echo '</th>	
			</tr>';
				};
			?>
				<tr>

					<?php				for ($i=0; $i < $numfields; $i++) // Header
							echo "<th class='header'>".mysql_field_name($result, $i)."</th>"; 

		?>
				</tr>
			</thead>

			<tbody>

				<?php				   
						   for ($i=0; $i < $num_rows; $i++){
						   echo "<tr>";						
						   for($a=0; $a < $numfields;$a++){
						   echo "<td>" . $dataArrayTotal[$i][$a] . "</td>";	
						   }
						   			   
						   echo "</tr>";}	
					?>


			</tbody>
		</table>

		<div class="col-xs-5 col-xs-offset-3">
			<button class="btn btn-success" id='1'>Export to Excel</button>
			<br>
			</div>

			<div class="col-xs-5 col-xs-offset-3">
				<br>
				</div>

			</div>


			<div class="container">
				<div class="starter">
					<h3>
						<?php echo $country_name_2 ?>
					</h3>

					<!--/<div id="container" style="width:100%; height:400px;"></div>		
		</div>    This was used for the chart-->

				</div>


				<div class="container">
					<table id='myTable_2'  class="display table table-striped table-bordered" style="font-size: 12px;"> 
						<thead> 
							<?php 
				if($report_type!='summary'){
			echo '<tr>
					<th colspan='; 
		switch ($report_type) {
		    case 'summary':
		        echo "3";
		        break;
	    	case 'cancellation':
		        echo "4";
		        break;
		    case 'collectionrate':
		        echo "3";
		        break;
		    case 'arpu':
		        echo "3";
		        break;
		    case 'arpuroi':
		        echo "3";
		        break;
		}
		echo '></th>
				<th class="text-center" colspan=';
				for ($i=0; $i < $numfields; $i++){
					if($i==2)
					{
						$resta = $numfields-$i;
						echo $resta;
					}
				}
				echo '>'; 
		switch ($report_type) {
		    case 'summary':
		        echo "Summary";
		        break;
	    	case 'cancellation':
		        echo "% New User Cancellation by days bracket";
		        break;
		    case 'collectionrate':
		        echo "% Collection Rate Accumulate by days bracket";
		        break;
		    case 'arpu':
		        echo "Average Revenue Per User by days bracket";
		        break;
		    case 'arpuroi':
		        echo "Average Revenue Per User Net by days bracket";
		        break;
		};
		echo '</th>	
			</tr>';
				};
			?>
				<tr>

					<?php				for ($i=0; $i < $numfields; $i++) // Header
							echo "<th class='header'>".mysql_field_name($result, $i)."</th>"; 

		?>
				</tr>
						</thead>

						<tbody>

							<?php				   
						   for ($i=0; $i < $num_rows_2; $i++){
						   echo "<tr>";						
						   for($a=0; $a < $numfields_2;$a++){
						   echo "<td>" . $dataArrayTotal_2[$i][$a] . "</td>";	
						   }					   
						   echo "</tr>";}	
					?>


						</tbody>
					</table>

					<div class="col-xs-5 col-xs-offset-3">
						<button class="btn btn-success" id='2' >Export to Excel</button>
						<br>
						</div>

						<div class="col-xs-5 col-xs-offset-3">
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
			{	$("#myTable").DataTable({
					"bPaginate": false,
			        "bFilter": false,
			        "bInfo": false,
			        fixedHeader: true
				});
				$("#myTable_2").DataTable({
					"bPaginate": false,
			        "bFilter": false,
			        "bInfo": false,
			        fixedHeader: true
				});
				
		
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

						