<?php  
 $connect = mysqli_connect("localhost", "root", "", "arpu_report");  
 $query ="SELECT * FROM cpa_weekly ORDER BY ID DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
<?php
include 'head_navbar2.php';
?>
           <div class="container">  
                <h3 align="center">CPA WEEKLY </h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Id</td>  
                                    <td>Campaign Id</td>  
                                    <td>Week Date</td>  
                                    <td>Keyword</td>  
                                    <td>Admin Site Name</td>  
                                    <td>CPA</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["campaignid"].'</td>  
                                    <td>'.$row["week_date"].'</td>  
                                    <td>'.$row["keyword"].'</td>  
                                    <td>'.$row["adminsitename"].'</td>  
                                    <td>'.$row["cpa"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  