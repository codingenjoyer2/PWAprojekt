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
                <label for="korisnicko_ime">Korisničko ime</label><br />
                <input name="korisnicko_ime" type="text" required /><br />

                <label for="ime">Ime: </label><br />
                <input name="ime" type="text" required /><br />

                <label for="prezime">Prezime: </label><br />
                <input name="prezime" type="text" required /><br />

                <label for="lozinka">Lozinka</label><br />
                <input name="lozinka" type="password" required /><br />

                <input name="submit" type="submit" value="Pošalji" />
            </form>

    <?php
    if ($dbc) {
        if (isset($_POST["submit"])) {

            $korisnicko_ime = $_POST["korisnicko_ime"];
            $ime = $_POST["ime"];
            $prezime = $_POST["prezime"];
            $lozinka = $_POST["lozinka"];
            $hashLozinka = password_hash($lozinka, CRYPT_BLOWFISH);
            $query = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime';";
            $result = mysqli_query($dbc, $query) or die("Error");

            if (mysqli_num_rows($result) >= 1)
                echo "Korisničko ime se već koristi";
            else {
                $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka) values (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($dbc);

                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 'ssss', $ime, $prezime, $korisnicko_ime, $lozinka);
                    mysqli_stmt_execute($stmt);
                    echo "Unos je uspješan";
                }
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