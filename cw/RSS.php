<?php
/* The functions and globals used are kept in two separate files, functions.php and globals.php. This is done in order to keep the code
in this file clean organized. The connection to the SQL database is done in a separate file, again to keep the code organzed and avoid 
unnecessary code in this page. In the next few lines, theese files are included and required in this file, so that they can be called
from this page(index.php) */

include_once 'connect.php';             //Using the connection data in the file to connect to the database 
require('functions.php');   //This file contains all the functions used in index.php
require('globals.php');     //Contains all the global variables in the rss-project

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>The RSS Feed</title>
        <link rel="stylesheet" href="styleRSS.css">
        <script src="https://kit.fontawesome.com/6f214ab12c.js" crossorigin="anonymous"></script>
    </head>
    <body>
<!--Numbers are associated to each relation. The index is city->0, category->1, image->2 and poi->3. This is done in order to avoid the
repetition of code, as the indexes correspond to their places in the global array. In this file the two main functions are called on all
of these relation.
- The first method makeXML() transfers the data from dsa_twincities database into an XML file
- The second method xml_to_rss() converts the same XML file into a RSS feed and deletes the XML file 
-->        
    <?php
    for($i=0;$i<4;$i++) {   
    makeXML($i);            
    xml_to_rss($i);
    }
    ?>
    <div id="homelink">
        <a href="http://localhost:8000/cw/cwresponsive.php">
            <span style="font-size: 24px;">
                <i class="fa-solid fa-house"></i> Home
            </span>
        </a>
    </div>
</body>
</html>