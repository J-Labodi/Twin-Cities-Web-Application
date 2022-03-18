<?php
/* Author: Connor Mackintosh - 2022
    flickr.php - this file displays photos called from the Flickr API. the images are also cached in a SQL database*/

/* Commented out as these are now included in cwresponsive.php.
*/
//include('dsa_utility.php'); // functions
//include('config.php'); // configuration data
    
/*
Calling the functions:
Commented out as functions are now called in cw.responsive.php.
*/
//ChicagoPics();
//BirminghamPics();

/* Caching the flickr responses to a json file.
*/

// getting Birmingham json data
$Bdata = json_decode(file_get_contents($flickrBirmingham));
$Bphotos = $Bdata->photos->photo;

// getting Chicagos json data
$Cdata = json_decode(file_get_contents($flickrChicago));
$Cphotos = $Cdata->photos->photo;

// opening the caching file and inserting a time stamp in uk time 
$file = fopen('/Applications/XAMPP/xamppfiles/htdocs/twincities' .'/cachingFlickr2.json','a');
// fwrite($file,date("\nd-m-Y H:i:s \n"));
 
// writing json data to file formatted 
fwrite($file,("["));
foreach(array_slice($Bphotos, 0,10) as $Bphoto){
    fwrite($file,json_encode($Bphoto));
    fwrite($file,(","));
}

// writing json data to file formatted 
$commaCounter = 0;
foreach(array_slice($Cphotos, 0,10) as $Cphoto){
    fwrite($file,json_encode($Cphoto));
    $commaCounter ++;
    if ($commaCounter < 10){
    fwrite($file,(","));
    }
}
fwrite($file,("]"));
// close file
fclose($file);


// get json file
$json_data = file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/twincities/cachingFlickr2.json");
$image_cache = json_decode($json_data, JSON_OBJECT_AS_ARRAY);

// prepare sql statement with ignore to stop duplicates and try catch to catch any errors 
try {
    $stmt = $mysqli->prepare("
    INSERT IGNORE INTO image_cache(id, owner, secret, server, farm, title, ispublic, isfriend, isfamily)
    VALUES(?,?,?,?,?,?,?,?,?)
    ");
    
    // set statement parameters
    $stmt->bind_param("ssssisiii", $id, $owner, $secret, $server, $farm, $title, $ispublic, $isfriend, $isfamily);
    
    // insert data from json file 
    $inserted_rows = 0;
    foreach( $image_cache as $cache){
        $id = $cache["id"];
        $owner = $cache["owner"];
        $secret = $cache["secret"];
        $server = $cache["server"];
        $farm = $cache["farm"];
        $title = $cache["title"];
        $ispublic = $cache["ispublic"];
        $isfriend = $cache["isfriend"];
        $isfamily = $cache["isfamily"];
    
        $stmt->execute();
        $inserted_rows++;
    }
    
    if(count($image_cache)== $inserted_rows){
        // echo "success";
    }else{
        // echo "error";
    }
} catch(mysqli_sql_exception $e){
$error_messgae = $e->getMessage();
echo $error_messgae;
}

// delete the json file 
$path = "/Applications/XAMPP/xamppfiles/htdocs/twincities/cachingFlickr2.json";
unlink($path);
?>