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
                    $query = "SELECT * FROM clanci;";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)){

                        echo '<form enctype="multipart/form-data" action="" method="POST">
                        <div class="form-item">
                            <label for="title">Naslov vijesti:</label>
                            <div class="form-field">
                                <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="about">Kratki sadržaj vijesti:</label>
                            <div class="form-field">
                                <textarea name="about" id="" cols="50" rows="2" class="form-field-textual">'.$row['sazetak'].'</textarea>
                            </div>
                        </div>
                        
                        <div class="form-item">
                            <label for="content">Sadržaj vijesti:</label>
                            <div class="form-field">
                                <textarea name="content" id="" cols="50" rows="8" class="form-field-textual">'.$row['sadrzaj'].'</textarea>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="pphoto">Slika:</label>
                            <div class="form-field">
                                <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto">
                                <br/>
                                <img src=" ' . UPLPATH . $row['slika'] . ' "width=100px>
                            </div>
                        </div>
                        
                        <div class="form-item">
                            <label for="category">Kategorija vijesti:</label>
                            <div class="form-field">
                                <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                    <option value="sport">Sport</option>
                                    <option value="kultura">Kultura</option>
                                    <option value="politika">Politika</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-item">
                            <label>Spremiti u arhivu:
                            <div class="form-field">';
                                if($row['arhiva'] == 0) {
                                    echo '<input type="checkbox" name="archive" id="archive"/>
                                        Arhiviraj?';
                                } else {
                                    echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
                                }
                                echo '</div>
                                </label>
                            </div>
                        
                    
                        <div class="form-item">
                            <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                                <button type="reset" value="Poništi">Poništi</button>
                                <button type="submit" name="update" value="Prihvati"> Izmjeni</button>
                                <button type="submit" name="delete" value="Izbriši"> Izbriši</button>
                        </div>
                        
                        </form>
                        <br/><br/>
                    
                        ';
                    }
                
                    if(isset($_POST['delete'])){
                        $id=$_POST['id'];
                        $query = "DELETE FROM clanci WHERE id=$id ";
                        $result = mysqli_query($dbc, $query);
                    }

                    if(isset($_POST['update'])){
                        $picture = $_FILES['pphoto']['name'];
                        $title=$_POST['title'];
                        $about=$_POST['about'];
                        $content=$_POST['content'];
                        $category=$_POST['category'];
                        if(isset($_POST['archive'])){
                            $archive=1;
                        }else{
                            $archive=0;
                        }
                        $target_dir = 'img/'.$picture;
                        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                        
                        $id=$_POST['id'];
                        $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
                        $result = mysqli_query($dbc, $query);
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