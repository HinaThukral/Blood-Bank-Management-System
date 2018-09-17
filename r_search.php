<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="style_search.css">

	<title>Search</title>

	<?php
    include_once 'connect.php';
    ?>

    <style type="text/css">
    	table, tr, th, td{
    		border: 1px solid black;
    	}

    	.hidden{
    		display: none;
    	}

    	.expanded{
    		display: block;
    	}

    	.hide{
    		display: none;
    	}
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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


	

	<script type="text/javascript">
	function changeValue(){
	    var option=document.getElementById('filter').value;

	    // if(option=="B_Type"){
	    //         document.getElementById('field').innerHTML='<select name="key">  <option value="O+">O+</option> <option value="O-">O-</option> <option value="A+">A+</option> <option value="A-">A-</option> <option value="B+">B+</option> <option value="B-">B-</option> <option value="AB+">AB+</option> <option value="AB-">AB-</option> </select><br/>';
	    // }
	        if(option=="D_Age"){
	            document.getElementById('field').innerHTML='<input type ="number" name="key" value ="18" min="18" />';
	        }

	        else if(option=="D_Name"){
	            document.getElementById('field').innerHTML='<input type="text" name="key" required><br/>';
	        }


	}

	jQuery(document).ready(function($){

		$(".edit").on("click",function(){

	           $(this).parent().find(".hidden").toggleClass("expanded");
	    });

	});

	</script>
	<form action ='' method = 'post'>

	<label id="first">Search Receptionist with</label><br/>
	<select name="filter" id="filter" onchange="changeValue();">
		<!-- <option id="A" value="B_Type">Blood Type</option> -->
		<option id="A" value="D_Age">Id</option>
		<option id="B" value="D_Name">Name</option>
	</select>

	 <div id ="field">
		<input type="text" name="key"/><br/>
	</div>

	<input type ='submit' name='search' value = 'Search' />

	</form>


	<div>

	<table style="width:100%">
	  <tr>
	  	<th>DID</th>
	    <th>Name</th>
	    <!-- <th>Age</th>  -->
	    <th>Address</th> 
	    <th>Phone</th>
	    <!-- <th>Sex</th> 
	    <th>Blood Type</th> -->
	  </tr>
		<?php

		if(isset($_POST['search']))
		{
			// if($_POST['filter']=="B_Type"){
			// 	$sql = "SELECT donor.d_id, donor.name, donor.age, donor.sex, donor.address, donor.phone, blood.b_type from donor inner join blood on donor.d_id = blood.d_id WHERE b_type = '".$_POST["key"]."'";
			// }
			 if ($_POST['filter']=="D_Age") {
				$sql = "SELECT receptionist.r_id, receptionist.r_name, receptionist.r_address,receptionist.r_phone from receptionist  WHERE r_id = '".$_POST["key"]."'";
			}
			 if ($_POST['filter']=="D_Name") {
				$sql = "SELECT receptionist.r_id, receptionist.r_name, receptionist.r_address,receptionist.r_phone from receptionist  WHERE r_name LIKE '%".$_POST["key"]."%'";
			}
		    

		    $filter = $_POST['filter'];
		    $key = $_POST['key'];

		    
		    $result = mysqli_query($conn,$sql);

		    if ($result->num_rows > 0) {
			    $i = 0;
			    while($row = $result->fetch_assoc()) {

			    	echo "<tr class='".$i."'><td>" . $row["r_id"]. "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_address"]. "</td><td>" . $row["r_phone"]."</td><td class='editbut' ><form action ='' method = 'post'><div class='hidden'><div class='hide'><input type='text' name='did' value='". $row["r_id"]."'></div><input type='text' name='dname' value='". $row["r_name"]."'><input type='text' name='dage' value='". $row["r_address"]."'><input type='text' name='daddress' value='". $row["r_phone"]."'><div class='hide'><input type='text' name='bfilter' value='". $filter."'><input type='text' name='bkey' value='". $key."'></div><input type ='submit' name='update' value = 'Update' /></div><input type ='submit' name='delete' value = 'Delete' /></form><input type ='submit' class='edit' name='edit' value = 'Edit' /></td></tr>";


			        

			        $i++;
			    }
			} else {
			    echo "0 results";
			}



		    
		}

		if(isset($_POST['delete'])){
				$sql1 = "DELETE FROM receptionist WHERE r_id = ".$_POST["did"]."";
				$result1 = mysqli_query($conn,$sql1);

			if($_POST['bfilter']=="D_Age"){
				$sql = "SELECT receptionist.r_id, receptionist.r_name, receptionist.r_address, receptionist.r_phone from receptionist WHERE r_id = '".$_POST["bkey"]."'";
			}
		
			else if ($_POST['bfilter']=="D_Name") {
				$sql = "SELECT receptionist.r_id, receptionist.r_name, receptionist.r_address, receptionist.r_phone from receptionist WHERE r_name LIKE '%".$_POST["bkey"]."%'";
			}
		    

		    $filter = $_POST['bfilter'];
		    $key = $_POST['bkey'];

		    
		    $result = mysqli_query($conn,$sql);

		    if ($result->num_rows > 0) {
			    $i = 0;
			    while($row = $result->fetch_assoc()) {

			    	echo "<tr class='".$i."'><td>" . $row["r_id"]. "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_address"]. "</td><td>" . $row["r_phone"]."</td><td class='editbut' ><form action ='' method = 'post'><div class='hidden'><div class='hide'><input type='text' name='did' value='". $row["r_id"]."'></div><input type='text' name='dname' value='". $row["r_name"]."'><input type='text' name='dage' value='". $row["r_address"]."'><input type='text' name='daddress' value='". $row["r_phone"]."'><div class='hide'><input type='text' name='bfilter' value='". $filter."'><input type='text' name='bkey' value='". $key."'></div><input type ='submit' name='update' value = 'Update' /></div><input type ='submit' name='delete' value = 'Delete' /></form><input class='edit' type ='submit' name='edit' value = 'Edit' /></td></tr>";


			        

			        $i++;
			    }
			} else {
			    echo "0 results";
			}

		}

		if(isset($_POST['update'])){
				$sql1 = "UPDATE receptionist SET r_name = '".$_POST["dname"]."', r_address = '".$_POST["dage"]."', r_phone = '".$_POST["daddress"]."'  WHERE r_id = ".$_POST["did"]."";
				$result1 = mysqli_query($conn,$sql1);

			
			if($_POST['bfilter']=="D_Age"){
				$sql = "SELECT receptionist.r_id, receptionist.r_name, receptionist.r_address, receptionist.r_phone from receptionist WHERE r_id = '".$_POST["bkey"]."'";
			}
		
			else if ($_POST['bfilter']=="D_Name") {
				$sql = "SELECT receptionist.r_id, receptionist.r_name, receptionist.r_address, receptionist.r_phone from receptionist WHERE r_name LIKE '%".$_POST["bkey"]."%'";
			}
		    
		    

		    $filter = $_POST['bfilter'];
		    $key = $_POST['bkey'];

		    
		    $result = mysqli_query($conn,$sql);

		    if ($result->num_rows > 0) {
			    $i = 0;
			    while($row = $result->fetch_assoc()) {

			    	echo "<tr class='".$i."'><td>" . $row["r_id"]. "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_address"]. "</td><td>" . $row["r_phone"]."</td><td class='editbut' ><form action ='' method = 'post'><div class='hidden'><div class='hide'><input type='text' name='did' value='". $row["r_id"]."'></div><input type='text' name='dname' value='". $row["r_name"]."'><input type='text' name='dage' value='". $row["r_address"]."'><input type='text' name='daddress' value='". $row["r_phone"]."'><div class='hide'><input type='text' name='bfilter' value='". $filter."'><input type='text' name='bkey' value='". $key."'></div><input type ='submit' name='update' value = 'Update' /></div><input type ='submit' name='delete' value = 'Delete' /></form><input class='edit' type ='submit' name='edit' value = 'Edit' /></td></tr>";

			      
			        $i++;
			    }
			} else {
			    echo "0 results";
			}

		}



		

		?>

		</table>
	</div>

		<?php

			

		?>


</body>
</html>