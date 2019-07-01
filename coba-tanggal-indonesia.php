<h2>Format Tanggal Indonesia PHP</h2>
<?php
        function date_indo($tanggal){ // membuat function dengan nama date_indo
                $bulan = array (
                        1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                );
                $pecahkan = explode('-', $tanggal); // memotong data tanggal dengan pemisah tanda '-'

                // variabel pecahkan 0 = tanggal
                // variabel pecahkan 1 = bulan
                // variabel pecahkan 2 = tahun

                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        echo date_indo(date('Y-m-d')); // 21 February 2018
        echo "<br/>"; // ganti baris
        echo date_indo("1945-08-17"); // Hasil 17 Agustus 1945
?>