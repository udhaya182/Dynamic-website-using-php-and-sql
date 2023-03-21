<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--Changed the page title to the website's name-->
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
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <!--Changed the navigation bar to the website's name, and updated the links to the relavant webpages obtained from the template-->
                    <!--Updated the navigation bar with post webpage and updated the name of collections.php to collections_T.php-->
                    <a class="navbar-brand" href="index.php">Art by You</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                            <li class="nav-item"><a class="nav-link" href="artists.php">Artists</a></li>
                            <li class="nav-item"><a class="nav-link" href="collections_T.php">Collections</a></li>
                            <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            
            <!-- About section one-->
            <section class="py-5 bg-light mt-5" id="scroll-target">
                <div class="container px-5">
                                <?php
                                    //php script to display relevant artworks of the artist selected by the user
                                    require_once 'serverlogin.php';
                                    //uses credentials from serverlogin.php to establish connection with the database
                                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                    if ($conn->connect_error) {
                                        die("Connection failed" . mysqli_connect_error());
                                    }
                                    //uses the artist name selected by the user
                                    $artistName = urldecode($_GET['title']);
                                    $myquery = "SELECT * FROM Artists";
                                    $result = mysqli_query($conn, $myquery);
                                    //stores rows of Artists table as an associative array and updates the HTML part of the webpage to display the artworks with relevant information
                                    if ($result = $conn->query($myquery)) {
                                        while ($row = $result->fetch_assoc()) {
                                                $artistID = $row["ArtistID"];
                                                $name = $row["Name"];
                                                $artistImage = $row["ArtistImage"];
                                                $type = $row["Type"];
                                                $description = $row["Description"];
                                                $output = <<<HTML
                                                <div class="row gx-5 align-items-center">
                                                   <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="$artistImage" alt="$name" /></div>
                                                     <div class="col-lg-6">
                                                       <h2 class="fw-bolder">$name - $type</h2>
                                                       <p class="lead fw-normal text-muted mb-0">$description</p>
                                HTML;
                                //displays the artwork only if the artist name selected by the user matches with the one in the record
                                if($name == $artistName){
                                    $id = $artistID;
                                    echo $output; 
                                }
                                    }
                                }
                                //connection closed
                                $conn->close();
                                ?>

                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5">
                        <!-- Uses the artist selected by the user to retrieve all their artworks from the allData.csv file-->

                                <?php
                                    require_once 'serverlogin.php';
                                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                    if ($conn->connect_error) {
                                        die("Connection failed" . mysqli_connect_error());
                                    }
                                    $artistName = urldecode($_GET['title']);
                                    $myquery = "SELECT * FROM Artwork";
                                    $result = mysqli_query($conn, $myquery);
                                    if ($result = $conn->query($myquery)) {
                                        while ($row2 = $result->fetch_assoc()) {
                                                $artID = $row2["ArtID"];
                                                $artTitle = $row2["Title"];
                                                $artImage = $row2["ArtImage"];
                                                $themeID = $row2["ThemeID"];
                                                $artistIDfk = $row2["ArtistID"];
                                                $output = <<<HTML
                                                <div class="col-lg-4 mb-5">
                                                    <div class="card h-100 shadow border-0">
                                                        <img class="card-img-top" src="$artImage" width="100" height="200" alt="$artTitle" />
                                                        <div class="card-body p-4">
                                                            <p class="card-text mb-0">$artTitle</p>
                                                        </div>
                                                    </div>
                                                </div>
                                HTML;
                                if($id == $artistIDfk){
                                echo $output; 
                                }
                                    }
                                }
                                $conn->close();
                                ?>
                    </div>
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
