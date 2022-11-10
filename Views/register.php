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

    <title>Sign Up</title>
</head>

<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto p-0"><br>
                <h1 class="card-title text-center h3 mb-0">REGISTER</h1>
                <div class="card-body">
                    <form action="../Actions/register-action.php" method="post">
                        <div class="mb-3">
                            <label for="first-name" class="form-label small fw-bold">First Name</label>
                            <input type="text" name="first_name" id="first-name" class="form-control" maxlength="50" required>
                        </div>

                        <div class="mb-3">
                            <label for="last-name" class="form-label small fw-bold">Last Name</label>
                            <input type="text" name="last_name" id="last-name" class="form-control" maxlength="50" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control mb-2" required>
                        </div>
                        <p class="text-muted">Password must be atleast 8characters long.</p>

                        <button type="submit" class="btn btn-success w-100" name="btn_sign_up">Register</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p class="small">Registered Already? <a href="index.php">Log in</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['btn_sign_up'])){
        $first_name         = $_POST['first_name'];
        $last_name          = $_POST['last_name'];
        $username           = $_POST['username'];
        $password           = $_POST['password'];

        store($first_name, $last_name, $username, $password);

    }

?>