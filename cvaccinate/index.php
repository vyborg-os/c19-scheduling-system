<?php
include_once('functions/model.php');
include_once('session.php');
if(isset($_POST['login'])){
            $email = secure($_POST["email"]);
            $pass = $_POST['password'];
            if(empty($email) || empty($pass)){
                $err = 'Please provide your full details';
            }else if(!_userExist($email)){
                $err = 'Account does not exist!';
            }else{
                if(_userMatch_($email, $pass)==true){
                    $err = 'Login Sucessful';
                    $_SESSION['email'] = $email;
					$patient_id = useridf($email);
					$pagechk = fetch_patient_info_count($patient_id);
					if($pagechk==true){
						header("location: ./myinfo");
					}else{
					header("location: ./info");
					}
                }else{
                    $err =  'Invalid Email/Password';
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
			background: url('img/knkn.svg');
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
			font-weight: bolder;
		}

		.blueColor:hover{
			background: rgb(77,200,244);
			color: white;
		}

	</style>
</head>
<body >
<div class="container">
    <div class="row" style="margin-top: 3rem;">
    	
		<div class="col-md-6 col-12">
			<h2 style="font-weight: bolder;color: white">COVID-19 <br> SCHEDULIING SYSTEM <br> (CVSS)</h2>
		</div>
		<div class="col-md-6 col-12">
			<div class="container p-5">
		  		<div class="card p-1"  style="width: 50%; height: 50%; border-radius: 100%;background: rgb(77,200,244);align-content: center;float: right;">
		  			<img src="img/05.png" class="img-fluid"  style="width: 100%; height: 100%; border-radius: 100%;">
		  		</div>
		  	</div>
		</div>

    </div>

	<div class="container ">
		<div class="row" style="margin-top: 3rem;">
			<div class="col-md-3 col-12"></div>
			<div class="col-md-6 col-12">
				<div class="">
					<h4 class="text-center" id="msg">
					<?php
					if(isset($err)){
						echo $err;
					}
					?>
					</h4>
					<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
						<div class="input-group mb-3 text-center">
							<div class="input-group-append">
							    <span class="input-group-text" id="basic-addon2" style="width: 45px;border-radius: 50px;background: white;color: rgb(77,200,244);">  <img src="img/usericon.svg" class="img-fluid">
							    </span>
							</div>
							<input type="email" placeholder="Email" name="email" class="form-control" style="border-radius: 50px;border-color: rgb(77,200,244);	border-width: 1.9px;"  aria-describedby="basic-addon2">
						</div>
						<div class="input-group mb-3 text-center">
							<div class="input-group-append">
						      <span class="input-group-text" id="basic-addon3" style="width: 45px;border-radius: 50px;background: white;color: rgb(77,200,244);">
						      	 <img src="img/lock.svg" class="img-fluid">
						      </span>
						    </div>
							<input type="password" placeholder="Password" name="password" class="form-control" style="border-radius: 50px;			border-color: rgb(77,200,244);border-width: 1.9px;"  aria-describedby="basic-addon3">
						</div>
						<div class="form-group text-center">
				            <input type="hidden" name="login">
							<button class="btn btn-rounded btn-lg blueColor" style="border-radius: 10px;">Sign In</button><br>
							<a href="#"  data-toggle="modal" data-target="#exampleModalCenter">forgot password</a>
							| <a href="usereg">SignUp</a>| 
							<a href="stafflogin">Staff Login</a>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3 col-3"></div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST">
			<div class="input-group text-center">
				<div class="input-group-append">
			      <span class="input-group-text" id="basic-addon3" style="width: 45px;border-radius: 50px;background: white;color: rgb(77,200,244);">
			      	 <img src="img/lock.svg" class="img-fluid">
			      </span>
			    </div>
				<input type="email" name="forgotMail" placeholder="Email Address" class="form-control textBlue" style="border-radius: 50px;border-color: rgb(77,200,244);border-width: 1.9px;">
			</div>
			<div class="form-group text-center">
				<button class="btn btn-rounded btn-lg blueColor" style="border-radius:  80px;background: #DE0688;">Send</button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>

  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
 
</body>
</html>