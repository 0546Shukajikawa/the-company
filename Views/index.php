<?php
    require '../Classess/User.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Login</title>
</head>

<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto px-0">
                <div class="card-header bg-white">
                    <h1 class="card-title text-center mb-0">Login</h1>
                </div>

                <div class="card-body">
                    <form action="../Actions/login-action.php" method="post">
                        <div class="mb-3">
                            <input type="text" name="username" id="username" class="form-control"  placeholder="USERNAME" required>
                        </div>

                        <div class="mb-5">
                            <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD">
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100" name="btn_login">Login</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="register.php" class="small">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        login($username, $password);
    }

?>