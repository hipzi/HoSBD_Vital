<?php
    include "conn.php";
    $qe = mysqli_query($conn, "SELECT * FROM pasien");
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
                <a class="d" href="rumahsakit.php">REKOMENDASI RS</a>
                <a class="e active" href="update.php">PROFILE</a>
            </div>

                <div class="update">
                    <h5>PROFILE</h5>

                    <table>
                        <tr>
                            <td>No</td>
                            <td>Username</td>
                            <td>Nama</td>
                            <td>Tanggal Lahir</td>
                            <td>Jenis Kelamin</td>
                            <td>Alamat</td>
                            <td>Opsi</td>
                        </tr>

                        <?php
                            $no = 1;
                            $qry = mysqli_query($conn, "SELECT * FROM pasien");
                            while($row=mysqli_fetch_array($qry)){
                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['nama_pasien']; ?></td>
                            <td><?php echo $row['tgl_lahir']; ?></td>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><a href="update-process.php?username=<?php echo $row['username']; ?>">UPDATE</a> 
                            <a class="f" onclick="return confirm('Yakin ?')" href="delete.php?username=<?php echo $row['username']; ?>">DELETE</a></<a>
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