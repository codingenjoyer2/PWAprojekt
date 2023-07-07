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
            <a href="login.php">login</a>
            <a href="registracija.php">registracija</a>
        </div>

        <hr/>

        <div class="row">
            <div class="main">
                <h2>Unos u formu</h2>
                <form enctype="multipart/form-data" name="my_form" action="skripta.php" method="POST">

                    <div class="form-item">
                        <span id="porukaTitle" class="bojaPoruke"></span>
                        <label for="title">Naslov vijesti:</label>
                        <div class="form-field">
                            <input type="text" name="title" id="title" class="form-field-textual">
                        </div>
                    </div>

                    <div class="form-item">
                        <span id="porukaAbout" class="bojaPoruke"></span>
                        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                        <div class="form-field">
                            <textarea name="about" id="about" cols="50" rows="3" class="form-field-textual" maxlength="50"></textarea>
                        </div>
                    </div>

                    <div class="form-item">
                        <span id="porukaContent" class="bojaPoruke"></span>
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="content" id="content" cols="50" rows="10" class="form-field-textual"></textarea>
                        </div>
                    </div>

                    <div class="form-item">
                        <span id="porukaContent" class="bojaPoruke"></span>
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="category" id="category" class="form-field-textual">
                                <option value="" disabled selected>Odabir kategorije</option>
                                <option value="sport">Sport</option>
                                <option value="kultura">Kultura</option>
                                <option value="politika">Politika</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-item">
                        <span id="porukaSlika" class="bojaPoruke"></span>
                        <label for="pphoto">Slika: </label>
                        <div class="form-field">
                            <input type="file" accept="image/jpg,image/gif,image/png" class="input-text" name="pphoto" id="pphoto"/>
                        </div>
                    </div>

                    <div class="form-item">
                        <label for="archive">Arhivirati
                        <div class="form-field">
                            <input type="checkbox" name="archive" id="archive"/>
                        </div>
                        </label>
                    </div>

                    <div class="form-item">
                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" name="submit" value="Prihvati" id="slanje">Prihvati</button>
                    </div>

                </form>




                <script type="text/javascript">

                    // Provjera forme prije slanja
                    document.getElementById("slanje").onclick = function(event) {
                        var slanjeForme = true;
                        
                        // Naslov vjesti (5-30 znakova)
                        var poljeTitle = document.getElementById("title");
                        var title = document.getElementById("title").value;
                        if (title.length < 5 || title.length > 30) {
                            slanjeForme = false;
                            poljeTitle.style.border="1px dashed red";
                            document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
                        } else {
                            poljeTitle.style.border="1px solid green";
                            document.getElementById("porukaTitle").innerHTML="";
                        }

                        //Kratki sadržaj (10-50 znakova)
                        var poljeAbout = document.getElementById("about");
                        var about = document.getElementById("about").value;
                        if (about.length < 10 || about.length > 100) {
                            slanjeForme = false;
                            poljeAbout.style.border="1px dashed red";
                            document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
                        } else {
                            poljeAbout.style.border="1px solid green";
                            document.getElementById("porukaAbout").innerHTML="";
                        }

                        //Sadržaj mora biti unesen
                        var poljeContent = document.getElementById("content");
                        var content = document.getElementById("content").value;
                        if (content.length == 0) {
                            slanjeForme = false;
                            poljeContent.style.border="1px dashed red";
                            document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
                        } else {
                            poljeContent.style.border="1px solid green";
                            document.getElementById("porukaContent").innerHTML="";
                        }

                        // Slika mora biti unesena
                        var poljeSlika = document.getElementById("pphoto");
                        var pphoto = document.getElementById("pphoto").value;
                        if (pphoto.length == 0) {
                            slanjeForme = false;
                            poljeSlika.style.border="1px dashed red";
                            document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
                        } else {
                            poljeSlika.style.border="1px solid green";
                            document.getElementById("porukaSlika").innerHTML="";
                        }

                        //Kategorija mora biti odabrana
                        var poljeCategory = document.getElementById("category");
                        if(document.getElementById("category").selectedIndex == 0) {
                            slanjeForme = false;
                            poljeCategory.style.border="1px dashed red";
                            document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
                        } else {
                            poljeCategory.style.border="1px solid green";
                            document.getElementById("porukaKategorija").innerHTML="";
                        }

                        if (slanjeForme != true) {
                            event.preventDefault();
                        }

                    };
                </script>
                
            </div>
        </div>

        <div class="footer">
            <p class="franceinfo">franceinfo<span class="yellowtext">:</span></p>
            <p>Bjanka Stojanova, bstojanov@tvz.hr, 2023.</p>
        </div>

    </body>
</html>