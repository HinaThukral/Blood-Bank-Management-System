

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">

	<title>Blood Bank</title>

	<?php
    include_once 'connect.php';
    ?>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<header>
		<h1>Blood Bank System</h1>

		<nav>
			<ul class="menu">
				<a href="index.php"><li>Home</li></a>
				<a href="donor.php"><li>Add Donors</li></a>
				<a href="search.php"><li>Search Donors</li></a>
				<a href="receptionist.php"><li>Add Receptionist</li></a>
				<a href="r_search.php"><li>Search Receptionist</li></a>
				<a href="order.php"><li>Orders</li></a>
				<a href="bloodstored.php"><li>Blood Stored</li></a>
				<a href="hospitals.php"><li>Hospitals</li></a>
				<a href="blood_banks.php"><li>Blood Banks</li></a>
			</ul>
		</nav>

	</header>
	<main>

	<h3>Hospitals</h3>

	<table style="width:80%">
	  <tr>
	  	<th>Hospital Name</th>
	  	<th>Address</th>
	    <th>Phone</th>
	  </tr>
	<?php

	

	    $sql = "SELECT h_name, h_address, h_phone FROM hospitals ";

	    $result = mysqli_query($conn,$sql);

	    

	    if ($result->num_rows > 0) {
    
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>" . $row["h_name"]. "</td><td>" . $row["h_address"]. "</td><td>" . $row["h_phone"]. "</td></tr> ";
		    }
		} else {
		    echo "0 results";
		}

	?>
	</table>


	</main>

</body>
</html>