<?php
session_start();
    include("../connection.php");
    

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name_recipe = $_POST['name_recipe'];
        $ingredients = $_POST['ingredients'];

        //$customer_id = 0;                                            For preloaded recipes
        $customer_id=$_SESSION['customer_id'];
        $steps = $_POST['steps'];

        $recipe_image = $_FILES['recipe_image']['name'];

        $source_path=$_FILES['recipe_image']['tmp_name'];
        $destination_path="../images/".$recipe_image;

        $upload = move_uploaded_file($source_path,$destination_path);
       
        if (isset($_FILES['image_1']['name'])){
            $image_1=$_FILES['image_1']['name'];

            $source_path=$_FILES['image_1']['tmp_name'];
            $destination_path="../images/".$image_1;
    
            $upload = move_uploaded_file($source_path,$destination_path);
        }
        else{
            $image_1="";
        }

        if (isset($_FILES['image_2']['name'])){
            $image_2=$_FILES['image_2']['name'];

            $source_path=$_FILES['image_2']['tmp_name'];
            $destination_path="../images/".$image_2;
    
            $upload = move_uploaded_file($source_path,$destination_path);
        }
        else{
            $image_2="";
        }

        if (isset($_FILES['image_3']['name'])){
            $image_3=$_FILES['image_3']['name'];

            $source_path=$_FILES['image_3']['tmp_name'];
            $destination_path="../images/".$image_3;
    
            $upload = move_uploaded_file($source_path,$destination_path);
        }
        else{
            $image_3="";
        }

        if (isset($_FILES['image_4']['name'])){
            $image_4=$_FILES['image_4']['name'];

            $source_path=$_FILES['image_4']['tmp_name'];
            $destination_path="../images/".$image_4;
    
            $upload = move_uploaded_file($source_path,$destination_path);
        }
        else{
            $image_4="";
        }
            
        $query = "insert into recipes (customer_id,name,ingredients,steps,image1,image2,image3,image4,image5) values ('$customer_id','$name_recipe','$ingredients','$steps','$recipe_image','$image_1','$image_2','$image_3','$image_4')";

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