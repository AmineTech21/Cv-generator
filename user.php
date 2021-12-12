<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<style>
		table tr td {
			padding: 10px !important;
		}
		.fa{
			color: #FA9A94;
			font-size: 20px;
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<div class="container bg-dark text-white p-3">
	<div>
		<a href="index.php" class="btn btn-primary">Go back</a>
	</div>
	<?php 
		try {
			require "config.php";

			$request = "SELECT * FROM users WHERE id=".$_GET['id'];
			$statement = $pdo->prepare($request);
			$statement->execute();
			$user = $statement->fetch();			
	?>	
		<div class="text-center">
			<h1><?= $user['first_name'] . ' ' . $user['last_name'] ?></h1>
			<p style="text-align: center">
				<?= $user['description'] ?>
			</p>
		</div>
		<hr class="bg-warning">
		<div class="row">
			<div class="col-md-6">
				<h2>About me</h2><br>
				<?= $user['description'] ?>
			</div>
			<div class="col-md-6">
				<h2>Contact</h2><br>
				<table>
					<tr>
						<td><i class="fa fa-calendar"></i></td>
						<td><?= $user['birth_date'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-phone"></i></td>
						<td><?= $user['phone'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope-open"></i></td>
						<td><?= $user['email'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-map-marked"></i></td>
						<td><?= $user['address'] ?></td>
					</tr>
				</table>
			</div>
		</div>
		<hr class="bg-warning">
		<div class="container">
				<h2>Formations</h2>
				<div class="row mt-3">
				<?php 
					$request = "SELECT * FROM formations WHERE user_id=".$_GET['id'];
					$statement = $pdo->prepare($request);
					$statement->execute();

					while ($formations = $statement->fetch()) {?>

						<div class="col-md-6 mb-1" style="border-left: 2px solid red; padding: 20px 10px; background: #43494f;">
							<div>
								Start : <?= $formations ['start_date'] ?>
								<i class="fa fa-chevron-right text-danger ml-2"></i>
								End : <?= $formations ['end_date'] ?? 'current' ?>
							</div>
							<div>
								<strong><?= $formations ['title'] ?></strong><br>
								<p>
									<?= $formations ['place'] ?>
								</p>
							</div>
							<div>
								<!-- href="delete_formation.php?user=<?=$formations['user_id']?>&formation=<?=$formations['id']?>" -->
								<a 
									class="btn btn-danger delete" 
									data-formation="<?=$formations['id']?>"
								>
									Delete
									<i class="fa fa-trash"></i>
								</a>
							</div>
						</div>

				<?php }?>	
				</div>		
		</div>
	<?php	
		} 
		catch(PDOException $e) {
			echo $e;
		}
	?>

	</div>
	<div class="text-center mt-2 mb-5">
		<a class="btn btn-primary" href="formulaire_update.php?id=<?=$_GET['id']?>">
			Update Resume <i class="fa fa-edit ml-2"></i>
		</a>
	</div>

	<script 
	src="https://code.jquery.com/jquery-3.6.0.js"
	integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.delete').click(function(){
				var id = $(this).attr('data-formation');
				
				$.ajax({
			        url: "delete_formation.php",
			        type: "post",
			        data: {
			        	formation_id: id
			        },
			        dataType: "json",
			        success: function(data){
			        	if(data['message']){
			        		console.log('Deleted');
			        		location.reload();
			        	}else{
							console.log('Error');
			        	}
			        }
			    });
			});
		});
	</script>

</body>
</html>