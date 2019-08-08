<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./vues/styles/css/clean-blog.css">
        <title>Document</title>
    </head>
    <body>
    <!-- TABLEAU-->
        <div class="tg-wrap">
            <table class="tg">
                <thead>
                    <tr>
                        <th class="tg-kv4n">Nom<br></th>
                        <th class="tg-qkji">Contenu<br></th>
                        <th class="tg-qkji">Date</th>
                        <th class="tg-pb6s">Modifications</th>
                    </tr>
                <thead>
                <tbody>
                    <?php foreach($Comments as $Comment) { ?> 
                        <tr>
                            <td class="tg-0lax"><?= htmlspecialchars($Comment->getName()); ?></td>
                            <td class="tg-0lax"><?= nl2br(htmlspecialchars(substr($Comment->getContent(), 0, 50))); ?></td>
                            <td class="tg-0lax"><?= $Comment->getdate(); ?></td>
                            <td class="tg-0lax">
                                <a href=<?='index.php?page=editComment&id=' .$Comment->getId() ?>>
                                    <img src="./img/pencilmono_105944.png" class="modifier" alt="modifier"/>
                                </a>
                                &nbsp;
                                <a href=<?='index.php?page=deleteComment&id=' .$Comment->getId() ?>>
                                    <img src="./img/3844425-can-trash_110314.png" class="effacer "alt="effacer"/>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>