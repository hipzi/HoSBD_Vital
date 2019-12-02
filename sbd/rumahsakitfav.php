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
                <a class="d active" href="pilihrekomendasi.php">REKOMENDASI RS</a>
                <a class="e" href="update.php">PROFILE</a>
                <!-- <a class="f" href="update.php">REALISASI VAKSIN</a> -->
        </div>
        
        <div class="table">
            <table>
                <tr>
                    <td>
                        <?php
                        $vaksin = mysqli_query($conn, "SELECT id_vaksin, nama_vaksin FROM vaksin"); 
                        ?>
                        <p> Vaksin: </p>
                        <form id="changevaksin" name="changevaksin" action="rumahsakitfav.php" method="POST">
                            <select id = "cbvaksin" name="cbvaksin" onchange="myFunction()">
                            <option>Pilih</option>
                            <option value="all">Semua Vaksin</option>
                            <?php
                            while($hv=mysqli_fetch_array($vaksin))
                            {
                                ?>
                                <option value="<?php echo $hv['id_vaksin'] ?>"><?php echo $hv['nama_vaksin'] ?></option>
                                <?php
                            }
                            ?>
                            </select>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Rumah Sakit</th>
                    <th>Frekuensi Dikunjungi</th>
                </tr>
                <?php
                    $no = 1; 
                    // echo $_POST["sorting"];
                    if (isset($_POST["cbvaksin"]) && $_POST["cbvaksin"] != "all") {
                        $nama = mysqli_query($conn, "SELECT id_vaksin, nama_vaksin FROM vaksin WHERE id_vaksin = '".$_POST["cbvaksin"]."'"); 
                        $ambil = mysqli_fetch_array($nama);
                        echo $ambil['nama_vaksin'];
                        $qry = mysqli_query($conn, "SELECT COUNT(t.id_transaksi) as jumlah, r.nama_rumahsakit, u.id_vaksin FROM transaksi t, rumahsakit r, usiapemberian u WHERE t.id_rumahsakit = r.id_rumahsakit AND t.id_usia = u.id_usia GROUP BY r.id_rumahsakit, u.id_vaksin HAVING u.id_vaksin = '".$_POST["cbvaksin"]."' ORDER BY COUNT(t.id_transaksi) DESC");
                    } else {
                        echo "Semua Vaksin";
                        $qry = mysqli_query($conn, "SELECT count(t.id_transaksi) as jumlah, r.nama_rumahsakit FROM transaksi t INNER JOIN rumahsakit r ON t.id_rumahsakit = r.id_rumahsakit GROUP BY t.id_rumahsakit ORDER BY count(t.id_transaksi) DESC");
                    }
                    while($row=mysqli_fetch_array($qry)){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_rumahsakit']; ?></td>
                        <td><?php echo $row['jumlah']; ?></td>
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