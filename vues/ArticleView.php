<?php require_once('./vues/partials/head.php'); ?>
<?php require_once('./vues/partials/nav.php'); ?>
<?php require_once('./vues/partials/header.php'); ?>
    <!-- Post Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="container-fluid white">
                    <div class="container article">
                        <div class="row">
                            <?php if($error == false) { ?>
                                <article class="col-md-12">
                                    <h3>
                                        <?= htmlspecialchars($article->getTitle()); ?>
                                        <em>le <?= $article->getDate_post_fr(); ?></em>
                                    </h3>
                                    <p>                        
                                        <?= nl2br(htmlspecialchars($article->getContent())); ?>
                                        <br />
                                        <h2>Commentaires</h2>

                                        <form action="index.php?page=addComment&id=<?= $article->getId() ?>" method="post">
                                            <div>
                                                <label for="Name">Auteur</label><br />
                                                <input type="text" id="name" name="name" />
                                            </div>
                                            <div>
                                                <label for="content">Commentaire</label><br />
                                                <textarea id="content" name="content"></textarea>
                                            </div>
                                            <div>
                                                <input type="submit" />
                                            </div>
                                        </form>
                                    </p>
                                </article>
                            <?php } else { ?>
                                <p>L'article avec l'id "<?= $article->getId() ?>" n'existe pas.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="container-fluid white">
                    <div class="container comment">
                        <div class="row">                            
                            <?php foreach($Comments as $Comment) { ?>
                            <article class="col-md-12">
                                <h3>
                                    <?= htmlspecialchars($Comment->getName()); ?>
                                    <em>le <?= $Comment->getdate(); ?></em>
                                </h3>
                                <p>                        
                                    <?= nl2br(htmlspecialchars($Comment->getContent())); ?>
                                    <br />
                                </p>
                                <div>
                                    <a href= "<?='index.php?page=signal&id=' .$Comment->getId() ?>"><img src="./img/signal.png" class="signaler" alt="signaler"/>Signaler</a>
                                </div>
                                <br />
                            </article>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./js/clean-blog.min.js"></script>
<?php require_once('./vues/partials/footer.php'); ?>



