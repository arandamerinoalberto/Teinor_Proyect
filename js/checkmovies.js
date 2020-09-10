function checkMovies() {
	//Ajax petition
	var url = 'services/checkmovies.php'

	var parameters = {
		method: 'post'
	}

	fetch(url, parameters)
	.then(function(response) {
		if (response.ok) {
			return response.json()
		} else {
			console.log(response)
			throw 'user registration error'
		}
	})
	.then(function(films) {
		//console.log(films)
		if (films.length==0) {
			alert('No hay peliculas: ¡Añádelas tu mismo!')
		} else {
			//build rows
			/*
			<tr><td><input type='radio' name='usuario' value=''></td><td>12345678A</td><td>Profesor</td><td>Maligno</td></tr>
			*/
			var rowsTables = '';

			for (i in films) {
				rowsTables += `<tr>`
				/*rowsTables += `<td><input type='number' name='film' value='${films[i]['idfilm']}'></td>`*/
				rowsTables += `<td>${films[i].film}</td>`
				rowsTables += `<td>${films[i].time}</td>`
				rowsTables += `</tr>`
			}

			document.getElementById('films').innerHTML += rowsTables
		}

	})
	.catch(function(error) {
		alert(error)
	})
}