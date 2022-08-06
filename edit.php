<?php
    $userID = $_POST["userID"];
    $dataID = $_POST["dataID"];
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
    <?php
        
        /* echo "{$userID}<br>";
        echo "{$dataID}"; */

        $conn = mysqli_connect("localhost", "root", "Shane4546?");
        $query = "SELECT * from boardinfo.discussion where data_id = {$dataID}";

        $result = mysqli_query($conn, $query);
            
        $postinfo = mysqli_fetch_array($result);
        mysqli_close($conn);

    ?>
    <h3>Edit Your Post</h3>
    <form action="mod.php" method="POST">
        <input type="hidden" name="dataID" value="<?php echo $dataID;?>">
        <input type="hidden" name="userID" value="<?php echo $userID;?>">
        Title: <input type="text" id="title" name="title" value="<?php echo $postinfo['topic']; ?>"><br>
        Content: <input type="text" name="content" id="content" value="<?php echo $postinfo['content'];?>"><br>
        <button type="submit" name="modify">Edit</button>
    </form>
</body>
</html>