<?php 
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json");
include_once "dbLauncher.php";
include_once "dbManager.php";
$getId = $_GET['delete'];
    deleteAllComments($getId, $db);
    deleteArticle($getId, $db);
    header("Location: index.php");