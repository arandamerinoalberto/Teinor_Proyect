<?php
	//Check Movies

	//Retrieve the id of the movie consult
	if (isset($_POST['idfilm'])) {

		$id = $_POST['idfilm'];

		//Query
		$sql = "SELECT * FROM films WHERE idfilm = $id";
	} else {
		//Movie table call
		$sql = "SELECT * FROM films";
	}

	//Connection to database
	require 'bbdd/connection.php';

	$results = mysqli_query($filmsconnection, $sql) or die (mysqli_error($filmsconnection));

		//Array for save films
		$films=[];

		while($film = mysqli_fetch_assoc($results)) {
			
			array_push($films, $film);
		}

	echo json_encode($films);
?>