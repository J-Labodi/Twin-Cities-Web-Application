<?php
/* Author: Connor Mackintosh - 2022
    flickr.php - this file displays photos called from the Flickr API. the images are also cached in a SQL database*/

    // function to call Chicago pictures from flickr
    function ChicagoPics(){
    // calling the api
    // I should set the amount per page to 10
    $url = "https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=788a5834acce54fb3cfbb41cc3a80b95&tags=Chicago&format=json&nojsoncallback=1";
    // getting file contents 
    $data = json_decode(file_get_contents($url));

    // setting vairable to view array values within the object 
    $photos = $data->photos->photo;

    // looping through the photos array 5 times to display pics to webpage 
    foreach(array_slice($photos, 0,10) as $photo){
        $url = 'http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'.jpg';
        echo '<img class="m-1 rounded" src="'.$url.'" height="293" width="293">';
    }
}
// function to call Chicago pictures from flickr
function BirminghamPics(){
    // calling the api
    $url = "https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=788a5834acce54fb3cfbb41cc3a80b95&tags=Birmingham&format=json&nojsoncallback=1";
    // getting file contents 
    $data = json_decode(file_get_contents($url));

    // setting vairable to view array values within the object 
    $photos = $data->photos->photo;

    // looping through the photos array 5 times to display pics to webpage 
    foreach(array_slice($photos, 0,10) as $photo){
        $url = 'http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'.jpg';
        echo '<img class="m-1 rounded" src="'.$url.'" height="293" width="293">';
    }
}

// calling the functions
/*
ChicagoPics();
BirminghamPics();
*/

?>

<!-- caching the flickr responses to a json file -->
<?php

// having time I would have just used the API request from above 

// getting Birmingham json data
$Burl = "https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=788a5834acce54fb3cfbb41cc3a80b95&tags=Birmingham&format=json&nojsoncallback=1";
$Bdata = json_decode(file_get_contents($Burl));
$Bphotos = $Bdata->photos->photo;

// getting Chicagos json data
$Curl = "https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=788a5834acce54fb3cfbb41cc3a80b95&tags=Chicago&format=json&nojsoncallback=1";;
$Cdata = json_decode(file_get_contents($Curl));
$Cphotos = $Cdata->photos->photo;

// opening the caching file and inserting a time stamp in uk time 
$file = fopen('C:\xampp\htdocs\CW' .'/cachingFlickr2.json','a');
// date_default_timezone_set('Europe/London');
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
?>


<?php
// connect to DB
$mysqli = new mysqli("localhost","root","Becher01!","flickr_cache");
// error handeling 
if($mysqli->connect_errno != 0){
    echo $mysqli->connect_error;
}
// get json file
$json_data = file_get_contents(".\cachingFlickr2.json");
$image_cache = json_decode($json_data, JSON_OBJECT_AS_ARRAY);

//prepare sql statment with ignore to stop duplicates and try catch to catch any errors 
try {
    $stmt = $mysqli->prepare("
    INSERT IGNORE INTO image_cache(id, owner, secret, server, farm, title, ispublic, isfriend, isfamily)
    VALUES(?,?,?,?,?,?,?,?,?)
    ");
    
    // set statment paramaters
    $stmt->bind_param("ssssisiii", $id, $owner, $secret, $server, $farm, $title, $ispublic, $isfriend, $isfamily);
    
    // insert each data from json file 
    $inserted_rows = 0;
    foreach($image_cache as $cache){
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
$path = "./cachingFlickr2.json";
unlink($path);
?>
