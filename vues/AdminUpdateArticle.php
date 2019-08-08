<!DOCTYPE html>
<html>
  
  <head>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xlzlvu4cp48oo1z824oxwqvx5tfvshotu1qp2aqcg7a15fbg"></script> 
    <script>tinymce.init({ selector:'#articleContent' });</script>
  </head>
    
  <body>
    
    <form action=<?="index.php?page=saveArticle&id=" .$article->getId() ?> method="post">
      
      <div class="form-group">
        <label for="articleTitle">Titre :</label>
        <input type="text" id="articleTitle" name="Title" value="<?= $article->getTitle() ?>"/>
      </div>
      <div class="form-group">
        <label for="articleContent"></label>
        <input type="text" id="articleContent" name="Content" value="<?= $article->getContent() ?>" />
      </div>

      <input type="submit" value="Sauvegarder" />
    
  </body>
</html>


