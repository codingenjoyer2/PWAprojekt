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

            <?php

            if (isset($_GET['category'])){
                $category = $_GET['category'];

                $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='$category';";
                $result = mysqli_query($dbc, $query) or die ("Error querying the database");

                echo '<h2>' . $category . '</h2>';

        if(mysqli_num_rows($result) > 0) {
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
            }
                } else{
                    echo 'Nema nijedan člnak u ovoj kategoriji.';
                }
            } else{
                echo 'Nije izabrana kategorija.';
            }

            /*if (isset($_GET['id'])) {
                $articleId = $_GET['id'];

                $query = "SELECT * FROM clanci WHERE id=$articleId";
                $result = mysqli_query($dbc, $query);
                
                if($result){

                    $row = mysqli_fetch_array($result);

                    if($row){
                        echo '<h2 class="centertext">';
                        echo $row['naslov'];
                        echo '</h2>';
                        echo '<p class="aboutdescription">';
                        echo $row['sazetak'];
                        echo '</p>';
                        echo '<img src="' . 'images/' . $row['slika'] . '">';
                        echo '<p>';
                        echo $row['sadrzaj'];
                        echo '</p>';
                    }
                }      

            } else {
                echo "No article ID specified";
            }*/

            mysqli_close($dbc);
            ?>

            </div>
        </div>

        <div class="footer">
            <p class="franceinfo">franceinfo<span class="yellowtext">:</span></p>
            <p>Bjanka Stojanova, bstojanov@tvz.hr, 2023.</p>
        </div>

    </body>
</html>