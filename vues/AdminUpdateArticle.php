<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Blog de Jean Forteroche, Billet simple pour l'Alaska">
  <meta name="author" content="Jérémy Leconte">

  <title>Jean Forteroche - Billet Simple pour l'Alaska</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="./vues/styles/css/clean-blog.css" rel="stylesheet">
  
  <!-- TinyMCE Scripts -->
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


