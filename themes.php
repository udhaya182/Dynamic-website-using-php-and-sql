<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Art by You</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column bg-light">
        <main class="flex-shrink-0">
            <!-- Navigation updated to match the other webpages-->
            <!--Updated the navigation bar with post webpage and updated the name of collections.php to collections_T.php-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php">Art by You</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                            <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                            <li class="nav-item"><a class="nav-link" href="collections_T.php">Collections</a></li>
                            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Theme section adapted from index page from the bootstrap tempelate-->
            <section class="py-5">
                <div class="container px-5 mt-5">
                    <div class="text-center">
            <!-- Dynamically reads data from Themes table depending on the theme selected from collections_T.php by the user and displays related artworks-->
                    <?php
                    require_once 'serverlogin.php';
                    //uses credentials from serverlogin.php to establish connection with the database
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) {
                        die("Connection failed" . mysqli_connect_error());
                    }
                    //selects all rows fromt the table
                    $myqueryTheme = "SELECT * FROM Themes";
                    $themeResult = mysqli_query($conn, $myqueryTheme);
                    $title = urldecode($_GET['title']);
                    //according to the theme selected by the user, displays the theme name
                    if ($themeResult = $conn->query($myqueryTheme)) {
                        while ($rowt = $themeResult->fetch_assoc()) {
                                $themeID = $rowt["ThemeID"];
                                $theme = $rowt["Theme"];
                                $themeImage = $rowt["ThemeImage"];
                                if($title == $theme){
                                    $themeIDtitle = $themeID;
                                }
                            }
                        }
                    $output = <<<HTML
                    <h1 class="fw-bolder">$title</h1>
                    HTML;
                    echo $output;
            
                    ?>
                    </div>
                    <div class="row gx-5">
                    <?php
                            require_once 'serverlogin.php';
                            // connection established using the credentials in serverlogin.php
                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                            if ($conn->connect_error) {
                                die("Connection failed" . mysqli_connect_error());
                            }
                            // uses Artwork and Artists tables to display relevant artworks according to the theme selected 
                            $myqueryArt = "SELECT * FROM Artwork";
                            $myqueryArtist = "SELECT * FROM Artists";
                            $artWorkResult = mysqli_query($conn, $myqueryArt);
                            $artistResult  = mysqli_query($conn, $myqueryArtist);

                            if ($artWorkResult = $conn->query($myqueryArt)) {
                                //stores Artwork table's entries as an associative array
                                while ($row = $artWorkResult->fetch_assoc()){
                                    $artID = $row["ArtID"];
                                    $artTitle = $row["Title"];
                                    $artImage = $row["ArtImage"];
                                    $themeIDfk = $row["ThemeID"];
                                    $artistIDfk = $row["ArtistID"];
                                    //stores Artist table's entries as an associative array
                                    if($artistResult = $conn->query($myqueryArtist)) {
                                        while ($row2 = $artistResult->fetch_assoc()) {
                                            $artistID = $row2["ArtistID"];
                                            $name = $row2["Name"];
                                            $artistImage = $row2["ArtistImage"];
                                            $type = $row2["Type"];
                                            $description = $row2["Description"];
                                            //this part of the HTML part is updated 
                                            $output = <<<HTML
                                                <div class="col-lg-4 mb-5">
                                                <div class="card h-100 shadow border-0">
                                                <img class="card-img-top" src="$artImage" width="100" height="200" alt="$artTitle" />
                                                <div class="card-body p-4">
                                                <h5 class="card-title mb-3"><a href="aboutArtist.php?title=$name">$name</a></h5>
                                                <p class="card-text mb-0">$artTitle</p>
                                                </div>
                                                </div>
                                                </div>
                                            HTML;
                                            // displays according to the match of theme id and artist id 
                                            if($themeIDtitle == $themeIDfk && $artistIDfk == $artistID){
                                                echo $output; 
                                            }
                                        }
                                    }
                                }
                            }
                            //connection closed
                            $conn->close();
                        ?>
                    </div>
                    
                            
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
