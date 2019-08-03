<?php
require_once('database.php');

// Get category ID
$query = 'SELECT customer_details.customer_ref Ref, Count(customer_details.customer_id) Customers
FROM customer_details, customer_ref
where customer_ref.customer_ref = customer_details.customer_ref
Group By Ref
Order By Customers
Limit 8';
$statement = $db->prepare($query);
$statement->execute();
$Refs = $statement->fetchAll();
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
<header><h1>Ref Details</h1></header>
<main>
    <h1>Ref Details</h1>
 <div Appointment Date="content">
        <table>
            <tr>
                <th>Ref</th>
              <th class="right">Customers</th>
                <th>&nbsp;</th>
            </tr>
			<?php foreach ($Refs as $Ref) : ?>
			<tr>
			  <td><?php echo $Ref['Ref']; ?></td>
                <td class="right"><?php echo $Ref['Customers']; ?></td>
           </tr>
		     <?php endforeach; ?>
        </table>
        <p><a href="category_list.php">List Categories</a></p> 
		<p><a href="add_Ref_form">add product</a></p>
    </section>
</main>

</body>
</html>