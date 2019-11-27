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
                <a class="d" href="rumahsakit.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">EDIT PROFILE</a>
        </div>

        <div class="table">
            <table>
                    <tr>
                        <th>No</th>
                        <th>Vaksin</th>
                        <!-- <th>Tanggal Lahir</th> -->
                        <th>Pemberian 1</th>
                        <th>Pemberian 2</th>
                        <th>Pemberian 3</th>
                        <!-- <th>Jarak</th> -->
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
                            $ambilulang = mysqli_query($conn, "SELECT usia_pemberian, no_urut FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."'");
                            while($hasil=mysqli_fetch_array($ambilulang))                            
                            {
                                if($hasil['no_urut'] == 1) 
                                {
                                    $tgl = $hasilpasien['tgl_lahir'];
                                    echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['usia_pemberian']*30 .' days'));
                                }
                            }
                        ?></td>
                        <td><?php 
                            $pasien = mysqli_query($conn, "SELECT tgl_lahir FROM pasien WHERE username = 'z'");
                            $hasilpasien = mysqli_fetch_array($pasien);
                            $ambilulang = mysqli_query($conn, "SELECT usia_pemberian, no_urut FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."'");
                            while($hasil=mysqli_fetch_array($ambilulang))                            
                            {
                                if($hasil['no_urut'] == 2) 
                                {
                                    $tgl = $hasilpasien['tgl_lahir'];
                                    echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['usia_pemberian']*30 .' days'));
                                }
                            }
                        ?></td>
                        <td><?php 
                            $pasien = mysqli_query($conn, "SELECT tgl_lahir FROM pasien WHERE username = 'z'");
                            $hasilpasien = mysqli_fetch_array($pasien);
                            $ambilulang = mysqli_query($conn, "SELECT usia_pemberian, no_urut FROM usiapemberian WHERE id_vaksin = '".$row['id_vaksin']."'");
                            while($hasil=mysqli_fetch_array($ambilulang))                            
                            {
                                if($hasil['no_urut'] == 3) 
                                {
                                    $tgl = $hasilpasien['tgl_lahir'];
                                    echo date('Y-m-d', strtotime($tgl. ' + '.$hasil['usia_pemberian']*30 .' days'));
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