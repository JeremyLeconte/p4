<!DOCTYPE html>
<html>
  
  <head>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xlzlvu4cp48oo1z824oxwqvx5tfvshotu1qp2aqcg7a15fbg"></script> 
    <script>tinymce.init({ selector:'#CommentContent' });</script>
  </head>
    
  <body>
    
    
    <form action=<?="index.php?page=saveComment&id=" . $Comment->getId() ?> method="post"> 
      <div class="form-group">
        <label for="CommentName">Name :</label>
        <input type="text" id="CommentName" name="name" value="<?= $Comment->getName() ?>" />
      </div>
      <div class="form-group">
        <label for="CommentContent"></label>
        <input type="text" id="CommentContent" name="content" value="<?= $Comment->getContent() ?>" />
      </div>

      <input type="submit" value="Sauvegarder" />
    
  </body>
</html>
