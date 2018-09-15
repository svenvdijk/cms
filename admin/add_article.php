<?php

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])) {
    //display add page
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

                <h4>Add Article</h4>
                
                <form action="add_article.php" method="post" autocomplete="off">

                    <input type="text" name="title" placeholder="Tile" >
                    <br>
                    <textarea cols="50" rows="15" name="Content" placeholder="Article paragraph"></textarea>

                </form>
            </div>
        </body>
    </html>  

    <?php
} else {
    header('Location: index.php');
}

?>