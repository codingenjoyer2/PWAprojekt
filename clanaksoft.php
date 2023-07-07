<!DOCTYPE html>

<?php
    $servername = "localhost:3307";
    $user = "root";
    $pass = "";
    $db = "pwaprojekt";

    $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());

    if ($dbc) {
        $query = "SELECT naslov,sazetak,sadrzaj,kategorija,slika,arhiva FROM clanci;";
        $result = mysqli_query($dbc, $query) or die("Error");

        if ($result) 
        {            
            while ($row = mysqli_fetch_array($result)) 
            {
                $title = $row["naslov"];
                $about = $row["sazetak"];
                $content = $row["sadrzaj"];
                $category = $row["kategorija"];
                $pphoto = $row["slika"];
                $archive = $row["arhiva"];
            }

        }
    }

?>

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

            if (isset($_GET['id'])) {
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
            }

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