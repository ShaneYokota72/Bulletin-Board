<!-- 2. gaeshinpan make DB for keijiban title, content, added date, modified date, comment, author and make it appear in table       also make a form so that list and login form -->
<!-- 8/8 monday 7-9       8/9 tuesday TBD-->
<?php
        $userID = $_POST['userID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <link rel="stylesheet" href="./main.css">
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
    <div id="discussionpage">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "boardinfo";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        //query
        $query = "SELECT * from discussion d join user_info u on d.user_id = u.user_id order by upload_date desc";

        //fetch the data
        // $result = $conn->query($query); same thing as the code one below
        $result = mysqli_query($conn, $query);

        //display the data
        while ($row = mysqli_fetch_array($result)){
            echo "<div class=\"circle\">
            
            <form action=\"userprofile.php\" method=\"POST\" style=\"margin-bottom: 0px;\">
                <input type=\"hidden\" name=\"profileID\" id=\"profileID\" value=\"{$row['user_id']}\">
                <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$userID}\">
                <button type=\"submit\" class=\"profilebutton\" ><img src=\"{$row['profileimg']}\" alt=\"profileimg\" class=\"profileimage\"></button>
            </form>

            <span class=\"username\">{$row['username']}</span></div> 
            <h3 class=\"topic\">{$row['topic']}</h3> - <span class=\"uploaddate\">{$row['upload_date']}</span>
            <p class=\"content\">{$row['content']}</p>
            <div class=\"commentsec\" id=\"comment{$row['data_id']}\" style=\"display: none;\">
                <form action=\"comment.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"data_id\" value=\"{$row['data_id']}\">
                    <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$userID}\">
                    Comment: <input type=\"text\" name=\"commentcontent\">
                    <button type=\"submit\" name=\"click\">Comment on Post</button>
                </form>
                
                <h1>yo</h1>
                <h2>comment</h2>
                <h3>section</h3>
            </div>
            <button class=\"commentbutton\" onclick=\"opencomment({$row['data_id']});\">comment</button>";
        }

        mysqli_close($conn);


        // Check connection
        /* if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully"; */

        ?>
        
        <script>
            function opencomment(comnum){
                /* console.log(k);
                console.log(document.getElementById(k));
                how does it work when there are no quotes for k on the line below this? I dont get it.
                var k ="comment"+comnum;
                var x = document.getElementById(k); */
                var x = document.getElementById("comment"+comnum);
                if (x.style.display == "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    </div>

</body>
</html>
