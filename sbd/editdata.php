<?php
    include "conn.php";
?>  
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
                <a class="a" href="logout.php">LOGOUT</a>
                <a class="b" href="user.php">JADWAL VAKSIN</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d" href="rumahsakit.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
                <a class="f active" href="editdata.php">REALISASI VAKSIN</a>
            </div>

                <div class="editdata">
                    <h5>DATA VAKSIN</h5>
                    <?php
                        $vaksin = mysqli_query($conn, "SELECT id_vaksin, nama_vaksin FROM vaksin"); 
                        $rs = mysqli_query($conn, "SELECT id_rumahsakit, nama_rumahsakit FROM rumahsakit"); 
                    ?>
                    <form action="insertvaksin.php" method="POST">
                        <b> <h1>Jenis Vaksin</h1> </b>
                        <p>
                            <select id = "cbvaksin" name="cbvaksin">
                                <?php
                                while($hv=mysqli_fetch_array($vaksin))
                                {
                                    ?>
                                    <option value="<?php echo $hv['id_vaksin'] ?>"><?php echo $hv['nama_vaksin'] ?></option>
                                    <?php
                                }
                                ?>
                            </select> 
                        </p>
                        <b> <h1>Perulangan</h1> </b>
                        <p> <select id = "cbperulangan" name="cbperulangan">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                            </select>  </p>
                        <b> <h1>Tanggal Terima Vaksin</h1> </b>
                        <p> <input type="date" title="tgl_terima" name="tgl_terima" /> </p>
                        <b> <h1>Rumah Sakit/Puskesmas</h1> </b>
                        <p>
                            <select id = "cbrs" name="cbrs">
                                <?php
                                while($hvr=mysqli_fetch_array($rs))
                                {
                                    ?>
                                    <option value="<?php echo $hvr['id_rumahsakit'] ?>"><?php echo $hvr['nama_rumahsakit'] ?></option>
                                    <?php
                                }
                                ?>
                            </select> 
                        </p>
                        <p> <button type="submit" class="btn">Submit</button> </p>
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