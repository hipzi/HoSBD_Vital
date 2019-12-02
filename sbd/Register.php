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
                <a class="a" href="login.php">LOGIN</a>
                <a class="b active" href="Register.php">REGISTER</a>
                <a class="c" href="logindulu.html">HOME</a>
                <a class="d" href="logindulu.html">REKOMENDASI RS</a>
                <a class="e" href="logindulu.html">PROFILE</a>
                <!-- <a class="f" href="logindulu.html">REALISASI VAKSIN</a> -->
            </div>

                <div class="register">
                    <h5>REGISTER</h5>

                    <form action="insert.php" method="POST">
                        <b> <h1>Username</h1> </b>
                        <p> <input type="text" title="username" name="username" /> </p>
                        <b> <h1>Nama</h1> </b>
                        <p> <input type="text" title="nama" name="nama_pasien" /> </p>
                        <b> <h1>Password</h1> </b>
                        <p> <input type="Password" title="password" name="password" /> </p>
                        <b> <h1>Tanggal Lahir</h1> </b>
                        <p> <input type="date" title="tgl_lahir" name="tgl_lahir" /> </p>
                        <b> <h1>Jenis Kelamin</h1> </b>
                        <select name="jenis_kelamin">
                                <option></option>
                                <option value="l">Laki-Laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                            <b> <h1>Alamat</h1> </b>
                        <p> <input type="text" title="alamat" name="alamat" /> </p>
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