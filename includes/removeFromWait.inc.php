<?php

include_once 'capdb.inc.php';

if(isset($_GET['waitid'])){

$partID = $_GET['waitid'];

$sql = "DELETE FROM waittinglist WHERE carpartID = $partID;";
mysqli_query($conn, $sql);

echo "<script>
window.history.back();
</script>";
}