<?php
session_start();

require "koneksi.php";

$queryServis = mysqli_query($conn, "SELECT * FROM nota_servis");
$data = mysqli_fetch_array($queryServis);

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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Formulir Servis Komputer</title>
    <style>
        .container-form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-section {
            flex: 1 1 100%;
            max-width: 100%;
        }

        .terms-section {
            flex: 1 1 100%;
            max-width: 100%;
            border-top: 1px solid #ccc;
            padding-top: 20px;
            margin-top: 20px;
            border: 2px solid #ccc;
            /* Border luar */
            border-radius: 10px;
            /* Untuk border melengkung */
            padding: 20px;
            background-color: #f9f9f9;
            /* Warna latar belakang */
            position: relative;
        }

        @media (min-width: 768px) {
            .form-section {
                flex: 1 1 60%;
                max-width: 60%;
            }

            .terms-section {
                flex: 1 1 35%;
                max-width: 35%;
                border-top: none;
                border-left: 1px solid #ccc;
                padding-left: 20px;
                margin-top: 0;
                border: 2px solid #ccc;
                /* Border luar */
                border-radius: 10px;
                /* Untuk border melengkung */
                padding: 20px;
                background-color: #f9f9f9;
                /* Warna latar belakang */
            }
        }

        .footer {
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
            position: relative;
            bottom: 0;
        }

        .terms-section p {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .terms-section h2 {
            margin-bottom: 20px;
            text-align: center;
            /* Mengatur teks heading ke tengah */
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .signature-section div {
            text-align: center;
        }

        .decorative-border {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            background-color: #f9f9f9;
            position: relative;
        }

        .decorative-border::before,
        .decorative-border::after {
            content: "";
            position: absolute;
            border: 2px solid #ccc;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            background-color: #fff;
        }

        .decorative-border::before {
            top: -10px;
            left: -10px;
        }

        .decorative-border::after {
            bottom: -10px;
            right: -10px;
        }

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
    </style>
    </style>
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-3 container-form">
        <div class="form-section">
            <h2>Formulir Servis Komputer</h2>
            <form action="" method="POST" enctype="multipart/form-data" id="formSubmit">
                <div>
                    <label for="nama" class="mt-2"><strong>Nama</strong></label>
                    <input type="text" id="nama" name="nama" class="form-control mt-1" autocomplete="off" required>
                </div>

                <div>
                    <label for="nomor" class="mt-2"><strong>Nomor HP/WA</strong></label>
                    <input type="number" id="nomor" name="nomor" class="form-control mt-1">
                </div>

                <div>
                    <label for="kerusakan" class="mt-2"><strong>Kerusakan</strong></label>
                    <input type="text" name="kerusakan" id="kerusakan" class="form-control mt-1">
                </div>

                <div>
                    <label for="merk" class="mt-2"><strong>Merk</strong></label>
                    <input type="text" id="merk" name="merk" class="form-control mt-1">
                </div>

                <div>
                    <label for="serial_number" class="mt-2"><strong>S/N</strong></label>
                    <input type="text" name="sn" id="serial_number" class="form-control">
                </div>

                <div>
                    <label for="tanggal_servis" class="mt-2 mb-2"><strong>Tanggal Servis/Hari ini</strong></label>
                    <input type="datetime-local" id="tanggal_servis" name="tanggal_servis" class="form-control" required>
                </div>

                <div>
                    <label class="mt-2" for="jenis_barang"><strong>Jenis Barang</strong></label>
                    <select class="form-select mt-1" name="jenis_barang" aria-label="Default select example">
                        <option selected></option>
                        <?php
                        foreach ($jenis_barang_options as $key => $value) {
                            $selected = ($key == $data['jenis_barang']) ? 'selected' : '';
                            echo '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label for="keterangan" class="mt-2"><strong>Keterangan</strong></label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-outline-primary mb-3" name="simpan">Simpan</button>
                </div>
            </form>
        </div>

        <div class="terms-section decorative-border">
            <h2>Syarat dan Ketentuan</h2>
            <p><strong>1.</strong> Garansi tidak berlaku untuk software dan kerusakan fisik seperti pecah, tergores, terbakar, korosi, cairan, akibat hewan dan kesalahan pemakaian serta force majeure.</p>
            <p><strong>2.</strong> Garansi tidak mencakup penggantian unit baru atau pengembalian uang.</p>
            <p><strong>3.</strong> Syarat klaim garansi wajib menyertakan kuitansi/nota pembelian serta segel tidak rusak/tidak ada tanda pembongkaran yang dilakukan tanpa sepengetahuan staf kami.</p>
            <p><strong>4.</strong> Pemeriksaan kerusakan diperkirakan dalam waktu 3 (tiga) sampai dengan 5 (lima) hari kerja.</p>
            <p><strong>5.</strong> Untuk kasus unit mati total/layar rusak tidak bisa dijamin komponen lainnya berfungsi normal. Jika ditemukan komponen lainnya sudah rusak dari sebelum datang.</p>
            <p><strong>6.</strong> Untuk kasus unit masuk terkena air, wajib melalui proses servis pembersihan dan pengeringan. Proses pengeringan dan pembersihan akan dikenakan biaya, setelah itu baru bisa dicek komponen mana saja yang rusak dan perlu diganti.</p>
            <p><strong>7.</strong> Konfirmasi biaya BACK UP DATA, PERBAIKAN dan PENGGANTIAN SPARE PART akan diinformasikan terlebih dahulu sebelum pengerjaan.</p>
            <p><strong>8.</strong> Pengambilan Unit Wajib Menyerahkan Tanda Terima Servis.</p>
            <p><strong>9.</strong> Ada beberapa kerusakan yang baru bisa diketahui setelah pengerjaan servis atau pengecekan, untuk itu kerusakan lain yang ditemukan akan dikenakan biaya tambahan dengan persetujuan pelanggan.</p>
            <p><strong>10.</strong> Apabila konfirmasi tidak dilakukan selang lebih dari 14 (empat belas) hari kerja, maka perbaikan dianggap batal.</p>
            <p><strong>11.</strong> Jika servis dibatalkan, unit yang sudah dikerjakan ada kemungkinan tidak bisa kembali seperti semula dan bisa terjadi lecet bekas pembongkaran.</p>
            <p><strong>12.</strong> Pembatalan transaksi perbaikan akan dikenakan biaya pemeriksaan.</p>
            <p><strong>13.</strong> Jika suku cadang yang dibawa oleh pelanggan sendiri maka tidak ada garansi dan jaminan akan berfungsi, kami hanya menjamin jasa pemasangan.</p>
            <p><strong>14.</strong> Jika service sudah selesai ataupun cancel, admin sudah konfirmasi ke customer, namun barang tidak diambil dalam tempo lebih dari satu bulan maka jika ada kerusakan ataupun hilang diambil alih pelanggan. Keluhan terhadap kondisi dan kelengkapan unit setelah meninggalkan gerai kami tidak dapat dilayani kembali.</p>
            <p><strong>15.</strong> Kami tidak bertanggung jawab atas unit perbaikan yang tidak diambil dalam jangka waktu 3 (tiga) bulan semenjak unit selesai diperbaiki.</p>
            <p><strong>16.</strong> Pelanggan wajib memeriksa kembali kondisi unit dan kelengkapan saat pengambilan. Keluhan terhadap kondisi dan kelengkapan unit setelah meninggalkan gerai kami tidak dapat dilayani kembali.</p>
            <p><strong>17.</strong> Lembar ini merupakan bukti pengambilan unit dan harap disimpan dengan baik. Segala resiko yang diakibatkan oleh hilangnya lembar ini adalah diluar tanggung jawab kami.</p>
            <p><strong>18.</strong> Pelanggan yang menandatangani lembar ini telah memahami dan menyetujui syarat dan ketentuan di atas.</p>
        </div>

        <?php
        if (isset($_POST['simpan'])) {
            // Ambil nilai dari form
            $nama_servis = htmlspecialchars($_POST['nama']);
            $nomor = htmlspecialchars($_POST['nomor']);
            $kerusakan = htmlspecialchars($_POST['kerusakan']);
            $tanggal_servis = htmlspecialchars($_POST['tanggal_servis']);
            $merk = htmlspecialchars($_POST['merk']);
            $serial_number = htmlspecialchars($_POST['sn']);
            $jenis_barang = htmlspecialchars($_POST['jenis_barang']);
            $keterangan = htmlspecialchars($_POST['keterangan']);

            // Insert into nota_servis table
            $queryInsertNota = mysqli_query($conn, "INSERT INTO nota_servis 
            (nama_servis, nomor, servis, tanggal_servis, merk, serial_number, jenis_barang, keterangan, tanggal_keluar, total_biaya) 
            VALUES 
            ('$nama_servis', '$nomor', '$kerusakan', '$tanggal_servis', '$merk', '$serial_number', '$jenis_barang', '$keterangan', NOW(), '')");

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
                echo '<div class="alert alert-danger" role="alert">Gagal!</div>';
            }
        }
        ?>
    </div>

    <footer class="footer">
        <?php require "footer.php"; ?>
    </footer>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div id="loading" class="loading-spinner"></div>
                    <svg id="checkmark" class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14 27l10 10 14-14" />
                    </svg>
                    <h5 class="mt-3">Data Berhasil Diproses</h5>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='servisKomputer.php';">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>