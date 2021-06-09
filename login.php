<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, , shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Login</title>
</head>
<body>
    <?php include 'navbar.html' ?>
    <main>
        <div class="container">
            <h1>Login to UWS</h1>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            Name: <input type="text" name="username" class="form-control" autofocus required /> <br/>
            Password: <input type="password" name="pwd" class="form-control" required /> <br/>
            <input type="submit" value="Sign in" class="btn btn-light"  />   
            </form>
        </div>

        <?php session_start(); ?>
        <?php 
            function reject($entry) {
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && strlen($_POST['username']) > 0) {
                $user = trim($_POST['username']);
                if (!ctype_alnum($user)) {
                    reject('User Name');
                }
                     
                if (isset($_POST['pwd'])) {
                   $pwd = trim($_POST['pwd']);
                   if (!ctype_alnum($pwd)) {
                      reject('Password');
                    } else {
                        // set session attributes
                        $_SESSION['user'] = $user;
                        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                        $_SESSION['pwd'] = $hash_pwd;
                        
                        // redirect the browser to another page using the header() function to specify the target URL
                        header('Location: schedule.php');
                    }
                }
            }      
        ?>
    </main>
    <?php include "footer.html" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>