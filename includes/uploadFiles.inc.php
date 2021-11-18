<?php

include_once 'capdb.inc.php';

if(isset($_POST['submitPhotos'])){

    $sqlid= mysqli_query( $conn,"SELECT MAX( carpartID ) AS max FROM partsdetails;" );
    $res = mysqli_fetch_assoc( $sqlid);
    $maxID = $res['max'];

    $imageCount = count($_FILES['image']['name']);
    $extensions_arr = array("jpg","jpeg","png");

    for($i = 0; $i < $imageCount; $i++){

        $imageName = $_FILES['image']['name'][$i];
        $target_fileEXT = ($target_dir) . basename($_FILES['image']['name'][$i]);
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetPath = "../multimedia/". $imageName;

        $imageFileType = strtolower(pathinfo($target_fileEXT,PATHINFO_EXTENSION));
        
        if(in_array($imageFileType, array("jpg","jpeg","png"))){
            
          
        if(move_uploaded_file($imageTempName, $targetPath)){

            $sql = "INSERT into carpartsmultimedia (carpartID, photo) VALUES ($maxID, '$imageName');";
            $result = mysqli_query($conn, $sql);
         }
       }else{
        header('Location: ../index.php?upload=wrongfileformat');
        exit();
       }
    }

    if($result){
        header('Location: ../index.php?upload=success');
        exit();
    }

}