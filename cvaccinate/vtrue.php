<?php
include_once('functions/model.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>CVSS</title>
     <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<style type="text/css">
		body{
			background: url('img/docfade.png');
			background-size: cover;
			background-repeat: no-repeat;
		}

		*{
			font-family: Montserrat;
			font-weight: bolder;
		}
		.blueColor{
			background: rgb(77,200,244);
			color: white;
		}
		.textBlue{
			color: rgb(77,200,244);
		}

		.blueColor:hover{
			background: rgb(77,200,244);
			color: white;
		}
		.curve{
			border-radius: 40px;
		}

		.formText{
			font-weight: bold;
		}
	</style>
</head>
<body>
 <?php require_once "inc/head.php" ?>

 <section>
<div class="container" style="margin-top: 10px; ">
	 </div>
 	<div class="container row">
 		<div class="col-12 col-md-12 text-center p-0">
 			<marquee><h4 class="textBlue">Vaccination Acknowledgement Slip</h4></marquee>
 		</div>
	 <div class="col-10 col-md-10" style="margin: 0% 20%;" >
	 	<div class="card p-2">
		<?php
		$_SESSION['email'] = $email;
        $patient_id = useridf($email);
		$ft = fetch_patient_info($patient_id);
		if ($ft->num_rows > 0) {
           while ($f = $ft->fetch_assoc()) {
			$firstname = $f['firstname'];
			$lastname = $f['lastname'];
			$othername = $f['othername'];
			$dob = $f['dob'];
			$address = $f['address'];
			$gender = $f['gender'];
			$next_of_kin = $f['next_of_kin'];
			$phone = $f['phone'];
			$date = $f['created_at'];
			$patient_id = $f['patient_id'];
			$type_of_vaccine = $f['type_of_vaccine'];
			$status = $f['status'];
			$patient_id = $f['patient_id'];
			$vaccine_start = $f['vaccine_start'];
			$vaccine_end = $f['vaccine_end'];
			$nok_address = $f['nok_address'];
			$nok_phone = $f['nok_phone'];
			$updated_at = $f['updated_at'];
			$vaccine_ref = $f['vaccine_ref'];
			?>
			<style>
			.formText{
				font-size: 1.5em;
				color: lightgrey;
			}
			small{
				color: black;
			}
			</style>
			<center><legend>This is to certify that <small><?php echo ucwords($lastname).' '.ucfirst($firstname).' '.ucfirst($othername); ?></small>
			 has been <?php echo $status; ?></legend>
  			<div class="formText">Type of Vaccination: <small><?php echo $type_of_vaccine; ?></small></div>
  			<div class="formText">Date: <small><?php echo $updated_at; ?></small></div>
  			<div class="formText">Ref Number: <small><?php echo $vaccine_ref; ?></small></div></center>
			<div class="table table-responsive">
			<table class="table table-border">
			
			<tbody>
			<tr style="background-color: lightgrey;">
				<th>Personal Info</th>
			</tr>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Othername</th>
				<th>Gender</th>
				<th>DOB</th>
			</tr>
				<tr>
					<td><?php echo ucwords($firstname); ?></td>
					<td><?php echo ucwords($lastname); ?></td>
					<td><?php echo ucwords($othername); ?></td>
					<td><?php echo ucwords($gender); ?></td>
					<td><?php echo ucwords($dob); ?></td>
				</tr>
				<tr>
				<th style="background-color: lightgrey;">Contact Info</th>
				<th></th>
				<th></th>
				<th style="background-color: lightgrey;">Vaccination Info</th>
				<th></th>
			</tr>
			<tr>
				<th>Phone</th>
				<th>Address</th>
				<th></th>
				<th>First Dose (date)</th>
				<th>Second Dose (date)</th>
			</tr>
				<tr>
					<td><?php echo ucwords($phone); ?></td>
					<td><?php echo ucwords($address); ?></td>
					<td></td>
					<td><?php echo ucwords($vaccine_start); ?></td>
					<td><?php echo ucwords($vaccine_end); ?></td>
				</tr>
				
			</tbody>

			</table>
		</div>
		<?php
		}
	}else{
		echo '<center><h5 style="color: red;">Record Not Found</h5></center>';
	}
	
			?>
		</div>
	  </div>
 	</div>

 </section>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>