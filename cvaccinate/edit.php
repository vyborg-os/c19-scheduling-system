<?php
include_once('functions/model.php');
if(isset($_POST['edit_patient_info'])){
	$status = $_POST['status'];
	$vaccine_ref = 'VAC-'.date("Y").rand(0,100000000).'-'.rand(0,1000000);
	$patient_id = $_GET['patient_id'];
	if(empty($status)){
		$msg = 'Status field is required!';
	}elseif($status=='Partially Vaccinated'){
		$vaccine_s = date('Y-m-d', strtotime('+21 day'));
		$valdate = fetch_date($vaccine_s);
		if($valdate<=100){
			$vaccine_end = date('Y-m-d', strtotime('+21 day'));
		}else{
			$vaccine_end = date('Y-m-d', strtotime('+22 day'));
		}
		$chkd = update_v_end($patient_id,$status,$vaccine_end);
		if($chkd==true){
			$msg = 'Info Updated';
		}
		else{
			$msg = 'Cannot Update Patient Info, Try again!';
		}
	}else{
		$chk = update_status($patient_id,$status,$vaccine_ref);
		if($chk==true){
			$msg = 'Info Updated';
			if($status=='Fully Vaccinated'){
				header("location: ref?patient_id=$patient_id");
			}
		}else{
			$msg = 'Cannot Update Patient Info, Try again!';
		}
	}
}
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
 <?php require_once "inc/header.php" ?>

 <section>
<div class="container" style="margin-top: 10px; ">
	 </div>
 	<div class="container row">
 		<div class="col-12 col-md-12 text-center p-4">
 			<h4 class="textBlue">#Update Patient Records</h4>
 		</div>
	 <div class="col-10 col-md-10" style="margin: 0% 20%;" >
	 	<div class="card p-2">
		<?php
		if(isset($msg)){
			echo'<center><h3 style="color: green;">'.$msg.'</h3></center>';
		}
		?>
		<?php
		if(isset($_GET['patient_id'])){
		$patient_id = $_GET['patient_id'];
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
			$nok_relation = $f['nok_relation'];
			?>
			<style>
			.formText{
				font-size: 1.5em;
				color: orange;
			}
			small{
				color: black;
			}
			</style>
			<div class="formText">Full Name: <small><?php echo ucwords($lastname).' '.ucfirst($firstname).' '.ucfirst($othername); ?></small></div>
  			<div class="formText">DOB: <small><?php echo $dob; ?></small></div>
  			<div class="formText">Gender: <small><?php echo $gender; ?></small></div>
  			<div class="formText">Type of Vaccination: <small><?php echo $type_of_vaccine; ?></small></div>
  			<div class="formText">First Vac Date: <small><?php echo $vaccine_start; ?></small></div>
  			<div class="formText">Second Vac Date: <small><?php echo $vaccine_end; ?></small></div>
  			<div class="formText">Next of kin Address: <small><?php echo $nok_address; ?></small></div>
  			<div class="formText">Next of Kin Phone: <small><?php echo $nok_phone; ?></small></div>
  			<div class="formText">NOK Relation: <small><?php echo $nok_relation; ?></small></div>
			  <div class="formText">Vaccination Status: <small><?php echo $status; ?></small></div>
  			<div class="col-md-12 option">
			<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data"
			<div class="form-group">
			<select name="status" class="form-control curve" required>
				<option selected disabled>Vaccination Status</option>
				<option>Fully Vaccinated</option>
				<option>Partially Vaccinated</option>
			</select>
			<div class="form-group">
					<input type="hidden" name="edit_patient_info">
			   <button class="btn btn-lg btn-block btn-primary mt-4">Edit Record</button>
			</div>
			</form>
		</div>
  			</div>

		<?php
		}
	}else{
		echo '<center><h5 style="color: red;">Record Not Found</h5></center>';
	}
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