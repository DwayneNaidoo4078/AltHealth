<?php
$connection = mysqli_connect('localhost', 'root', '', 'althealth');
$result = mysqli_query($connection, 'SELECT customer_details.customer_ref Ref, Count(customer_details.customer_id) Customers
FROM customer_details, customer_ref
where customer_ref.customer_ref = customer_details.customer_ref
Group By Ref
Order By Customers
Limit 8');

If(!$result){
	echo "Connected";
}
 
?>

<!doctype html>

<html lang ="en">
  <head>
  <meta charset="UTF-8">
  <title>Document</title>
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Referrals', 'Referral Total'],
		  
          <?php
if (mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_array($result)){
		echo "['".$row['Ref']."', ".$row['Customers']."],";
	}
}
		  ?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>