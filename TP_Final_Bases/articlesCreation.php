<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['role'] == 1){
    include './dbLauncher.php';
    include './dbManager.php';
    $data = selectArticle($_POST['title'],$db);
    if (!empty($data)) {
        header("Location: articlesCreation-view.html.php?error=exist");
    } else {
        $checkCarac = str_replace(["é","è","à"],["e","e","a"],$_POST['title']);
        if(preg_match('/\W+/', $checkCarac)){
            $error = "specialC";
            header("Location: articlesCreation-view.html.php?error=" . $error);
        }
        if (!empty($_FILES['image'])) {
            $info = pathinfo($_FILES['image']['name']);

            $_FILES['image']['name'] = str_replace(' ', '_', $_POST['title'] . "." . $info['extension']);

            $error = null;
            if ($_FILES['image']['size'] > 3000000) {
                $error = "size";
            }
            if ($info['extension'] != "jpg" && $info['extension'] != "png") {
                $error = "format";
            }
            if ($error == null) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/' . $_FILES['image']['name']);
                $result = addArticle($_POST['title'],$_POST['description'],html_entity_decode($_POST['text']), $_FILES['image']['name'], $_SESSION['id'],$db);
            } else {
                header("Location: articlesCreation-view.html.php?error=" . $error);
            }
        }
        if ($result) {
            header("Location: articlesCreation-view.html.php?add=success");
        }
    }
} else{
    header("Location: index.php");
}