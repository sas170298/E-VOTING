<?php 
//comparison
include "connect_to_mysql.php";
$query = "SELECT * FROM tp3";
$result = mysqli_query($con, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ c_name:'".$row["c_name"]."', FE:".$row["FE"].", SE:".$row["SE"].",TE:".$row["TE"].", BE:".$row["BE"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>COMPARISON</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">COMPARISON CHART</h2>
   <h3 align="center"></h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'c_name',
 ykeys:['FE', 'SE', 'TE','BE'],
 labels:['FE', 'SE', 'TE','BE'],
 hideHover:'auto',
 //stacked:true
});
</script>
