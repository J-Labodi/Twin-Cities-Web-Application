<?php

if(isset($_POST['upload'])){
    $file = $_FILES['file'];

// extracting the name of the file the size, temp name, error and what type from the array 
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

// explose from the . to get file name and type
$fileExt = explode('.',$fileName);
// getting the file extesnion out of the last part of the array and setting it to all lower case
$fileActualExt = strtolower(end($fileExt));

// types of files allowed
$allowed = array('jpg', 'jpeg', 'png', 'pdf');

// error handeling for file type and size
if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 1000000){
            //applying uniqe ID in microseconds in time format so files wont be over written 
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'upload/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            header("location: cwresponsive.php");
        }else{
            echo "The file is too big, go back and try again";
        }
    }else{
     echo " There was an error uploading the file, go back and try again ";
    }
}else{
    echo " You cannot upload files of this type, go back and try again";
}

}
//https://www.youtube.com/watch?v=JaRq73y5MJk
?>

