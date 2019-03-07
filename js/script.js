(function($){
	$('.slideshow').each(function(){
		var autoPlay = $(this).data('autoplay'),
			items = $(this).data('items'),
			singleItem = $(this).data('singleitem');
		if ( autoPlay == 0 || autoPlay == false ) {
			autoPlay = false;
		}

		if ( singleItem ) {
			singleItem = true;
		}
		else {
			singleItem = false;
		}

		if ( items == 0 ) {
			items: false
		}

		$(this).owlCarousel({
			singleItem: singleItem,
			autoPlay: autoPlay,
			items: items
		});
	});

})(jQuery);

// Sidebar

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginRight = "250px";
  document.getElementById("main").style.opacity = "0.7";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginRight= "0";
  document.getElementById("main").style.opacity = "1";
}
(function($){
$('#iconified').on('keyup', function() {
    var input = $(this);
    if(input.val().length === 0) {
        input.addClass('empty');
    } else {
        input.removeClass('empty');
    }
});
})(jQuery);

//maps
(function($) {


function new_map( $el ) {

	let $markers = $el.find('.marker');

	let args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	let map = new google.maps.Map( $el[0], args);


	map.markers = [];

	$markers.each(function(){

    	add_marker( $(this), map );

	});


	center_map( map );

	return map;

}



function add_marker( $marker, map ) {


	let latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	let marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});


	map.markers.push( marker );


	if( $marker.html() )
	{

		let infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});


		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}



function center_map( map ) {

	let bounds = new google.maps.LatLngBounds();

	$.each( map.markers, function( i, marker ){

		let latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	if( map.markers.length == 1 )
	{
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{

		map.fitBounds( bounds );
	}

}

let map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		map = new_map( $(this) );

	});

});

})(jQuery);

//Street view map
(function($) {


function new_map( $el ) {

	let $markers = $el.find('.marker-street');

	let args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};

	let map = new google.maps.Map( $el[0], args);


	map.markers = [];

	$markers.each(function(){

    	add_marker( $(this), map );

	});


	center_map( map );

	return map;

}



function add_marker( $marker, map ) {


	let latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	let marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});


	map.markers.push( marker );


	if( $marker.html() )
	{

		let infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});


		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );


		});
	}

}



function center_map( map ) {

	let bounds = new google.maps.LatLngBounds();

	$.each( map.markers, function( i, marker ){

		let latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		var panorama = new google.maps.StreetViewPanorama(
			document.getElementById('street-view'), {
				position: latlng,
				pov: {
					heading: 34,
					pitch: 10
				}
			});
	map.setStreetView(panorama);


		bounds.extend( latlng );

	});

	if( map.markers.length == 1 )
	{
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{

		map.fitBounds( bounds );
	}

}

let map = null;

$(document).ready(function(){

	$('.acf-street-view').each(function(){

		map = new_map( $(this) );

	});

});

})(jQuery);

// Bokmärke button
(function($) {
  $('#bokmarke').click(function() {
    if (window.sidebar && window.sidebar.addPanel) {
      window.sidebar.addPanel(document.title, window.location.href, '');
    } else if (window.external && ('AddFavorite' in window.external)) {
      window.external.AddFavorite(location.href, document.title);
    } else if (window.opera && window.print) {
      this.title = document.title;
      return true;
    } else {
      alert('Tryck ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D För att lägga till sidan till favorieter.');
    }
  });
})(jQuery);;
