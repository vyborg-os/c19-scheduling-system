<?php
include_once('functions/model.php');
$exec = new ManageData();

if(isset($_POST['login'])){
	$user_id = $exec->secure($_POST['user_id']);
	$password = $exec->secure(md5($_POST['password']));
	if(empty($user_id) || empty($password)){
		echo 'All field is compulsory';
	}else{
		$query = $exec->Login($user_id,$password);
		if($query==TRUE){
			//echo  'Account Created Sucessfully';
			header("Location: dashboard.php");
		}else{
			echo  'Login Failed';
		}
	
	}
}

?>