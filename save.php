<?php

	require "config.php";

	// préparation des données
	$firstName 	=	$_POST['first-name'];
	$lastName	=	$_POST['last-name'];
	$birthDate	=	$_POST['birth-date'];
	$phone		=	$_POST['phone'];
	$address	=	$_POST['address'];
	$email		=	$_POST['email'];
	$password	=	$_POST['password'];
	$description=	$_POST['description'];

	try {

		$request = "INSERT INTO users(first_name, last_name, phone, email, password, birth_date, address, description) VALUES (?,?,?,?,?,?,?,?)";
		$statement = $pdo->prepare($request);
		$statement->execute(
			array(
				$firstName,
				$lastName,
				$phone,
				$email,
				$password,
				$birthDate,
				$address,
				$description
			)
		);

		$userId = $pdo->lastInsertId();

		$nbFormation = count($_POST['start']);

		for ($i=0; $i<$nbFormation; $i++) { 
			$request = "INSERT INTO formations(start_date,end_date,title,place,user_id) VALUES (?,?,?,?,?)";
			$statement = $pdo->prepare($request);
			$statement->execute(
				array(
					$_POST['start'][$i],
					$_POST['end'][$i],
					$_POST['title'][$i],
					$_POST['place'][$i],
					$userId
				)
			);
		}

		header("location: users.php");
	} 
	catch(PDOException $e) {
		echo $e;
	}
?>