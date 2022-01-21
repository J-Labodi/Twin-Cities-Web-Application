<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coursework - Twin Cities (Birmingham & Chicago)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Twin Cities Weather</h1>
<div id="Wrapper">  
    <div id="div1">   <!-- Divide document into two section to be able to position the tables next to each other -->
        <img class="imgcities" width="200" height="200" alt="Birmingham" src="https://www.visitbritain.com/sites/default/files/consumer_components_enhanced/highlighted_page/view_over_birmingham_city_centre_at_dusk_vb34156177.jpg">

        <?php        
        date_default_timezone_set('Europe/London');     // Set time zone to GMT

        $url= 'https://api.openweathermap.org/data/2.5/weather?q=Birmingham,uk&mode=xml&units=metric&appid=63a5bd38f158def17bf0dce1763738d5';           // API URL of current weather
        $xml = simplexml_load_file($url) or die("Error: Cannot create object");                                                                         // Convert the XML file into an object
        $weathercode = $xml->weather['icon'];                                           // Access weather icon
        $weathericonurl = 'http://openweathermap.org/img/wn/'.$weathercode.'@2x.png';   // Obtain weather icon through URL

        $forecasturl = 'https://api.openweathermap.org/data/2.5/forecast?q=Birmingham,uk&mode=xml&units=metric&appid=63a5bd38f158def17bf0dce1763738d5'; // API URL of weather forecast
        $forecastxml = simplexml_load_file($forecasturl) or die("Error: Cannot create object(forecast)");                                               // Convert the XML file into an object

        // Declare various arrays that will contain desired data
        $daytemparray = array();
        $nighttemparray = array();
        $datearray = array();
        $symbolnamearray = array();

        // Access the children of the specified node
        $children = $forecastxml->forecast->children();

        // Assigment for value comparison within the selection in the following loop
        $midday = "12:00:00";
        $midnight = "00:00:00";

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

        // Define various constants to store current weather data
        define ('SUNRISE',$xml->city->sun['rise']);
        define ('SUNSET',$xml->city->sun['set']);
        define ('CONDITION',$xml->weather['value']);
        define ('TEMPERATURE',$xml->temperature['value']); 
        define ('WIND',$xml->wind->speed['value']); 
        define ('WINDNAME',$xml->wind->speed['name']); 
        define ('WINDDIRECTION',$xml->wind->direction['name']); 
        define ('HUMIDITY',$xml->humidity['value']); 
        define ('PRESSURE',$xml->pressure['value']);

        // Echo current weather table, accessing various, pre-assigned values from the constants. Some represented through additional formatting.
        echo '<table>';
        echo '<h4>Weather in Birmingham on ' . date("D jS F Y") . ' @ ' . date("H:i:s") . '</h4>';

        echo '<tr>'; 
            echo '<td valign="top"> Condition: </td>';
            echo '<td class="data"><img src="' . $weathericonurl . '" alt="weather icon" width="50px" height="50px" id="imgicon"/>' . ucfirst(CONDITION) . '</td>';
        echo '</tr>';
        echo '<tr>';                                          
                echo '<td> Temperature: </td>';
                echo '<td class="data">' . round(TEMPERATURE) . ' &degC</td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Wind: </td>';
            echo '<td class="data">' . WIND . ' m/s (' . WINDNAME . ') from a ' . WINDDIRECTION . ' direction </td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Humidity: </td>';
            echo '<td class="data">' . HUMIDITY . '%</td>';    
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Pressure: </td>';
            echo '<td class="data">' . PRESSURE . ' hPA</td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Sunrise: </td>';
            echo '<td class="data">' . substr(SUNRISE, strpos(SUNRISE, 'T') + 1) . '</td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Sunset: </td>';
            echo '<td class="data">' . substr(SUNSET, strpos(SUNSET, 'T') + 1) . '</td>';
        echo '</tr>';
        echo '</table>';

        echo '<table>';

        // Echo weather forecast table, accessing various values from the arrays that contain the relevant data of weather forecast.
        echo '<h4>Weather Forecast - Birmingham</h4>';
        echo '<tr>';
            echo '<th>Date </th>';
            echo '<th>Day</th>';
            echo '<th>Night</th>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td>' . date('jS M',$datearray[0]) . '</td>';
            echo '<td class="data">' . $daytemparray[0] . ' &degC | ' . ucfirst($symbolnamearray[0]) . '</td>';
            echo '<td class="data">' . $nighttemparray[0] . ' &degC | ' . ucfirst($symbolnamearray[1]) . '</td>';
        echo '</tr>';
        echo '<tr>';                                           
            echo '<td>' . date('jS M',$datearray[2]) . '</td>'; 
            echo '<td class="data">' . $daytemparray[1] . ' &degC | ' . ucfirst($symbolnamearray[2]) . '</td>';
            echo '<td class="data">' . $nighttemparray[1] . ' &degC | ' . ucfirst($symbolnamearray[3]) . '</td>';
        echo '</tr>'; 
        echo '<tr>';                                          
            echo '<td>' . date('jS M',$datearray[4]) . '</td>';
            echo '<td class="data">' . $daytemparray[2] . ' &degC | ' . ucfirst($symbolnamearray[4]) . '</td>';
            echo '<td class="data">' . $nighttemparray[2] . ' &degC | ' . ucfirst($symbolnamearray[5]) . '</td>';
        echo '</tr>'; 
        echo '<tr>';                                           
            echo '<td>' . date('jS M',$datearray[6]) . '</td>'; 
            echo '<td class="data">' . $daytemparray[3] . ' &degC | ' . ucfirst($symbolnamearray[6]) . '</td>';
            echo '<td class="data">' . $nighttemparray[3] . ' &degC | ' . ucfirst($symbolnamearray[7]) . '</td>';
        echo '</tr>'; 
        echo '<tr>';                                           
            echo '<td>' . date('jS M',$datearray[8]) . '</td>'; 
            echo '<td class="data">' . $daytemparray[4] . ' &degC | ' . ucfirst($symbolnamearray[8]) . '</td>';
            echo '<td class="data">' . $nighttemparray[4] . ' &degC | ' . ucfirst($symbolnamearray[9]) . '</td>';
        echo '</tr>'; 
        echo '</table>';
        ?>
    </div>

    <div id="div2">
        <img class="imgcities" width="200" height="200" alt="Chicago" src="https://www.visittheusa.co.uk/sites/default/files/styles/hero_l/public/images/hero_media_image/2018-05/2af94a274ebf7f6716f9b2068595581c.jpeg?h=a98222f4&itok=o5jaY4kH">

        <?php
        $url2 = 'https://api.openweathermap.org/data/2.5/weather?q=Chicago,us&mode=xml&units=metric&appid=63a5bd38f158def17bf0dce1763738d5';           // API URL of current weather
        $xml2 = simplexml_load_file($url2) or die("Error: Cannot create object");                                                                      // Convert the XML file into an object
        $weathercode2 = $xml2->weather['icon'];                                             // Access weather icon
        $weathericonurl2 = 'http://openweathermap.org/img/wn/'.$weathercode2.'@2x.png';     // Obtain weather icon through URL

        $forecasturl2 = 'https://api.openweathermap.org/data/2.5/forecast?q=Chicago,us&mode=xml&units=metric&appid=63a5bd38f158def17bf0dce1763738d5';  // API URL of weather forecast
        $forecastxml2 = simplexml_load_file($forecasturl2) or die("Error: Cannot create object(forecast)");                                            // Convert the XML file into an object                         

        // Declare various arrays that will contain desired data
        $daytemparray2 = array();
        $nighttemparray2 = array();
        $datearray2 = array();
        $symbolnamearray2 = array();

        // Access the children of the specified node
        $children2 = $forecastxml2->forecast->children();

        // Assigment for value comparison within the selection in the following loop
        $midday2 = "12:00:00";
        $midnight2 = "00:00:00";

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

        // Define various constants to store current weather data
        define ('SUNRISE2',$xml2->city->sun['rise']);
        define ('SUNSET2',$xml2->city->sun['set']);
        define ('CONDITION2',$xml2->weather['value']); 
        define ('TEMPERATURE2',$xml2->temperature['value']); 
        define ('WIND2',$xml2->wind->speed['value']); 
        define ('WINDNAME2',$xml2->wind->speed['name']);
        define ('WINDDIRECTION2',$xml2->wind->direction['name']);  
        define ('HUMIDITY2',$xml2->humidity['value']); 
        define ('PRESSURE2',$xml2->pressure['value']);

        // Echo current weather table, accessing various, pre-assigned values from the constants. Some represented through additional formatting.
        echo '<table>';
        echo '<h4>Weather in Chicago on ' . date("D jS F Y") . ' @ ' . date("H:i:s") . '</h4>';

        echo '<tr>'; 
            echo '<td valign="top"> Condition: </td>';
            echo '<td class="data"><img src="' . $weathericonurl2 . '" alt="weather icon" width="50px" height="50px" id="imgicon"/>' . ucfirst(CONDITION2) . '</td>';
        echo '</tr>';
        echo '<tr>';                                          
                echo '<td> Temperature: </td>';
                echo '<td class="data">' . round(TEMPERATURE2) . ' &degC</td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Wind: </td>';
            echo '<td class="data">' . WIND2 . ' m/s (' . WINDNAME2 . ') from a ' . WINDDIRECTION2 . ' direction </td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Humidity: </td>';
            echo '<td class="data">' . HUMIDITY2 . '%</td>';    
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Pressure: </td>';
            echo '<td class="data">' . PRESSURE2 . ' hPA</td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Sunrise: </td>';
            echo '<td class="data">' . substr(SUNRISE2, strpos(SUNRISE2, 'T') + 1) . '</td>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td> Sunset: </td>';
            echo '<td class="data">' . substr(SUNSET2, strpos(SUNSET2, 'T') + 1) . '</td>';
        echo '</tr>';
        echo '</table>';

        // Echo weather forecast table, accessing various values from the arrays that contain the relevant data of weather forecast.
        echo '<table>';
        echo '<h4>Weather Forecast - Chicago</h4>';
        echo '<tr>';
            echo '<th>Date </th>';
            echo '<th>Day</th>';
            echo '<th>Night</th>';
        echo '</tr>';
        echo '<tr>';                                          
            echo '<td>' . date('jS M',$datearray2[0]) . '</td>';
            echo '<td class="data">' . $daytemparray2[0] . ' &degC | ' . ucfirst($symbolnamearray2[0]) . '</td>';
            echo '<td class="data">' . $nighttemparray2[0] . ' &degC | ' . ucfirst($symbolnamearray2[1]) . '</td>';
        echo '</tr>';
        echo '<tr>';                                           
            echo '<td>' . date('jS M',$datearray2[2]) . '</td>'; 
            echo '<td class="data">' . $daytemparray2[1] . ' &degC | ' . ucfirst($symbolnamearray2[2]) . '</td>';
            echo '<td class="data">' . $nighttemparray2[1] . ' &degC | ' . ucfirst($symbolnamearray2[3]) . '</td>';
        echo '</tr>'; 
        echo '<tr>';                                          
            echo '<td>' . date('jS M',$datearray2[4]) . '</td>';
            echo '<td class="data">' . $daytemparray2[2] . ' &degC | ' . ucfirst($symbolnamearray2[4]) . '</td>';
            echo '<td class="data">' . $nighttemparray2[2] . ' &degC | ' . ucfirst($symbolnamearray2[5]) . '</td>';
        echo '</tr>'; 
        echo '<tr>';                                           
            echo '<td>' . date('jS M',$datearray2[6]) . '</td>'; 
            echo '<td class="data">' . $daytemparray2[3] . ' &degC | ' . ucfirst($symbolnamearray2[6]) . '</td>';
            echo '<td class="data">' . $nighttemparray2[3] . ' &degC | ' . ucfirst($symbolnamearray2[7]) . '</td>';
        echo '</tr>'; 
        echo '<tr>';                                           
            echo '<td>' . date('jS M',$datearray2[8]) . '</td>'; 
            echo '<td class="data">' . $daytemparray2[4] . ' &degC | ' . ucfirst($symbolnamearray2[8]) . '</td>';
            echo '<td class="data">' . $nighttemparray2[4] . ' &degC | ' . ucfirst($symbolnamearray2[9]) . '</td>';
        echo '</tr>'; 
        echo '</table>';
        ?>
    </div>
</div>
</body>
</html>