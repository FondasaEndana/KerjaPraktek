<?php
require "session.php";
require "../koneksi.php";

// Get ID from URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: nota.php");
    exit();
}

$queryNotaSparepart = mysqli_query($conn, "SELECT * FROM nota_sparepart WHERE id = '$id'");
$data = mysqli_fetch_array($queryNotaSparepart);

if (!$data) {
    header("Location: nota.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Sparepart</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        @media print {
            #printButton {
                display: none;
            }

            .nota-container {
                width: 100%;
                margin: 0;
                border: none;
                padding: 0;
            }

            .nota-header img {
                width: 80px;
                height: auto;
                float: left;
                margin-right: 10px;
            }

            .nota-details,
            .nota-footer {
                margin-bottom: 20px;
            }
        }

        .nota-container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            width: 70%;
            font-family: Arial, sans-serif;
        }

        .nota-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .nota-header h1 {
            margin: 0;
        }

        .nota-details table,
        .nota-footer table {
            width: 100%;
        }

        .nota-details th,
        .nota-footer th,
        .nota-details td,
        .nota-footer td {
            padding: 8px;
            text-align: left;
        }

        .nota-footer th,
        .nota-footer td {
            border-top: 1px solid #ccc;
        }

        .nota-signatures {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .signature {
            text-align: center;
            width: 45%;
        }

        .signature p {
            margin-top: 60px;
            border-top: 1px solid #000;
        }

        .text-center {
            text-align: center;
        }

        .mt-3 {
            margin-top: 20px;
        }

        #printButton {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="nota-container">
        <div class="nota-header">
            <img src="originalSatnikk.png" alt="CV Satnik Solutions Logo" style="width: 80px; height: auto; float: left; margin-right: 4px;">
            <h1>CV SATNIK SOLUTIONS</h1>
            <h2>SAHABAT TEKNIK</h2>
            <p>Jl. Raya Boteng No.09, Prambon, Boboh, Kec. Menganti, Kabupaten Gresik, Jawa Timur 61174</p>
            <p><?php echo date('d M Y', strtotime($data['tanggal'])); ?></p>
        </div>
        <div class="nota-details">
            <table>
                <tr>
                    <th>Nama Sparepart:</th>
                    <td><?php echo $data['nama_sparepart']; ?></td>
                </tr>
                <tr>
                    <th>Merk:</th>
                    <td><?php echo $data['merk']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Sparepart:</th>
                    <td><?php echo $data['jumlah_sparepart']; ?></td>
                </tr>
                <tr>
                    <th>Serial Number:</th>
                    <td><?php echo $data['serial_number']; ?></td>
                </tr>
                <tr>
                    <th>Total Biaya:</th>
                    <td>Rp.<?php echo number_format($data['total_biaya'], 0, ',', '.'); ?></td>
                </tr>
            </table>
        </div>
        <div class="nota-footer">
            <table>
                <tr>
                    <th>Tanggal:</th>
                    <td><?php echo date('d M Y H:i', strtotime($data['tanggal'])); ?></td>
                </tr>
                <tr>
                    <th>Keterangan:</th>
                    <td><?php echo $data['keterangan']; ?></td>
                </tr>
            </table>
        </div>

        <div class="nota-signatures">
            <div class="signature">
                <p>Customer</p>
            </div>
            <div class="signature">
                <p>CV SAHABAT TEKNIK</p>
            </div>
        </div>
        <div class="text-center mt-3">
            <button id="printButton" class="btn btn-primary" onclick="window.print()">Print</button>
        </div>
    </div>
</body>

</html>