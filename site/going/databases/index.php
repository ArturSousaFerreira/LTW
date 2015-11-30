<?
  include_once('connection.php'); 
  include_once('post.php');

  try {
    $posts = getAllPosts($dbh);
  } catch (PDOException $e) {
    die($e->getMessage());
  }

  include ('header.php');
  include ('posts.php');
  include ('footer.php');
?>
