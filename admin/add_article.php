<?php

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    if(isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);

        if (empty($title) or empty($content)){
            $error = 'All field required!';
        } else {

            $query = $pdo->prepare('INSERT INTO article (article_title, article_content, article_timestamp) VALUES (?, ?, ?)');

            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());

            $query->execute();

            header('Location: index.php');
        }
    }

    ?>

    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <div class="container">
                <a href="index.php" id="logo">CMS</a>

                <?php 
                    if(isset($error)) { ?>
                        <div class="error">
                            <p>
                                <?php echo $error; ?>
                            </p>
                        </div>
                <?php
                    }
                ?>

                <h4>Add Article</h4>
                
                <form action="add_article.php" method="post" autocomplete="off">
                    <input type="text" name="title" placeholder="Title" >
                    <br>
                    <textarea cols="50" rows="15" name="content" placeholder="Article Content"></textarea>
                    <br>
                    <input type="submit" value="Add Article"/>
                </form>
            </div>
        </body>
    </html>  

    <?php
} else {
    header('Location: index.php');
}

?>