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
$query = 'SELECT * FROM customer_details';
$statement = $db->prepare($query);
$statement->execute();
$Customers = $statement->fetchAll();
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
<header><h1>Customer Details</h1></header>
<main>
    <h1>Customer Details</h1>
 <div Appointment Date="content">
 <p><a href="new_patient_form.php">New Patient</a></p>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Customer Surname</th>
				<th>Address</th>
				<th>Code</th>
				<th>Customer Tel H</th>
				<th>Customer Tel Wo</th>
				<th>Customer Tel Cell</th>
				<th>Customer Email</th>
              <th class="right">Customer Ref</th>
                <th>&nbsp;</th>
            </tr>
			<?php foreach ($Customers as $Customer) : ?>
			<tr>
			  <td><?php echo $Customer['Customer_ID']; ?></td>
                <td><?php echo $Customer['Customer_Name']; ?></td>
				<td><?php echo $Customer['Customer_Surname']; ?></td>
				<td><?php echo $Customer['Address']; ?></td>
				<td><?php echo $Customer['Code']; ?></td>
				<td><?php echo $Customer['Customer_Tel_H']; ?></td>
				<td><?php echo $Customer['Customer_Tel_W']; ?></td>
				<td><?php echo $Customer['Customer_Tel_Cell']; ?></td>
				<td><?php echo $Customer['Customer_Email']; ?></td>
                <td class="right"><?php echo $Customer['Customer_Ref']; ?></td>
           </tr>
		     <?php endforeach; ?>
        </table>
        <p><a href="category_list.php">List Categories</a></p> 
		<p><a href="new_patient_form">add product</a></p>
    </section>
</main>

</body>
</html>