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

            $username=  "'" . $_GET['name'] . "'";
            
            $pdo = new PDO($dsn, $DBusername, $password);
 
            $sql = "DELETE FROM startpage_user  WHERE name=$username";

            if ($pdo->exec($sql)) {
                header('Location: admin.php');
            }
            else 
                exit("<div class='message'>"
                . "<p>Fehler bei der Abfrage</p>"
                . "<a href='start.php'>zurück zum Dashboard</a></div>"
                );

            $pdo = null;
        ?>
    </main>    
</body>
</html>
