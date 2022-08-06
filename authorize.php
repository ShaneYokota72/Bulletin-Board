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
    
    <?php
        $UN = $_POST['username'];
        $PW = $_POST['password'];

        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "boardinfo";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $query = "SELECT * FROM login_signup WHERE username = '{$UN}' and password = '{$PW}'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0){
            $row = mysqli_fetch_array($result);
            echo "<form name=\"myForm\" action=\"index.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$row['user_id']}\">
                </form>";
            echo "
            <script>
                window.onload=function(){
                    var auto = setTimeout(function(){ autoRefresh(); }, 100);
        
                    function submitform(){
                    document.forms[\"myForm\"].submit();
                    }
        
                    function autoRefresh(){
                    clearTimeout(auto);
                    auto = setTimeout(function(){ submitform(); autoRefresh(); }, 100);
                    }
                }
            </script>";
            /* echo "<script>
                const userID = document.getElementById('userID')
                const form = document.querySelector('form')
                
                fileInput.addEventListener('change', () => {
                form.submit();
                });
            </script>"; */
            /* header("Location:/Bulletin%20Board/index.php"); */
        } else {
            die("
            <div class=\"login\">
                <h3>LOGIN</h3>
                <form action=\"authorize.php\" method=\"POST\">
                    USERNAME: <input type=\"text\" name=\"username\"><br>
                    PASSWORD: <input type=\"password\" name=\"password\"><br>
                    <button type=submit>LOGIN</button>
                </form>
                <h5>Login failed. <a href=\"login.html\">Try Aging</a> or <a href=\"signup.html\">Make an account</a></h5>
            </div>");
            
        }

        mysqli_close($conn);
    ?>
</body>
</html>