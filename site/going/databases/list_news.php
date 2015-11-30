<?php
  $db = new PDO('sqlite:blog.db');
 
  $stmt = $db->prepare('SELECT * FROM blog');
  $stmt->execute();  
  $result = $stmt->fetchAll();
 
  foreach( $result as $row) {
    echo '<h1>' . $row['title'] . '</h1>';
    echo '<p>' . $row['introduction'] . '</p>';
  }
?>