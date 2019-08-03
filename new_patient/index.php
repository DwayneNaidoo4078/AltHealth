<?php
require_once('../model/database.php');

$query = 'SELECT * FROM customer_details
		       ORDER BY Customer_ID';
		  
$statement = $db->prepare($query);
$statement->execute();
$Customers = $statement->fetchAll();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h1>Add Product</h1>
        <form action="new_patient.php" method="post"
              id="new_patient_form">

            <label>Customer ID:</label>
            <input type="text" name="Customer_ID"><br>

            <label>Customer Name:</label>
            <input type="text" name="Customer_Name"><br>

            <label>Customer Surname:</label>
            <input type="text" name="Customer_Surname"><br>
			
			 <label>Address:</label>
            <input type="text" name="Address"><br>
			
			 <label>Code:</label>
            <input type="text" name="Code"><br>
			
			 <label>Customer_Tel_H:</label>
            <input type="text" name="Customer_Tel_H"><br>
			
			 <label>Customer_Tel_W:</label>
            <input type="text" name="Customer_Tel_W"><br>
			
			 <label>Customer_Tel_Cell:</label>
            <input type="text" name="Customer_Tel_Cell"><br>
			
			 <label>Customer_Email:</label>
            <input type="text" name="Customer_Email"><br>
			
			 <label>Customer_Ref:</label>
            <input type="text" name="Customer_Ref"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Patient"><br>
        </form>
        <p><a href="patient_list.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> AltHealth</p>
    </footer>
</body>
</html>