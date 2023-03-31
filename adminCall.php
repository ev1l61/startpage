<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Anmeldung</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <main>
        <?php
            include "config.php";
            include "classes.php";

            if ($_COOKIE['permission'] !== "1"){
                echo "<div class='message'>"
                    . "<p>du benötigst Adminrechte für diese Aktion</p>"
                    . "<a href='start.php'>zurück zum Dashboard</a></div>";
                    };

            try{
                $pdo = new PDO($dsn, $DBusername, $password);
            }
            catch(Exception $fehler){
                print $fehler->getMessage();
            }
            
            new adminChange($pdo);
            
            $pdo = null;
        ?>
    </main>    
</body>
</html>
