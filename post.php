<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Post</title>
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
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <h1 class="fw-bolder">Upload new Art</h1>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            <!-- PHP script to update the database with a new record in the Artwork table using the credentials entered by the user-->
                            <?php
                                            require_once 'serverlogin.php';
                                            //establishes connection with the database using credentials from serverlogin.php
                                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                            if ($conn->connect_error) {
                                                die("Connection failed" . mysqli_connect_error());
                                            }
                                            mysqli_select_db($conn,$db_database)
                                                or die("Unable to select database:".mysql_error());
                                                //when the value of the submit button is set to submit the values entered by the users are stored
                                                if(isset($_POST['submit'])){
                                                    if($_POST['submit']=='Submit'){
                                                        $name = $_POST['name'];
                                                        $title = $_POST['artTitle'];
                                                        $theme = $_POST['theme'];
                                                        $fileName = $_POST['fileName'];
                                                        $filePath = "files/".$theme."/".$fileName;
                                                        // identifies the ID of theme and artist
                                                        if($theme == "Animals"){
                                                            $themeID = 1;
                                                        }
                                                        elseif($theme == "Textiles"){
                                                            $themeID = 2;
                                                        }
                                                        elseif($theme == "Food"){
                                                            $themeID = 3;
                                                        }
                                                        elseif($theme == "Flowers"){
                                                            $themeID = 4;
                                                        }
                                                        elseif($theme == "Pottery"){
                                                            $themeID = 5;
                                                        }
                                                        elseif($theme == "Water"){
                                                            $themeID = 6;
                                                        }
                                                        if($name == "Joe Anderson"){
                                                            $artistID = 1;
                                                        }
                                                        elseif($name == "Pete Sanderson"){
                                                            $artistID = 2;
                                                        }
                                                        elseif($name == "Mary Major"){
                                                            $artistID = 3;
                                                        }
                                                        elseif($name == "Sue Kass"){
                                                            $artistID = 4;
                                                        }
                                                        elseif($name == "Tina Vax"){
                                                            $artistID = 5;
                                                        }
                                                        elseif($name == "Alan Doyle"){
                                                            $artistID = 6;
                                                        }
                                                        elseif($name == "Carl Palmer"){
                                                            $artistID = 7;
                                                        }
                                                        elseif($name == "Jane Lester"){
                                                            $artistID = 8;
                                                        }
                                                    }

                                                }
                                            //prepare statement to insert the new record to the database
                                            $statmentArt = $conn->prepare("INSERT INTO Artwork (Title, ArtImage, ThemeID, ArtistID ) VALUES (?,?,?,?)");
                                            $statmentArt->bind_param("ssii",$title, $filePath, $themeID, $artistID );
                                            $statmentArt->execute();
                                            $sql = "INSERT INTO Artwork (Title, ArtImage, ThemeID, ArtistID ) VALUES ('$title', '$filePath', '$themeID', '$artistID')";
                                            $statmentArt->close();
                                            //connection closed
                                            $conn->close();

                                        ?>
                                    
                                <!-- Form captures users input and is retreived in the php script using POST method-->
                                <form id="contactForm" action ="post.php" method = "post">
                                    <!-- Username input-->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" type="text" name="name"/>
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="artTitle" type="text" name="artTitle"/>
                                        <label for="artTitle">Art Title</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="theme" type="text" name="theme"/>
                                        <label for="theme">Theme</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="fileName" type="text" name="fileName"/>
                                        <label for="fileName">File Name</label>
                                    </div>
                                    <div><button class="btn btn-primary btn-lg" id="submitButton" name = "submit" type="submit" value ="Submit">Submit</button></div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Removed contact cards-->
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
