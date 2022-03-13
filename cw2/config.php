<?php

/*
This file contains all the configuration data used in the Twin Cities web application.
Functions are held in the dsa_utility.php file.
*/

@date_default_timezone_set("GMT"); // Set timezone of web application to GMT.

// Set API keys as constants
define ('WEATHER_API_KEY', '63a5bd38f158def17bf0dce1763738d5');
define ('GMAPS_API_KEY', 'AIzaSyA55bVwOZxwZxyI_KwIGJ6OhUcbnzu');
define ('FLICKR_API_KEY', '788a5834acce54fb3cfbb41cc3a80b95');
define ('FLICKR_SECRET_KEY', 'd09e95c28329c506');

// Set database parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dsa_twincities";

// Create and check database connection
$conn = new mysqli($servername, $username, $password, $dbname);

/* The following code can be used to check the connection to the database.
Uncomment the code to check that a successful connection has been made.
if ($conn->connect_error) {
die("Failed to establish connection: " . $conn->connect_error);
} 
echo "Connection established successfully";
*/

// Set map markers as constants
define ('CINEMA_ICON', 'http://maps.google.com/mapfiles/kml/pal2/icon22.png');
define ('AIRPORT_ICON', 'http://maps.google.com/mapfiles/ms/icons/plane.png');
define ('MUSEUM_ICON', 'http://maps.google.com/mapfiles/kml/pal2/icon2.png');
define ('STADIUM_ICON', 'http://maps.google.com/mapfiles/kml/pal2/icon49.png');


/* Array of Birmingham city data:
*/
$birmingham = array(
    "NAME" => 'BIRMINGHAM',
    'LAT' => 52.494390486546166,
    'LNG' => -1.889832036964235,
    'WCONDITION_URL' => 'https://api.openweathermap.org/data/2.5/weather?q=Birmingham,uk&mode=xml&units=metric&appid='.WEATHER_API_KEY,
    'WFORECAST_URL' => 'https://api.openweathermap.org/data/2.5/forecast?q=Birmingham,uk&mode=xml&units=metric&appid='.WEATHER_API_KEY,
    'MARKERS' => array(
        array('Birmingham Aiport', 52.45474915392393, -1.7442511229568742, 1, AIRPORT_ICON),
        array('Birmingham Electric Cinema', 52.47683107485693, -1.8987128727199671, 2, CINEMA_ICON),
        array('Birmingham Odeon Broadway Plaza', 52.50744341939955, -1.8935755546733104, 3, CINEMA_ICON),
        array('Birmingham Cineworld Cinema', 52.473924789074665, -1.9218331303933098, 4, CINEMA_ICON),
        array('Thinktank', 52.482539248765825, -1.8867474314553503, 5, MUSEUM_ICON),
        array('Birminham Museum & Art Gallery', 52.48014326344876, -1.9034545685337794, 6, MUSEUM_ICON),
        array('Villa Park', 52.509229218714296, -1.8847720727578505, 7, STADIUM_ICON),
        array('St Andrews', 52.47583640799325, -1.8681616438621451, 8, STADIUM_ICON),
    ));

/* Array of Chicago city data:
*/
$chicago = array(
    'NAME' => 'CHICAGO',
    'LAT' =>  41.86227362550945,
    'LNG' => -87.62160395305416,
    'WCONDITION_URL' => 'https://api.openweathermap.org/data/2.5/weather?q=Chicago,us&mode=xml&units=metric&appid='.WEATHER_API_KEY,
    'WFORECAST_URL' => 'https://api.openweathermap.org/data/2.5/forecast?q=Chicago,us&mode=xml&units=metric&appid='.WEATHER_API_KEY,
    'MARKERS' => array(
    array('Chicago Midway International Aiport', 41.786903895711056, -87.75042887086958, 1, AIRPORT_ICON),
    array('OHare International Airport', 41.97973766034273, -87.90676630207854, 2, AIRPORT_ICON),
    array('Regal Webster Place', 41.89131099287964, -87.61906797309145, 3, CINEMA_ICON),
    array('AMC River East 21', 41.92261078368964, -87.6653043749468, 4,  CINEMA_ICON),
    array('The Logan Theatre', 41.931818457615485, -87.70773445664798, 5, CINEMA_ICON),
    array('Chicago History Museum', 41.911668442948184, -87.6316323588315, 6, MUSEUM_ICON),
    array('Field Museum', 41.86610120351603, -87.61702341534463, 7, MUSEUM_ICON),
    ));
    
// Set custom error handler
function twinsErrorHandler(int $errNo, string $errMsg, string $file, int $line) {
    echo "Twin Cities Application error handler got #[$errNo] occurred in [$file] at line [$line]: [$errMsg]";
}

// Declare error handler
set_error_handler('twinsErrorHandler');

// Weather:
// Birmingham:
$xml = simplexml_load_file($birmingham["WCONDITION_URL"]) or die("Error: Cannot create object");  // Load the XML file into an object to access weather conditon
$weathercode = $xml->weather['icon'];                                           // Access weather icon
$weathericonurl = 'http://openweathermap.org/img/wn/'.$weathercode.'@2x.png';   // Obtain weather icon through URL

$forecastxml = simplexml_load_file($birmingham["WFORECAST_URL"]) or die("Error: Cannot create object(forecast)");   // Load the XML file into an object to access weather forecast

// Assigment for value comparison within the selection in the loop for Birmingham
$midday = "12:00:00";
$midnight = "00:00:00";

// Assigment for value comparison within the selection in the loop for Chicago
$midday2 = "12:00:00";
$midnight2 = "00:00:00";

// Define various constants to store current weather data for birmingham
define ('SUNRISE',$xml->city->sun['rise']);
define ('SUNSET',$xml->city->sun['set']);
define ('CONDITION',$xml->weather['value']);
define ('TEMPERATURE',$xml->temperature['value']); 
define ('WIND',$xml->wind->speed['value']); 
define ('WINDNAME',$xml->wind->speed['name']); 
define ('WINDDIRECTION',$xml->wind->direction['name']); 
define ('HUMIDITY',$xml->humidity['value']); 
define ('PRESSURE',$xml->pressure['value']);

// Chicago:
$xml2 = simplexml_load_file($chicago["WCONDITION_URL"]) or die("Error: Cannot create object"); // Load the XML file into an object to access weather conditon
$weathercode2 = $xml2->weather['icon'];                                             // Access weather icon
$weathericonurl2 = 'http://openweathermap.org/img/wn/'.$weathercode2.'@2x.png';     // Obtain weather icon through URL

$forecastxml2 = simplexml_load_file($chicago["WFORECAST_URL"]) or die("Error: Cannot create object(forecast)");  // Load the XML file into an object to access weather forecast            

// Define various constants to store current weather data for chicago
define ('SUNRISE2',$xml2->city->sun['rise']);
define ('SUNSET2',$xml2->city->sun['set']);
define ('CONDITION2',$xml2->weather['value']); 
define ('TEMPERATURE2',$xml2->temperature['value']); 
define ('WIND2',$xml2->wind->speed['value']); 
define ('WINDNAME2',$xml2->wind->speed['name']);
define ('WINDDIRECTION2',$xml2->wind->direction['name']);  
define ('HUMIDITY2',$xml2->humidity['value']); 
define ('PRESSURE2',$xml2->pressure['value']);

// Flickr:
$flickrChicago = 'https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key='.FLICKR_API_KEY.'&tags=Chicago&format=json&nojsoncallback=1';
$flickrBirmingham = 'https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key='.FLICKR_API_KEY.'&tags=Birmingham&format=json&nojsoncallback=1';

// Create database connection for flickr
$mysqli = new mysqli("localhost","root","","flickr_cache");
// Error handling 
if($mysqli->connect_errno != 0){
    echo $mysqli->connect_error;
}

// RSS:
// Global variables:

// An array containing all the different relation names
$query_entities = array('city', 'category', 'image', 'poi');

// An array containing all the attributes in each of the relations
// For the city relation
$cityrow = array("city_id", "city_name", "country", "state", "city_geo_lat", "city_geo_long", "area_km", "population", "gdp_in_usd", "currency", "language", "time_zone", "max_temp", "min_temp", "asml", "city_website_link", "city_image_link");

// For the category relation
$catrow = array('category_id', 'type');

// For the poi (Place of Interest) relation
$poirow = array('place_id', 'city_id', 'capacity', 'poi_geo_lat', 'poi_geo_long', 'name', 'established', 'poi_description', 'poi_website_link', 'poi_image_link');

// For the image relation
$imagerow = array('image_id', 'image_description', 'title', 'city_id', 'place_id', 'image_link');

/* The following arrays contain the attributes that are to be shown in the rss feed */
// City feed
$city_rss = array('city_name', 'country','area_km', 'population', 'gdp_in_usd',"city_website_link", "city_image_link");

// For the category feed
$cat_rss = array('type');

// For the poi feed
$poi_rss = array('name', 'established', 'poi_description','poi_website_link', 'poi_image_link');

// For the image feed
$image_rss = array('title', 'image_description', 'image_link');

// The following array contains the attributes links which will be used to hyperlink the links in the rss
$arrayofLinks = array('city_website_link', 'poi_website_link');

// The following array contains the attributes which are images, and will be used to convert them into images in the rss
$arrayofImages = array('city_image_link', 'poi_image_link', 'image_link');

?>