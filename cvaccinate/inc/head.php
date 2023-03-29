<?php
include_once('functions/model.php');
include_once('session.php');
if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
		$chk = _treat_session($email);
			if($chk==false){
			session_destroy();
			header("Location: ./");
		}
	}else{
		session_destroy();
		header("Location: ./");
	}

?>
<header>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#"><b><h3 style="color: rgb(77,200,244);">CVSS</h3></b></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarText">
	    <ul class="navbar-nav ml-auto">
		<li>
		<li class="nav-item  mr-5">
	        <a class="nav-link" href="#" style="color: lightgreen;"><?php $email = $_SESSION['email'];
			echo useridf($email); ?>
			<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item  mr-5">
	        <a class="nav-link" href="myinfo">Dashboard</a>
	      </li>
	      <li class="nav-item mr-5">
	        <a class="nav-link" href="logout">Logout</a>
	      </li>
	    </ul>
	  </div>
	</nav>
 </header>