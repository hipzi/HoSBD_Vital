<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            @import url('style.css');
        </style>
        <style>
                @import url('https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap');
        </style>
        <title></title>
    </head>

    <body>
        <div class="background">

            <div class="nav">
                <a class="a active" href="login.php">LOGIN</a>
                <a class="b" href="Register.php">REGISTER</a>
                <a class="c" href="logindulu.html">HOME</a>
                <a class="d" href="logindulu.html">REKOMENDASI RS</a>
                <a class="e" href="logindulu.html">REKOMENDASI RS</a>
            </div>

                <div class="log-form">
                    <h5>LOGIN</h5>

                    <form action="insertlogin.php" method="POST">
                        <b> <h1>Username</h1> </b>
                        <p> <input type="text" title="username" name="username"/> </p>
                        <b> <h1>Password</h1> </b>
                        <p> <input type="password" title="password" name="password" /> </p>
                        <p> <button type="submit" class="btn">Login</button> </p>
                        <a class="forgot" href="Register.php">Need an account?</a>
                    </form>
                </div>

        </div>

        <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                $('a').click(function(){
                    var selected = $(this);
                    $('a').removeClass('active');
                    $(selected).addClass('active');
                });
            });
        
        </script>

    </body>
</html>