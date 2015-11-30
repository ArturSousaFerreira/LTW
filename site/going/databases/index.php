<?
  include_once('database/connection.php'); 
  include_once('database/post.php');

  try {
    $posts = getAllPosts($dbh);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  include ('templates/header.php');
  include ('templates/posts.php');
  include ('templates/footer.php');
?>
