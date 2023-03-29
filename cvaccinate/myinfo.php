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
 		<div class="col-10 col-md-10 text-center p-0">
 			<h2 class="textBlue">Vaccination Details</h2>
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
            $rid = $f['patient_id'];
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
            <div class="formText">Reg_ID: <small><?php echo $rid; ?></small></div>
			<div class="formText">Full Name: <small><?php echo ucwords($lastname).' '.ucfirst($firstname).' '.ucfirst($othername); ?></small></div>
  			<div class="formText">DOB: <small><?php echo $dob; ?></small></div>
  			<div class="formText">Gender: <small><?php echo $gender; ?></small></div>
  			<div class="formText">Type of Vaccination: <small><?php echo $type_of_vaccine; ?></small></div>
  			<div class="formText">First Vac Date: <small><?php echo $vaccine_start; ?></small>
			  <?php if($status=='Partially Vaccinated' || $status=='Fully Vaccinated'){
                ?>
            <i class="fa fa-check" style="color: green;"></i>
            <?php
            }
			?>
		</div>
  			<div class="formText">Second Vac Date: <small><?php echo $vaccine_end; ?></small>
			  <?php if($status=='Fully Vaccinated'){
                ?>
            <i class="fa fa-check" style="color: green;"></i>
            <?php
            }
			?>
		</div>
  			<div class="formText">Next of kin Address: <small><?php echo $nok_address; ?></small></div>
  			<div class="formText">Next of Kin Phone: <small><?php echo $nok_phone; ?></small></div>
  			<div class="formText">Vaccination Status: <small><?php echo $status; ?> <?php if($status!='Fully Vaccinated'){
                ?>
            <i class="fa fa-spinner fa-spin"></i>
            <?php
            }?></small></div>
            <?php if($status=='Fully Vaccinated'){
                ?>
            <a href="vtrue" class="btn btn-success">View Acknowledgement Slip</a>
            <?php
            }else{
                ?>

            <center><p style="color: red;">Kindly adhere strictly to the scheduled date for vaccination</p></center>
               <?php 
            }

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