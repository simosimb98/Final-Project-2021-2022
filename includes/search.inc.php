<?php
include_once 'capdb.inc.php';
$output = '';

if(isset($_POST['searchVal'])){

    $search = mysqli_real_escape_string($conn, $_POST['searchVal']);
    $search = preg_replace("#[^0-9a-z]#i","",$search);

    $sql = "SELECT carpartID, productname FROM partsdetails WHERE productname LIKE '%$search%';"; 
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if($count == 0){
        $output = 'No result found!';
    }else{
        while($row = mysqli_fetch_array($result)){
            $prname = $row['productname'];
            $id = $row['carpartID'];

            $output.='<a class="dropdown-item" style="background-color: white; border: 0.1px solid #d31531; width: 350px;" href="products-details.php?id='.$id.'">'.$prname.'</a>';
          
        }
    }
}
echo ($output);
?>