<main>
    <h1>Menu</h1>
    <ul>
        <li>
            <a href="booking_list">Product Manager</a>
	
        </li>
		
		    <li>
			
            <a href="new_patient">Product Manager</a>
			
        </li>
		
        <li>
            <a href="Report1">Report</a>
        </li>
    </ul>
</main>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>AltHealth</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<h2>Date</h2>

<select name="Months">
<option value="Jan">January</option>
<option value="Feb">February</option>
<option value="Mar">March</option>
<option value="Apr">April</option>
<option value="May">May</option>
<option value="Jun">June</option>
<option value="Jul">July</option>
<option value="Aug">August</option>
<option value="Sep">September</option>
<option value="Oct">October</option>
<option value="Nov">November</option>
<option value="Dec">December</option>
</select>

</body>
</html>
<?php
if (isset($_POST['btn'])){
	if (!empty ($_POST['testDate'])){
		$date=$_POST['testDate'];
		$date = strtotime($date);
		$date2 = strtotime($date2);
		$date3 = strtotime($date3);
		$date1 = date('Y m d',$date);

		echo $date1;

		
	}
}

?>
