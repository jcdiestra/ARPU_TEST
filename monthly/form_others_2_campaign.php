<!DOCTYPE html>
<html lang="en">
<?php /// INCLUDE STYLE, HEAD, NAVBAR, <body>
include 'head_navbar.php';
include '../site_dao_others.php';
include 'side_bar.php'; ?>


            <div class="col-sm-9">
               <section id="monthlyreport">
               <div class="page-header page-header-padding" style="margin:0;padding:0;">
			   
			   
                  <h2>Monthly - ARPU Report</h2>
               </div>			  
               <div class="row" >
               </div>	
                  <form data-toggle="validator" action="form_others_2_campaign_result.php" id="bootstrapSelectForm" method="post" class="form-horizontal" role="form">
                     <div class="form-group" style="margin:0;padding:20px;">
                        <label class="col-xs-3 control-label">Select Report Type:</label>
                        <div class="col-xs-4 selectContainer">
                           
						  <select name="report" class="selectpicker show-tick" title=" " required>
                              <option value="summary">Summary</option>
							  <option value="cancellation">%NewUserCancellation</option>
							  <option value="collectionrate">CR_Accumulate</option>
							  <option value="arpu">Arpu (ROI)</option>
							  <option value="arpuroi">Arpu (ROI-NET)</option>
                           </select>
						   
                        </div>
                     </div>
					 
					 <div class="page-header page-header-padding">
					  <h3>Campaign 1:</h3></div>
					  
                     <div class="form-group" style="margin:0;padding:0;">
                        <label class="col-xs-3 control-label">Select Campaign:</label>
                        <div class="col-xs-4 selectContainer">
                           
						   <select name="campaign_id" class="selectpicker show-tick" data-dropup-auto="false" data-live-search="true" title=" "  required >					 
						   <?php				   
						   for ($i=0; $i < $num_rows; $i++){						
						   echo "<option value=" . $dataArrayTotal[$i][0] . ">". $dataArrayTotal[$i][1] . "-". $dataArrayTotal[$i][2] . "-". $dataArrayTotal[$i][3]."-". $dataArrayTotal[$i][4]."-". $dataArrayTotal[$i][5]  ."</option>";
						   }
						   ?>						   
                           </select>
						   
                        </div>
                     </div>
					 
					 
					 <div class="page-header page-header-padding">
					  <h3>Campaign 2:</h3></div>
					 
                     <div class="form-group" style="margin:10;padding:0;">
                        <label class="col-xs-3 control-label">Select Campaign:</label>
                        <div class="col-xs-4 selectContainer">
                           
						   <select name="campaign_id_2" class="selectpicker show-tick"  data-dropup-auto="false" data-live-search="true" title=" " required  >					 
						   <?php				   
						   for ($i=0; $i < $num_rows; $i++){						
						   echo "<option value=" . $dataArrayTotal[$i][0] . ">". $dataArrayTotal[$i][1] . "-". $dataArrayTotal[$i][2] . "-". $dataArrayTotal[$i][3]."-". $dataArrayTotal[$i][4] ."-". $dataArrayTotal[$i][5]  ."</option>";
						   }
						   ?>						   
                           </select>
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
   </body>
</html>
