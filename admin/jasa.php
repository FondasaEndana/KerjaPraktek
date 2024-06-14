<?php
require "session.php";
require "../koneksi.php";

$queryJasa = mysqli_query($conn, "SELECT * FROM jasa");
$queryNotaServis = mysqli_query($conn, "SELECT * FROM nota_servis");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="styleAdmin.css">
    <title>Jasa | Admin</title>
</head>

<body>
    <?php
    require "navbar.php";
    ?>
    <div class="d-flex">
        <?php
        require "sidebar.php";
        ?>

        <div class="container mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="index.php" class="text-muted text-decoration-none">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-hands-helping"></i> Jasa
                    </li>
                </ol>
            </nav>

            <!-- Tampilkan Nota Servis -->
            <div class="row justify-content-between mt-4">
                <div class="col-md-6">
                    <h2 class="mb-3">Jasa Servis Komputer</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kerusakan</th>
                                    <th>Tanggal Servis</th>
                                    <th>Total Biaya</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider table-divider-color">
                                <?php
                                $jumlah = 1;
                                while ($data = mysqli_fetch_array($queryNotaServis)) {
                                ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama_servis']; ?></td>
                                        <td><?php echo $data['servis']; ?></td>
                                        <td><?php echo $data['tanggal_servis']; ?></td>
                                        <td><?php echo $data['total_biaya']; ?></td>
                                        <td>
                                            <a href="detail_nota.php?id=<?php echo $data['id']; ?>" class="btn btn-info">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $jumlah++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="tambah_jasaServis.php" class="btn btn-success mb-3">
                            <i class="fas fa-plus fa-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Jasa Instalasi</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Instalasi</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider table-divider-color">
                                <?php
                                $jumlah = 1;
                                while ($data = mysqli_fetch_array($queryJasa)) {
                                ?>
                                    <tr>
                                        <td><?php echo $jumlah; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['instalasi']; ?></td>
                                        <td><?php echo $data['alamat']; ?></td>
                                        <td>
                                            <a href="detail_jasa_instalasi.php?id=<?php echo $data['id_jasa']; ?>" class="btn btn-info">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $jumlah++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="tambah_jasa.php" class="btn btn-success mb-3">
                            <i class="fas fa-plus fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>