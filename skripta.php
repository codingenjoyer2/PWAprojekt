<!DOCTYPE html>

<?php
    if(isset($_POST['title'])){
        $title = $_POST['title'];
    }
    if(isset($_POST['about'])){
        $about = $_POST['about'];
    }
    if(isset($_POST['content'])){
        $content = $_POST['content'];
    }
    if(isset($_POST['category'])){
        $category = $_POST['category'];
    }
    if(isset($_POST['pphoto'])){
        $pphoto = $_POST['pphoto'];
    }
    $archive = 0;
    if(isset($_POST['archive'])){
        $archive = $_POST['archive'];
    }

    $servername = "localhost:3307";
    $user = "root";
    $pass = "";
    $db = "pwaprojekt";

    $dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());

    if ($dbc) {
        if (isset($_POST["submit"])) {
            $title = $title;
            $about = $about;
            $content = $content;
            $category = $category;
            $picturename = $_FILES['pphoto']['name'];
            $archive = $archive;

            if ($_FILES['pphoto']['error'] !== UPLOAD_ERR_OK) {
                // Handle the file upload error
                die('File upload failed with error code: ' . $_FILES['pphoto']['error']);
            }

            $target = 'images/' . $picturename;
            move_uploaded_file($_FILES['pphoto']['tmp_name'], '$target');

            $query = "INSERT INTO clanci (naslov,sazetak,sadrzaj,kategorija,slika,arhiva) VALUES ('$title','$about','$content','$category','$picturename','$archive');";
            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            if ($result === true) echo "Uspješno poslano";
        }
    }

    mysqli_close($dbc);
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
                <h2 class="centertext"><?php echo $title; ?></h2>
                <p class="aboutdescription"><?php echo $about; ?></p>
                <div class="imgdiv"><?php echo $picturename; ?></div>
                <p><?php echo $content; ?></p>

            </div>
        </div>

        <div class="footer">
            <p class="franceinfo">franceinfo<span class="yellowtext">:</span></p>
            <p>Bjanka Stojanova, bstojanov@tvz.hr, 2023.</p>
        </div>

    </body>
</html>