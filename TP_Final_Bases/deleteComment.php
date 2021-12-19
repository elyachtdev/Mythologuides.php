<?php 
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");
include_once "dbLauncher.php";
include_once "dbManager.php";

// Supprime tous les commentaires d'un user à améliorer
// deleteComment($_GET['delete'], $db);
// header("Location: index.php");

$servername = "localhost";
$username = "root";
$password = "";
$db="mythologie";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

$id = $_GET['delete'];
$sql = "DELETE FROM commentaires WHERE com_id = $id";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($conn);

