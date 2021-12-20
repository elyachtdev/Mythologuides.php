<?php
function selectUser($user, $db) {
    $sql = "SELECT * from users WHERE user_pseudo = :user";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":user" => $user
    ]);
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
}
function selectArticle($article, $db) {
    $sql = "SELECT * from articles WHERE article_title = :title";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":title" => $article
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function allArticle($db) {
    $sql = "SELECT * FROM articles";
    $req = $db->query($sql);
    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;
}
function deleteArticle($id,$db) {
    $sql = "DELETE FROM articles WHERE article_id = :id";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":id"=>$id
    ]);
    return $result;
}
function addArticle($articleTitle, $articleDesc, $articleText, $articleImg, $author, $db) {
    $sql = "INSERT INTO articles (article_title, article_desc, article_text, article_image, article_date, user_id) VALUES (:title, :description, :texte, :image, CURRENT_TIMESTAMP, :author)";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":title" => ucfirst($articleTitle),
        ":description" => ucfirst($articleDesc),
        ":texte" => ucfirst($articleText),
        ":image" => $articleImg,
        ":author" => $author
    ]);
    return $result;
}
function addUser($pseudo,$password,$mail,$db) {
    $sql = "INSERT INTO users (user_pseudo, user_pass, user_mail, user_role) VALUES (:pseudo,:pass,:mail, 0)";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":pseudo" => $pseudo,
        ":pass" => $password,
        ":mail" => $mail
    ]);
    return $result;
}
function oneArticle($id, $db) {
    $sql = "SELECT * FROM articles WHERE article_id = :id";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":id" => $id
    ]);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
}
function selectPostUser($id, $db) {
    $sql = "SELECT users.user_pseudo FROM users INNER JOIN articles ON users.user_id = articles.user_id WHERE article_id = :id";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":id" => $id
    ]);
    $dataPost = $req->fetch(PDO::FETCH_OBJ);
    return $dataPost;
}
function addComment($com, $author, $article, $db) {
    $sql = "INSERT INTO commentaires (com_text, com_date, user_id, article_id) VALUES (:texte, CURRENT_TIMESTAMP, :author, :article)";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":texte" => $com,
        ":author" => $author,
        ":article" => $article,
    ]);
    return $result;
}
function selectComment($id, $db) {
    $sql = "SELECT users.user_id, users.user_pseudo, articles.article_id, article_title, com_id, com_date, com_text FROM commentaires INNER JOIN users ON users.user_id = commentaires.user_id INNER JOIN articles ON articles.article_id = commentaires.article_id WHERE articles.article_id = :id ORDER BY com_date DESC";
    $req = $db->prepare($sql);
    $result = $req->execute([
        ":id" => $id
    ]);
    $dataComment = $req->fetchAll(PDO::FETCH_OBJ);
    return $dataComment;
}
function deleteComment($id,$db) {
    $sql = "DELETE FROM commentaires WHERE com_id = :id";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":id"=>$id
    ]);
    return $result;
}
function deleteAllComments($id,$db) {
    $sql = "DELETE FROM commentaires WHERE article_id = :id";
    $req =  $db->prepare($sql);
    $result = $req->execute([
        ":id"=>$id
    ]);
    return $result;
}