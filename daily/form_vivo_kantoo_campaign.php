<!DOCTYPE html>
<html lang="en">
<?php /// INCLUDE STYLE, HEAD, NAVBAR, <body>
include 'head_navbar.php';
include '../site_dao_vivo_kantoo.php';
include 'side_bar.php'; ?>


            <div class="col-sm-9">
               <section id="monthlyreport">
               <div class="page-header page-header-padding" style="margin:0;padding:0;">
			   
			   
                  <h2>Daily - ARPU Report</h2>
               </div>			  
               <div class="row" >
               </div>	
                  <form data-toggle="validator" action="form_vivo_kantoo_campaign_result.php" id="bootstrapSelectForm" method="post" class="form-horizontal" role="form">
                     <div class="form-group" style="margin:0;padding:20px;">
                        <label class="col-xs-3 control-label">Select Report Type:</label>
                        <div class="col-xs-4 selectContainer">
                           
						  <select name="report" class="selectpicker show-tick" title=" " required>
							  <option value="cancellation">%NewUserCancellation</option>
							  <option value="collectionrate">CR_Accumulate</option>
							  <option value="arpu">Arpu (ROI)</option>
							  <option value="arpuroi">Arpu (ROI-NET)</option>
                           </select>
						   
                        </div>
                     </div>
					 
					 
                     <div class="form-group" style="margin:0px;padding:20px;">
                        <label class="col-xs-3 control-label">Select Campaign:</label>
                        <div class="col-xs-4 selectContainer">
                           
						   <select name="campaign_id" class="selectpicker show-tick" data-dropup-auto="false" data-live-search="true" title=" "  required >					 
						   <?php				   
						   for ($i=0; $i < $num_rows; $i++){						
						   echo "<option value=" . $dataArrayTotal[$i][0] . ">". $dataArrayTotal[$i][1] . "-". $dataArrayTotal[$i][2] . "-". $dataArrayTotal[$i][3]."-". $dataArrayTotal[$i][4] ."-". $dataArrayTotal[$i][5]  ."</option>";
						   }
						   ?>						   
                           </select>
						   
                        </div>
                     </div>
					 
					 
					 <div class="form-group" style="margin:0px;padding:20px;">
                        <label class="col-xs-3 control-label">Select Date Range:</label>
                        
					<div class="form-group row">
						<div class="col-xs-4">
							<label class="sr-only" for="date1">Start Date</label>					
							<input type="text" class="form-control" name='date1' id='date1' placeholder="Start Date" required>
						</div>
							
						<div class="col-xs-4">
							<label class="sr-only" for="date2">End Date</label>							
							<input type="text" class="form-control" name='date2' id='date2' placeholder="End Date" required>
						</div>
					</div>
					 
                       
                     </div>
					 
                       
                     <div class="form-group" style="margin:0px;padding:20px;" >
                        <div class="col-md-3 col-md-offset-3"  >
                           <button onclick="myFunction()" type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
             
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript
         ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="../bootstrap/js/validator.js"></script>
      <script src="../bootstrap/js/bootstrap-datepicker.js"></script>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../bootstrap/js/bootstrap-select.js"></script>
	  <script>
         $(function(){
         //window.prettyPrint && prettyPrint();
         $('#date1').datepicker({
         	format: 'yyyy-mm-dd',
         	autoclose: true
         });
         $('#date2').datepicker({
         	format: "yyyy-mm-dd",
         	"autoclose": true
         })
         ;})
         
      </script>
	  
	  
   </body>
</html>
