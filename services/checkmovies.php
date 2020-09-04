<?php
	//Check Movies
	if (isset($_POST['idfilm'])) {
		$id = $_POST['idfilm'];

		$sql = "SELECT * FROM films WHERE idfilm = $id";
	} else {
		$sql = "SELECT * FROM films ORDER BY film";
	}

	
	require 'bbdd/connection.php';

	$results = mysqli_query($filmsconnection, $sql) or die (mysqli_error($filmsconnection));

		$films=[];

		while($film = mysqli_fetch_assoc($results)) {
			
			array_push($films, $film);
		}

	echo json_encode($films);
?>