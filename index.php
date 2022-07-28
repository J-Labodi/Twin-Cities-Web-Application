<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twin Cities: Birmingham & Chicago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/custom.css">
    <script src="https://kit.fontawesome.com/6f214ab12c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="maps/googlemaps.js"></script>
</head>

<body>
    <?php
    include('config.php'); // Configuration data for the web appliation.
    include('dsa_utility.php'); // Functions for the web application.
    ?>

    <div class="container-fluid">
    <div id="Home-Page-Top"></div>
        <div class="row pt-2">
            <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start">
                <h1>Twin Cities Weather</h1>
            </div>
        </div>
        <div class="row p-2 m-0 p-0">
            <div class="col-12 col-sm-12 d-flex justify-content-end" id="icons">
                <a href="#twincitiesmap">
                <i class="fa-solid fa-map-location-dot fa-2x"></i>
                </a>
                <a href="#twincitiesimages">
                <i class="fa-solid fa-camera fa-2x" id="icon"></i>
                </a>
                <a href="rss.php">
                <i class="fa-solid fa-square-rss fa-2x" id="icon"></i>
                </a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="div1">
                <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start">
                    <img class="img-fluid img-thumbnail" alt="Birmingham" src="https://www.visitbritain.com/sites/default/files/consumer/paragraphs-bundles/image-header-with-text/view_over_birmingham_city_centre_at_dusk_vb34156177.jpg">
                </div>
                <?php

                // Declare various arrays that will contain desired data
                $daytemparray = array();
                $nighttemparray = array();
                $datearray = array();
                $symbolnamearray = array();

                // Access the children of the specified node
                $children = $forecastxml->forecast->children();

                // foreach loop construct to loop through the forecast data
                foreach ($children as $child) {

                    // Assign time data after formatting
                    $time = trim(str_replace(" ","",(substr($child['from'], strpos($child['from'], 'T') + 1)))); 

                    // Breaking string to array by a specified separator 
                    $datearr = explode("T", $child['from'], 2);

                    // Further formatting of date, then transforming into a timestamp
                    $date = str_replace('-', '', implode($datearr));
                    $date = strtotime(str_replace(':', '', $date));

                    // Access and assign name of weather symbol 
                    $symbolname = $child -> symbol['name'];

                    // Access and assign temperature, convert it to float data type
                    $temp = $child -> temperature['value'];
                    $temptofloat = round((float) $temp);

                    // Selection to access desired data (midday and midnight), then push it to the appropriate array  
                    if ($time == $midday){
                        array_push($daytemparray,$temptofloat);
                        array_push($datearray,$date);
                        array_push($symbolnamearray,$symbolname);
                    }
                    elseif ($time == $midnight){            
                        array_push($nighttemparray,$temptofloat);
                        array_push($datearray,$date);
                        array_push($symbolnamearray,$symbolname);
                    }
                    else {
                        continue;
                    }
                }

                echo '<div class="p-2" id="title">';
                    echo '<h4>Weather in Birmingham on ' . date("D jS F Y") . ' @ ' . date("H:i:s") . '</h4>';
                echo '</div>';
                
                // Echo current weather table, accessing various, pre-assigned values from the constants. Some represented through additional formatting.
                echo '<table class="table" id="weathertable">';
                echo '<tr>'; 
                    echo '<th scope="row"> Condition: </th>';
                    echo '<td class="data"><img src="' . $weathericonurl . '" alt="weather icon" width="50px" height="50px" id="imgicon"/>' . ucfirst(CONDITION) . '</td>';
                echo '</tr>';
                echo '<tr>';                                          
                        echo '<th scope="row"> Temperature: </th>';
                        echo '<td class="data">' . round(TEMPERATURE) . ' &degC</td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Wind: </th>';
                    echo '<td class="data">' . WIND . ' m/s (' . WINDNAME . ') from a ' . WINDDIRECTION . ' direction </td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Humidity: </th>';
                    echo '<td class="data">' . HUMIDITY . '%</td>';    
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Pressure: </th>';
                    echo '<td class="data">' . PRESSURE . ' hPA</td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Sunrise: </th>';
                    echo '<td class="data">' . substr(SUNRISE, strpos(SUNRISE, 'T') + 1) . '</td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Sunset: </th>';
                    echo '<td class="data">' . substr(SUNSET, strpos(SUNSET, 'T') + 1) . '</td>';
                echo '</tr>';
                echo '</table>';

                echo '<h4>Weather Forecast - Birmingham</h4>';
                // Echo weather forecast table, accessing various values from the arrays that contain the relevant data of weather forecast.
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th scope="col">Date </th>';
                            echo '<th scope="col">Day</th>';
                            echo '<th scope="col">Night</th>';
                        echo '</tr>';
                    echo '</thead>';
                echo '<tr>';                                          
                    echo '<th scope="row">' . date('jS M',$datearray[0]) . '</td>';
                    echo '<td class="data">' . $daytemparray[0] . ' &degC | ' . ucfirst($symbolnamearray[0]) . '</td>';
                    echo '<td class="data">' . $nighttemparray[0] . ' &degC | ' . ucfirst($symbolnamearray[1]) . '</td>';
                echo '</tr>';
                echo '<tr>';                                           
                    echo '<th scope="row">' . date('jS M',$datearray[2]) . '</td>'; 
                    echo '<td class="data">' . $daytemparray[1] . ' &degC | ' . ucfirst($symbolnamearray[2]) . '</td>';
                    echo '<td class="data">' . $nighttemparray[1] . ' &degC | ' . ucfirst($symbolnamearray[3]) . '</td>';
                echo '</tr>'; 
                echo '<tr>';                                          
                    echo '<th scope="row">' . date('jS M',$datearray[4]) . '</td>';
                    echo '<td class="data">' . $daytemparray[2] . ' &degC | ' . ucfirst($symbolnamearray[4]) . '</td>';
                    echo '<td class="data">' . $nighttemparray[2] . ' &degC | ' . ucfirst($symbolnamearray[5]) . '</td>';
                echo '</tr>'; 
                echo '<tr>';                                           
                    echo '<th scope="row">' . date('jS M',$datearray[6]) . '</td>'; 
                    echo '<td class="data">' . $daytemparray[3] . ' &degC | ' . ucfirst($symbolnamearray[6]) . '</td>';
                    echo '<td class="data">' . $nighttemparray[3] . ' &degC | ' . ucfirst($symbolnamearray[7]) . '</td>';
                echo '</tr>'; 
                echo '<tr>';                                           
                    echo '<th scope="row">' . date('jS M',$datearray[8]) . '</td>'; 
                    echo '<td class="data">' . $daytemparray[4] . ' &degC | ' . ucfirst($symbolnamearray[8]) . '</td>';
                    echo '<td class="data">' . $nighttemparray[4] . ' &degC | ' . ucfirst($symbolnamearray[9]) . '</td>';
                echo '</tr>'; 
                echo '</table>';
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6" id="div2">
                <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start">
                    <img class="img-fluid img-thumbnail" alt="Chicago" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/2008-06-10_3000x1000_chicago_skyline.jpg/1200px-2008-06-10_3000x1000_chicago_skyline.jpg">
                </div>
                <?php

                // Declare various arrays that will contain desired data
                $daytemparray2 = array();
                $nighttemparray2 = array();
                $datearray2 = array();
                $symbolnamearray2 = array();
                
                // Access the children of the specified node
                $children2 = $forecastxml2->forecast->children();
                
                // foreach loop construct to loop through the forecast data
                foreach ($children2 as $child2) {
                
                    // Assign time data after formatting
                    $time2 = trim(str_replace(" ","",(substr($child2['from'], strpos($child2['from'], 'T') + 1)))); 
                
                    // Breaking string to array by a specified separator 
                    $datearr2 = explode("T", $child2['from'], 2);
                
                    // Further formatting of date, then transforming into a timestamp
                    $date2 = str_replace('-', '', implode($datearr2));
                    $date2 = strtotime(str_replace(':', '', $date2));
                
                    // Access and assign name of weather symbol     
                    $symbolname2 = $child2 -> symbol['name'];
                
                    // Access and assign temperature, convert it to float data type
                    $temp2 = $child2 -> temperature['value'];
                    $temptofloat2 = round((float) $temp2);
                
                    // Selection to access desired data (midday and midnight), then push it to the appropriate array  
                    if ($time2 == $midday2){
                        array_push($daytemparray2,$temptofloat2);
                        array_push($datearray2,$date2);
                        array_push($symbolnamearray2,$symbolname2);
                    }
                    elseif ($time2 == $midnight2){            
                        array_push($nighttemparray2,$temptofloat2);
                        array_push($datearray2,$date2);
                        array_push($symbolnamearray2,$symbolname2);
                    }
                    else {
                        continue;
                    }
                }
            
                echo '<div class="p-2" id="title">';
                    echo '<h4>Weather in Chicago on ' . date("D jS F Y") . ' @ ' . date("H:i:s") . '</h4>';
                echo '</div>';
                // Echo current weather table, accessing various, pre-assigned values from the constants. Some represented through additional formatting.
                echo '<table class="table">';            
                echo '<tr>'; 
                    echo '<th scope="row"> Condition: </th>';
                    echo '<td class="data"><img src="' . $weathericonurl2 . '" alt="weather icon" width="50px" height="50px" id="imgicon"/>' . ucfirst(CONDITION2) . '</td>';
                echo '</tr>';
                echo '<tr>';                                          
                        echo '<th scope="row"> Temperature: </th>';
                        echo '<td class="data">' . round(TEMPERATURE2) . ' &degC</td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Wind: </th>';
                    echo '<td class="data">' . WIND2 . ' m/s (' . WINDNAME2 . ') from a ' . WINDDIRECTION2 . ' direction </td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Humidity: </th>';
                    echo '<td class="data">' . HUMIDITY2 . '%</td>';    
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Pressure: </th>';
                    echo '<td class="data">' . PRESSURE2 . ' hPA</td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Sunrise: </th>';
                    echo '<td class="data">' . substr(SUNRISE2, strpos(SUNRISE2, 'T') + 1) . '</td>';
                echo '</tr>';
                echo '<tr>';                                          
                    echo '<th scope="row"> Sunset: </th>';
                    echo '<td class="data">' . substr(SUNSET2, strpos(SUNSET2, 'T') + 1) . '</td>';
                echo '</tr>';
                echo '</table>';
            
                // Echo weather forecast table, accessing various values from the arrays that contain the relevant data of weather forecast.
                echo '<h4>Weather Forecast - Chicago</h4>';
                echo '<table class="table">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th scope="col">Date </th>';
                            echo '<th scope="col">Day</th>';
                            echo '<th scope="col">Night</th>';
                        echo '</tr>';
                    echo '</thead>';                
                echo '<tr>';                                          
                    echo '<th scope="row">' . date('jS M',$datearray2[0]) . '</td>';
                    echo '<td class="data">' . $daytemparray2[0] . ' &degC | ' . ucfirst($symbolnamearray2[0]) . '</td>';
                    echo '<td class="data">' . $nighttemparray2[0] . ' &degC | ' . ucfirst($symbolnamearray2[1]) . '</td>';
                echo '</tr>';
                echo '<tr>';                                           
                    echo '<th scope="row">' . date('jS M',$datearray2[2]) . '</td>'; 
                    echo '<td class="data">' . $daytemparray2[1] . ' &degC | ' . ucfirst($symbolnamearray2[2]) . '</td>';
                    echo '<td class="data">' . $nighttemparray2[1] . ' &degC | ' . ucfirst($symbolnamearray2[3]) . '</td>';
                echo '</tr>'; 
                echo '<tr>';                                          
                    echo '<th scope="row">' . date('jS M',$datearray2[4]) . '</td>';
                    echo '<td class="data">' . $daytemparray2[2] . ' &degC | ' . ucfirst($symbolnamearray2[4]) . '</td>';
                    echo '<td class="data">' . $nighttemparray2[2] . ' &degC | ' . ucfirst($symbolnamearray2[5]) . '</td>';
                echo '</tr>'; 
                echo '<tr>';                                           
                    echo '<th scope="row">' . date('jS M',$datearray2[6]) . '</td>'; 
                    echo '<td class="data">' . $daytemparray2[3] . ' &degC | ' . ucfirst($symbolnamearray2[6]) . '</td>';
                    echo '<td class="data">' . $nighttemparray2[3] . ' &degC | ' . ucfirst($symbolnamearray2[7]) . '</td>';
                echo '</tr>'; 
                echo '<tr>';                                           
                    echo '<th scope="row">' . date('jS M',$datearray2[8]) . '</td>'; 
                    echo '<td class="data">' . $daytemparray2[4] . ' &degC | ' . ucfirst($symbolnamearray2[8]) . '</td>';
                    echo '<td class="data">' . $nighttemparray2[4] . ' &degC | ' . ucfirst($symbolnamearray2[9]) . '</td>';
                echo '</tr>'; 
                echo '</table>';
                ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start mb-1">
                <h2 id="twincitiesmap"><i class="fa-solid fa-map-location-dot"></i> Twin Cities Map</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                <h4>Birmingham</h4>
                <div id="map1">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                <h4>Chicago</h4>
                <div id="map2">
                </div>
            </div>
        </div>
        <div class="row mb-6">
            <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start">
                <h2 id="twincitiesimages"><i class="fa-solid fa-camera"></i> Twin Cities Images</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mb-6">
                <h4>Birmingham</h4>
                <div id="images">
                    <div>
                        <?php
                        BirminghamPics();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mb-6">
                <h4>Chicago</h4>
                <div id="images">
                    <div>
                        <?php
                        ChicagoPics();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start">
                <h4>Upload your photo</h4>
            </div>
        </div>
        <div class="row mb-3 mt-1">
            <div class="col-12 col-sm-12 d-flex justify-content-center justify-content-sm-start">                
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type ="file" name="file">
                <p><input type="submit" name="upload" value="Upload"></p>
                </form>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-12">           
                <div id="images">   

                    <?php
                    $path = "img-upload";
                    $dir_handle = @opendir($path) or die("Unable to open folder");
                    echo "<table>";
                    echo"<tr>";
                    while (false !== ($file = readdir($dir_handle))) {
                    
                    if($file != '.' && $file != '..'){
                    echo "<td><img class='m-1 rounded' src='img-upload/$file' alt='$file' width = 293 height = 293><br>
                      </td>";
                    }
                    }
                    echo"<tr/>";
                    echo"</table>";
                    closedir($dir_handle);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
<!-- calling the google maps using API then calling function from googlemaps.js -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA55bVwOZxwZxyI_KwIGJ6OhUcbnzu-JY8&callback=loapMapV3">
    </script>
</html>