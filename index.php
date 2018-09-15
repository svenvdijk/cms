<?php


include_once('./includes/connection.php');
include_once('./includes/article.php');

$article = new Article;
$articles = $article->fetch_all();


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <a href="index.php" id="logo">CMS</a>

        <ol>
            <?php foreach ($articles as $article){ ?>
            <li>
                <a href="article.php?id=<?php echo $article['article_id']; ?>">
                    <h3>
                        <?php echo $article['article_title']; ?>
                    </h3>
                    <div class="article_content article_content--small">
                        <p>
                            <?php echo $article['article_content']; ?>
                        </p>
                    </div>
                </a>
                <div class="date">
                    Posted on
                    <?php echo date('l jS', $article['article_timestamp']); ?>
                </div>
            </li>
            <?php } ?>
        </ol>
    </div>
</body>
</html>