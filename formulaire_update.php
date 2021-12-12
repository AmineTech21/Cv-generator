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
	<?php 
		try {
			require "config.php";

			$request = "SELECT * FROM users WHERE id=".$_GET['id'];
			$statement = $pdo->prepare($request);
			$statement->execute();
			$user = $statement->fetch();
		}
		catch(PDOException $e) {
			echo $e;
		}		
	?>	
	<h1 style="text-align: center;" class="mt-5">Formulaire Update</h1>
	<div class="container">
		<form method="POST" action="update.php">
			<input type="text" name="user-id" value="<?= $_GET['id']?>" required hidden>
			<div class="p-3 text-dark" id="personal-info">
				<h3>Informations personnelles</h3>
				<div class="row">
					<div class="form-group col-6">
						<label>First name</label>
						<input type="text" class="form-control" name="first-name" required value="<?= $user['first_name']?>">
					</div>
					<div class="form-group col-6">
						<label>Last name</label>
						<input type="text" class="form-control" name="last-name" required value="<?= $user['last_name']?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label>Birth Date</label>
						<input type="date" class="form-control" name="birth-date" required value="<?= $user['birth_date']?>">
					</div>
					<div class="form-group col-6">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" required value="<?= $user['phone']?>">
					</div>
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="address" required value="<?= $user['address']?>">
				</div>
				<div class="row">
					<div class="form-group col-6">
						<label>Email address</label>
						<input type="email" class="form-control" name="email" required value="<?= $user['email']?>">
					</div>
					<div class="form-group col-6">
						<label>Password</label>
						<input type="password" class="form-control" name="password" required value="<?= $user['password']?>">
					</div>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description" required><?= $user['description']?></textarea>
				</div>
			</div>

			<button type="submit" class="btn btn-primary mt-2">
				Sauvegarder
			</button>
		</form>		
	</div>

</body>
</html>