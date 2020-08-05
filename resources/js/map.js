// Needs to be a global function to be picked up by the maps callback
initMaps = function () {

	let initialise = function () {
		
		document.body.classList.add('js-google-maps-ready');

		let maps = document.querySelectorAll('.google-map');
		Array.prototype.forEach.call(maps, function (container) {

			let center = JSON.parse(container.getAttribute('data-center'));
			let zoom = JSON.parse(container.getAttribute('data-zoom'));
			let controls = JSON.parse(container.getAttribute('data-controls'));

			// Load the map
			let map = new google.maps.Map(container, {
				center: center,
				zoom: zoom,
				zoomControl: controls.zoom,
				mapTypeControl: controls.mapType,
				scaleControl: controls.scale,
				streetViewControl: controls.streetView,
				rotateControl: controls.rotate,
				fullscreenControl: controls.fullscreen
			});

			let marker = new google.maps.Marker({
				map: map,
				draggable: false,
				position: center,
			});
		});
	};

	initialise();
};

