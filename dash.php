<?php
include('homepage.php');
//$db= mysqli_connect('localhost', 'root', '', 'ebad rehman 12869');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>Dash Board
</title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['class InvoiceID','Quantity'],
 <?php 
      $query = "SELECT * from salesorder_12869";

       $exec = mysqli_query($db,$query);
       while($row = mysqli_fetch_array($exec)){

       echo "['".$row['InvoiceID']."',".$row['Quantity']."],";
       }
       ?> 
 
 ]);

 var options = {
 title: 'Number of Orders and their INVOICEID',
  pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: {
			  display : true,
				position : "bottom"
		  }
 };
 var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
  
    </script>

</head>
<body>
<h3 style="text-align:centre;">Invoice Pie Chart</h3>
<ul>
  <li><a href="custDash.php">Customers Dashboard</a></li>
  <li><a href="proDash.php">Products Dashboard</a></li>
  <li><a href="salesDash.php">Sales Dashboard</a></li>
  <li><a href="dash.php">Invoice Dashboard</a></li>
  </ul>
 <div class="container-fluid" style= "background-color:#3d3730; color:orangered;">
 <div id="columnchart12" style="width: 100%; height: 400px;"></div>
 </div>

</body>
</html>
<style type="text/css">
body{
	background-color:#3d3730;
	color:orangered;
}
</style>