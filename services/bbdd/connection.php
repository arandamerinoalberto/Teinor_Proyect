<?php
	//connection to the database
	//host, user, password, database
	$filmsconnection = mysqli_connect('localhost', 'root', '', 'films_02') or die("There was an error connecting to the database");

	//character set to use in connection
	mysqli_set_charset($filmsconnection, "utf8");
?>