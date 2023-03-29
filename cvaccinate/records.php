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
 <?php require_once "inc/header.php" ?>

 <section>
<div class="container" style="margin-top: 10px; ">
	 </div>
 	<div class="container row">
 		<div class="col-12 col-md-12 text-center p-4">
 			<h4 class="textBlue">#Patient Record</h4>
 		</div>
	  <div class="col-12 col-md-4">
	  	<div class="container p-5">
	  		<div class="card p-1"  style="width: 100%; height: 100%; border-radius: 100%;background: blue;align-content: center;">
	  			<img src="img/bg1.png" class="img-fluid"  style="width: 100%; height: 100%; border-radius: 100%;float: right;">
	  		</div>
	  	</div>
	  </div>
	  <div class="col-12 col-md-8">

  		<div class="card p-2">
  			<form method="POST" id="fpat">
  				<div class="form-group">
   	 		<div class="row">
				<div class="col-lg-8" >
					   <div class="col-lg-8 form-group" style="margin: 0% 45%;" >
				    	 <input type="text" class="form-control curve" placeholder="Patient ID" name="patient_id" required>
				    	</div>
				</div>
					<div class="col-sm-2">
						<div class="col-sm-2 form-group">
							 <input type="hidden" name="finfo">
							<button class="btn btn-primary" style="border-radius: 10%;">Fetch</button>
					    </div>
				</div>
			</div>
		</div>
	</form>
	<div id="pdata">
		
	</div>
  		</div>

	  </div>
 	</div>

 </section>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
  	$(document).ready(function(){
  		$('#fpat').submit(function(e){
  			e.preventDefault()
  			var datas = new FormData(this);
  			$.ajax({
  				url: 'register.php',
  				method: 'POST',
  				data: datas,
  				success: function(data){
  					$('#pdata').html(data);
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