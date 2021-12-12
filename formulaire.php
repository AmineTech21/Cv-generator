<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<style type="text/css">
	body{
		background-color: #4A4F74;
		color: white;
	}
	#personal-info{
		background-color: #FFCC7C;
	}
	#formations{
		background-color: #FA9A94;
	}
	.formation-info{
		border-radius: 5px;
	}
</style>
</head>
<body>
	<h1 style="text-align: center;" class="mt-5">Formulaire</h1>

	<div class="container mt-2 mb-2">
		<div class="mt-2">
			<a type="button" class="btn btn-warning" href="index.php">
				Nombre de CV
				<?php 
					try {
						require "config.php";
						$request = "SELECT COUNT(*) as nbCv FROM users";
						$statement = $pdo->prepare($request);
						$statement->execute();
						$nbCv = $statement->fetch()['nbCv'];	
					} 
					catch(PDOException $e) {
						echo $e;
					}		
				?>
			 	<span class="badge badge-danger p-1">
			 		<?= $nbCv ?? 0 ?>
			 	</span>
			</a>
		</div>
	</div>
	<div class="container">
		<form method="POST" action="save.php">
			<div class="p-3 text-dark" id="personal-info">
				<h3>Informations personnelles</h3>
				<div class="row">
					<div class="form-group col-6">
						<label>First name</label>
						<input type="text" class="form-control" name="first-name" required>
					</div>
					<div class="form-group col-6">
						<label>Last name</label>
						<input type="text" class="form-control" name="last-name" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label>Birth Date</label>
						<input type="date" class="form-control" name="birth-date" required>
					</div>
					<div class="form-group col-6">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" required>
					</div>
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="address" required>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label>Email address</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group col-6">
						<label>Password</label>
						<input type="password" class="form-control" name="password" required>
					</div>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" required></textarea>
				</div>
			</div>

			<div class="mt-2 p-3 text-dark" id="formations">
				<h3>Formations</h3>

				<div id="dynamic-formation">
					
				</div>

				<button type="button" id="add" class="btn btn-dark">
					add<i class="fa fa-plus ml-2"></i>
				</button>
			</div>

			<div class="mt-2">
				<button type="submit" class="btn btn-primary">
					Sauvegarder
				</button>
			</div>
		</form>		
	</div>

	<script 
	src="https://code.jquery.com/jquery-3.6.0.js"
	integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$(document).on('click', '#add', function(){
				$('#dynamic-formation').
				append(
					'<div class="bg-white text-dark p-3 mb-2 formation-info">'+
					'<div class="row">'+
						'<div class="form-group col-6">'+
							'<label>Start</label>'+
							'<input type="date" class="form-control" name="start[]" required>'+
						'</div>'+
						'<div class="form-group col-6">'+
							'<label>End</label>'+
							'<input type="date" class="form-control" name="end[]">'+
						'</div>'+
					'</div>'+
					'<div class="row">'+
						'<div class="form-group col-6">'+
							'<label>Title</label>'+
							'<input type="text" class="form-control" name="title[]" required placeholder="formation title">'+
						'</div>'+
						'<div class="form-group col-6">'+
							'<label>Place</label>'+
							'<input type="text" class="form-control" name="place[]" required placeholder="formation place">'+
						'</div>'+
					'</div>'+
				'</div>');
			});
		});
	</script>

</body>
</html>