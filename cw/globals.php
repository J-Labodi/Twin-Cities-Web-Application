<?php

//This file will contain all the Global variables used by index.php. They are:

//An array containing all the different relation names
$query_entities = array('city', 'category', 'image', 'poi');




//Following is an array containing all the attributes in each of the realtion
//For the city relation
$cityrow = array("city_id", "city_name", "country", "state", "city_geo_lat", "city_geo_long", "area_km", "population", "gdp_in_usd", "currency", "language", "time_zone", "max_temp", "min_temp", "asml", "city_website_link", "city_image_link");

//For the category relation
$catrow = array('category_id', 'type');

//For the poi (Place of Interest) relation
$poirow = array('place_id', 'city_id', 'capacity', 'poi_geo_lat', 'poi_geo_long', 'name', 'established', 'poi_description', 'poi_website_link', 'poi_image_link');

//For the image relation
$imagerow = array('image_id', 'image_description', 'title', 'city_id', 'place_id', 'image_link');




/* The following arrays, on the other hand contain only those attributes that are to be shown in the rss feed */
//for the city feed
$city_rss = array('city_name', 'country','area_km', 'population', 'gdp_in_usd',"city_website_link", "city_image_link");

//For the category feed
$cat_rss = array('type');

//For the poi feed
$poi_rss = array('name', 'established', 'poi_description','poi_website_link', 'poi_image_link');

//For the image feed
$image_rss = array('title', 'image_description', 'image_link');

//The following array just contains the attributes which will contain link in and will be used to hyperlink the links in the rss
$arrayofLinks = array('city_website_link', 'poi_website_link');

//The following array contains the attributes which are images, and will be used to convert them into images in the rss
$arrayofImages = array('city_image_link', 'poi_image_link', 'image_link');

    

?>