
 <!DOCTYPE html>  
<?php
  session_start();
  if(!isset($_SESSION['logg']) || $_SESSION['logg'] == false){
    header("Location: login.php");
  }
include 'head_navbar.php';
include 'site_all_dao.php';
//include 'cpa_weekly_dao.php';

include 'db_connection.php';

$insert='';
$rsp='';
//collect



if(isset($_POST['submit2'])){
  $varAdminSite = $_POST['varAdminSite'];
  $varKywrd = $_POST['varKywrd'];
  $week = $_POST['week'];
  $varCampId = $_POST['varCampId'];
  $cpa_weekly = $_POST['cpa_weekly'];
  $insert = mysql_query('CALL sp_insert_cpa_weekly('.$varCampId.',"'.$week.'","'.$varKywrd.'","'.$varAdminSite.'",'.$cpa_weekly.')') or die("Query fail: " . mysql_errno());
}

if ($insert)
{
  $count= mysql_num_rows($insert);
if($count == 0){
  
}else{
  while($respu = mysql_fetch_array($insert)){
    $rsp = $respu[0];
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
  <div><?php switch ($rsp) {
    case 1:
      echo '<h4 style="font-size: 10px; color: green;">* CPA inserted correctly';
      break;
    case -1:
      echo '<h4 style="font-size: 10px; color: red;"> CPA already exists';
      break;
    case '':
      echo '<h4>';
      break;
  }; ?></h4></div>

    <div class="form-group">
      <label for="campaign_id">Campaign</label>
      <select name="campaign_id" id="campaign_id" class="form-control selectpicker" data-live-search="true" tittle="Select..." required >  
            <option value="0">Choose Campaign</option>
                 <?php           
                 for ($i=0; $i < $num_rows; $i++){            
                 echo "<option value=" . $dataArrayTotal[$i][0] . ">". $dataArrayTotal[$i][1] . "-". $dataArrayTotal[$i][2] . "-". $dataArrayTotal[$i][3]."-". $dataArrayTotal[$i][4]."-". $dataArrayTotal[$i][5] ."</option>";
                 }
                 ?>              
                             </select>
        
    </div>
    <button type="button" id="search_camp" name="submit" class="btn btn-primary">Submit</button>
    <button type="button" id="new_cpa" name="new_cpa" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">New CPA</button>
  </div>



<div class="col-md-12">
           <div class="container">  
                <br />  
                <div id="div-table" class="table-responsive">  
                     <table id="cpa_weekly_data" class="table table-striped table-bordered">  
                           
                          
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
        <h4 class="modal-title">New CPA Weekly</h4>
      </div>
      <div class="modal-body">
      <form method="post" action="manage_cpa.php">
      <input type="hidden" id="varCampId" name="varCampId">
      <input type="hidden" id="varAdminSite" name="varAdminSite">
      <input type="hidden" id="varKywrd" name="varKywrd">
         <div class="form-group">
          <label for="week">Week</label>
          <select name="week" id="week" class="form-control selectpicker"  data-live-search="true" required >           
            <option value="2017-02-06">2017-02-06</option>
            <option value="2017-02-13">2017-02-13</option>
            <option value="2017-02-20">2017-02-20</option>
            <option value="2017-02-27">2017-02-27</option>
            <option value="2017-03-06">2017-03-06</option>
            <option value="2017-03-13">2017-03-13</option>
            <option value="2017-03-20">2017-03-20</option>
            <option value="2017-03-27">2017-03-27</option>
            <option value="2017-04-03">2017-04-03</option>
            <option value="2017-04-10">2017-04-10</option>
            <option value="2017-04-17">2017-04-17</option>
            <option value="2017-04-24">2017-04-24</option>
          </select>
            
        </div>

         <div class="form-group">
          <label for="cpa_weekly">CPA Weekly</label>
          <input class="form-control" type="text" name="cpa_weekly">
            
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" name="submit2" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
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
      /*$('#cpa_weekly_data').DataTable({
        searching: false,
        order: [[ 0, "desc" ]]
      });*/  
      $('#exampleSelect1').selectpicker();

      


      });

 
 $('#new_cpa').click(function () {
    var array = $('#campaign_id option:selected').text().split('-');
    var keyword = array[4];
    var adminsitename = array[2];
    $('#varKywrd').val(keyword);
    $('#varAdminSite').val(adminsitename);
    $('#varCampId').val($('#campaign_id').val());

 });
 $('#search_camp').click(function () {
  
        var id = $('#campaign_id').val();
          $.ajax({
            url: 'search_campaign.php'
            ,data:{campaign_id: id}
            ,type: 'GET'
            ,success:function(data){
                if(data)
                {
                    //clear your deleted product div/html element something like below
                    $('#cpa_weekly_data').html(data);
                    $('#cpa_weekly_data').DataTable( {
                        searching: false,
                            order: [[ 0, "desc" ]]
                    } );
                }
            }
        });
  });
 
 </script>  
      </body>  
 </html>  
