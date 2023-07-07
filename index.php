<!DOCTYPE html>

<?php include 'connect.php'; define('UPLPATH', 'img/'); ?>

<html>
    <head>
        <meta charset="utf-8">
        <title>ProjektPWA</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>


        <div class="header">
            <h1>franceinfo<span class="yellowtext">:</span></h1>
        </div>

        <hr/>

        <div class="navbar">
            <a href="index.php">home</a>
            <a href="#">elections</a>
            <a href="#">les jt</a>
            <a href="administracija.php">administracija</a>
            <a href="unos.php">unos u formu</a>   
            <hr/>
            <a href="kategorija.php?category=sport" class="navkategorija">SPORT</a>
            <a href="kategorija.php?category=kultura" class="navkategorija">KULTURA</a>
            <a href="kategorija.php?category=politika" class="navkategorija">POLITIKA</a>
            <a href="login.php">login</a>
            <a href="registracija.php">registracija</a>
        </div>

        <hr/>

        <div class="row">
            <div class="main">

                <section class="elections">
                    <h2>ELECTIONS EUROPEENNES 2019</h2>
                    <article>
                        <div class="imgdiv"><img src="images/article_1_1.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">"Je vis sur la route, mais sans concert au bout": on a passé une journée avec Francis Lalanne, tête de liste "gilets jaunes" aux européennes</div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_1_2.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv"><a href="clanakhard.php">INFO FRANCEINFO. Européennes : les Républicains et le RN n'ont pas signé le plaidoyer de Transparency International pour la lutte contre la corruption (hardkodirano)</a></div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_1_3.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">Italie: Matteo Salvini affaibli pour les européennes</div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_1_4.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">"Nous avons une capacité à nous adresser à des Français qui viennent d'horizons très différents", assure Nicolas Bay du Rassemblement national</div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_1_5.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">80 km/h, PMA, chômage, européennes... Ce qu'il faut retenir de l'interview d'Édouard Philippe sur franceinfo</div>
                    </article>
                </section>

                <br/><hr/>

                <section class="lesjt">
                    <h2>LES JT</h2>
                    <article>
                        <div class="imgdiv"><img src="images/article_2_1.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">JT de 8h du vendredi 17 mai 2019</div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_2_2.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">Le JT de 7h de franceinfo du vendredi 17 mai 2019</div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_2_3.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">Grand Soir 3 du jeudi 16 mai 2019</div>
                    </article>
                    <article>
                        <div class="imgdiv"><img src="images/article_2_4.png" alt="Fotografija europskih zastava"></div>
                        <div class="articletitlediv">JT de 20h du jeudi 16 mai 2019</div>
                    </article>
                </section>

                <br/><hr/>

                <section class="sport">
                    <h2>SPORT</h2>
                    <?php
                    $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='sport' LIMIT 4";
                    $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                            echo '<article>';
                            echo '<div class="imgdiv">';
                            echo '<img src="' . 'images/' . $row['slika'] . '">';
                            echo '</div>';
                            echo '<div class="articletitlediv">';
                            echo '<a href="clanaksoft.php?id='.$row['id'].'">';
                            echo $row['naslov'];
                            echo '</a>';
                            echo '</div>';
                            echo '</article>';
                        }?>
                </section>

                <br/><hr/>

                <section class="kultura">
                    <h2>KULTURA</h2>
                    <?php
                    $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='kultura' LIMIT 4";
                    $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                            echo '<article>';
                            echo '<div class="imgdiv">';
                            echo '<img src="' . 'images/' . $row['slika'] . '">';
                            echo '</div>';
                            echo '<div class="articletitlediv">';
                            echo '<a href="clanaksoft.php?id='.$row['id'].'">';
                            echo $row['naslov'];
                            echo '</a>';
                            echo '</div>';
                            echo '</article>';
                        }?>
                </section>

                <br/><hr/>

                <section class="politika">
                    <h2>POLITIKA</h2>
                    <?php
                    $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='politika' LIMIT 4";
                    $result = mysqli_query($dbc, $query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                            echo '<article>';
                            echo '<div class="imgdiv">';
                            echo '<img src="' . 'images/' . $row['slika'] . '">';
                            echo '</div>';
                            echo '<div class="articletitlediv">';
                            echo '<a href="clanaksoft.php?id='.$row['id'].'">';
                            echo $row['naslov'];
                            echo '</a>';
                            echo '</div>';
                            echo '</article>';
                        }?>
                </section>

            </div>
        </div>

        <div class="footer">
            <p class="franceinfo">franceinfo<span class="yellowtext">:</span></p>
            <p>Bjanka Stojanova, bstojanov@tvz.hr, 2023.</p>
        </div>

    </body>
</html>