<?php
$id=0;
require_once("../connection.php");
if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

$query = "DELETE FROM `markets` WHERE `market_id` = " . $id;
if (mysqli_query($conn, $query)) {
    header("Location: market.php");
    exit;
} else {
    // echo$query;
    echo mysqli_error($conn);
}
// Close the connection
mysqli_close($conn);

echo $id;
?>