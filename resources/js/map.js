// Needs to be a global function to be picked up by the maps callback
initMaps = function () {

	let initialise = function () {
		let maps = document.querySelectorAll('.google-map');
		Array.prototype.forEach.call(maps, function(container) {

			let center = JSON.parse(container.getAttribute('data-center'));

			// Load the map
			let map = new google.maps.Map(container.querySelector('.map-input__map'), {
				center,
				zoom: 16,
			});

			let marker = new google.maps.Marker({
				map,
				draggable: false,
				position: center,
			});
		});
	};

	initialise();
};

