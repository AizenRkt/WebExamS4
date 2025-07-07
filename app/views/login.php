<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1885ed">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo Flight::base(); ?>/public/assets/css/style.css">

    <title>Login Page</title>
</head>
<body>
    <div class="container-login">
        <div class="logo-box">
            <img src="<?php echo Flight::base(); ?>/public/assets/img/Logo.png" alt="Logo" />
        </div>
        <div class="form-box ring">
            <i style="--clr:#00ff0a;"></i>
            <i style="--clr:#ff0057;"></i>
            <i style="--clr:#fffd44;"></i>
            <div class="login">
                <h2>Login</h2>
                <div class="inputBx">
                    <input type="text" placeholder="Username">
                </div>
                <div class="inputBx">
                    <input type="text" placeholder="Password">
                </div>
                <div class="inputBx">
                    <input type="submit" value="Sign in">
                </div>
                <div class="links">
                    <a href="#">se connecter en tant qu'admin</a>
                    <a href="#">Signup</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>