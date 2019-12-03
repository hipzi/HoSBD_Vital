<?php
    include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            @import url('style.css');
        </style>
        
        <title></title>
    </head>

    <script>
        function myFunction() {
            document.getElementById("changevaksin").submit(); 
        }

        function fungsiFav() {
            document.getElementById("changefav").submit();
        }
    </script>

    <body>
        <div class="background">

        <div class="nav">
                <a class="a" href="logout.php">LOGOUT</a>
                <a class="b" href="user.php">JADWAL VAKSIN</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d active" href="rumahsakit.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
        </div>

        <div class="pilih">
                <h5>BERDASARKAN</h5>
                <p><a href="rumahsakit.php" class="btn-pilih_a">Biaya</a></p>
                <p><a href="rumahsakitrange.php" class="btn-pilih_c">Range Biaya</a></p>
                <p><a href="rumahsakitfav.php" class="btn-pilih_b">Frekuensi Kunjungan</a></p>
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