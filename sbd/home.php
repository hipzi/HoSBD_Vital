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
                <a class="a" href="logout.php">LOGOUT</a>
                <a class="b" href="user.php">JADWAL VAKSIN</a>
                <a class="c active" href="home.php">HOME</a>
                <a class="d" href="rumahsakit.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
                <a class="f" href="editdata.php">REALISASI VAKSIN</a>
            </div>

            <div class="content">
                    <div class="home">
                            <h1>Vaccine Reminder</h1>
                            <h3>HoSBD Vital</h3>
                    </div>
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