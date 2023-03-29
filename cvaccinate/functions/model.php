<?php
include_once('db.php');
//calling the database function
	function __construct(){
		$db = new dbcon();
		$this->link = $db->conn();
		return $this->link;
	}
	function secure($string){
		$sec = htmlentities($string);
		return $sec;
	}
	function register($fullname,$email,$passwordy){
		require 'db.php';
		$query = $mysqli->prepare("INSERT INTO healthworker (fullname,email,password) VALUES (?,?,?)");
		$query->bind_param("sss",$fullname,$email,$passwordy);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
		$result = $query->get_result();
		return $result;
	}
	function _register($patient_id,$email,$passwordy){
		require 'db.php';
		$query = $mysqli->prepare("INSERT INTO patient_log (patient_id,email,password) VALUES (?,?,?)");
		$query->bind_param("sss",$patient_id,$email,$passwordy);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
		$result = $query->get_result();
		return $result;
	}
	function fetch_all_data_raw($table){
	//Require Databse config file
		require 'db.php';
		$stmt = $mysqli->prepare("SELECT * FROM ".$table."");
		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
	function checkDoc($email){
		require 'db.php';
		$stmt = $mysqli->prepare("SELECT * FROM healthworker WHERE email = ?");
	    $stmt->bind_param("s", $email);
	    $stmt->execute();
	    
	    $res = $stmt->get_result();
	    if($res->num_rows > 0){
	        return true;
	    }else{
	        return false;
	    }
	}
	function _checkDoc($email){
		require 'db.php';
		$stmt = $mysqli->prepare("SELECT * FROM patient_log WHERE email = ?");
	    $stmt->bind_param("s", $email);
	    $stmt->execute();
	    
	    $res = $stmt->get_result();
	    if($res->num_rows > 0){
	        return true;
	    }else{
	        return false;
	    }
	}
	function treat_session($email){
		//Require Databse config file
		require 'db.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM healthworker WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
	function _treat_session($email){
		//Require Databse config file
		require 'db.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM patient_log WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
	function userExist($email){
		//Require Databse config file
		require 'db.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM healthworker WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
	function _userExist($email){
		//Require Databse config file
		require 'db.php';

		//Check if email exist
		$stmt = $mysqli->prepare("SELECT * FROM patient_log WHERE email = ?");
		$stmt->bind_param("s", $email);
		if($stmt->execute()){
			$result = $stmt->get_result();

			if ($result->num_rows >0) {
				return true;
			}else{
				return false;
			}
		}else{
			die($mysqli->error);
		}
	}
	function userMatch_($email, $pass){
		require 'db.php';
	    $stmt = $mysqli->prepare("SELECT * FROM healthworker WHERE email = '$email'");
	    $stmt->execute();
	    $result = $stmt->get_result();
	    if($result->num_rows > 0){
	        $fetch = $result->fetch_assoc();
	        if(password_verify($pass, $fetch["password"])){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
	function _userMatch_($email, $pass){
		require 'db.php';
	    $stmt = $mysqli->prepare("SELECT * FROM patient_log WHERE email = '$email'");
	    $stmt->execute();
	    $result = $stmt->get_result();
	    if($result->num_rows > 0){
	        $fetch = $result->fetch_assoc();
	        if(password_verify($pass, $fetch["password"])){
	            return true;
	        }else{
	            return false;
	        }
	    }else{
	        return false;
	    }
	}
	function add_info($patient_id,$firstname,$lastname,$othername,$dob,$gender,$address,$phone,$next_of_kin,$nok_address,$nok_phone,$nok_relation,$type_of_vaccine,$vaccine_start,$vaccine_end,$status,$created_at){
		require 'db.php';
		$query = $mysqli->prepare("INSERT INTO patient (patient_id,firstname,lastname,othername,dob,gender,address,phone,next_of_kin,nok_address,nok_phone,nok_relation,type_of_vaccine,vaccine_start,vaccine_end,status,created_at) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$query->bind_param("sssssssssssssssss",$patient_id,$firstname,$lastname,$othername,$dob,$gender,$address,$phone,$next_of_kin,$nok_address,$nok_phone,$nok_relation,$type_of_vaccine,$vaccine_start,$vaccine_end,$status,$created_at);
		// $values = array($patient_id,$firstname,$lastname,$othername,$dob,$gender,$nextofkin,$mobile,$email,$homeaddress,$office_addr,$next_of_kin_number,$g_fullname,$g_phone,$g_addr,$g_mail,$g_relation,$patient_diag,$patient_remark,$admission_date,$discharge_date,$ward,$bed_no,$type_of_treatment,$description,$report,$total_pay,$total_paid,$total_due);
		if($query->execute()){
			return true;
		}else{
			return false;
		}
		$result = $query->get_result();
		return $result;
	}
	function fetch_patient_info($patient_id){
		require 'db.php';
		$query = $mysqli->prepare("SELECT * FROM patient WHERE patient_id = ?");
		$query->bind_param("s",$patient_id);
		$query->execute();
		$result = $query->get_result();
		return $result;
		
	}
	function fetch_patient_info_count($patient_id){
		require 'db.php';
		$query = $mysqli->prepare("SELECT * FROM patient WHERE patient_id = ?");
		$query->bind_param("s",$patient_id);
		$query->execute();
		$result = $query->get_result();
		if($result->num_rows > 0){
			return true;
		}else{
			return false;
		}
		
	}
	function fetch_date($vaccine_s){
		require 'db.php';
		$query = $mysqli->prepare("SELECT * FROM patient WHERE vaccine_start = ?");
		$query->bind_param("s",$vaccine_s);
		$query->execute();
		$result = $query->get_result();
		return $result->num_rows;
		
	}
	function deleteU($patient_id){
		require 'db.php';
		$stmt = $mysqli->prepare("DELETE FROM patient WHERE patient_id='$patient_id' LIMIT 1");
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		$result = $stmt->get_result();
		return $result;
	}
	function fullname_f($email){
		require 'db.php';
		$stmt = $mysqli->prepare("SELECT * FROM healthworker WHERE email = '$email'");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		return $re['fullname'];
	}
	function useridf($email){
		require 'db.php';
		$stmt = $mysqli->prepare("SELECT * FROM patient_log WHERE email = '$email'");
		$stmt->execute();
		$res = $stmt->get_result();
		$re = $res->fetch_assoc();
		return $re['patient_id'];
	}
	function fetch_all_data(){
		$query = $this->link->query("SELECT * FROM patient");
		$counts = $query->fetchAll();
		return $counts;
	}
	function update_status($patient_id,$status,$vaccine_ref){
		//Require Databse config file
		require 'db.php';
		$stmt = $mysqli->prepare("UPDATE patient SET status = '$status', vaccine_ref = '$vaccine_ref' WHERE patient_id = '$patient_id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
	function update_v_end($patient_id,$status,$vaccine_end){
		//Require Databse config file
		require 'db.php';
		$stmt = $mysqli->prepare("UPDATE patient SET vaccine_end = '$vaccine_end', status = '$status' WHERE patient_id = '$patient_id'");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
		$result = $stmt->get_result();
		return $result;
	}
	?>