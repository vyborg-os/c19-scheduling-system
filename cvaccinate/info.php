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

		.textBlue{
			color: rgb(77, 200, 244);
			font-weight: bold;
		}

		.cap{
			width: 700px auto;
		}
	</style>
</head>
<body>
<?php require_once "inc/head.php"; ?>

<section>
 	<div class="container row">
	  <div class="col-md-3 col-sm-12"></div>
	  <div class="col-md-8 col-sm-12 text-center">
		
 		<div style="margin-top: 8em;">
		<p style="color: orange;">Kindly Update your info to proceed</p>
 			<div class="">
 			<h4 class="text-center" id="msg"></h4>
 				<form method="POST" class="text-center" id="formInfo">
 					<div class="p-2 cap" id="personalInfo">
 						<div class="card w-100" style="background-color: rgba(245, 245, 245, .1);border-radius: 20px;"  data-toggle="modal" data-target="#lunchInfo">
 							<h4 class="m-2 textBlue">Personal Info <img src="img/arrow.svg" class="float-right img-fluid" style="width: 40px;" class="float-right"></h4>
 						</div>

						<!-- Modal -->
						<div class="modal fade" id="lunchInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content p-3">
						      <div class="modal-heade text-center">
						        <h5 class="modal-title textBlue" id="exampleModalCenterTitle">Patients Personal Info</h5>
						      </div>
						      <div class="modal-body">
						        <div class="form-group">
						        	 <input type="text" class="form-control curve" placeholder="First Name" name="firstname">
						        </div>
						        <div class="form-group">
						        	<input type="text" class="form-control curve" placeholder="Last Name" name="lastname">
						        </div>
						        <div class="form-group">
						        	<input type="text" class="form-control curve" placeholder="Other Name" name="othername">
						        </div>
						        <div class="form-group">
								<label for="dob">D.O.B</label>
						        	<input type="date" class="form-control curve" placeholder="Date Of Birth" name="dob">
						        </div>
								<div class="form-group">
									<select name="gender" class="form-control curve" required>
										<option selected disabled>Gender</option>
										<option>Male</option>
										<option>Female</option>
									</select>
								</div>
						        <div class="form-group">
						            <button type="button" class="btn float-right" data-dismiss="modal"><img src="img/down.svg" width="20px"></button>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
 					</div>
 					<div class="p-2 cap" id="contactInof">
 						<div class="card w-100" style="background-color: rgba(245, 245, 245, .1);border-radius: 20px;"  data-toggle="modal" data-target="#lunchContact">
 							<h4 class="m-2 textBlue">Contact Info <img src="img/arrow.svg" class="float-right img-fluid" style="width: 40px;" class="float-right"></h4>
 						</div>

						<!-- Modal -->
						<div class="modal fade" id="lunchContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content p-3">
						      <div class="modal-heade text-center">
						        <h5 class="modal-title textBlue" id="exampleModalCenterTitle">Patients Contact Info </h5>
						      </div>
						      <div class="modal-body">
						        <div class="form-group">
						        	 <input type="number" class="form-control curve" placeholder="Mobile Number" name="phone">
						        </div>
						        <div class="form-group">
						        	<input type="text" class="form-control curve" placeholder="Home Address" name="address">
						        </div>
						        <div class="form-group">
						        	<input type="text" class="form-control curve" placeholder="Next Of Kin" name="next_of_kin">	
								</div>
								 <div class="form-group">
						        	<input type="text" class="form-control curve" placeholder="Next Of Kin Address" name="nok_address">						        
						        </div>
								<div class="form-group">
									<select name="nok_relation" class="form-control curve" required>
										<option selected disabled>Choose relation..</option>
										<option>Brother</option>
										<option>Sister</option>
										<option>Cousin</option>
										<option>Son</option>
										<option>Daughter</option>
										<option>Husband</option>
										<option>Wife</option>
										<option>Other</option>
									</select>
								</div>
								<div class="form-group">
						        	<input type="number" class="form-control curve" placeholder="Next Of Kin Mobile Number" name="nok_phone">
						            <button type="button" class="btn float-right" data-dismiss="modal"><img src="img/down.svg" width="20px"></button>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
 					</div>
 					<div class="p-2 cap" id="diagnosisInfo">
 						<div class="card w-100" style="background-color: rgba(245, 245, 245, .1);border-radius: 20px;"  data-toggle="modal" data-target="#lunchDiagnosis">
 							<h4 class="m-2 textBlue">Vaccine Type<img src="img/arrow.svg" class="float-right img-fluid" style="width: 40px;" class="float-right"></h4>
 						</div>
						<!-- Modal -->
						<div class="modal fade" id="lunchDiagnosis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content p-3">
						      <div class="modal-heade text-center">
						        <h5 class="modal-title textBlue" id="exampleModalCenterTitle">Vaccination Details</h5>
						      </div>
						      <div class="modal-body">
								<div class="form-group">
									<select name="type_of_vaccine" class="form-control curve" required>
										<!-- <option selected disabled>Vaccination Type</option> -->
										<option>Johnson & Johnson + Asyer</option>
									</select>
								</div>			        
						        <div class="form-group">
						        <button type="button" class="btn float-right" data-dismiss="modal"><img src="img/down.svg" width="20px"></button>
						        </div>
						      </div>
						    </div>
						  </div>
						</div>
 					</div>
 					<div class="form-group">
				            <input type="hidden" name="add_patient_info">
 					   <button class="btn btn-lg btn-block btn-primary">Add Record</button>
 					</div>
 				</form>
 			</div>
 		</div>
	  </div>	
    </div>
</section>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
  	$(document).ready(function(){
  		$('#formInfo').submit(function(e){
  			e.preventDefault()
  			var datas = new FormData(this);
  			$.ajax({
  				url: 'add_patient.php',
  				method: 'POST',
  				data: datas,
  				success: function(data){
  					$('#msg').html(data);
  				},
  				cache: false,
  				contentType: false,
  				processData: false
  			})
  		})
  	})

  </script>
</body>
</html>