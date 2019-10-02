<?php require_once('./vues/partials/head.php'); ?>
    <body>
        <H1>Bienvenue sur votre interface administrateur</H1>
        <div class="tg-wrap">
        <H3>Gérez ici vos articles à l'aide du tableau ci-dessous : </H3>
            <div class= "ajout-article">
                <a href="<?='index.php?page=insertArticle'?>">
                    <img src="./img/ajouter.png" class="ajouter" alt="ajouter"/>
                </a>
            </div>    
            <table class="tg">
                <thead>
                    <tr>
                        <th class="tg-kv4n">Titre<br></th>
                        <th class="tg-qkji">Contenu<br></th>
                        <th class="tg-qkji">Date</th>
                        <th class="tg-pb6s">Modifications</th>
                    </tr>
                <thead>               
                    <?php foreach($articles as $article) { ?> 
                        <tr>
                            <td class="tg-0lax"><?= htmlspecialchars($article->getTitle()); ?></td>
                            <td class="tg-0lax"><?= nl2br(htmlspecialchars(substr($article->getContent(), 0, 60))); ?></td>
                            <td class="tg-0lax"><?= $article->getDate_post_fr(); ?></td>
                            <td class="tg-0lax">
                                <a href="<?='index.php?page=editArticle&id=' .$article->getId() ?>"> 
                                    <img src="./img/pencilmono_105944.png" class="modifier" alt="modifier"/>
                                </a>
                                &nbsp;
                                <a href="<?='index.php?page=deleteArticle&id=' .$article->getId() ?>">
                                    <img src="./img/3844425-can-trash_110314.png" class="effacer "alt="effacer"/>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
        <div class="tg-wrap">
            <H3>Gérez ici les commentaires du blog à l'aide du tableau ci-dessous : </H3>
            <table class="tg">
                <thead>
                    <tr>
                        <th class="tg-kv4n">Nom<br></th>
                        <th class="tg-qkji">Contenu<br></th>
                        <th class="tg-qkji">Date</th>
                        <th class="tg-pb6s">Modifications</th>
                    </tr>
                <thead>
                    <?php foreach($Comments as $Comment) { ?> 
                        <tr class="<?= $Comment->getIsReported() == 1 ? 'comment-reported' : '' ?>">
                            <td class="tg-0lax"><?= htmlspecialchars($Comment->getName()); ?></td>
                            <td class="tg-0lax"><?= nl2br(htmlspecialchars(substr($Comment->getContent(), 0, 50))); ?></td>
                            <td class="tg-0lax"><?= $Comment->getdate(); ?></td>
                            <td class="tg-0lax">
                                <a href="<?='index.php?page=editComment&id=' .$Comment->getId() ?>">
                                    <img src="./img/pencilmono_105944.png" class="modifier" alt="modifier"/>
                                </a>
                                &nbsp;
                                <a href="<?='index.php?page=deleteComment&id=' .$Comment->getId() ?>">
                                    <img src="./img/3844425-can-trash_110314.png" class="effacer "alt="effacer"/>
                                </a>
                                &nbsp;
                                <a href="<?='index.php?page=unreport&id=' .$Comment->getId() ?>">
                                    <img src="./img/check-mark.png" class="unreport "alt="unreport"/>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
            </table>
        </div>                