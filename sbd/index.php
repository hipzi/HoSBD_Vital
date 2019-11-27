<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            @import url('style.css');
        </style>
        <title></title>
    </head>

    <body>
        <div class="background">

            <div class="nav">
                <a class="a" href="login.php">LOGIN</a>
                <a class="b" href="Register.php">REGISTER</a>
                <a class="c" href="logindulu.html">HOME</a>
                <!-- <a class="d" href="logindulu.html">ABOUT AJK</a>
                <a class="e" href="logindulu.html">USER</a> -->
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