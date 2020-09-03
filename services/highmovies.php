<?php
	//Retrieve the request data
	$film = filter_input(INPUT_POST, 'film');
	$time = filter_input(INPUT_POST, 'time');

	//Validate data
	try {
		$mistakes = '';

		if (!$film) {
			//throw new Exception("Película obligatoria", 10);
			$mistakes.="Película obligatoria\n";
		}
		if (!$time) {
			//throw new Exception("Año obligatorio", 10);
			$mistakes.="Año obligatorio\n";
		}
		
		if ($mistakes!='') {
			throw new Exception($mistakes, 10);
		}
		
	} catch (Exception $e) {
		$message = $e->getMessage();
		$code = $e->getCode();

		//Request response message
		$response = [$code, $message];
		echo json_encode($response);
		return; //For don't high execute
	}

	//Movie registration in the database

	//File connection
	require 'bbdd/connection.php';

	//Make sql statement
	$sql = "INSERT INTO films VALUES (NULL, '$film', '$time')";

	//Execute the statement but with error handling
	if (mysqli_query($filmsconnection, $sql)) {
		//It's going well:
		//Retrieve the id that the sgbd has assigned to the movie
		//$id = mysqli_insert_id($filmsconnection);
		$response = ['00', 'Alta película efectuada'];
	} else {
		//si va mal:
		if (mysqli_errno($filmsconnection) == 1062) {
			//Duplicate film
			$response = ['20', 'La película ya existe en la base de datos'];
		} else {
			$response = ['99', 'Insert 1:'.mysqli_error($filmsconnection)];
		}
	}

	//Server response
	echo json_encode($response);

?>