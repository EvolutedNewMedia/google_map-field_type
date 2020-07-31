// Needs to be a global function to be picked up by the maps callback
initMapInputs = function () {

	let initialise = function () {
		let maps = document.querySelectorAll('.map-input');
		Array.prototype.forEach.call(maps, function(container) {

			let stateInput = container.querySelector('.map-input__state-input');
			let center = JSON.parse(stateInput.value);

			// Load the map
			let map = new google.maps.Map(container.querySelector('.map-input__map'), {
				center,
				zoom: 16,
				mapTypeControlOptions: {
					position: google.maps.ControlPosition.RIGHT_BOTTOM
				},
				zoomControlOptions: {
					position: google.maps.ControlPosition.TOP_LEFT
				},
				streetViewControl: false
			});

			let marker = new google.maps.Marker({
				map,
				draggable: true,
				position: center
			});

			// Add the controls
			let addressInput = container.querySelector('.map-input__address-input');
			map.controls[google.maps.ControlPosition.TOP_CENTER].push(addressInput);

			// Prevent this control from submitting the form
			addressInput.addEventListener('keypress', function (event) {
				if (event.which === 13) {
					event.preventDefault();
					return false;
				}
				return true;
			});

			//let fondButton = container.querySelector('.map-input__find-btn');
			//map.controls[google.maps.ControlPosition.TOP_CENTER].push(container.querySelector('.map-input__find-btn'));

			var autocomplete = new google.maps.places.Autocomplete(addressInput);
			autocomplete.bindTo('bounds', map);

			// Add listeners for searching and dragging
			google.maps.event.addListener(
				autocomplete,
				'place_changed',
				function () {
					var place = autocomplete.getPlace();
					if (!place.geometry || !place.geometry.location) {
						return;
					}
					marker.setPosition(place.geometry.location);
					map.setCenter(place.geometry.location);
					map.setZoom(16);
					commitData(stateInput, place.geometry.location);
				}
			);

			google.maps.event.addListener(marker, 'dragend', function () {
				commitData(stateInput, marker.position);
			});

		});
	};

	function commitData(input, location) {
		input.value = JSON.stringify({
			lat: location.lat(),
			lng: location.lng()
		});
	}

	initialise();

};

