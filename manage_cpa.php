
 <!DOCTYPE html>  
<?php
include 'head_navbar2.php';
include 'site_all_dao.php';
//include 'cpa_weekly_dao.php';

include 'db_connection.php';
$output = '';
$querys='';
//collect

if(isset($_POST['submit'])){
  $searchq = $_POST['campaign_id'];
  $querys= mysql_query("SELECT * FROM cpa_weekly where campaignid =$searchq") or die("no se pudo conectar");
}

if ($querys)
{
  $count= mysql_num_rows($querys);
if($count == 0){
  $output = '';
}else{
  while($linea = mysql_fetch_array($querys)){
    $output.='<tr>  
                <td>'.$linea["week_date"].'</td>  
                <td>'.$linea["keyword"].'</td>  
                <td>'.$linea["adminsitename"].'</td>  
                <td>'.$linea["cpa"].'</td>  
              </tr> ';
  }
}

}

?>
<div class="col-md-12 text-center">
  <h1>MANAGEMENT - CPA WEEKLY</h1>
</div>
<div class="col-md-12">
<div class="col-md-4"></div>
<div class="col-md-4">
  <form action="manage_cpa.php" method="post">

  <div class="form-group">
    <label for="exampleSelect1">Campaign</label>
    <select name="campaign_id" id="exampleSelect1" class="form-control selectpicker"  data-live-search="true" required >           
               <?php           
               for ($i=0; $i < $num_rows; $i++){            
               echo "<option value=" . $dataArrayTotal[$i][0] . ">". $dataArrayTotal[$i][1] . "-". $dataArrayTotal[$i][2] . "-". $dataArrayTotal[$i][3]."-". $dataArrayTotal[$i][4]."-". $dataArrayTotal[$i][5] ."</option>";
               }
               ?>              
                           </select>
      
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <button type="button" id="new_cpa" name="new_cpa" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">New CPA</button>
</form>
</div>
<div class="col-md-4"></div>

</div>
<div class="col-md-12">
           <div class="container">  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Week Date</td>  
                                    <td>Keyword</td>  
                                    <td>Admin Site Name</td>  
                                    <td>CPA</td>  
                               </tr>  
                          </thead>  
                          <?php 
                          print("$output"); 
                          ?>  
                     </table>  
                </div>  
           </div>  
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="bootstrap/js/validator.js"></script>
      <script src="bootstrap/js/bootstrap-datepicker.js"></script>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="bootstrap/js/bootstrap-select.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
      $('#exampleSelect1').selectpicker();

 });  

 </script>  
      </body>  
 </html>  
