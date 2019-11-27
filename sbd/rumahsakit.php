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
    </script>

    <body>
        <div class="background">

        <div class="nav">
                <a class="a" href="logout.php">LOGOUT</a>
                <a class="b" href="user.php">JADWAL VAKSIN</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d active" href="rumahsakit.php">REKOMENDASI RS</a>
                <a class="e" href="test.php">TEST</a>
        </div>
        
        <div class="table">
            <table>
                <tr>
                    <td>
                        <?php
                        $vaksin = mysqli_query($conn, "SELECT id_vaksin, nama_vaksin FROM vaksin"); 
                        ?>
                        <form id="changevaksin" name="changevaksin" action="rumahsakit.php" method="POST">
                            <select id = "cbvaksin" name="cbvaksin" onchange="myFunction()">
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
                    <td>
                        <select name = "sorting">
                            <option value = "ASC">Termurah</option>
                            <option value = "DESC">Termahal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Rumah Sakit</th>
                    <th>Vaksin</th>
                    <th>Biaya</th>
                    <!-- <th>Jarak</th> -->
                </tr>
                <?php
                    $no = 1; 
                    if (isset($_POST["cbvaksin"])) {
                        $qry = mysqli_query($conn, "SELECT rs.id_rumahsakit, rs.nama_rumahsakit, v.nama_vaksin, d.biaya FROM rumahsakit rs INNER JOIN detil_rumahsakit d ON rs.id_rumahsakit = d.id_rumahsakit INNER JOIN vaksin v ON d.id_vaksin = v.id_vaksin WHERE v.id_vaksin = '".$_POST["cbvaksin"]."'");
                    } else {
                        $qry = mysqli_query($conn, "SELECT rs.id_rumahsakit, rs.nama_rumahsakit, v.nama_vaksin, d.biaya FROM rumahsakit rs, detil_rumahsakit d, vaksin v WHERE rs.id_rumahsakit = d.id_rumahsakit AND d.id_vaksin = v.id_vaksin");
                    }
                    while($row=mysqli_fetch_array($qry)){
                ?>
    
            <!-- <div class="UD">
                <!-- class="f" href="update.php?id=<?php echo $row['id']; ?>">UPDATE</! -->
                <!-- <a class="f" onclick="return confirm('Yakin ?')" href="delete.php?id=<?php echo $row['id']; ?>">DELETE</!-->
            <!-- </div> -->

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_rumahsakit']; ?></td>
                        <td><?php 
                            // $ambilulang = mysqli_query($conn, "SELECT v.nama_vaksin, d.biaya FROM rumahsakit rs, detil_rumahsakit d, vaksin v WHERE rs.id_rumahsakit = d.id_rumahsakit AND d.id_vaksin = v.id_vaksin AND rs.id_rumahsakit = '".$row['id_rumahsakit']."'");
                            // while($hasil=mysqli_fetch_array($ambilulang))                            
                            // {
                                echo $row['nama_vaksin'];
                            // }   
                        ?></td>
                        <td><?php 
                            // $ambilulang = mysqli_query($conn, "SELECT v.nama_vaksin, d.biaya FROM rumahsakit rs, detil_rumahsakit d, vaksin v WHERE rs.id_rumahsakit = d.id_rumahsakit AND d.id_vaksin = v.id_vaksin AND rs.id_rumahsakit = '".$row['id_rumahsakit']."'");
                            // while($hasil=mysqli_fetch_array($ambilulang))                            
                            // {
                                echo $row['biaya'];
                            // }
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