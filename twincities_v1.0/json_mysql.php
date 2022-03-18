<!-- Author: Connor Mackintosh - 2022
    json_mysql.php - this file converts the information pulled from a database into JSON -->
<head>
<title>mysql to json</title>
</head>
<body>

<?php

// connect to db
$connect = mysqli_connect("localhost","root","","dsa_twincities");

//check connection 
if(!$connect){
    echo "connection error" . mysqli_connect_error();
}
// sql query to select poi table data 
$sql = "SELECT * FROM poi";

$result = mysqli_query($connect, $sql);

// create an array 
$json_array = array();

//loop data to save to array
while($row = mysqli_fetch_assoc($result))
{
    $json_array[] = $row;
}

//display data on page 
// echo json_encode($json_array);


$file = fopen('./poi.json','w');
fwrite($file, json_encode($json_array));
fclose($file);

?>


<?php


?>
</body>
</html>
