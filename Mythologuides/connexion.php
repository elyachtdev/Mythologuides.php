<?php
session_start();
include './assets/dB/dbLauncher.php';
include './assets/dB/dbManager.php';

if(!empty($_POST['pseudo'])&& !empty($_POST['password'])){
    $user = selectUser($_POST['pseudo'],$db);
    if(!$user){
        $error = "dontExist";
        header("Location: connexion-view.html.php?error=".$error);
    }
    else {
        if(password_verify($_POST['password'],$user->user_pass)){
            $_SESSION['id']= $user->user_id;
            $_SESSION['pseudo']= $user->user_pseudo;
            $_SESSION['mail']= $user->user_mail;
            $_SESSION['role']= $user->user_role;
            if(!empty($_POST['remember'])){
                setcookie('id',$user->user_id,time()+31556926,null,null,true,true);
                setcookie('pseudo',$user->user_pseudo,time()+31556926,null,null,true,true);
                setcookie('mail',$user->user_mail,time()+31556926,null,null,true,true);
                setcookie('mail',$user->user_role,time()+31556926,null,null,true,true);
            }
            header("Location: index.php?connexion=ok");
        }else{
            $error = "password";
            header("Location: connexion-view.html.php?error=".$error);
        }
    }
}else{
    $error = "allField";
    header("Location: connexion-view.html.php?error=".$error);
}
