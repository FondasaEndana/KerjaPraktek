<?php

require "koneksi.php";

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nomor = htmlspecialchars($_POST['nomor']);
    $alamat = htmlspecialchars($_POST['Alamat']);
    $instalasi = htmlspecialchars($_POST['instalasi']);
    $keterangan = htmlspecialchars($_POST['keterangan']);

    $queryInsertJasa = mysqli_query($conn, "INSERT INTO jasa 
                                (nama, nomor, alamat, instalasi, keterangan) 
                                VALUES 
                                ('$nama', '$nomor', '$alamat', '$instalasi', '$keterangan')");

    if ($queryInsertJasa) {
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
        echo '<div class="alert alert-danger" role="alert">Gagal!</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Jasa Instalasi</title>
</head>
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

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-3">
        <h2>Form Jasa Instalasi</h2>
        <form action="jasa_instalasi.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label mt-2">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label mt-2">Nomor HP/WA</label>
                <input type="number" class="form-control" id="nomor" name="nomor" required>
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label mt-2">Alamat Lengkap </label>
                <input type="text" class="form-control" id="Alamat" name="Alamat" required>
            </div>
            <div class="mb-3">
                <label for="instalasi" class="form-label mt-2">Jenis Instalasi</label>
                <select class="form-control" id="instalasi" name="instalasi" required>
                    <option value="CCTV">CCTV</option>
                    <option value="Software">Software</option>
                    <option value="Hardware">Hardware</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label mt-2">Deskripsi Instalasi</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary mb-3" name="simpan">Simpan</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div id="loading" class="loading-spinner"></div>
                    <svg id="checkmark" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14 27l10 10 14-14" />
                    </svg>
                    <h5 class="mt-3">Data Telah Diproses Oleh Admin</h5>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='jasa_instalasi.php';">OK</button>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>