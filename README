##Google Maps Helper

@author Mark Gandolfo<br />

This will display a map and put a marker given the maps latitude and longitude
Make sure you sign up for a google maps api key and call the maps javascript api<br /><br />
**e.g.**<br />
<code>&lt;script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAU8aFSdD-sKJMCbYhzRjLARdfaCDIqg_BUH3PNCPE_eVgxC-shQe--IDBJ3eTFiV-w5uEN6YtC6fIQ" type="text/javascript"&gt;&lt;/script&gt;</code>

Also make sure that you have included the helper in your controller. 

You can use it as follows:

**To call a map at the given location and place a marker then do this!**
<code>
    &lt;div id="map"&gt; &lt;/div&gt;
    $googleMap->map('-27,0000', '152,3043', 10);
    $content = 'The Address, or something similar, this will appear in the clickable marker box (can include html)';
    $googleMap->addMarker($content);   
</code>

**Or if you want a marker at another position, you can do this.**
<code>
    &lt;div id="map"&gt; &lt;/div&gt;
    $googleMap->map('-27,0000', '152,3043', 10);
    $content = 'The Address, or something similar, this will appear in the clickable marker box (can include html)';
    $googleMap->addMarker($content, true, '-27,2032', '234,2343');
</code>

You will need a div with an id of map. This is where the map will be placed.