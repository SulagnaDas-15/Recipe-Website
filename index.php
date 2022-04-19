<?php

    include("connection.php");
    include("editmodal.php");
    
    if (isset($_SESSION['customer_id'])){

        $customer_id = $_SESSION['customer_id'];
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

    <!-- Navigation bar -->
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
                                href="#"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #fd7e14;" href="#recipes"><b>Common Recipes</b></a>
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

    <!-- Caraosal with search bar -->
    <br>
    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="container-fluid-sm">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/1400x700/?food,rice" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <form action="search.php" method="post" class="d-flex justify-content-end">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success btn-lg" style="background-color:#fd7e14;" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1400x700/?cooking,food" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <form action="search.php" method="post" class="d-flex justify-content-end">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success btn-lg" style="background-color:#fd7e14;" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1400x700/?frying,food" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <form action="search.php" method="post" class="d-flex justify-content-end">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success btn-lg" style="background-color:#fd7e14;" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1400x700/?food,baking" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <form action="search.php" method="post" class="d-flex justify-content-end">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success btn-lg" style="background-color:#fd7e14;" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1400x700/?food,drinks" class="d-block w-100" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <form action="search.php" method="post" class="d-flex justify-content-end">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success btn-lg" style="background-color:#fd7e14;" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>

    <br> <br><br><br><br><br><br>

   <!-- Common Recipes Section --> 
    <div class="container d-flex justify-content-center">
        <h1 style="text-decoration: underline;
  text-decoration-color:#fd7e14; font-family: 'Times New Roman', Times, serif";>Common Recipes</h1>
    </div> <br><br><br>

    <div id="recipes" class="container my-12">
        <div class="row">

                <?php

                $cs = 0;    //$customer_id
                $query = "select * from recipes where customer_id='$cs'";
                $result = mysqli_query($con,$query);

                while ($rows = mysqli_fetch_assoc($result)){

                    $recipe_name = $rows['name'];
                    $ingredients = $rows['ingredients'];
                    $image = $rows['image1'];
                    $path = "images/".$image;
                    $recipe_id = $rows['recipe_id'];
                    ?>

                    <div class="col-sm-3 my-4">
                        <div class="card">
                            <img src="<?php echo $path; ?>" class="card-img-top" width="350px" height="270px" alt="">

                            <div class="card-body container d-flex justify-content-center">
                                
                                <h7 class='card-title'><?php echo $recipe_name; ?></h7> &nbsp;&nbsp;
                                <a style="background-color:#fd7e14;" href="recipe.php?r_id=<?php echo $recipe_id; ?>" class="btn btn-sm btn-danger">Open</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
                ?>

        </div>

    </div>

    <!-- Add Recipe Modal -->
    <div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addmodalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmodalLabel">Your Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="personal/addRecipe.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name_recipe" class="form-label">Name of the Recipe</label>
                            <input type="text" name="name_recipe" class="form-control" id="name_recipe" required>
                        </div>
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredients</label>
                            <input type="text" name="ingredients" class="form-control" id="ingredients" required>
                        </div>
                        <div class="mb-3">
                            <label for="steps" class="form-label">Steps</label>
                            <input type="textarea" name="steps" class="form-control" id="steps"
                                aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Write your recipe point wise.</div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="recipe_image" class="form-control" id="recipe_image" required>
                            <label class="input-group-text" for="recipe_image">Recipe Image</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image_1" class="form-control" id="image_1">
                            <label class="input-group-text" for="image_1">Step Image 1</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image_2" class="form-control" id="image_2">
                            <label class="input-group-text" for="image_2">Step Image 2</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image_3" class="form-control" id="image_3">
                            <label class="input-group-text" for="image_3">Step Image 3</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image_4" class="form-control" id="image_4">
                            <label class="input-group-text" for="image_4">Step Image 4</label>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn-sm btn-primary">&nbsp; Add &nbsp;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br>

    <footer class="py-3 my-4 bg-dark">
        <p class="text-center text-muted">© 2021 Company, Inc</p>
    </footer>

    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>

</html>

<?php
    }

    else{

        header("Location: login.php");                  //Login Check
    }
?>