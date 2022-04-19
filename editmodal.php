<!-- View My Recipe Modal -->
<?php
session_start();
    include("connection.php");
    
    if (isset($_SESSION['customer_id'])){

        $customer_id = $_SESSION['customer_id'];
    }
        ?>

<div class="modal fade" id="viewmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewmodalLabel">Your Recipes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <?php           
                                
                                $query = "select * from recipes where customer_id='$customer_id'";
                                $result = mysqli_query($con,$query);

                                if (!$result or mysqli_num_rows($result)==0){ 

                                    echo "
                                    <div class='container d-flex justify-content-center'>
                                        No Recipes Added. Add Now !
                                    </div>";
                
                                }
                                else{
                                    while ($rows = mysqli_fetch_assoc($result)){

                                        $recipe_id = $rows['recipe_id'];
                                        $name = $rows['name'];
                                        $recipe_image = $rows['image1'];
                                        $path = "images/".$recipe_image;
                                        ?>

                <div class="container d-flex justify-content-center my-4 col-4 "style="width:66%;">
                    <div class="card container-fluid d-flex justify-content-center" style="width: 18rem;">
                        <img src=<?php echo $path; ?> class="card-img-top" width="350px" height="270px" alt="">
                        <div class="card-body">
                            <h6 class="card-title d-flex justify-content-center">
                                <?php echo $name; ?>
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn" style="background-color:#fd7e14;"><a class="card-link" style="color:white; text-decoration:none;" href="recipe.php?r_id=<?php echo $recipe_id; ?>">View
                                    </a></button>
                                        <button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" class="card-link" href="personal/editRecipe.php?r_id=<?php echo $recipe_id; ?>">Edit
                                            </a></button>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php                                
                                    }
                                }
                            ?>


            </div>
        </div>
    </div>
</div>