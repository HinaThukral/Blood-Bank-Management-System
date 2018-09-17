

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

	<title>Blood Bank</title>

<!-- 	<?php
    include_once 'connect.php';
    ?>
 -->
    

</head>
<body>

<header>
		<h1>Blood Bank Management System</h1>

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

	<div class="w3-content w3-section" style="max-width:500px" id="animation">
  <img class="mySlides" src="image1.jpg" style="width:100%">
  <img class="mySlides" src="image2.jpg" style="width:100%">
  <img class="mySlides" src="image3.jpg" style="width:100%">
</div>

<script>
    var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
    </script>

<!-- 
	<?php

	  if(isset($_POST['submit']))
	{

	    $sql = "INSERT INTO donor (name, age, sex, phone, address)
	    VALUES ('".$_POST["dname"]."','".$_POST["dage"]."','".$_POST["daddress"]."','".$_POST["dphone"]."','".$_POST["dsex"]."')";

	    $result = mysqli_query($conn,$sql);

	    $sql1 = "SELECT MAX(d_id) FROM donor";
	    $result1 = mysqli_query($conn,$sql1);
	    $row = mysqli_fetch_row($result1);
		echo $row[0];
		

	    $sql2 = "INSERT INTO blood (b_type, volume, d_id)
	    VALUES ('".$_POST["btype"]."','".$_POST["bvol"]."','".$row[0]."')";

	    
	    $result2 = mysqli_query($conn,$sql2);

		}

	?>

	<form action="" method="post"> 
	<label id="first"> Name:</label><br/>
	<input type="text" name="dname" required><br/>

	<label id="first">Age</label><br/>
	<select name="dage">
	<?php
	    for ($i=18; $i<=100; $i++)
	    {
	        ?>
	            <option value="<?php echo $i;?>"><?php echo $i;?></option>
	        <?php
	    }
	?>
	</select><br/>

	<label id="first">Address</label><br/>
	<input type="text" name="daddress" required><br/>

	<label id="first">Phone</label><br/>
	<input type="tel" name="dphone" required><br/>

	<label id="first">Sex</label><br/>
	<input type="radio" name="dsex" value="Male" checked> Male
    <input type="radio" name="dsex" value="Female"> Female
    <input type="radio" name="dsex" value="Other"> Other <br/>

    <label id="first">Blood Type</label><br/>
	<select name="btype">
	  <option value="O+">O+</option>
	  <option value="O-">O-</option>
	  <option value="A+">A+</option>
	  <option value="A-">A-</option>
	  <option value="B+">B+</option>
	  <option value="B-">B-</option>
	  <option value="AB+">AB+</option>
	  <option value="AB-">AB-</option>
	</select><br/>

	<label id="first">Volume (in mL)</label><br/>
	<select name="bvol">
	<?php
	    for ($i=25; $i<=500; $i+=5)
	    {
	        ?>
	            <option value="<?php echo $i;?>"><?php echo $i;?></option>
	        <?php
	    }
	?>
	</select><br/>

	<button type="submit" name="submit">Submit</button>

	</form> -->

</body>
</html>