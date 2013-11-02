<?php
/* Google Maps v3 Shortcode  (http://gis.yohman.com/gmaps-plugin/)
 Version: 1.2.1
*/

function fdx_mapme($attr) {

// default atts
$attr = shortcode_atts(array(
									'lat'   => '0',
									'lon'    => '0',
									'id' => 'map',
									'z' => '1',
									'h' => '415',
									'maptype' => 'ROADMAP',
									'kml' => '',
									'kmlautofit' => 'yes',
									'marker' => 'yes',
									'markerimage' => '',
									'traffic' => 'no',
									'bike' => 'no',
									'fusion' => '',
									'start' => '',
									'end' => '',
									'infowindow' => '',
									'infowindowdefault' => 'yes',
									'hidecontrols' => 'false',
									'scale' => 'false',
									'scrollwheel' => 'true'

									), $attr);


	$returnme = '
    <div id="' .$attr['id'] . '" style="width: 100%; height:' . $attr['h'] . 'px;"></div>';

	//directions panel
	if($attr['start'] != '' && $attr['end'] != '')
	{

		$returnme .= '
		<div id="directionsPanel" style="width:auto; height:400px;overflow:auto; border: 1px solid #808080; padding: 5px;margin-top: 10px"></div>';
	}




	$returnme .= '


    <script type="text/javascript">

		var latlng = new google.maps.LatLng(' . $attr['lat'] . ', ' . $attr['lon'] . ');
		var myOptions = {
			zoom: ' . $attr['z'] . ',
			center: latlng,
			scrollwheel: ' . $attr['scrollwheel'] .',
			scaleControl: ' . $attr['scale'] .',
			disableDefaultUI: ' . $attr['hidecontrols'] .',
			mapTypeId: google.maps.MapTypeId.' . $attr['maptype'] . '
		};
		var ' . $attr['id'] . ' = new google.maps.Map(document.getElementById("' . $attr['id'] . '"),
		myOptions);
		';

		//kml
		if($attr['kml'] != '')
		{
			if($attr['kmlautofit'] == 'no')
			{
				$returnme .= '
				var kmlLayerOptions = {preserveViewport:true};
				';
			}
			else
			{
				$returnme .= '
				var kmlLayerOptions = {preserveViewport:false};
				';
			}
			$returnme .= '
			var kmllayer = new google.maps.KmlLayer(\'' . html_entity_decode($attr['kml']) . '\',kmlLayerOptions);
			kmllayer.setMap(' . $attr['id'] . ');
			';
		}

		//directions
		if($attr['start'] != '' && $attr['end'] != '')
		{
			$returnme .= '
			var directionDisplay;
			var directionsService = new google.maps.DirectionsService();
		    directionsDisplay = new google.maps.DirectionsRenderer();
		    directionsDisplay.setMap(' . $attr['id'] . ');
    		directionsDisplay.setPanel(document.getElementById("directionsPanel"));

				var start = \'' . $attr['start'] . '\';
				var end = \'' . $attr['end'] . '\';
				var request = {
					origin:start,
					destination:end,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};
				directionsService.route(request, function(response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
					}
				});


			';
		}

		//traffic
		if($attr['traffic'] == 'yes')
		{
			$returnme .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $attr['id'] . ');
			';
		}

		//bike
		if($attr['bike'] == 'yes')
		{
			$returnme .= '
			var bikeLayer = new google.maps.BicyclingLayer();
			bikeLayer.setMap(' . $attr['id'] . ');
			';
		}

		//fusion tables
		if($attr['fusion'] != '')
		{
			$returnme .= '
			var fusionLayer = new google.maps.FusionTablesLayer(' . $attr['fusion'] . ');
			fusionLayer.setMap(' . $attr['id'] . ');
			';
		}


		//marker: show if address is not specified
		if ($attr['marker'] == 'yes')
		{
			//add custom image
			if ($attr['markerimage'] !='')
			{
				$returnme .= 'var image = "'. $attr['markerimage'] .'";';
			}

			$returnme .= '
				var marker = new google.maps.Marker({
				map: ' . $attr['id'] . ',
				';
				if ($attr['markerimage'] !='')
				{
					$returnme .= 'icon: image,';
				}
			$returnme .= '
				position: ' . $attr['id'] . '.getCenter()
			});
			';

			//infowindow
			if($attr['infowindow'] != '')
			{
				$returnme .= '
				var contentString = \'' . $attr['infowindow'] . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});

				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $attr['id'] . ',marker);
				});
				';
				//infowindow default
				if ($attr['infowindowdefault'] == 'yes')
				{
					$returnme .= '
						infowindow.open(' . $attr['id'] . ',marker);
					';
				}
			}
		}

		$returnme .= '</script>';
		return str_replace("\r\n", '', $returnme);      //hack

}
add_shortcode('map', 'fdx_mapme');
?>