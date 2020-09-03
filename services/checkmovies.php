<?php
	//Check Movies
	//recuperar el id del film a consultar
	if (isset($_POST['idfilm'])) {
		//llamada desde la pantalla de consulta de detalle
		$id = $_POST['idfilm'];

		//consulta
		$sql = "SELECT * FROM films WHERE idfilm = $id";
	} else {
		//llamada desde la pantalla de consulta de todos los films
		//consulta
		$sql = "SELECT * FROM films ORDER BY film";
	}

	//conexión bbdd
	require 'bbdd/connection.php';

	$results = mysqli_query($filmsconnection, $sql) or die (mysqli_error($filmsconnection));

	//if (mysqli_num_rows($results) > 0) {
		//extraer los datos del film consultado

		//array vacio para guardar los films
		$films=[];

		while($film = mysqli_fetch_assoc($results)) {
			//print_r($film);

			array_push($films, $film);
		}
	//} else {
	//	echo 'No existen datos en la bbdd';
	//}

	//json de respuesta
	echo json_encode($films);
?>