<!DOCTYPE html>
<html>
<head>

	<title>PHINMA University of Pangasinan - Faculty List</title>

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

		.button2 {
			background-color:  #008CBA; 
			color: white; 
			border: 2px solid #008CBA;
			border-radius: 8px;
		}

		.button2:hover {
			background-color: white;
			color: #008CBA;
		}

		.button3 {
			background-color: #f44336; 
			color: white; 
			border: 2px solid #f44336;
			border-radius: 8px;
		}
		.button3:hover {
			background-color: white;
			color: #f44336;
		}

		.head {
			background-color: #1E8449;
			height: 95px;
			width: 100%;
		}
		.ams{
			width: 350px;
			height: auto;
			padding-top: 10px;
		}
		.bot{
			background-color:#1E8449;
			margin-top: 100px;
			position: fixed;
			height: 40px;
			width: 100%;
		}
		.title {
			font-family: sans-serif;
			color: white;
			padding-top: 40px;
			font-size: 20px;
		}
		.text1 {
			text-align: center;
		}
		.text{
			text-align: right;
		}
		.lbl-add{
			margin-top: 10px;
		}
		.Upang{
			height: 100px;
			width: 100px;
			margin-left: 20px;
		}
		.phinma{
			margin-top: 20px;
			margin-left: 1240px;
			height: 60px;
		}
		.option{
			width: 35px;
			height: 35px;
		}
		.option1{
			width: 35px;
			height: 35px;
			margin-left: 40px;
		}
		th{
			text-align: center !important;
			background-color: yellow;
			font-size: 12pt;
		}
		.bg {
			float: left;
		}
	</style>
</head>
<body style="margin: 0px;" background="images/bg.png">

	<div class="head">
		<img src="images/Upang.png" class="Upang">
		<img src="images/Title.png" class="ams">
		<a href="HomePage.php" style="color: white; font-size:15px;margin-left:530px;">Student List </a>•    
		<a href="FacultyList.php" style="color: white; font-size:15px;">Faculty List </a>
		<a href="index.php"><button type="button" class="button button3" style="float: right;margin-right: 160px;margin-top: 30px;">Log Out</button></a>
	</div>
	<div id="divButtons" class="form-group">
		<button id="Import" type="button" class="button button3" data-toggle="modal" data-target="#users_modal" style="margin-top: 40px;margin-left: 980px;">Download</button>
		<button id="add" type="button" class="button button2 modalAddFaculty" data-toggle="modal" data-target="#user_modal" style=" margin-top: 40px;">Add Faculty</button>
		<button id="Import" type="button" class="button button1" data-toggle="modal" data-target="#users_modal" style="margin-top: 40px;">Import</button>
	</div>
	<!---MODAL MESSAGE -->
	<div class="modal fade" role="dialog" id="users_modal">	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Import File</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="process.php">
					<div class="modal-body">
						<input type="file" name="csv_file_faculty" placeholder="Import" class="btn btn-info btn-block">
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" data-dismiss="modal">Close</button>
						<input type="submit" name="upload_csv_file_faculty" value="Submit" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!---MODAL MESSAGE -->
	<div class="modal fade" role="dialog" id="user_modal">	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title modalTitle">Add Faculty</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form method="POST" name="form" action="process.php"> 
						<div class="form-group">
							<label class="lbl-add">Faculty ID</label>
							<input id="field" type="text" name="facultyId" class="form-control modalField1" required="true"  value="" autocomplete="off">
							<label class="lbl-add">Last Name</label>
							<input id="field" type="text" name="lastName" class="form-control modalField2" required="true" autocomplete="off">
							<label class="lbl-add">First Name</label>
							<input id="field" type="text" name="firstName" class="form-control modalField3" required="true" autocomplete="off">
							<label class="lbl-add">Middle Name</label>
							<input id="field" type="text" name="middleName" class="form-control modalField4" required="true" autocomplete="off">
							<label class="lbl-add">Department</label>
							<input id="field" type="text" name="department" class="form-control modalField5" required="true" autocomplete="off">
							<input style="display:none;" id="field" type="text" name="id" class="form-control modalField6" required="true" autocomplete="off" value="null" >
							<!-- <select id="Courses" class="form-control" name="department">
								<option>
									--Select--
								</option>
								<option>
									College of Information Technology Education
								</option>
								<option>
									College of Engineering and Architecture
								</option>
								<option>
									Coleege of Health and Science
								</option>
								<option>
									College of Management and Accountancy
								</option>
							</select> -->
						</div>
						<div class="form-group">
							<input type="submit" name="add_faculty" value="Create" class="btn btn-success form-control modalButtonSubmit">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		
		<?php
			define("DB_HOST", "localhost");
			define("DB_USER", "root");
			define("DB_PASSWORD", "root");
			define("DB_DATABASE", "db_crud");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * FROM tbl_faculty") or die($mysqli->error);
		?>
		
		<table class="table table-bordered" style="font-size: 15px; margin-top: 20px;" id="myTable" >
			<thead>
			<tr>
				<th>Faculty ID</th>
				<th>Last Name</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Department</th>
			</tr>
			</thead>

			<?php
				while ($row = $result->fetch_assoc()):
			?>

			<tbody id="tbody">
				<tr>
					<td class="text1" data-id="<?php echo $row["id"]; ?>">

						<?php
							echo $row['faculty_id'] 
						?>
					
					</td>
					<td data-id="<?php echo $row["id"]; ?>">

						<?php 
							echo $row['last_name'];
						?>

					</td>
					<td data-id="<?php echo $row["id"]; ?>">

						<?php 
							echo $row['first_name'];
						?>
						
					</td>
					<td data-id="<?php echo $row["id"]; ?>">

						<?php 
							echo $row['middle_name'];
						?>
						
					</td>
					<td class="text" data-id="<?php echo $row["id"]; ?>"> 

						<?php 
							echo $row['department']
						?>

						<a href="#">
							<img src="images/edit.png" class="option1 modalEditFaculty" data-toggle="modal" data-target="#user_modal" data-id="<?php echo $row["id"]; ?>">
						</a>
						<a onclick="deleteMe(<?php echo $row['id'] ?>)" href="process.php?delete_faculty=<?php echo $row['id']; ?>">
							<img src="images/delete.png" class="option" >
						</a>
					</td>
					<td style="display:none;" class="text1" data-id="<?php echo $row["id"]; ?>"> 

						<?php 
							echo $row['id'];
						?> 

					</td>
				</tr>
			</tbody>
			
			<?php
				endwhile;
			?>

		</table>

		<?php
			function pre_r($array) {
				echo '<pre>';
				print_r($array);
				echo '</pre>';
			}
		?>

	</div>
	
	<script>
		function deleteMe(id) {

			if (confirm("Do you want to delete?")) {

				document.getElementById('myTable').deleteRow(1);
				return true;

			}

		}
	</script>

</body>
</html>
