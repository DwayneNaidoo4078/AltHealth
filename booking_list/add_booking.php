<?php
// Get the product data

$Appointment_Date = filter_input(INPUT_POST, 'Appointment_Date');
$Time_From = filter_input(INPUT_POST, 'Time_From');
$Time_To = filter_input(INPUT_POST, 'Time_To');
$Customer_ID = filter_input(INPUT_POST, 'Customer_ID');

// Validate inputs
if ($Appointment_Date == null || $Appointment_Date == false ||
        $Time_From == null || $Time_To == null || $Customer_ID == null || $Customer_ID == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('../model/database.php');

    // Add the product to the database  
    $query = 'INSERT INTO booking_details
                 (Appointment_Date, Time_From, Time_To, Customer_ID)
              VALUES
                 (:Appointment_Date, :Time_From, :Time_To, :Customer_ID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Appointment_Date', $Appointment_Date);
    $statement->bindValue(':Time_From', $Time_From);
    $statement->bindValue(':Time_To', $Time_To);
    $statement->bindValue(':Customer_ID', $Customer_ID);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>