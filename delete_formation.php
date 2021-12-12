<?php

	require "config.php";

	$formationId = $_POST['formation_id'];
	try {
		$request = "DELETE FROM formations WHERE id=?";
		$statement = $pdo->prepare($request);
		$reponse = $statement->execute(
			array($formationId)
		);

		if($reponse){
			$success = true;
		} else{
			$success = false;
		}

		echo json_encode(
			array(
				'message' => $success
			)
		);
	} 
	catch(PDOException $e) {
		echo $e;
	}
?>