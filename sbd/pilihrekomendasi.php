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
                <!-- <a class="f" href="update.php">REALISASI VAKSIN</a> -->
        </div>
        
        <div class="table">
            <table>
                <tr>
                    <a href="rumahsakit.php">Berdasarkan Biaya</a> </br>
                </tr>
                <tr>
                    <a href="rumahsakitfav.php">Berdasarkan Frekuensi Kunjungan</a> </br>
                </tr>
                
            </table>
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