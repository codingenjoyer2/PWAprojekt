<!DOCTYPE html>



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
        </div>

        <hr/>

        <div class="row">
            <div class="main">
            
<?php include 'connect.php'; define('UPLPATH', 'img/');

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
    if(isset($_FILES['pphoto']['name'])){
        $pphoto = $_FILES['pphoto']['name'];
    }
    $archive = 0;
    if(isset($_POST['archive'])){
        $archive = $_POST['archive'];
    }

    if ($dbc) {
        if (isset($_POST["submit"])) {
            $title = mysqli_real_escape_string($dbc, $title);
            $about = mysqli_real_escape_string($dbc, $about);
            $content = mysqli_real_escape_string($dbc, $content);
            $category = mysqli_real_escape_string($dbc, $category);
            $pphoto = mysqli_real_escape_string($dbc, $pphoto);
            $archive = mysqli_real_escape_string($dbc, $archive);

            if ($_FILES['pphoto']['error'] !== UPLOAD_ERR_OK) {
                // Handle the file upload error
                die('File upload failed with error code: ' . $_FILES['pphoto']['error']);
            }

            $target = 'images/' . $pphoto;
            move_uploaded_file($_FILES['pphoto']['tmp_name'], $target);

            $query = "INSERT INTO clanci (naslov,sazetak,sadrzaj,kategorija,slika,arhiva) VALUES ('$title','$about','$content','$category','$pphoto','$archive');";
            $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
            if ($result === true) echo "Uspješno poslano";
        }
    }

?>


    <?php
    $query = "SELECT * FROM clanci";
    $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<article>';
        echo '<h2>' . $row['naslov'] . '</h2>';
        echo '<p>' . $row['sazetak'] . '</p>';
        echo '<img src="' . UPLPATH . $row['slika'] . '" alt="Article Image">';
        echo '<p>' . $row['sadrzaj'] . '</p>';
        echo '</article>';
    }
    ?>
</div>



        </div>

        <div class="footer">
            <p class="franceinfo">franceinfo<span class="yellowtext">:</span></p>
            <p>Bjanka Stojanova, bstojanov@tvz.hr, 2023.</p>
        </div>

    </body>
</html>