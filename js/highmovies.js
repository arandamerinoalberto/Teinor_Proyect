//Movies registration function
function highmovies() {
	//recuperar los datos del formulario
	var film = document.getElementById('film').value.trim()
	var time = document.getElementById('time').value.trim()

	//optionally validate data


	//Make ajax request
	var url ='services/highmovies.php';

	var data = new FormData()
	data.append('film', film)
	data.append('time', time)
	
	var parameters = {
		method: 'post',
		body: data
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
	.then(function(message) {
		alert(message[1])
		//console.log(message)
		if (message[0]=='00') {
			//Clean form
			document.getElementById('form').reset()
		} 
	})
	.catch(function(error) {
		alert(error)
	})
} 