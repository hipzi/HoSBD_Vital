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
                <a class="b active" href="user.php">JADWAL VAKSIN</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d" href="pilihrekomendasi.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
                <!-- <a class="f" href="editdata.php">REALISASI VAKSIN</a> -->
        </div>

        <div class="table">
            <table>
                    <tr>
                        <th>No</th>
                        <th>Vaksin</th>
                        <th>Pemberian 1</th>
                        <th>Pemberian 2</th>
                        <th>Pemberian 3</th>
                    </tr>

                <?php
                    $no = 1;
                    $qry = mysqli_query($conn, "SELECT id_vaksin, nama_vaksin FROM vaksin");
                    while($row=mysqli_fetch_array($qry)){
                ?>
    
            <!-- <div class="UD">
                <a class="f" href="update.php?id=<?php echo $row['id']; ?>">UPDATE</a>
                <a class="f" onclick="return confirm('Yakin ?')" href="delete.php?id=<?php echo $row['id']; ?>">DELETE</a>
            </div> -->

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_vaksin']; ?></td>
                        <!-- <td><?php echo $row['p.tgl_lahir']; ?></td> -->
                        <td><?php 
                            $pasien = mysqli_query($conn, "SELECT tgl_lahir FROM pasien WHERE username = 'z'");
                            $hasilpasien = mysqli_fetch_array($pasien);
                            $ambilulang = mysqli_query($conn, "SELECT id_usia, usia_pemberian, no_urut, jarak FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '1'");
                            $ambilusia2 = mysqli_query($conn, "SELECT t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '2')");
                            $ambilusia = mysqli_query($conn, "SELECT t.id_transaksi, t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '1')");
                            $trans = mysqli_fetch_array($ambilusia);
                            $hasil=mysqli_fetch_array($ambilulang); 
                            $hasil2=mysqli_fetch_array($ambilusia2);
                            if($trans['tgl_transaksi'] != '')
                            {
                                echo $trans['tgl_transaksi'];
                                echo "<br>";
                                echo $trans['nama_rumahsakit'];
                                if(is_null($hasil2['tgl_transaksi']))
                                {
                                    ?>
                                    <a href="updatedatavaksin.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a>
                                    <?php echo " "; ?>
                                    <a onclick="return confirm('Yakin ?')" href="deletetransaksi.php?idt=<?php echo $trans['id_transaksi']; ?>">DELETE</a>
                                    <?php
                                }
                            }
                            else if(!is_null($hasil['id_usia']))
                            {                         
                                $tgl = $hasilpasien['tgl_lahir'];
                                echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['usia_pemberian']*30 .' days'));
                                echo "<br>";
                                ?>
                                <a href="editdata.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a> </br><?php
                            }
                        ?></td>
                        <td><?php 
                            $pasien = mysqli_query($conn, "SELECT tgl_lahir FROM pasien WHERE username = 'z'");
                            $hasilpasien = mysqli_fetch_array($pasien);
                            $ambilulang = mysqli_query($conn, "SELECT id_usia, usia_pemberian, no_urut, jarak FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '2'");
                            $ambilusia3 = mysqli_query($conn, "SELECT t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '3')");
                            $ambilusia = mysqli_query($conn, "SELECT t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '1')");
                            $ambilusia2 = mysqli_query($conn, "SELECT t.id_transaksi, t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '2')");
                            $trans = mysqli_fetch_array($ambilusia);
                            $trans2 = mysqli_fetch_array($ambilusia2);
                            $hasil=mysqli_fetch_array($ambilulang);
                            $hasil3=mysqli_fetch_array($ambilusia3);
                            if($trans2['tgl_transaksi'] != '')
                            {
                                echo $trans2['tgl_transaksi'];
                                echo "<br>";
                                echo $trans2['nama_rumahsakit'];
                                if(is_null($hasil3['tgl_transaksi']))
                                {
                                    ?>
                                    <a href="updatedatavaksin.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a>
                                    <?php echo " "; ?>
                                    <a onclick="return confirm('Yakin ?')" href="deletetransaksi.php?idt=<?php echo $trans2['id_transaksi']; ?>">DELETE</a>
                                    <?php
                                }
                            }
                            else if(!is_null($hasil['id_usia']))
                            {
                                if($trans['tgl_transaksi'] != '')
                                {
                                    $tgl = $trans['tgl_transaksi'];
                                    echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['jarak']*30 .' days'));
                                    echo "<br>";
                                    ?>
                                    <a href="editdata.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a> </br>
                                    <?php
                                }
                                else
                                {
                                    $tgl = $hasilpasien['tgl_lahir'];
                                    echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['usia_pemberian']*30 .' days'));
                                    echo "<br>";
                                    ?>
                                    <!-- <a href="editdata.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a> </br> -->
                                    <?php
                                }
                            }
                        ?></td>
                        <td><?php 
                            $pasien = mysqli_query($conn, "SELECT tgl_lahir FROM pasien WHERE username = 'z'");
                            $hasilpasien = mysqli_fetch_array($pasien);
                            $ambilulang = mysqli_query($conn, "SELECT id_usia, usia_pemberian, no_urut, jarak FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '3'");
                            $ambilulang2 = mysqli_query($conn, "SELECT usia_pemberian, no_urut, jarak FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '2'");
                            $ambilusia3 = mysqli_query($conn, "SELECT t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '3')");
                            $ambilusia2 = mysqli_query($conn, "SELECT t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '2')");
                            $ambilusia = mysqli_query($conn, "SELECT t.tgl_transaksi, rs.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit rs ON rs.id_rumahsakit = t.id_rumahsakit WHERE t.username = 'z' AND t.id_usia = (SELECT id_usia FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."' AND no_urut = '1')");
                            $trans = mysqli_fetch_array($ambilusia);
                            $trans3 = mysqli_fetch_array($ambilusia3);
                            $trans2 = mysqli_fetch_array($ambilusia2);
                            $hasil=mysqli_fetch_array($ambilulang);
                            $hasil2=mysqli_fetch_array($ambilulang2);
                            if($trans3['tgl_transaksi'] != '')
                            {
                                echo $trans3['tgl_transaksi'];
                                echo "<br>";
                                echo $trans3['nama_rumahsakit'];
                                ?>
                                <a href="updatedatavaksin.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a> </br><?php
                            }
                            else if(!is_null($hasil['id_usia']))
                            {
                                if($trans2['tgl_transaksi'] != '')
                                {
                                    $tgl = $trans2['tgl_transaksi'];
                                    echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['jarak']*30 .' days'));
                                    echo "<br>";
                                    ?>
                                    <a href="editdata.php?idv=<?php echo ($hasil['id_usia']); ?>">UPDATE</a> </br><?php
                                }
                                else
                                {
                                    if($trans['tgl_transaksi'] != '')
                                    {
                                        $tgl = $trans['tgl_transaksi'];
                                        $tgl2 = date('Y-m-d', strtotime($tgl. ' + '.$hasil2['jarak']*30 .' days'));
                                    }
                                    else
                                    {
                                        $tgl = $hasilpasien['tgl_lahir'];
                                        $tgl2 = date('Y-m-d', strtotime($tgl. ' + '.$hasil2['usia_pemberian']*30 .' days'));
                                    }
                                    echo date('Y-m-d', strtotime($tgl2. ' + '.$hasil['jarak']*30 .' days'));
                                    echo "<br>";
                                }

                            }
                        ?></td>
                        <!-- <td><?php echo $row['jarak']; ?></td> -->
                    
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