<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP Nomor 1</title>
</head>
<body>
    <h3>Polindrome Pyramid</h3>
    <p>Masukkan sebuah angka dari 1-10:</p>
    <form method="POST">
        <input type="number" name="angka" min="1" max="10" required>
        <button type="submit">Buat Piramid</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka = intval($_POST["angka"]);

        if ($angka >= 1 && $angka <= 10) {
            echo "<p>Piramida polindrom untuk angka $angka:</p>";
            
            for ($i = 1; $i <= $angka; $i++) {
                //Tambahkan spasi untuk membentuk piramida
                for ($k = 1; $k <= $angka - $i; $k++) {
                    echo "&nbsp;&nbsp;";
                }
                
                // Bagian kiri (angka dari 1 sampai $i)
                for ($j = 1; $j <= $i; $j++) {
                    echo $j;
                }
                
                // Bagian kanan (angka dari $i-1 sampai 1)
                for ($j = $i - 1; $j >= 1; $j--) {
                    echo $j;
                }
                echo "<br>";
            }
        } 
    }
    ?>
</body>
</html>
