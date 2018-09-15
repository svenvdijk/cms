<?php 

include_once('./includes/connection.php');
include_once('./includes/article.php');

$article = new Article;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);


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
            <h4>
                <?php echo $data['article_title']; ?>
            </h4>
            <div class="date">
                Posted on <?php echo date('l jS', $data['article_timestamp']); ?>
            </div>
            <div class="article_content article_content--big">
                <p>
                    <?php echo $data['article_content']; ?>
                </p>

                <a href="index.php">&larr; Back</a>

            </div>
        </div>
    </body>
    </html>

    <?php

} else {
    header('Location: index.php');
    exit();
}

?>