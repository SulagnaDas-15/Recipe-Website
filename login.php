<?php
session_start();
    include("connection.php");
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
    <br><br><br>
    <div class="container d-flex justify-content-center">
        <h2 style="text-decoration: underline;
  text-decoration-color:#fd7e14; font-family: 'Times New Roman', Times, serif">Login To ShareRecipes</h2>
    </div>

    <div class="container my-4">
        <form action="" method="post">
            
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div> <br><br>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-outline-primary">
                    <h5 style="color:rgb(75, 169, 206);">Login</h5>
                </button>
            </div>
        </form>
    </div>

    <br><br><br>

    <div class="container d-flex justify-content-center">
        <p>Not yet Registered? &nbsp; <a href="signup.php">SignUp</a></p>
    </div>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    
    <br><br><br><br><br>
</body>

<?php
    if (isset($_SESSION['customer_id'])){  
        unset($_SESSION['customer_id']);
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "select customer_id from customers where email='$email' and password='$password'";

        $res = mysqli_query($con,$sql);

        print_r($res);
        echo "<br>";
        
        if ($res and mysqli_num_rows($res)==1){

            echo "hi";
            echo "<br>";

            $row = mysqli_fetch_assoc($res);
            $customer_id = $row['customer_id'];

            echo $customer_id;

            $_SESSION['customer_id'] = $customer_id;

            header("Location: /BeZen/index.php");
        }
        else{

            echo "Incorrect Password. Try Again !";
            echo "<br><br><br><br>";
        }
    }
    else{
        
    }
?>

<footer class="py-3 my-4 bg-dark">
    <p class="text-center text-muted">© 2021 Company, Inc</p>
</footer>

</html>
            
