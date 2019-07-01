<h2>Coba Tanggal PHP</h2>
<?php
        // Tanggal hari ini
        echo date('d F Y'); // Hasilnya tanggal hari ini (21 February 2018)
        echo "<br/>"; // ganti baris
        echo date('d F Y', strtotime('1945-08-17')); // Hasil 17 Agustus 1945
?>
