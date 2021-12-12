<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Users</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<style>
		body{
			background-color: #4A4F74;
			color: white;
		}
	</style>
</head>
<body>
	<div class="container mt-5">
		<h1>List of curriculum vitae</h1>
		<a href="formulaire.php" class="btn btn-primary">Add new CV</a>
		<div class="row">
		
	<?php 
		try {
			require "config.php";

			$request = "SELECT * FROM users";
			$statement = $pdo->prepare($request);
			$statement->execute();
			
			while ($users = $statement->fetch()) {?>
					<div class="col-md-6 mt-2">
						<div class="card">
							<div class="card-header bg-info">
								<strong><?= $users['first_name'] .' ' . $users['last_name'] ?></strong>
							</div>
							<div>
								<ul class="list-group list-group-flush text-dark">
									<li class="list-group-item"><strong>Email</strong>: <?= $users['email'] ?></li>
									<li class="list-group-item"><strong>Phone</strong>: <?= $users['phone'] ?></li>
								</ul>
							</div>
							<div class="card-footer text-center">
								<a class="btn btn-info" href="user.php?id=<?=$users['id']?>">
									Show Resume <i class="fa fa-eye ml-2"></i>
								</a>
							</div>
						</div>
					</div>
	<?php	}
		} 
		catch(PDOException $e) {
			echo $e;
		}
	?>
		</div>
	</div>
	
</body>
</html>