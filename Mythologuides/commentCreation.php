<?php
session_start();
if(isset($_COOKIE['id']) || isset($_SESSION['id'])){
    include './assets/dB/dbLauncher.php';
    include './assets/dB/dbManager.php';
    $getId = htmlspecialchars($_GET['id']);
    $data = selectArticle($_POST['comText'], $db);
    if (empty($_POST['comText'])) {
        $error = "exist";
        header("Location: articleReading-view.html.php?error=" . $error);
    } else {
        $result = addComment($_POST['comText'], $_SESSION['id'], $getId ,$db);
        if ($result) {
            header("Location: articleReading-view.html.php?id=" . $getId);
        }
    }
} else{
    header("Location: index.php");
}