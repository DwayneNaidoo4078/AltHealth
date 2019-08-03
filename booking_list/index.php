<?php
require_once('../model/database.php');

// Get category ID
if (!isset($Customer_ID)) {
    $Customer_ID = filter_input(INPUT_GET, 'Customer_ID', 
            FILTER_VALIDATE_INT);
    if ($Customer_ID == NULL || $Customer_ID == FALSE) {
        $Customer_ID = 1;
    }
}
$query = 'SELECT * FROM booking_details';
$statement = $db->prepare($query);
$statement->execute();
$Bookings = $statement->fetchAll();
$statement->closeCursor();
 
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>AltHealth</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Booking Details</h1></header>
<main>
    <h1>Booking Details</h1>
 <div Appointment Date="content">
 <p><a href="add_booking_form.php">Make Booking</a></p>
 <p><a href="new_patient_form.php">New Patient</a></p>
        <table>
            <tr>
                <th>Appointment Date</th>
                <th>Time From</th>
                <th>Time To</th>
              <th class="right">ID Number</th>
                <th>&nbsp;</th>
            </tr>
			<?php foreach ($Bookings as $Booking) : ?>
			<tr>
			  <td><?php echo $Booking['Appointment_Date']; ?></td>
                <td><?php echo $Booking['Time_From']; ?></td>
				<td><?php echo $Booking['Time_To']; ?></td>
                <td class="right"><?php echo $Booking['Customer_ID']; ?></td>
           </tr>
		     <?php endforeach; ?>
        </table>
        <p><a href="category_list.php">List Categories</a></p> 
		<p><a href="add_booking_form.php">add product</a></p>
    </section>
</main>

</body>
</html>