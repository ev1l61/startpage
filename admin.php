<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.6.1.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                <span></span>
                </label>

                <ul class="menu__box">
                    <li><a class="menu__item" href="start.php">Zurück</a></li>
                    <li><a class="menu__item" href="#">Dashboard bearbeiten</a></li>
                    <li><a class="menu__item" href="index.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    <?php
        if (!isset($_COOKIE["name"]))
            exit("<div class='message'>"
                ."<p>du bist nicht angemeldet</p>"
                ."<a href='index.php'>zur Anmeldung</a></div>");

        include "config.php";
        include "classes.php";
    ?>
        <section class="adminPage">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Admin</th>
                        <th>Adminrechte</th>
                        <th>User löschen</th>
                    </tr>
    <?php         
        $pdo = new PDO($dsn, $DBusername, $password);
 
        $sql = "SELECT * FROM startpage_user";
        if ($res = $pdo->query($sql)) {
            if ($res->rowCount() == 0) {
                echo "<div class='message'>"
                    . "<h1>Name unbekannt</h1>"
                    . "<a href='index.php'>zurück zur Anmeldung</a></div>";
                }

            foreach ($pdo->query($sql) as $row) {
                if ($row['name'] == $_COOKIE['name']) {
                    echo '<tr>'
                    . '<td>' . $row['name'] . '(you)</td>'
                    . '<td>&#10004;</td>'
                    . '<td></td>'
                    . '</tr>'; 
                }
                if($row['permission']==1 && $row['name'] !== $_COOKIE['name']){
                    echo '<tr>'
                        . '<td>' . $row['name'] . '</td>'
                        . '<td>&#10004;</td>'
                        . '<td><a href="adminCall.php?permission='. $row['permission'] . '&name='. $row['name'] .'"><button>entziehen</button></a></td>'
                        .  '<td><a href="delete.php?name='. $row['name'] . '"><img src="image/trash-svgrepo-com.svg" alt=""></a></td>'
                        . '</tr>'; 
                }
                if($row['permission']==0){
                    echo '<tr>'
                        . '<td>' . $row['name'] . '</td>'
                        . '<td>&#10008;</td>'
                        . '<td><a href="adminCall.php?permission='. $row['permission'] . '&name='. $row['name'] .'"><button>vergeben</button></a></td>'
                        .  '<td><a href="delete.php?name='. $row['name'] . '"><img src="image/trash-svgrepo-com.svg" alt=""></a></td>'
                        . '</tr>'; 
                    }
            }
        }
        else 
            exit("Fehler bei Abfrage");

        $pdo = null;
    ?>
                </table>
        </section>
    </main>
</body>
</html>
