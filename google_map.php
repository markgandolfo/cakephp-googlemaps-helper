<?php 
/**
 * Google Maps Helper
 *
 * @author Mark Gandolfo
 * @example
 * 
 * This will display a map and put a marker given the maps latitude and longitude
 * <div id="map">
 *   $googleMap->map('-27,0000', '152,3043', 10);
 * 
 *   $content = '<strong>The Address, or something similar, this will appear in the clickable marker box</strong>';
 *   $googleMap->addMarker($content);
 * </div>
 *
 * 
 * This will display a map and put a marker at another position
 * <div id="map">
 *   $googleMap->map($latitude, $longitude, $zoom = 10)
 *   $content = '<strong>The Address, or something similar, this will appear in the clickable marker box</strong>';
 *   $googleMap->addMarker($content, true, '-27,2032', '234,2343');	
 * </div>
 * 
 * 
 */
class GoogleMapHelper extends AppHelper {
	
	public $latitude;
	public $longitude;
	public $zoom;
	/**
	 * Outputs a google map. 
	 *
	 * @author Mark Gandolfo
	 * @param String latitude
	 * @param String longitude
	 * @param Integer Zoom (optional)
	 * 
	 * @example
	 * Show map for given lat & long. Ensure somewhere on the page you have a div
	 * with an id="div" where the map can be shown
	 * 
	 * <div id="map">
	 *   $googleMap->map($latitude, $longitude, $zoom = 10)
	 * </div>
	 */
	public function map($latitude, $longitude, $zoom = 10) {
		
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->zoom = $zoom;


		$output = "<script type=\"text/javascript\">
			//<![CDATA[
				var map = new GMap(document.getElementById(\"map\"));
				map.addControl(new GSmallMapControl());
				map.centerAndZoom(new GPoint(".$this->longitude.", ".$this->latitude."), ".$this->zoom.");
			//]]>
			</script>
			";
			
		return $output;
	}
	
	/**
	 * This will add a marker on the google map
	 * 
	 * @author Mark Gandolfo
	 * @param String html for marker content
	 * @param Boolean display the directions section?
	 * @param String latitude (if null will use latitude set from map)	
	 * @param String longitude (if null will use longitude set from map)
	 *
	 * @example
	 * 
	 * This will display a map and put a marker given the maps latitude and longitude
	 * <div id="map">
	 *   $googleMap->map('-27,0000', '152,3043', 10);
	 * 
	 *   $content = '<strong>The Address, or something similar, this will appear in the clickable marker box</strong>';
	 *   $googleMap->addMarker($content);
	 * </div>
	 *
	 * 
	 * This will display a map and put a marker at another position
	 * <div id="map">
	 *   $googleMap->map($latitude, $longitude, $zoom = 10)
	 *   $content = '<strong>The Address, or something similar, this will appear in the clickable marker box</strong>';
	 *   $googleMap->addMarker($content, true, '-27,2032', '234,2343');	
	 * </div>
	 * 
	 */
	public function addMarker($html, $displayDirections = true, $latitude = NULL, $logitude = NULL) {

		if(!($latitude) && ($longitude)) {
			$latitude = $this->latitude;
			$longitude = $this->longitude;
		}
		
		$directions = '';
		if($displayDirections) {
			$directions .= "<form action=\"http://maps.google.com/maps\" method=\"get\" target=\"_blank\">";
			$directions .= "<label style=\"font-size: .8em;\">Enter your address for directions</label><br />";		
			$directions .= "<input type=\"text\" name=\"saddr\" />";
			$directions .= "<input type=\"hidden\" name=\"daddr\" value=z\"". $latitude . "," . $logitude . "\" />";
			$directions .= "<input type=\"submit\" value=\"get directions\" />";
			$directions .= "</form>";
		}
		
		$output = "
			<script type='text/javascript'>
			//<![CDATA[
			var marker = new GMarker(	new GLatLng(" . $latitude . ", " .  $logitude . ") );
				map.addOverlay( marker );
				
				GEvent.addListener(marker, 'click',
		      function() {
						var htmlString = '<font color=\"#6387A5\" size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">' +
						'	 " . $html . "  ' + 							
						'	 " . $directions . "  ' + 
						' </font><br />';

						marker.openInfoWindowHtml(htmlString);
				      }
				   );
			//]]>
			</script>
		";

		return $output;    
	}
}
