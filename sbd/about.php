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
                <a class="b" href="#">REGISTER</a>
                <a class="c" href="home.php">HOME</a>
                <a class="d active" href="about.php">ABOUT AJK</a>
                <a class="e" href="user.php">USER</a>
            </div>

            <div class="about">
                <h5>AJK</h5>

                <h3>Apa itu AJK?</h3>
                <p>     AJK merupakan singkatan dari Arsitektur dan Jaringan Komputer merupakan salah satu bidang minat di Informatika ITS 
                    yang menawarkan bidang keahlian dimana akan ditekankan pada Kemampuan lulusan dalam membangun berbagai macam arsitektur 
                    jaringan sesuai standar teknologi terkini dan menerapkan keamanan jaringan. 
                </p>
                <p>     
                    Lab AJK bertempat di ruang IF-307.Lab tersebut mempunyai Kepala Lab,  yang bernama Pak Husni serta terdapat delapan belas admin.
                </p>

                <h3>DOSEN RMK AJK</h3>
                <p>- Ir. Muchammad Husni, M.Kom. Ketua RMK. Inisial, MH</p>
                <p>- Prof.Ir. Supeno Djanali, M.Sc Ph.D. Inisial, SD</p>
                <p>- Henning Titi Ciptaningtyas, S.Kom, M.Kom. Inisial, HC</p>
                <p>- Wahyu Suadi, S.Kom, M.Kom. Inisial, WS</p>
                <p>- Dr. Radityo Anggoro , S.Kom, M.Sc. Inisial, RA</p>
                <p>- Royyana Muslim Ijtihadie, S.Kom.,M.Kom., Ph.D. Inisial, RM</p>

                <h3>RUMPUN MATA KULIAH</h3>
                <h2>SISTEM DIGITAL</h2>
                <p>     Mata kuliah ini menjelaskan berbagai macam sistem bilangan, menentukan fungsi Boolean dari suatu sistem digital dan melakukan penyederhanaan
                    menggunakan beberapa metode. Mata kuliah ini juga menjelaskan fungsi dan karakteristik berbagai komponen sistem digital dan menjelaskan proses analisis dan perancangan sistem digital baik berupa rangkaian kombinasional maupun sekuensial.
                </p>
                <h2>ORGANISASI KOMPUTER</h2>
                <p>     Mata kuliah ini menjelaskan dasar kerja komputer dan komponen pembentuknya serta urutan untuk mengeksekusi suatu instruksi. 
                    Juga menjelaskan organisasi dan fungsi setiap komponen pembentuk computer serta menjelaskan konsep pipelining sebagai salah satu cara untuk pemrosesan secara paralel.
                </p>
                <h2>SISTEM OPERASI</h2>
                <p>     Melalui mata kuliah ini, mahasiswa akan belajar mengenai konsep dasar-dasar sistem operasi dan mempraktekkannya. Perkuliahan dilakukan di kelas dan praktik dilakukan di kelas maupun di laboratorium. 
                    Mahasiswa akan belajar tentang konsep sistem operasi beserta manajemen dan strukturnya. Intinya bagaimana PC menjalankan perintah.  
                </p>
                <h2>JARINGAN KOMPUTER</h2>
                <p>     Mahasiswa belajar mengenai cara komunikasi antar komputer. Bagaimana data bisa terkirim dari satu komputer ke komputer lain berdasarkan konsep OS
                    Layer. Satu layer diatas sisop, basicnya sama seperti sisop, lebih banyak terjun ke jaringan.   
                </p>
                <h2>JARINGAN NIRKABEL</h2>
                <p>     Mirip Jaringan Komputer, tetapi lebih focus ke permasalahan jaringan nirkabel.   
                </p>
                <h2>TEKNOLOGI ANTAR JARINGAN</h2>
                <p>     Mirip jaringan komputer, tetapi lebih membahas subnating dan rooting.  
                </p>
                <h2>PERANCANGAN DAN KEAMANAN SISTEM DAN JARINGAN</h2>
                <p>     Mahasiswa belajar berbagai hal lebih lanjut mengenai keamanan aplikasi, software berbahaya, analisis software berbahaya, dan keamanan jaringan.
                </p>

                <h3>RATA-RATA TUGAS</h3>
                <p>- Merancang dan mengimplementasikan jaringan  komputer dan informasi, seperti LAN, WAN, intranet, extranet,</p><p>dan data jaringan komunikasi lainnya.</p>
                <p>- Melakukan pemodelan jaringan, analisa, dan perencanaan Mendesain jaringan dan langkah-langkah </p><p>keamanan komputer</p>
                <p>- Melakukan penelitian dan merekomendasikan jaringan hardware, data komunikasi dan perangkat lunak</p><p> membantu efisiensi dan efektifitas jaringan Internet dalam sebuah perusahaan/organisasi.</p>
                <p>- Menyesuaikan ukuran jaringan untuk memenuhi volume atau kapasitas</p>
                <p>- Berkomunikasi dengan pelanggan, departemen-departemen terkait untuk menentukan kebutuhan pelanggan</p>

                <h3>PROSPEK KERJA</h3>
                <p>- DevOps</p>
                <p>- System Engineer</p>
                <p>- System Administrator</p>
                <p>- Network Architect</p>
                <p>- Security Specialist</p>
                <p>- Network Analyst</p>
                <p>- Network Consultant</p>
                <p>- Network Manager</p>
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