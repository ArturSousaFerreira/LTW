<?php

  function getAllPosts($dbh) {
    $stmt = $dbh->prepare('SELECT * FROM post');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getPostById($dbh, $id) {
    $stmt = $dbh->prepare('SELECT * FROM post WHERE id = ?');
    $stmt->execute(array($_GET['id']));
    return $stmt->fetch();
  }
  
  function updatePost($dbh, $id, $title, $introduction, $fulltext) {
    $stmt = $dbh->prepare('UPDATE post SET title = ?, introduction = ?,  fulltext = ? WHERE id = ?');
    $stmt->execute(array($title, $introduction, $fulltext, $id));
  }

?>
