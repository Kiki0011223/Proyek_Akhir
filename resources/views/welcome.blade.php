<!DOCTYPE html>
<html>
    <head>
        <title>Selamat Datang</title>
    </head>
    <body class="antialiased">
        <style>
            body{
                background-image: url("/gambar/awal.gif");
                background-size: cover;
            }
    
            .tombol{
                position: absolute;
                top: 70%;
                left: 42%;
            }
    
            .tambah{
                position: absolute;
                top: 0%;
                left: 0%;
                opacity: 0;
            }
            .tambah:hover{
                opacity: 1;
                transition: all 0,5 ease;
            }
        </style>
        <?php
        header('Refresh: 6.5;url=/login');
        ?>
    </body>
</html>
