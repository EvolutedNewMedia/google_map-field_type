// Needs to be a global function to be picked up by the maps callback
initMapInputs = function () {

	let initialise = function () {
		let maps = document.querySelectorAll('.map-input');
		Array.prototype.forEach.call(maps, function (el) {
			map = new google.maps.Map(el, {
				center: {lat: -34.397, lng: 150.644},
				zoom: 8
			});

		});
	};

	initialise();

};

