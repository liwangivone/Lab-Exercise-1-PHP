<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP Nomor 2</title>
</head>
<body>
    <h3>Merging and Sorting Array</h3>
    
    <p>Masukkan angka ke dalam array 1:</p>
    <form method="POST">
        <input type="number" name="nums1" required>
        <button type="submit" name="add_array1">Tambah Array 1</button>
    </form>

    <p>Masukkan angka ke dalam array 2:</p>
    <form method="POST">
        <input type="number" name="nums2" required>
        <button type="submit" name="add_array2">Tambah Array 2</button>
    </form>

    <?php
    // Memulai session untuk menyimpan input user sementara
    session_start();

    // Inisialisasi array jika belum ada
    if (!isset($_SESSION['array1'])) {
        $_SESSION['array1'] = [];
    }
    if (!isset($_SESSION['array2'])) {
        $_SESSION['array2'] = [];
    }

    // Proses menambah angka ke array1
    if (isset($_POST['add_array1'])) {
        $num1 = $_POST['nums1'];
        $_SESSION['array1'][] = $num1;
    }

    // Proses menambah angka ke array2
    if (isset($_POST['add_array2'])) {
        $num2 = $_POST['nums2'];
        $_SESSION['array2'][] = $num2;
    }

    // Menampilkan array 1
    if (!empty($_SESSION['array1'])) {
        echo "<p>Array 1: " . implode(", ", $_SESSION['array1']) . "</p>";
    }

    // Menampilkan array 2
    if (!empty($_SESSION['array2'])) {
        echo "<p>Array 2: " . implode(", ", $_SESSION['array2']) . "</p>";
    }
    ?>

    <form method="POST">
        <p>Masukkan nilai m:</p>
        <input type="number" name="m" required>

        <p>Masukkan nilai n:</p>
        <input type="number" name="n" required>

        <br><br>
        <button type="submit" name="merge_sort">Sort & Merge</button>
    </form>

    <?php
    // Proses merge dan sort array
    if (isset($_POST['merge_sort'])) {
        $m = $_POST['m'];
        $n = $_POST['n'];

        // Validasi apakah nilai m dan n tidak melebihi panjang array
        if ($m > count($_SESSION['array1']) || $n > count($_SESSION['array2'])) {
            echo "<p>Error: Nilai m atau n melebihi panjang array yang tersedia.</p>";
        } else {
            // Mengambil m elemen dari array1 dan n elemen dari array2
            $subset1 = array_slice($_SESSION['array1'], 0, $m);
            $subset2 = array_slice($_SESSION['array2'], 0, $n);

            // Menggabungkan kedua subset dan mengurutkannya
            $merged_array = array_merge($subset1, $subset2);
            sort($merged_array);

            // Menampilkan hasil array yang sudah di-merge dan di-sort
            echo "<p>Hasil Merge dan Sort: " . implode(", ", $merged_array) . "</p>";
        }

        // Menghapus session setelah proses selesai
        session_destroy();
    }
    ?>
</body>
</html>
