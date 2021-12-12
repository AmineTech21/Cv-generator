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
	$user_id	=	$_POST['user-id'];

	try {

		$request = "UPDATE users SET first_name = ?, last_name = ?, phone = ?, email = ?, password = ?, birth_date = ?, address = ?, description = ? WHERE id = ?";
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
				$description,
				$user_id
			)
		);

		header("location: user.php?id=$user_id");
	} 
	catch(PDOException $e) {
		echo $e;
	}
?>