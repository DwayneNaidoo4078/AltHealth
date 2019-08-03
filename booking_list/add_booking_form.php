<?php
require_once('../model/database.php');

$query = 'SELECT *
          FROM booking_details
		       ORDER BY Appointment_Date';
		  
$statement = $db->prepare($query);
$statement->execute();
$bookings = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
	
<link rel="stylesheet" type= "text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type= "text/css" href="css/jquery-ui.css" />
<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript">
$(function(){
		$("#Appointment_Date").datepicker({dateFormat: 'yy-mm-dd'});

});
</script>
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Add Product</h1>
        <form action="add_booking.php" method="post"
              id="add_booking_form">
			  			  
<div class="col-md-2">
<label>Date:</label>
<input type= "text" name= "Appointment_Date" id="Appointment_Date" />


            <label>Time From:</label>
            <input type="text" name="Time_From">

            <label>Time To:</label>
            <input type="text" name="Time_To"><br>
			
			 <label>Customer ID:</label>
            <input type="text" name="Customer_ID"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Booking"><br>
			</div><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>