<?php

session_start();
    include("connection.php");

    if (isset($_GET['r_id'])){

        $recipe_id = $_GET['r_id'];

        $query = "select * from recipes where recipe_id='$recipe_id'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);

        $recipe_name = $row['name'];
        $ingredients = $row['ingredients'];

        $steps = $row['steps'];
        $steps = explode(">",$steps);

        $image1 = $row['image2'];
        $image2 = $row['image3'];
        $image3 = $row['image4'];
        $image4 = $row['image5'];

        $images = array($image1, $image2, $image3, $image4);
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/010f14bbca.js" crossorigin="anonymous"></script>
    <title>ShareRecipes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-bowl-spoon fa-2x"></i>
                ShareRecipes</i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-md">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <ul class="nav nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" style="color: #fd7e14;" aria-current="page"
                                href="index.php"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #fd7e14;" href="index.php"><b>Common Recipes</b></a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" style="color: #fd7e14;" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <b>My Account</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li class="d-flex justify-content-center"><button type="button" class="btn btn-light"
                                        data-bs-toggle="modal" data-bs-target="#addmodal"><a class="dropdown-item"
                                            href="#">Add
                                            Recipes</a></button></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="d-flex justify-content-center"><button type="button" class="btn btn-light"
                                        data-bs-toggle="modal" data-bs-target="#viewmodal"><a class="dropdown-item"
                                            href="#">My Recipes</a></button></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="d-flex justify-content-center"><button type="button"
                                        class="btn btn-lights"><a class="dropdown-item"
                                            href="logout.php">Logout</a></button></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <br><br><br><br>

    <div class="container d-flex justify-content-center">
        <h1 style="text-decoration: underline;
  text-decoration-color:#fd7e14; font-family: 'Times New Roman', Times, serif"><?php echo $recipe_name; ?></h1>
    </div>

    <br><br><br>
    
    <div class="container d-flex justify-content-center">
        <h4 style="font-family: 'Times New Roman', Times, serif" class="featurette-heading">Ingredients :<br><br><p class="lead"><?php echo $ingredients; ?></p></h4>
    </div>
    <br><br>

    <div class="container my-4">

        <?php 

        for ($i=0; $i<4; $i++){

            $path1 = "images/".$images[$i];
            $path2 = "images/".$images[($i+1)];

            ?>
            <div class="row featurette d-flex justify-content-center align-items-center">
                <div class="col-md-7">
                    <h3 class="featurette-heading"><span class="text-muted">Step - <?php echo ($i+1); ?></span></h3>
                    <p class="lead"><?php echo $steps[$i+1]; ?></p>
                </div>
                <div class="col-md-5">
                <img class="img-fluid" src="<?php echo $path1; ?>" alt="">

                </div>
            </div><br><br><br>

            <div class="row featurette d-flex justify-content-center align-items-center">
                <div class="col-md-7 order-md-2">
                    <h3 class="featurette-heading"><span class="text-muted">Step - <?php echo ($i+2); ?></span></h3>
                    <p class="lead"><?php echo $steps[($i+2)]; ?></p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="img-fluid" src="<?php echo $path2; ?>" alt="">

                </div>
            </div><br><br><br>
            <?php
            $i++;
        } 

        ?>

        <br><br>

        <div class="container-fluid">

            <?php

            for ($i=4; $i+1<sizeof($steps); $i++){

                ?>
                <h3 class="featurette-heading"><span class="text-muted">Step - <?php echo ($i+1); ?></span></h3>
                <p class="lead"><?php echo $steps[($i+1)]; ?></p>
                <br><br>

                <?php
            }

            ?>

        </div>
    </div>

    <br><br><br><br><br><br><br>

    <footer class="py-3 my-4 bg-dark">
        <p class="text-center text-muted">© 2021 Company, Inc</p>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>