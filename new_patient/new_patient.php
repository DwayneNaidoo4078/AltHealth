<?php
// Get the product data
$Customer_ID = filter_input(INPUT_POST, 'Customer_ID');
$Customer_Name = filter_input(INPUT_POST, 'Customer_Name');
$Customer_Surname = filter_input(INPUT_POST, 'Customer_Surname');
$Address = filter_input(INPUT_POST, 'Address');
$Code = filter_input(INPUT_POST, 'Code');
$Customer_Tel_H = filter_input(INPUT_POST, 'Customer_Tel_H');
$Customer_Tel_W = filter_input(INPUT_POST, 'Customer_Tel_W');
$Customer_Tel_Cell = filter_input(INPUT_POST, 'Customer_Tel_Cell');
$Customer_Email = filter_input(INPUT_POST, 'Customer_Email');
$Customer_Ref = filter_input(INPUT_POST, 'Customer_Ref');


// Validate inputs
if ($Customer_ID == null || $Customer_ID == false ||
        $Customer_Name == null || $Customer_Surname == null || $Address == null || $Address == false ||  $Code == null || $Code == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('../model/database.php');

    // Add the product to the database  
    $query = 'INSERT INTO customer_details
                 (Customer_ID, Customer_Name, Customer_Surname, Address, Code, Customer_Tel_H, Customer_Tel_W, Customer_Tel_Cell, Customer_Email, Customer_Ref)
              VALUES
                 (:Customer_ID, :Customer_Name, :Customer_Surname, :Address, :Code, :Customer_Tel_H, :Customer_Tel_W, :Customer_Tel_Cell, :Customer_Email, :Customer_Ref)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Customer_ID', $Customer_ID);
    $statement->bindValue(':Customer_Name', $Customer_Name);
    $statement->bindValue(':Customer_Surname', $Customer_Surname);
    $statement->bindValue(':Address', $Address);
	 $statement->bindValue(':Code', $Code);
	  $statement->bindValue(':Customer_Tel_H', $Customer_Tel_H);
	   $statement->bindValue(':Customer_Tel_W', $Customer_Tel_W);
	    $statement->bindValue(':Customer_Tel_Cell', $Customer_Tel_Cell);
		 $statement->bindValue(':Customer_Email', $Customer_Email);
		  $statement->bindValue(':Customer_Ref', $Customer_Ref);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>