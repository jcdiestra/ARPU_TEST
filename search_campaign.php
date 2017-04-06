<?php 
include 'db_connection.php';
$output = '<thead>  
                               <tr>  
                                    <td>Week Date</td>  
                                    <td>Keyword</td>  
                                    <td>Admin Site Name</td>  
                                    <td>Campaign Type</td>  
                                    <td>CPA</td>  
                               </tr>  
                          </thead> ';
$querys='';

if(isset($_GET['campaign_id'])){
  $searchq = $_GET['campaign_id'];
  $querys= mysql_query("SELECT w.id, w.campaignid, w.week_date, w.keyword, w.adminsitename, c.campaign_type, w.cpa FROM cpa_weekly w
join campaign c on w.campaignid= c.campaignid 
where w.campaignid =".$searchq) or die("no se pudo conectar");
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
                <td>'.$linea["campaign_type"].'</td> 
                <td>'.$linea["cpa"].'</td>  
              </tr> ';
  }
}
echo $output;
}

?>