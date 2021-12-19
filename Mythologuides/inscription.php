<?php
session_start();
include_once "dbLauncher.php";
include_once "dbManager.php";

if (!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password2'])) {
    $user = selectUser($_POST['pseudo'], $db);
    if ($user) {
        $error = "alrdyExist";
        header("Location: inscription-view.html.php?error=" . $error);
    } else {
        if ($_POST['password'] != $_POST['password2']) {
            $error = "notSamePass";
            header("Location: inscription-view.html.php?error=".$error);
        } else {
            $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $mail = $_POST['mail'];
            $result = addUser($_POST['pseudo'],$hash,$_POST['mail'],$db);
            if($result) {
                $user = selectUser($_POST['pseudo'],$db);
                $_SESSION['id']=$user->user_id;
                $_SESSION['pseudo']=$_POST['pseudo'];
                $_SESSION['role']=$user->user_role;
                header("Location: index.php?connexion=ok");
            }
            else {
                $error = "dbError";
                header("Location: inscription-view.html.php?error=".$error);
            }
        }
    }
} else {
    $error = "allField";
    header("Location: inscription-view.html.php?error=".$error);
}