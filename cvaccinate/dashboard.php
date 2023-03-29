<!DOCTYPE html>
<html>
<head>
	<title>CVSS</title>
	  <!-- Mobile specific metas  -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
	  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/bower.json"></script>
	 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/bower.json"></script> 
	  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/package.json"></script>	
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
	</style>
</head>
<body>
<?php require_once "inc/header.php"; ?>

 <section>
 	<div class="container row">
	  <div class="col-md-3 col-lg-3 col-3"></div>
	  <div class="col-md-6 col-12">
	  	<div class="m-4">
			<form method="POST">
				<div class="form-group">
					<input type="text" name="search" id="search" class="form-control" placeholder="Search..." style="border-radius: 50px;">
				</div>
			</form>
		</div>
	  </div>
	  <div class="col-md-3 col-lg-3 col-3"></div>	

	  <div class="col-md-11 col-12">
	  	<div class="container card p-3">
	  		<canvas id="myChart" style="width: 100%;height: 350px auto;"></canvas>
	  	</div>	
	  </div>
	  <div class="col-md-1 col-12" style="align-content: center;justify-content: center;">
	  	 <div class="row">
	  	 	<div class=" col-6 p-4" >
		  	 	<div  class="card text-center" style="width: 150px;height: 150px;background: red;color: white ;border-radius: 100%;">
		  	 		<h4 style="font-weight: bolder;"> 
		  	 			<span class="badge badge-pill badge-danger float-right text-center" style="width: 60px;height: 30px;border-radius: 100%;">1200</span>
		  	 			<br> 
		  	 			<p class="m-1" >Total <br>Records</p> 
		  	 		</h4>
		  	 	</div>
		  	 </div>

		  	  <div class="col-6 p-4">
		  	 	<div  class="card text-center" style="width: 150px;height: 150px;background: red;color: white ;border-radius: 100%;">
		  	 		<h4 style="font-weight: bolder;"> 
		  	 			<span class="badge badge-pill badge-danger float-right text-center" style="width: 60px;height: 30px;border-radius: 100%;">1200</span>
		  	 			<br> 
		  	 			<p class="m-1" >Total <br>Records</p> 
		  	 		</h4>
		  	 	</div>
		  	 </div>
	  	 </div>
	  </div>
 	</div>
 </section>
<!-- <div class="container">
	<div class="row" style="margin-top: 20rem;">
		<div class="col-md-3 col-lg-3"></div>
		<div class="col-md-6 col-lg-6">
			<div class="">
				<form method="POST">
					<div class="form-group text-center">
						<label class="textBlue">Login Id</label>
						<input type="text" name="loginId" class="form-control" style="border-radius: 50px;">
					</div>
					<div class="form-group text-center" >
						<label class="textBlue">Password</label>
						<input type="password" name="password" class="form-control" style="border-radius: 50px;">
					</div>
					<div class="form-group text-center">
						<button class="btn btn-rounded btn-lg blueColor" style="border-radius: 10px;">Sign In</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3 col-lg-3"></div>
	</div>
</div> -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
	    var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jly', 'Aug', 'Sep', 'Oct', 'Nov', 'dec'],
		        datasets: [{
		            label: 'Total Record ',
		            data: [12, 19, 3, 5, 2, 3, 9, 13, 14, 15, 16, 2],
		            backgroundColor: [
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		            ],
		            borderColor: [
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)',
		                'rgb(77,200,244)'
		            ],
		            borderWidth: 2
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});
  </script>
</body>
</html>