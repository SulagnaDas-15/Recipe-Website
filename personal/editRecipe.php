<?php
session_start();
    include("../connection.php");

    $recipe_id = $_GET['r_id'];

    $query = "select * from recipes where recipe_id='$recipe_id'";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $ingredients = $row['ingredients'];
    $steps = $row['steps'];
    $image1 = $row['image1'];
    $image2 = $row['image2'];
    $image3 = $row['image3'];
    $image4 = $row['image4'];
    $image5 = $row['image5'];
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
                                href="../index.php"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: #fd7e14;" href="../index.php"><b>Common Recipes</b></a>
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
    <br>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name_recipe" class="form-label">Name of The Recipe</label>
            <input type="text" name="name_recipe" class="form-control" value="<?php echo $name; ?>" id="name_recipe"
            required>
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <input type="text" name="ingredients" value="<?php echo $ingredients; ?>" class="form-control"
            id="ingredients" required>
        </div>
        <div class="mb-3">
            <label for="steps" class="form-label">Steps</label>
            <input type="textarea" name="steps" class="form-control" id="steps" value="<?php echo $steps; ?>"
            aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Write your recipe point wise starting with '>'</div>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="recipe_image" class="form-control" value="<?php echo $image1; ?>"
            id="recipe_image">
            <label class="input-group-text" for="recipe_image">Recipe Image</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="image_1" class="form-control" value="<?php echo $image2; ?>" id="image_1">
            <label class="input-group-text" for="image_1">Step Image 1</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="image_2" class="form-control" value="<?php echo $image3; ?>" id="image_2">
            <label class="input-group-text" for="image_2">Step Image 2</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="image_3" class="form-control" value="<?php echo $image4; ?>" id="image_3">
            <label class="input-group-text" for="image_3">Step Image 3</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" name="image_4" class="form-control" value="<?php echo $image5; ?>" id="image_4">
            <label class="input-group-text" for="image_4">Step Image 4</label>
        </div>
        <br>
        <div class="modal-footer">
            <button type="submit" class="btn-sm btn-primary">&nbsp; Edit &nbsp;</button>
        </div>
    </form>

    <br><br><br><br>

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

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name_recipe = $_POST['name_recipe'];
        $ingredients = $_POST['ingredients'];
        
        $steps = $_POST['steps'];

        if (isset($_FILES['recipe_image']['name'])){

            if ($_FILES['recipe_image']['name'] == ""){

                $recipe_image=$image1;
            }
            else{

                $recipe_image=$_FILES['recipe_image']['name'];

                $path = "../images/".$image1;
                $remove=unlink($path);
    
                $source_path=$_FILES['recipe_image']['tmp_name'];
                $destination_path="../images/".$recipe_image;
        
                $upload = move_uploaded_file($source_path,$destination_path);
            }
        }
        else{
            $recipe_image=$image1;
        }
       
        if (isset($_FILES['image_1']['name'])){
            if ($_FILES['image_1']['name']==""){

                $image_1=$image2;
            }
            else{

                $image_1=$_FILES['image_1']['name'];

                $path = "../images/".$image2;
                $remove=unlink($path);
    
                $source_path=$_FILES['image_1']['tmp_name'];
                $destination_path="../images/".$image_1;
        
                $upload = move_uploaded_file($source_path,$destination_path);
            }
        }
        else{
            $image_1=$image2;
        }

        if (isset($_FILES['image_2']['name'])){
            if ($_FILES['image_2']['name']==""){

                $image_2=$image3;
            }
            else{

                $image_2=$_FILES['image_2']['name'];

                $path = "../images/".$image3;
                $remove=unlink($path);

                $source_path=$_FILES['image_2']['tmp_name'];
                $destination_path="../images/".$image_2;
        
                $upload = move_uploaded_file($source_path,$destination_path);
            }
        }
        else{
            $image_2=$image3;
        }

        if (isset($_FILES['image_3']['name'])){
            if($_FILES['image_3']['name']==""){

                $image_3=$image4;
            }
            else{

                $image_3=$_FILES['image_3']['name'];

                $path = "../images/".$image4;
                $remove=unlink($path);
    
                $source_path=$_FILES['image_3']['tmp_name'];
                $destination_path="../images/".$image_3;
        
                $upload = move_uploaded_file($source_path,$destination_path);
            }
        }
        else{
            $image_3=$image4;
        }

        if (isset($_FILES['image_4']['name'])){
            if ($_FILES['image_4']['name']==""){

                $image_4=$image5;
            }
            else{

                $image_4=$_FILES['image_4']['name'];

                $path = "../images/".$image5;
                $remove=unlink($path);
    
                $source_path=$_FILES['image_4']['tmp_name'];
                $destination_path="../images/".$image_4;
        
                $upload = move_uploaded_file($source_path,$destination_path);
            }
        }
        else{
            $image_4=$image5;
        }
            
        $query = "update recipes set
        name = '$name' ,
        ingredients = '$ingredients',
        steps = '$steps',
        image1 = '$recipe_image',
        image2 = '$image_1' ,
        image3 = '$image_2' ,
        image4 = '$image_3' ,
        image5 = '$image_4' 
        where recipe_id='$recipe_id'";

        if(!mysqli_query($con,$query)){
            echo "fail";
            echo"<br>";
            echo mysqli_error($con);
            echo "<br>";
        }
        else{
            header("Location: ../index.php");
            die();
        }      
    }
?>