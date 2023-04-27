<?php
$id=0;
require_once("../connection.php");
if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

$query = "DELETE FROM `centers` WHERE `center_id` = " . $id;
if (mysqli_query($conn, $query)) {
    header("Location: show_center.php");
    exit;
} else {
    // echo$query;
    echo mysqli_error($conn);
}
// Close the connection
mysqli_close($conn);

echo $id;
?>