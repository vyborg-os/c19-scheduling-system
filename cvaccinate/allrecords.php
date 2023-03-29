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
	<link rel="stylesheet" type="text/css" href="css/datatables.css">
	
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
 			<h4 class="textBlue">#Patient Records</h4>
 		</div>
	 <div class="col-10 col-md-10" style="margin: 0% 20%;" >
	 	<div class="card p-2">
  		<table class="table table-responsive" id="example">
  			<thead>
  				<tr>
					<th>#</th>
					<th>P_ID</th>
  					<th>Fullname</th>
  					<th>DOB</th>
  					<th>Sex</th>
  					<th>Phone</th>
  					<th>Vaccination Type</th>
  					<th>First Vac</th>
					<th>Last Vac</th>
					<th>Days Left</th>
					<th>Status</th>
  					<th>Action</th>
  					
  				</tr>
  			</thead>
  			<tbody>
  					<?php
  					$num = 1;
					$total = 0;
					$table = 'patient';
  					$ft = fetch_all_data_raw($table);
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
						$vst = $f['vaccine_start'];
						$vend = $f['vaccine_end'];
						$patient_id = $f['patient_id'];
						$type_of_vaccine = $f['type_of_vaccine'];
						$status = $f['status'];
						$patient_id = $f['patient_id'];
						//$amount  = $f['id'] == 0 ? '' : number_format($f['id']);
						?>
						<tr>
						<td><?php echo $num++; ?></td>
						<td><?php echo $patient_id; ?></td>
						<td><small><?php echo ucwords($lastname).' '.ucfirst($firstname).' '.ucfirst($othername);?></small></td>
						<td><small><?php echo $dob; ?></small></td>
						<td><small><?php echo $gender; ?></small></td>
						<td><small><?php echo $phone; ?></small></td>
						<td><small><?php echo $type_of_vaccine; ?></small></td>
						<td><small><?php echo $vst; ?></small></td>
						<td><small><?php echo $vend; ?></small></td>
						<td><small><?php
						$today = strtotime("now");
						$due_date = strtotime($f['vaccine_end']);			
						if($due_date > $today){
										$hours = $due_date - $today;
										$hours = $hours / 3600;
										$time_left = $hours/24;								//$progress = ((count($points)/count(round($time_left,0)) + 0.2) * 100);
											if($time_left < 1){
												$time_left = 'Less than 1 day';
											}
											else if($time_left < 2){
												$time_left = '1 day left';
											}
											else{
												$time_left = round($time_left).' days left';
											}
                                            }
                                            else{
                                                $time_left = 'null';
                                            }
											echo $time_left;
						?></small></td>
						<td><small><?php echo $status; ?></small></td>
						<td><a href="edit?patient_id=<?php echo $patient_id; ?>"><i class="fa fa-edit" style="color: blue;" title="edit"></i></a> | <a href="#delete" class="userdel" id="<?php echo $patient_id; ?>"><i class="fa fa-times" style="color: red;" title="delete"></i></a></td>
					</tr>
						<?php
						 //$total += $f['id'];
						 //$num++;
  					}
					 }else{
						 echo '<tr><td>No records yet</td></tr>';
					 }
  					?>

  			</tbody>
  		</table>
  	</div>
	  </div>
 	</div>

 </section>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<script>
$(document).ready(function(){
	 $('.userdel').click(function(){
	      var userdel = $(this).attr("id");
	      if(confirm("Delete Patient Info?")){
	          $.ajax({
	            url:'register.php',
	            method:'POST',
	            data:'userdel='+userdel,
	            success:function(data){
	              alert(data);
	              window.location = "allrecords";
	            },
	            error: function(data){
	              alert(data);
	              window.location = "allrecords";
	            }
	          });
	                              
	        }
	    });
	 })
	 $(document).ready(function() {
			$('#example').DataTable();
		} );
</script>
</body>
</html>