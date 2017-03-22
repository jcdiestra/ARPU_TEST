<!DOCTYPE html>
<html lang="en">
<?php /// INCLUDE STYLE, HEAD, NAVBAR, <body>
include 'head_navbar.php';
//include '../site_dao_vivo_kantoo.php';
include 'side_bar.php'; ?>


            <div class="col-sm-9">
               <section id="monthlyreport">
               <div class="page-header page-header-padding" style="margin:0;padding:0;">
			   
			   
                  <h2>Collections by Aging - Report</h2>
               </div>			  
               <div class="row" >
               </div>	
                  <form data-toggle="validator" action="form_collections_by_aging_result_.php" id="bootstrapSelectForm" method="post" class="form-horizontal" role="form">
                     <div class="form-group" style="margin:0;padding:20px;">
                        <label class="col-xs-3 control-label">Country</label>
                        <div class="col-xs-4 selectContainer">
                           
						<select name="country" class="selectpicker show-tick" title=" " required>
                     <option value="Brazil">Brazil</option>
                  </select>
						   
                        </div>
                     </div>
					 
					 
                     <div class="form-group" style="margin:0px;padding:20px;">
                        <label class="col-xs-3 control-label">Operator</label>
                        <div class="col-xs-4 selectContainer">
                           
						   <select name="operator" class="selectpicker show-tick" title=" " required>
                        <option value="Vivo">Vivo</option>
                        <option value="Oi">Oi</option>
                        <option value="Claro">Claro</option>
                     </select>
						   
                        </div>
                     </div>

                     <div class="form-group" style="margin:0px;padding:20px;">
                        <label class="col-xs-3 control-label">System</label>
                        <div class="col-xs-4 selectContainer">
                           
                     <select name="system" class="selectpicker show-tick" title=" " required>
                        <option value="Kantoo">Kantoo</option>
                        <option value="Disney">Disney</option>
                        <option value="Kantoo+Disney">Kantoo + Disney</option>
                     </select>
                     
                        </div>
                     </div>

                     <div class="form-group" style="margin:0px;padding:20px;">
                        <label class="col-xs-3 control-label">Year</label>
                        <div class="col-xs-4 selectContainer">
                           
                     <select name="year" class="selectpicker show-tick" title=" " required>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
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