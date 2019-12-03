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

    <body>
        <div class="background">

        <div class="nav">
                <a class="a" href="logout.php">LOGOUT</a>
                <a class="b" href="user.php">JADWAL VAKSIN</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d active" href="pilihrekomendasi.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
        </div>
        
        <div class="table">
            <table>
                <tr>
                        <p class="vaksin"> Range: </p>

                        <form id="sortbiaya" action="rumahsakitrange.php" method="POST">
                            <p> <input type="text" title="biaya" name="biaya" class="btn-pilih_i"/> </p>
                            <p> <button type="submit" class="btn-pilih">Pilih</button> </p>
                        </form>

                        <?php
                            $biaya = @$_POST['biaya'];
                        ?>

                    </!-->
                </tr>
                <tr>
                    <th>No</th>
                    <th>Rumah Sakit</th>
                    <th>Vaksin</th>
                    <th>Biaya</th>
                </tr>
                <?php
                    $no = 1; 
                        $qry =mysqli_query($conn, "SELECT rs.id_rumahsakit, rs.nama_rumahsakit, v.nama_vaksin, d.biaya 
                            FROM rumahsakit rs, detil_rumahsakit d, vaksin v 
                            WHERE rs.id_rumahsakit = d.id_rumahsakit 
                            AND d.id_vaksin = v.id_vaksin 
                            GROUP BY d.biaya 
                            HAVING d.biaya < (SELECT DISTINCT d.biaya 
                                                FROM detil_rumahsakit d 
                                                WHERE d.biaya = '$biaya')");
                    while($row=mysqli_fetch_array($qry)){
                ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_rumahsakit']; ?></td>
                        <td><?php 
                                echo $row['nama_vaksin'];
                        ?></td>
                        <td><?php 
                                echo $row['biaya'];
                        ?></td>
                    
                    </tr>
                    <?php }?>
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