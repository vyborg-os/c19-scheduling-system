<?php
include_once('session.php');
include_once('functions/model.php');
if(isset($_POST['add_patient_info'])){
		$email = $_SESSION['email'];
		$patient_id = useridf($email);
		$firstname = secure($_POST['firstname']);
		$lastname = secure($_POST['lastname']);
		$othername = secure($_POST['othername']);
		$dob = secure($_POST['dob']);
		$gender = secure($_POST['gender']);
		$next_of_kin = secure($_POST['next_of_kin']);
		$phone = secure($_POST['phone']);
		$address = secure($_POST['address']);
		$nok_address = secure($_POST['nok_address']);
		$nok_phone = secure($_POST['nok_phone']);
		$nok_relation = secure($_POST['nok_relation']);
		$type_of_vaccine = secure($_POST['type_of_vaccine']);
		$vaccine_s = date('Y-m-d', strtotime('+1 day'));
		$valdate = fetch_date($vaccine_s);
		if($valdate<=100){
			$vaccine_start = date('Y-m-d', strtotime('+1 day'));
		}else{
			$vaccine_start = date('Y-m-d', strtotime('+2 day'));
		}
		//$vaccine_start = secure($_POST['vaccine_start']);
		//$vaccine_end = date('Y-m-d', strtotime('+21 day'));
		$vaccine_end = 'Null';
		$status = 'null/partially';
		$created_at = date("Y-m-d");
		if(empty($firstname) || empty($lastname) || empty($dob) ||  empty($gender) || empty($next_of_kin) || empty($phone) || empty($address)){
			echo '<h5 style="color: red;">Kindly fill all necessary fields</h5>';
		}else{
				$query = add_info($patient_id,$firstname,$lastname,$othername,$dob,$gender,$address,$phone,$next_of_kin
	,$nok_address,$nok_phone,$nok_relation,$type_of_vaccine,$vaccine_start,$vaccine_end,$status,$created_at);
				if($query==TRUE){
					echo '<h5 style="color: green;">Info Updated Sucessfully, Check Dashboard</h5>';
				}else{
					echo '<h5 style="color: red;">Failed to add info</h5>';
				}
			}
			
		
		}



?>