<form action="save_post.php" method="post">
  <input type="hidden" name="id" value="<?=$post['id']?>">
  
  <label>Title:
    <input type="text" name="title" value="<?=$post['title']?>">
  </label>
  
  <label>Introduction:
    <textarea name="introduction"><?=$post['introduction']?></textarea>
  </label><br>
  
  <label>Full Text:
    <textarea name="fulltext"><?=$post['fulltext']?></textarea>
  </label>
  
  <input type="submit" value="Save">
</form>
