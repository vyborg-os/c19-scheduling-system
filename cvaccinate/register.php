<?php
include_once('functions/model.php');
session_start();
if(isset($_POST['register'])){
	$fullname = secure($_POST['fullname']);
	$email = secure($_POST['email']);
	$passwordyy = secure($_POST['password']);
	$cpassword = secure($_POST['cpassword']);
	$passwordy = password_hash($passwordyy, PASSWORD_BCRYPT);
	if(empty($fullname) || empty($passwordyy) || empty($cpassword) || empty($email)){
		echo 'All field is compulsory';
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo 'email is not valid';
    }else if ($passwordyy !== $cpassword) {
     	echo 'Password does not match';
    }else{
    	$query_acc = checkDoc($email);
		if($query_acc==true){
			echo 'Email already exist!';
		}
			else{
					$query = register($fullname,$email,$passwordy);
						if($query==TRUE){
							echo  'Account Created Sucessfully';
						}else{
							echo  'Registeration Failed';
						}
			}
	}
}
if(isset($_POST['uregister'])){
	$patient_id = 'pat'.rand(0,10000);
	$email = secure($_POST['email']);
	$passwordyy = secure($_POST['password']);
	$cpassword = secure($_POST['cpassword']);
	$passwordy = password_hash($passwordyy, PASSWORD_BCRYPT);
	if(empty($passwordyy) || empty($cpassword) || empty($email)){
		echo 'All field is compulsory';
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           echo 'email is not valid';
    }else if ($passwordyy !== $cpassword) {
     	echo 'Password does not match';
    }else{
    	$query_acc = _checkDoc($email);
		if($query_acc==true){
			echo 'Email already exist!';
		}
			else{
					$query = _register($patient_id,$email,$passwordy);
						if($query==TRUE){
							echo  'Account Created Sucessfully, kindly login';
						}else{
							echo  'Registeration Failed';
						}
			}
	}
}
if(isset($_POST['login'])){
            $email = secure($_POST["email"]);
            $pass = $_POST['password'];
            if(empty($email) || empty($pass)){
                echo 'Please provide your full details';
            }else if(!userExist($email)){
                echo'Account does not exist!';
            }else{
                if(userMatch_($email, $pass)==true){
                    echo 'Login Sucessful';
                    $_SESSION['email'] = $email;
					header("location: ./ffgdashboard");
                }else{
                    echo 'Invalid Email/Password';
                    }
            }
        
}
if(isset($_POST['userdel'])){
$patient_id = $_POST['userdel'];
$query = deleteU($patient_id);;
	if($query==TRUE){
		echo 'Patient Info Deleted Successfully!';
	}else{
		echo 'Cannot delete, try again';
	}

}
	if(isset($_POST['finfo'])){
		$patient_id = secure($_POST['patient_id']);
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
  			<div class="formText">Next Of Kin: <small><?php echo $next_of_kin; ?></small></div>
  			<div class="formText">Address: <small><?php echo $address; ?></small></div>
  			<div class="formText">Phone no: <small><?php echo $phone; ?></small></div>
  			<div class="formText">Patient ID: <small><?php echo $patient_id; ?></small></div>
  			<div class="formText">Type of Vaccination: <small><?php echo $type_of_vaccine; ?></small></div>
  			<div class="formText">First Vac Date: <small><?php echo $vaccine_start; ?></small></div>
  			<div class="formText">Second Vac Date: <small><?php echo $vaccine_end; ?></small></div>
  			<div class="formText">Next of kin Address: <small><?php echo $nok_address; ?></small></div>
  			<div class="formText">Next of Kin Phone: <small><?php echo $nok_phone; ?></small></div>
  			<div class="formText">NOK Relation: <small><?php echo $nok_relation; ?></small></div>
			  <div class="formText">Vaccination Status: <small><?php echo $status; ?></small></div>
  			<div class="col-md-4 option">
  			 <a class="btn btn-primary btn-block" href="edit?patient_id=<?php echo $patient_id; ?>">Edit</a>
  		</div>

		<?php
		}
	}else{
		echo '<center><h5 style="color: red;">Record Not Found</h5></center>';
	}
	}

?>