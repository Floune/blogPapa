$('document').ready(function() {

	let NYWeather = 'http://api.openweathermap.org/data/2.5/group?id=5128638&appid=a3338858079e26a5ec541fd06da0daf0&units=metric';
	let SERVER_URI = '127.0.0.1:8000/get_weather';

	function getWeather(cb) {
		$.get(NYWeather,(response) => {
			cb(response.list[0]);
		});
	}

	function start() {
		getWeather((weather) => {
			console.log(weather);
			$(".city").prepend(weather.name);
			$(".temp").prepend(weather.main.temp);
			$(".humidity").prepend(weather.main.humidity);
			$(".pressure").prepend(weather.main.pressure);
		});
	}

	start();
})

