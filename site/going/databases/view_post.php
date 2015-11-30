<?
  if (!isset($_GET['id'])) die('No id');

  include_once('database/connection.php');  
  include_once('database/post.php');

  try {
    $post = getPostById($dbh, $_GET['id']);
    if ($post === false) die("No such post");
    $paragraphs = explode("\n", $post['fulltext']);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  include ('templates/header.php');
  include ('templates/post.php');
  include ('templates/footer.php');
?>
