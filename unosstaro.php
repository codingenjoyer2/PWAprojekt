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
                <h2>Unos u formu</h2>
                <form enctype="multipart/form-data" name="my_form" action="skripta.php" method="POST">

                    <div class="form-item">
                        <label for="title">Naslov vijesti:</label>
                        <div class="form-field">
                            <input type="text" name="title" class="form-field-textual">
                        </div>
                    </div>

                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                        <div class="form-field">
                            <textarea name="about" id="" cols="50" rows="3" class="form-field-textual" maxlength="50"></textarea>
                        </div>
                    </div>

                    <div class="form-item">
                        <label for="content">Sadržaj vijesti</label>
                        <div class="form-field">
                            <textarea name="content" id="" cols="50" rows="10" class="form-field-textual"></textarea>
                        </div>
                    </div>

                    <div class="form-item">
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="category" id="" class="form-field-textual">
                                <option value="sport">Sport</option>
                                <option value="kultura">Kultura</option>
                                <option value="politika">Politika</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-item">
                        <label for="pphoto">Slika: </label>
                        <div class="form-field">
                            <input type="file" accept="image/jpg,image/gif,image/png" class="input-text" name="pphoto"/>
                        </div>
                    </div>

                    <div class="form-item">
                        <label for="archive">Arhivirati
                        <div class="form-field">
                            <input type="checkbox" name="archive">
                        </div>
                        </label>
                    </div>

                    <div class="form-item">
                        <button type="reset" value="ponisti">Poništi</button>
                        <button type="submit" name="submit" value="prihvati">Prihvati</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="footer">
            <p class="franceinfo">franceinfo<span class="yellowtext">:</span></p>
            <p>Bjanka Stojanova, bstojanov@tvz.hr, 2023.</p>
        </div>

    </body>
</html>