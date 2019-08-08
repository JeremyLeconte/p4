<?php require_once('./vues/partials/head.php'); ?>
<?php require_once('./vues/partials/nav.php'); ?>
<?php require_once('./vues/partials/header.php'); ?>
    <!-- Post Content -->
    <?php 
    if (count($articles) === 0) {
    ?>
        <p>Aucun article n'est disponible pour la page <?= $pageIx ?></p>
    <?php     
    } else {
        foreach($articles as $article) 
        {            
        ?>  
            <div class="container">
                <div class="row-article">
                    <div class="container article">
                        <article class="col-md-12">
                             <h3>
                                <em>publié le <?= $article->getDate_post_fr(); ?> :</em><br />
                                <br /><?= htmlspecialchars($article->getTitle()); ?><em> : </em>                                           
                            </h3>
                                <p>
                                    <?= nl2br(htmlspecialchars(substr($article->getContent(), 0, 200))); ?> <em><a href=<?='index.php?page=article&id='.$article->getID() ?>>...[lire la suite]</a></em>                       
                                    <br />
                                </p>
                        </article>
                    </div>
                </div>
            </div>
        <?php            
        }
    }
    ?>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php 
            for ($i=1; $i < $nbPages + 1; $i++)
            { 
            ?> 
                <li class="page-item"><a class="page-link" href=<?= "index.php?page=accueil&pageIx=".$i ?>><?= $i ?></a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <hr />

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./js/clean-blog.min.js"></script>
<?php require_once('./vues/partials/footer.php'); ?>

