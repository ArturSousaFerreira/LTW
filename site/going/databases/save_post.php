<?
  if (!isset($_POST['id'])) die('No id');
  if (!isset($_POST['title']) || trim($_POST['title']) == '') die('Title is mandatory');

  include_once('database/connection.php'); 
  include_once('database/post.php');

  try {
    updatePost($dbh, $_POST['id'], $_POST['title'], $_POST['introduction'], $_POST['fulltext']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  header('Location: view_post.php?id=' . $_POST['id']);
?>
