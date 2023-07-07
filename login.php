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

            <form method="POST">
                <label for="korisnicko_ime">Korisničko ime</label>
                <br />
                <input name="korisnicko_ime" type="text" required />
                <br />
                <label for="lozinka">Lozinka</label>
                <br />
                <input name="lozinka" type="password" required />
                <br />
                <input name="submit" type="submit" value="Pošalji" />
            </form>

            <?php
                if ($dbc) {
                    if (isset($_POST["submit"])) {

                        $korisnicko_ime = $_POST["korisnicko_ime"];
                        $lozinka = $_POST["lozinka"];
                        $userSelect = "SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime';";
                        $result = mysqli_query($dbc, $userSelect) or die("Error");           
                        $row = mysqli_fetch_array($result);
                                    
                        if (password_verify($lozinka, $row["lozinka"])) {
                            if (strtolower($korisnicko_ime) == "administrator")
                                echo "Dobro došli. Vaša razina je administrator.<br>";
                            else
                                echo "Dobro došli.<br>";

                            echo "<a href='druga.php'>NEXT</a>";
                            $_SESSION["korisnicko_ime"] = $korisnicko_ime;
                            $_SESSION["lozinka"] = $lozinka;
                        } else {
                            echo "Kriva lozinka.";
                        }
                    }
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