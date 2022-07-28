<?php

/* This file contains all the functions used in the Twin Cities web application.
*/ 

// Flickr:

// function to call Chicago pictures from flickr
function ChicagoPics(){
// calling the api
// I should set the amount per page to 10
    $flickrChicago = "https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=788a5834acce54fb3cfbb41cc3a80b95&tags=Chicago&format=json&nojsoncallback=1";
    // getting file contents 
    $data = json_decode(file_get_contents($flickrChicago));
    
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
    $flickrBirmingham = "https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=788a5834acce54fb3cfbb41cc3a80b95&tags=Birmingham&format=json&nojsoncallback=1";
    // getting file contents 
    $data = json_decode(file_get_contents($flickrBirmingham));
    
    // setting vairable to view array values within the object 
    $photos = $data->photos->photo;
    
    // looping through the photos array 5 times to display pics to webpage 
    foreach(array_slice($photos, 0,10) as $photo){
        $url = 'http://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'.jpg';
        echo '<img class="m-1 rounded" src="'.$url.'" height="293" width="293">';
        }
    }

// RSS:

// Since the database contains 4 primary tables, city, category, image and poi(point of interest), I will assign each of them a number
// and use functions througout the document which call to the number. This is to avoid repetition of code
/* The unique numbers are:
city: 0
category: 1
image: 2
poi: 3
*/

/* The function starting from here are miscellaneous functions that support the main functions, which are transferring the database held data
into an XML file and then creating a RSS feed from the XML file. */

//A function to take in the number assigned and return the corresponding array for conversion to XML document
// The arrays are city->cityrow, category->catrow, image->imagerow, poi->poirow 
function determineArray($number) {
    switch($number) {   //switch function used to return appropriate values for the four numeric values
        case 0:
            return $GLOBALS['cityrow'];
            break;
        case 1:
            return $GLOBALS['catrow'];
            break;
        case 2:
            return $GLOBALS['imagerow'];
            break;
        case 3:
            return $GLOBALS['poirow'];
            break;
        // No default value intended because we donot desire any rss to be printed twice, and the number will be given internally
            
            }
        }

/* However, we dont want all the XML properties to be present in the RSS, the RSS is desired to be brief containing at max 5 attributes.
Therefore, another set of arrays is used, this time to represent the attributes of the relation to be shown in the RSS.
The relation and their arrays are, city->city_rss, category->cat_rss, image->image_rss, poi->poi_rss
*/
//A function to take in the number assigned and return the corresponding array for conversion of XML document to RSS feed
function rss_array_return($number) {
    switch($number) {   
        case 0:
            return $GLOBALS['city_rss'];
            break;
        case 1:
            return $GLOBALS['cat_rss'];
            break;
        case 2:
            return $GLOBALS['image_rss'];
            break;
        case 3:
            return $GLOBALS['poi_rss'];
            break;
        //Again, no default value for avoiding dupicacy and because the numbers are assigned internally
            }
    }


/* The function below is a function that will check if the string provided is a link. Since we are dealing with a relational database,
rather than checking the contents of the string itself, we can just check to see if the string is a link attribute in the relation.
An array holding all the attributes from the 4 relation which are link is given above as $arrayofLinks. This function will check if the 
given string falls in that category and return a boolean value of true or false.*/

function stringCheck($stringValue, $arrayofLinks) {
    $stringMatches = false;     //a boolean set to false, meaning until changed the string is not a link
    for ($i=0;$i<count($arrayofLinks);$i++) {
        if (strcmp($stringValue, $arrayofLinks[$i])==0) { //used strcmp(a, b)==0 to check whether the strings match and return true if they do
            $stringMatches = true;
        }
    }
    return $stringMatches;          //else return false
}
    

/* The above function checks if a string is a link of any sort. If it is a link, this function will hyperlink it with a represantative text
so that the link can be acessed by clicking on the text */
function makeLink($theLink, $textDisplayed) {
    return ('<a href = "'.$theLink.'">'.str_replace('_', '', $textDisplayed).'</a>');   //hyperlinking using HTML tags
}

/* The relations also contain images. The following function converts the links to images to html image tags*/ 
function makeImage($Str, $textDisplayed) {
    return ('<img src ="'.$Str.'" alt = "'.$textDisplayed.'"style="width:300px;height:200px;">');    //make it into an html image attribute
}


/* In the RSS, the entire descriptions of the pois are about a paragraph and donot go along well with other attributes that are relatively
very short. Therefore, this function is used to reduce the paragraph into the first two sentences only, making it shorter and the RSS more 
even in terms of attribute's length.*/

function returnFirstTwoSentences($par) {    //$par is the paragraph
    $dot = '.';                             //first two sentences are counted using first two full stops
    if (substr_count($par, $dot)>2) {       //only if there are more than 3 sentences
        $pos = stripos($par, $dot);         //the position of the first full stop
        $offset = $pos + 1;                 //look after the full stop for the second one
        $pos2 = stripos($par, $dot, $offset);       //$offset will avoid re-reading the first sentence while looking for the second fukk-stop
        $first_two = substr($par, 0, $pos2);        //take substring from the beginning to the second full-stop
        $first_two.='.';                            //Second full stop is omitted, therefore adding a fullstop to the induced substring
        return $first_two;
    }
    else {                  //if there are less than or just 2 sentences, just return them
        return $par;    
    }
}

/* The XML file containing all the citys should have the parent node as citys(Since it holds multiple cities within it). The next function
will simply take the name of the relations and make them into xml parent tags */
function makeParentTag($str) {
    return '<'.$str.'s/>';      //add s for plurality and add a / for making it a parent tag
}

/* This marks the end of the miscellaneous functions. Below are the two major functions
- One that transfers the database held data into an XML file 
- The other that generates a RSS feed from the XML file 
*/


/*The function below will take the number assigned to the entity and make XML file called entity.xml inside the xml-files directory. For
example, the relation city will be converted to XML and stored in a local file city.xml. Similarly an XML file for all the other relations
will be created, ie. poi.xml, image.xml and category.xml */
function makeXML($num) {
    $query = $GLOBALS['query_entities'][$num];      //using number to identify entity[0,1,2,3 represents city, category, image and poi]
    $sql = "select * from ";                       //the baseline query for querying data from the sql server
    $sql.= $query;                                 // for example for 0, $sql = "select * from city"; 
    $result = mysqli_query($GLOBALS['conn'], $sql);         //using 'conn' from connect.php in the same directory
    $resultCheck = mysqli_num_rows($result);                //ensuring that there is a set of result from the database
    if ($resultCheck>0) {                                   //the program continues only if there is a set of results
        $row = mysqli_fetch_all($result);
        $xml = new SimpleXMLElement(makeParentTag($query));         //creating a Simple XML element to store the data from the db
        //loop through the data and add each record to xml object
        foreach($row AS $entitydetails) {
            $entity = $xml->addChild("$query");                     //addChild to create unique xml entries for each record
            for($i=0;$i<count(determineArray($num));$i++) {         //looping to the length of the array which contains all the attributes
                $entity->addChild(strval(determineArray($num)[$i]), htmlspecialchars($entitydetails[$i]));  //attributes added to individual records
                
            }
        }
    }

    $query.='.xml';         //adding .xml extension to the name(like city)
    $dir = 'xml-files\\';   //specifying the directory to store the xml files -- CHANGED MAC
    $dir.=$query;           //concatenating the strings to create a unique path to store each XML

    $xmlfile = $xml->asXML($dir);       //saving the XML file in the path specified
}


/* The function above transferred the data stored in the db to XML files for each attribute. This function takes those XML files and
creates a RSS feed from them. The XML files are created dynamically using the above function and deleted after each use. This ensures that
the RSS contains up-to-date data from the database*/

function xml_to_rss($number) {
    $filename = $GLOBALS['query_entities'][$number];    //using the assigned numbers to get the unique XML file
    $name = $filename;                             //duplicating the name for multiple use in the function
    $nameformatted = ucfirst($name);
    $filename.='.xml';                  //adding .xml extension to specify the xml file in order to take the data input
    $dir = 'xml-files\\';    //CHANGED TO MAC PATH.           //specifying the exact path to the XML file
    $dir.= $filename;
    $rss_selected = rss_array_return($number);      //using the function to get the array containing the attributes displayed in the RSS
    $xml = simplexml_load_file($dir);               //loading the xml file using simplexml
    echo '<div class="container">';
        echo '<h1 class = "header">'.$nameformatted.' RSS Feed</h1>';        //printing out the header(for example 'city rss feed' for 0)
        echo '<div id="mydiv">';    
            foreach($xml->$name as $attr) {                             //foreach to get all the different records
                echo '<table class = "rss-table"';                      //the rss will store all the entries in a table-like format
                echo '<tbody>';
                echo '<tr>';
                echo '<td valign = "top">';
                    for($i =0;$i<count($rss_selected);$i++) {               //counting the number of attributes
                        // echo $rss_selected[$i];
                        $localname = $rss_selected[$i];                     //using a variable to avoid array slicing in the following code
                        $localnameformatted = ucfirst(str_replace("_"," ", $localname));
                        if (stringCheck($localname, $GLOBALS['arrayofLinks'])) {    //converting to link if is a link attribute
                            echo '<div class = "'.$localname.'">'.$localnameformatted.': '.makeLink($attr->$localname, $localname).'</div>';
                        }
                        elseif(stringCheck($localname, $GLOBALS['arrayofImages'])) {    //Connverting to image if an image attribute
                            echo '<div class = "'.$localname.'">'.substr_replace($localnameformatted, '',-5).': '.makeImage($attr->$localname, $localname).'</div>';
                        
                        }
                        else {                                      //just display it without converting to a link
                        
                            echo '<div class = "'.$localname.'">'.$localnameformatted.': '.returnFirstTwoSentences($attr->$localname).'</div>';
                        // echo '<div class = "established">Established: '.$item->established.'</div>';
                        }
                echo '</td>';
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
                echo'<br>';
                    
                }
            }
        echo '</div>';
    echo '</div>';
    unlink($dir);       //delete the XML file after the RSS is ready
}

?>