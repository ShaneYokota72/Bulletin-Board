<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<header>
        <img src="reddit-logo.png" alt="Reddit-logo" style="max-height: 70px;margin-left: 5px; border-radius: 10px;">
        <div class="divnavbar">
            <ul class="navbar" style="align-item: center;">
                <li>
                    <button><a href="post1.php">Post</a></button>
                </li>
                <li>
                    <button><a href="myprof.php">My Profile</a></button>
                </li>
                <li>
                    <button><a href="index.php">Home</a></button>
                </li>
            </ul>
        </div>
    </header>
    
    <div>
        <form action="post.php" method="POST">
            Title: <input type="text" id="title" name="title" placeholder="title"><br>
            Content: <textarea name="content" id="content" cols="30" rows="10" maxlength =500 placeholder="Write your content"></textarea><br>
            <button type="submit" name="click">Post</button>
        </form>
    </div>
</body>
</html>