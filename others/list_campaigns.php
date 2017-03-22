
<?php 
include 'list_campaigns_dao.php';
include 'head_navbar.php';?>


<div class="container">
	<div class="starter">
		<h1>Active Campaigns</h1>	
		<h2>
		</h2>

		<!--/<div id="container" style="width:100%; height:400px;"></div>		
		</div>    This was used for the chart-->

	</div>


	<div class="container">
		<table id='myTable' class="table table-striped table-responsive table-condensed"> 
			<thead> 
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
							for($a=0; $a < $numfields; $a++){
						   echo "<td>" . $dataArrayTotal[$i][$a] . "</td>";};}	
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


						<!-- /.container -->


						<!-- Bootstrap core JavaScript
    ================================================== -->
						<!-- Placed at the end of the document so the pages load faster -->
						<script src="/bootstrap/js/jquery-2.2.0.min.js"/></script>
						<script src="/jquery_sorter/jquery.tablesorter.js"/></script>
						<script src="/bootstrap/js/jquery.table2excel.min.js"/></script>
						<script src="/highcharts/js/highcharts.js"/></script>
						<script src="/jquery_sorter/addons/pager/jquery.tablesorter.pager.js"/></script>
						<script src="/bootstrap/js/bootstrap.min.js"/></script>
						<script src="/bootstrap/js/bootstrap-select.js"/></script>
						<script src="/jquery_sorter/jquery.tablesorter.widgets.js"/></script>
						<script>
$(document).ready(function() 
			{	$("#myTable").tablesorter({ 
        // sort on the first column
			sortList: [[0,1]] ,

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

								</script>



							</body>
						</html>

						