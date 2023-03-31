<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/weather-icons.min.css" rel="stylesheet">
    <script src="js/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".preloader").fadeOut();
        })
    </script>
    <script src="js/plants.js"></script>
    <script src="js/weatherDate.js"></script>
    <script src="js/news.js"></script>
</head>
<body>
<?php
    if (!isset($_COOKIE["name"]))
        exit("<div class='message'>"
            ."<p>du bist nicht angemeldet</p>"
            ."<a href='index.php'>zur Anmeldung</a></div>");

    include "classes.php";
?>
    <header>
        <nav>
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                <span></span>
                </label>

                <ul class="menu__box">
                    <li><a class="menu__item" href="profile.php">Profil bearbeiten</a></li>
                    <li><a class="menu__item" href="#">Dashboard bearbeiten</a></li>
                    <?php
                        if ($_COOKIE['permission'] === "1"){
                        echo '<li><a class="menu__item" href="admin.php">Admin</a></li>';
                        }
                    ?>
                    <li><a class="menu__item" href="index.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    <div class="wrapperanimate">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <span>Loading</span>
    </div>
        <section class="weatherDate">
            <article class="weather">
                <div class="weatherSymbol"></div>
                <div class="weatherData">
                    <div class="temperature"></div>
                    <div class="weatherRest">
                        <div class="description"></div>
                        <div class="highLow"></div>
                        <div class="sunrise">
                            <i class="wi wi-sunrise"></i>
                        </div>
                        <div class="sunset">
                            <i class="wi wi-sunset"></i>
                        </div>
                    </div>
                </div>   
            </article>
            <article class="dateTime">
                <div class="time"></div>
                <div class="date"></div>
            </article>
        </section>

        <section class="plantSearch">
            <article class="plant"> 
                        <h2>Aloe Vera</h2>
                        <p id="mood"></p>
                        <p id="lastWater">zuletzt gegossen am: </p>
                        <p id="nextWater">das nächste mal gießen am: </p>
                        <button id="waterCan" value="gießen">gießen&#128166</button>
            </article>
            <article class='greeting'><?php echo $_COOKIE['name'] . "!" ?></article>
            <article class="search">
                <form method="get" action="https://www.startpage.com/sp/search" name="search">
                    <input type="search" name="query" id="query" placeholder="Suche nach...">
                </form>
            </article>
        </section>

        <section class="news">
            <article class="tagesschauN"><?php $tagesschau = new News("https://www.tagesschau.de/xml/rss2/", "tagesschau"); ?> </article>
            <article class="heiseN"><?php $heise = new News("https://www.heise.de/rss/heise.rdf", "heise"); ?> </article>
            <article class="zeitN"> <?php $zeit = new News("https://newsfeed.zeit.de/all", "zeit"); ?></article>
            <article class="spektrumN"><?php $spektrum = new News("https://www.spektrum.de/alias/rss/spektrum-de-rss-feed/996406/", "spektrum"); ?> </article>
        </section>     
        
        <section class="links">
            <article class="social">
                <img src="image/social-media-campaign-svgrepo-com.svg">
                <a href="https://www.facebook.com//">Facebook</a>
                <a href="https://www.instagram.com/">Instagram</a>
                <a href="https://twitter.com">Twitter</a>
                <a href="https://www.flickr.com/">Flickr</a>
                <a href="https://www.linkedin.com/">Linkedin</a>
            </article>
            <article class="network">
                <img src="image/network-svgrepo-com.svg">
                <a href="example.com">Nextcloud</a>
                <a href="example.com">Pi-hole</a>
                <a href="example.com">Router</a>
                <a href="example.com">Octopi</a>
                <a href="example.com">Drucker</a>
            </article>
            <article class="entertainment">
                <img src="image/video-camera-entertainment-svgrepo-com.svg">
                <a href="https://www.youtube.com/">Youtube</a>
                <a href="https://www.netflix.com">Netflix</a>
                <a href="https://open.spotify.com/">Spotify</a>
                <a href="https://artists.spotify.com/de">Spotify for Artists</a>
                <a href="https://bandcamp.com/">Bandcamp</a>
            </article>
            <article class="shopping">
                <img src="image/shopping-svgrepo-com.svg">
                <a href="https://www.amazon.de/">Amazon</a>
                <a href="https://www.ebay-kleinanzeigen.de">Kleinanzeigen</a>
                <a href="https://www.fotoimpex.de/">Fotoimpex</a>
            </article>
            <article class="recipes">
                <img src="image/food-svgrepo-com.svg">
                <a href="https://www.zuckerjagdwurst.com/de">Zucker & Jagdwurst</a>
                <a href="https://www.toastenstein.com/">Toastenstein</a>
                <a href="https://www.dailyvegan.de/">Daily Vegan</a>
                <a href="https://wallflowerkitchen.com/">Wallflower Kitchen</a>
            </article>
        </section>

    </main>    
</body>
</html>
