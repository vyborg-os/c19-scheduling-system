<!DOCTYPE html>
<html>
<head>
	<title>CVSS</title>

     <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<style type="text/css">
		body{

			background: url('img/bg2.jpg');
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
<body>

<div class="container">
	<div class="row" style="margin-top: 1rem;">
		<div class="col-md-3 col-12"></div>
		<div class="col-md-6 col-12">
			<div class="card p-3" style="background: rgba(256,256,256,.3);">
				<div class="container p-5 text-center">
			  		<img src="img/covid-vaccine.png" class="img-fluid"  style="width: 30%; height: 30%; border-radius: 100%;">
			  	</div>
			  	<h4 class="text-center" id="msg"></h4>
				<form method="POST" id="formSubmit">
					<div class="form-group text-center">
						<input type="text" name="fullname" placeholder="Full Name" class="form-control textBlue" style="border-radius: 50px;border-color: rgb(77,200,244);border-width: 1.9px;">
					</div>
					<div class="form-group text-center">
						<input type="email" name="email" placeholder="Email" class="form-control textBlue" style="border-radius: 50px;border-color: rgb(77,200,244);border-width: 1.9px;">
					</div>
					<div class="form-group text-center" >
						<input type="password" name="password" placeholder="Password" class="form-control textBlue" style="border-radius: 50px; border-color: rgb(77,200,244);border-width: 1.9px;">
					</div>
					<div class="form-group text-center">
						<input type="password" name="cpassword" placeholder="Confirm Password" class="form-control textBlue" style="border-radius: 50px; border-color: rgb(77,200,244);border-width: 1.9px;">
					</div>
					<div class="form-group text-center">
						<input type="hidden" name="register">
						<button type="submit" class="btn btn-rounded btn-lg blueColor" style="border-radius:  80px;background: #DE0688;">Sign up</button>
					    <a href="./"><p>Login</p></a>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3 col-12"></div>
	</div>
</div>

  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#formSubmit').submit(function(e){
  			e.preventDefault()
  			var datas = new FormData(this);
  			$.ajax({
  				url: 'register.php',
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