<?php
session_start();

session_destroy();
// unset($_COOKIE['id']);
// unset($_COOKIE['pseudo']);
// unset($_COOKIE['mail']);
setcookie('id',"",1);
setcookie('pseudo',"",1); 
setcookie('mail',"",1);
header("location: connexion-view.html.php?dc=ok");