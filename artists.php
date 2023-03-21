<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Art by You</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column bg-light ">
        <main class="flex-shrink-0">
            <!-- Navigation-->
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
            
            <!-- Page content-->
                    <!--Inserted the members section from the about page adapted from the bootstrap template. Updated the professions of the members-->
                    <!-- Team members section-->
                    <section class="py-5 bg-light">
                        <div class="container px-5 my-5">
                            <div class="text-center">
                                <!-- Updated the information from the feedback recieved for A1-->
                                <h2 class="fw-bolder">Our artists</h2>
                                <p class="lead fw-normal text-muted mb-5">Dedicated to bringing art to our community</p>
                            </div>
                            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                                <!--php sccript to update the webpage with the images and text fields in the database-->

                                <?php
                                require_once 'serverlogin.php';
                                //uses credentials in serverlogin.php to establish connection with ArtByYou database
                                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                if ($conn->connect_error) {
                                    die("Connection failed" . mysqli_connect_error());
                                }
                                //Query to select all rows from Artists table
                                $myquery = "SELECT * FROM Artists";
                                $result = mysqli_query($conn, $myquery);
                                //if the query is done properly, the rows are stored as an associative array, which are then used to save seperate entities
                                if ($result = $conn->query($myquery)) {
                                    while ($row = $result->fetch_assoc()) {
                                            $artistID = $row["ArtistID"];
                                            $name = $row["Name"];
                                            $artistImage = $row["ArtistImage"];
                                            $type = $row["Type"];
                                            $description = $row["Description"];
                                            //updates the HTML part with the entities retrieved from Artists table
                                            $output = <<<HTML
                                            <div class="col mb-5 mb-5 mb-xl-0">
                                                <div class="text-center">
                                                    <img class="img-fluid rounded-circle mb-4 px-4" src="$artistImage" alt="..." />
                                                        <h5 class="fw-bolder"> <a href="aboutArtist.php?title=$name">$name</a></h5>
                                                            <div class="fst-italic text-muted">$type</div>
                                                </div>
                                            </div>
                                HTML;
                                echo $output; 
                                    }
                                }
                                //closes connection
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
