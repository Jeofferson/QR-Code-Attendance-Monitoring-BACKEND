<!DOCTYPE html>
<html>
<head>

	<title>PHINMA University of Pangasinan - Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="script.js"></script>


	<style >
		* {  
			box-sizing: border-box;
		}
		.button {
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			transition-duration: 0.4s;
			cursor: pointer;
		}
		.button1 {
			background-color: #4CAF50; 
			color: white; 
			border: 2px solid #4CAF50;
			border-radius: 8px;
		}
		.button1:hover {
			background-color: white;
			color:#4CAF50;
		}
		.head {
			background-color: #1E8449;
			height: 120px;
			width: 100%;
		}
		.ams {
			width: 350px;
			height: auto;
			padding-top: 10px;
			
		}
		.title {
			font-family: sans-serif;
			color: white;
			padding-top: 40px;
			font-size: 20px;
		}
		.mid {
			width: 750px;
			height: 300px;
			background-color: #1E8449;
			margin-top: 130px;
			float: left;

			border-radius: 0px 20px;
		}
		.right {
			float: right;
			margin-right : 10px;
			margin-top: 160px;
			font-size: 18px;

		}
		.bot {
			background-color:#1E8449;
			margin-top: 602px;
			height: 40px;
			width: 100%;
			color: white;
		}
		.form-control {
			width: 350px;
		}
		.form-horizontal {
			margin-top: 100px;
		}
		.form-group {
			color: white;
			margin-left: 50px;
		}
		.admin {
			padding-top: 40px;
			margin-left: 50px;
			color: white;
			width: 500px;
		}
		.admin-pic {
			height: 180px;
			width: 180px;
			float: left; 
			margin-left: 20px;
			margin-top: 40px;
		}
		.copyright {
			font-size: 12px;
			padding-top: 15px;
			text-align: center;
		}
		form #form1 {
			margin-top: -10px;
		}
		input[type:text] #email {
			margin-top: 10px;
		}
	</style>

	<script type="text/javascript">
		function display(){
			alert("Login Successfully!");
			window.open("index.php","_self");
		}
	</script>

</head>
<body background="images/bg.png">

	<div class="head">
		<img src="images/Upang.png" class="Upang">
		<img src="images/Title.png" class="ams">
	</div>
	<div class="mid">
		<img src="images/admin.png" class="admin-pic">	
		<form method="post" action="process.php">
			<fieldset>
			<legend class="admin">Admin Authentication</legend>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Username:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" name="username" placeholder="Enter username">
					</div>
				</div>
				<br>
				<br>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Password:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" value="Login to my Account" class="button button1" name="login">
					</div>
				</div>
			</div>
			</fieldset>
			<div id="right" class="right">
				<p style="font-size: 11pt;">This module is exclusively for ADMIN only. Functions included are: </p>
				<li>Adding Student</li>
				<li>Importing CSV files</li>
				<li>Register Faculty Account</li>
				<li>Update Records</li>
				<br>
				<label style="font-weight: bold; margin-left: -10px; font-size: 13pt;" >
					INSTRUCTIONS:
				</label>
				<li>To sign-in, enter your username and password and click on the Login button</li>
			</div>
		</form>
		<!--<div class="bot">
		<p class="copyright">© All right reserved 2020</p>
		</div>-->
	</div>

</body>
</html>