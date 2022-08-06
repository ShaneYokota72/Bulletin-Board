<?php
    $userID = $_POST['userID'];
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
                    <?php echo "<form name=\"myForm\" action=\"post1.php\" method=\"POST\" class=\"navform\">
                        <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$userID}\">
                        <button type=\"submit\" class=\"navbutton\">POST</button>
                        </form>";
                    ?>
                </li>
                <li>
                    <?php echo "<form name=\"myForm\" action=\"viewprofile.php\" method=\"POST\" class=\"navform\">
                        <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$userID}\">
                        <button type=\"submit\" class=\"navbutton\">My Profile</button>
                        </form>";
                    ?>
                </li>
                <li>
                    <?php echo "<form name=\"myForm\" action=\"index.php\" method=\"POST\" class=\"navform\">
                        <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$userID}\">
                        <button type=\"submit\" class=\"navbutton\">Home</button>
                        </form>";
                    ?>
                </li>
            </ul>
        </div>
    </header>
    
    <div>
        <form action="post.php" method="POST">
            <input type="hidden" name="userID" value=<?php echo "{$userID}"; ?>>
            Title: <input type="text" id="title" name="title" placeholder="title"><br>
            Content: <textarea name="content" id="content" cols="30" rows="10" maxlength =500 placeholder="Write your content"></textarea><br>
            <button type="submit" name="click">Post</button>
        </form>
    </div>
</body>
</html>