<?php
require "session.php";
require "../koneksi.php";

$queryNotaServis = mysqli_query($conn, "SELECT * FROM nota_servis");
$data = mysqli_fetch_array($queryNotaServis);

$jenis_barang_options = array(
    1 => "Laptop",
    2 => "CPU",
    3 => "LCD Monitor"
);

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="styleAdmin.css">
    <title>Tambah Nota</title>
    <style>
        .loading-spinner,
        .checkmark {
            width: 50px;
            height: 50px;
            margin: auto;
        }

        .loading-spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #22bb33;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .checkmark {
            display: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            stroke-width: 2;
            stroke: #4CAF50;
            stroke-miterlimit: 10;
            margin: auto;
            box-shadow: inset 0px 0px 0px #4CAF50;
            animation: scale .3s ease-in-out .9s both;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #4CAF50;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.6s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #4CAF50;
            }
        }
    </style>
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <div class="container mt-3">
        <h2>Tambah Servis Komputer</h2>

        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data" id="formSubmit">
                <div>
                    <label for="nama" class="mt-1 "> Nama </label>
                    <input type="text" id="nama" name="nama" class="form-control mt-1" autocomplete="off" required>
                </div>

                <div>
                    <label for="nomor" class="mt-1 "> Nomor </label>
                    <input type="number" id="nomor" name="nomor" class="form-control mt-1">
                </div>

                <div>
                    <label for="kerusakan" class="mt-1 "> Kerusakan </label>
                    <input type="text" name="kerusakan" id="kerusakan" class="form-control mt-1">
                </div>

                <div>
                    <label for="merk" class="mt-1 "> Merk </label>
                    <input type="text" id="merk" name="merk" class="form-control mt-1">
                </div>

                <div>
                    <label for="serial_number" class="mt-1 "> S/N </label>
                    <input type="text" name="sn" id="serial_number" class="form-control">
                </div>

                <div>
                    <label for="harga" class="mt-1 "> Biaya </label>
                    <input type="number" class="form-control" name="harga" required>
                </div>

                <div>
                    <div>
                        <label for="tanggal_servis" class="mt-1 mb-2 "> Tanggal Servis </label>
                        <input type="datetime-local" id="tanggal_servis" name="tanggal_servis" class="form-control" required>
                    </div>
                </div>

                <div>
                    <label for="tanggal_keluar" class="mt-1 "> Tanggal Keluar </label>
                    <input type="datetime-local" id="tanggal_keluar" name="tanggal_keluar" class="form-control" required>
                </div>

                <div>
                    <label for="jenis_barang"> Jenis Barang </label>
                    <select class="form-select" name="jenis_barang" aria-label="Default select example">
                        <option selected> </option>
                        <?php
                        foreach ($jenis_barang_options as $key => $value) {
                            $selected = ($key == $data['jenis_barang']) ? 'selected' : '';
                            echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="keterangan" class="mt-1 "> Keterangan </label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-outline-primary" name="simpan">Simpan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan'])) {
                // Ambil nilai dari form
                $nama_servis = htmlspecialchars($_POST['nama']);
                $nomor = htmlspecialchars($_POST['nomor']);
                $total_biaya = htmlspecialchars($_POST['harga']);
                $kerusakan = htmlspecialchars($_POST['kerusakan']);
                $tanggal_servis = htmlspecialchars($_POST['tanggal_servis']);
                $tanggal_keluar = htmlspecialchars($_POST['tanggal_keluar']);
                $merk = htmlspecialchars($_POST['merk']);
                $serial_number = htmlspecialchars($_POST['sn']);
                $jenis_barang = htmlspecialchars($_POST['jenis_barang']);
                $keterangan = htmlspecialchars($_POST['keterangan']);

                // Insert into nota_servis table
                $queryInsertNota = mysqli_query($conn, "INSERT INTO nota_servis 
                                    (nama_servis, nomor, total_biaya, servis, tanggal_servis, tanggal_keluar, merk, serial_number, jenis_barang, keterangan) 
                                    VALUES 
                                    ('$nama_servis', '$nomor', '$total_biaya', '$kerusakan', '$tanggal_servis', '$tanggal_keluar', '$merk', '$serial_number', '$jenis_barang', '$keterangan')");

                if ($queryInsertNota) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
                                keyboard: false
                            });
                            myModal.show();

                            // Show loading animation
                            document.getElementById('loading').style.display = 'block';

                            setTimeout(function() {
                                // Hide loading animation and show checkmark
                                document.getElementById('loading').style.display = 'none';
                                document.getElementById('checkmark').style.display = 'block';
                            }, 2000); // Change to the duration you want
                        });
                    </script>";
                } else {
                    // Jika query gagal, tampilkan pesan kesalahan
                    echo '<div class="alert alert-danger" role="alert">Gagal menambahkan data penjualan!</div>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div id="loading" class="loading-spinner"></div>
                    <svg id="checkmark" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14 27l10 10 14-14" />
                    </svg>
                    <h5 class="mt-3">Data Nota Servis telah Ditambahkan</h5>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='nota.php';">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>