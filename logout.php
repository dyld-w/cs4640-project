<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, , shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Logout</title>
</head>
<body>
    <?php include 'navbar.html' ?>
    <?php session_start(); ?>
    <main>
        <h1>Successfully logged out.</h1>
        <h2>You are being redirected to the index page.</h2>
    </main>

    <?php
    if (count($_SESSION) > 0) {   
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);      
        }
        if (count($_COOKIE) > 0) {
            foreach ($_COOKIE as $key => $val) {
              unset($_COOKIE[$key]); //server side cookies
              setcookie($key, '', time() - 3600); //permanently remove from client
            }
          }       
        session_destroy();
        header('refresh:5; url=index.html');
    }
    ?>

    <?php include "footer.html" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>