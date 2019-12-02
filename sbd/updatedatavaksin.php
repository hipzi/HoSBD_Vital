<?php
    include "conn.php";
    $pk = @$_GET['idv'];
    $qe = mysqli_query($conn, "SELECT v.id_vaksin, v.nama_vaksin, u.no_urut, r.nama_rumahsakit, t.tgl_transaksi FROM usiapemberian u INNER JOIN vaksin v  ON u.id_vaksin = v.id_vaksin INNER JOIN transaksi t ON t.id_usia = u.id_usia INNER JOIN rumahsakit r ON r.id_rumahsakit = t.id_rumahsakit WHERE u.id_usia='$pk' AND t.username = 'z'");
    $row = mysqli_fetch_array($qe);
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
                <a class="d" href="pilihrekomendasi.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
                <!-- <a class="f active" href="editdata.php">REALISASI VAKSIN</a> -->
            </div>

                <div class="editdata">
                    <h5>REALISASI VAKSIN</h5>
                    <?php
                        $vaksin = mysqli_query($conn, "SELECT id_vaksin, nama_vaksin FROM vaksin"); 
                        $rs = mysqli_query($conn, "SELECT id_rumahsakit, nama_rumahsakit FROM rumahsakit"); 
                    ?>

                    <script>
                        function enableSubmit()
                        {
                            document.getElementbyId('cbvaksin').disabled=false;
                        }
                    </script>
                    
                    <form action="updatevaksin.php" method="POST" onsubmit="enableSubmit();">

                        <b> <h1>Jenis Vaksin</h1> </b>
                        <p>
                            <select  id="cbvaksin" title="cbvaksin" name="cbvaksin">
                                <option value="<?php echo $row['id_vaksin']; ?>" selected><?php echo $row['nama_vaksin']; ?></option>
                            </select>
                        </p>
                        <b> <h1>Perulangan</h1> </b>
                        <p>
                            <select id="cbperulangan" title="cbperulangan" name="cbperulangan">
                                <option value="<?php echo $row['no_urut']; ?>" selected><?php echo $row['no_urut']; ?></option>
                            </select>
                        </p>
                        <b> <h1>Tanggal Terima Vaksin</h1> </b>
                        <p> <input type="date" title="tgl_terima" name="tgl_terima" value="<?php echo $row['tgl_transaksi'] ?>"/> </p>
                        <b> <h1>Rumah Sakit/Puskesmas</h1> </b>
                        <p>
                            <select id = "cbrs" name="cbrs">
                                <?php
                                while($hvr=mysqli_fetch_array($rs))
                                {
                                    ?>
                                    <option value="<?php echo $hvr['id_rumahsakit'] ?>" <?php echo ($row['nama_rumahsakit'] == $hvr['nama_rumahsakit']) ? 'selected' : ''; ?> ><?php echo $hvr['nama_rumahsakit'] ?></option>
                                    <?php
                                }
                                ?>
                            </select> 
                        </p>
                        <button type="submit" class="btn">Submit</button>
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