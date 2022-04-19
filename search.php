<?php

session_start();
    include("connection.php");

    if (isset($_POST['search'])){

        $item = $_POST['search'];
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    <br><br><br>


    <div class="container d-flex justify-content-center">
        <h2 style="text-decoration: underline;
  text-decoration-color:#fd7e14; font-family: 'Times New Roman', Times, serif">Recipes Related to "<?php echo $item; ?>"</h2>
    </div>

    <br><br><br><br>

    <div id="recipes" class="container my-12">
        
        <div class="row">

    <?php

        if (isset($_POST['search'])){

            function lcwords($words) {
                return implode(' ', array_map(function($e) { return lcfirst($e); }, explode(' ', $words)));
            }

            $item1 = ucfirst($item);
            $item2 = ucwords($item);
            $item3 = lcfirst($item);
            $item4 = lcwords($item);
            $item5 = strtolower($item);

            $query = "select * from recipes";
            $result = mysqli_query($con,$query);

            while ($rows = mysqli_fetch_assoc($result)){

                $recipe_name = $rows['name'];
                $name = $recipe_name;
                $recipe_name = explode(' ',$recipe_name);
                $ingredients = $rows['ingredients'];
                $ingredients = explode(",",$ingredients);
                $flag = false;

                for ( $i=0; $i<sizeof($recipe_name); $i++){

                    if (str_contains($item1, $recipe_name[$i]) || str_contains($item2, $recipe_name[$i]) || str_contains($item3, $recipe_name[$i]) || str_contains($item4, $recipe_name[$i]) || str_contains($item5, $recipe_name[$i])){
                        $flag = true;
                    }
                }

                if (!$flag){
                    for ($i=0; $i<sizeof($ingredients); $i++){

                        if (str_contains($ingredients[$i], $item1) || str_contains($ingredients[$i], $item2) || str_contains($ingredients[$i], $item3) || str_contains($ingredients[$i], $item4) || str_contains($ingredients[$i], $item5)){
                            $flag = true;
                        }
                    }
                }

                if ($flag){

                    $recipe_id = $rows['recipe_id'];
                    $image = $rows['image1'];
                    $path = "images/".$image;

                    ?><div class="col-sm-3 my-4">
                        <div class="card">
                            <img src="<?php echo $path; ?>" class="card-img-top" width="350px" height="270px" alt="">
                            <div class="card-body container d-flex justify-content-center">
                                <h5 style="font-family: 'Times New Roman', Times, serif;" class="card-title"><?php echo $name; ?></h5> &nbsp;&nbsp;&nbsp;
                                
                                <a href="recipe.php?r_id=<?php echo $recipe_id; ?>" class="btn btn-primary btn-sm">View Recipe</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    ?>

        </div>

    </div>

    <br><br><br><br><br><br><br>

    <footer class="py-3 my-4 bg-dark">
        <p class="text-center text-muted">© 2021 Company, Inc</p>
    </footer>


    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

</body>

</html>