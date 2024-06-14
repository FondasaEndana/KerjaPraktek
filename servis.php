<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <title>Sahabat Teknik | Servis</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #343a40;
    }

    header.jumbotron {
        background: url('Background_image/BG_SahabatTeknik.png') no-repeat center center;
        background-size: cover;
        color: white;
        padding: 100px 0;
        box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);
    }

    header.jumbotron h1 {
        font-size: 3rem;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    header.jumbotron p {
        font-size: 1.5rem;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    h2 {
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
        margin-bottom: 20px;
        text-align: center;
        width: 100%;
    }

    h2:after {
        content: '';
        position: absolute;
        width: 50px;
        height: 4px;
        background-color: #007bff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    p {
        font-size: 1.2rem;
        line-height: 1.6;
    }

    ul {
        margin-top: 10px;
        margin-bottom: 20px;
    }

    ul li {
        font-size: 1.1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 1.1rem;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: scale(1.05);
    }

    .container {
        padding: 20px 0;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }

    .card-body {
        padding: 20px;
    }
</style>

<body>
    <?php include "navbar.php"; ?>

    <header class="jumbotron text-center">
        <h1 class="display-4">Selamat Datang di Jasa Servis & Instalasi Kami</h1>
        <p class="lead">Kami menyediakan jasa servis komputer dan pemasangan CCTV terbaik untuk Anda.</p>
    </header>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 id="servis-komputer">Servis Komputer</h2>
                    </div>
                    <div class="card-body">
                        <p>Kami Menyediakan Jasa Servis Komputer Dengan Teknisi Berpengalaman dan Profesional. Layanan kami meliputi:</p>
                        <ul>
                            <li>Perbaikan Hardware dan Software</li>
                            <li>Instalasi Windows</li>
                            <li>Pemeliharaan rutin</li>
                        </ul>
                        <button class="btn btn-primary mb-3" onclick="handleButtonClick('servis-komputer', 'servisKomputer.php')">Lihat Selengkapnya</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 id="jasa_instalasi">Jasa Instalasi Hardware</h2>
                    </div>
                    <div class="card-body">
                        <p>Kami menyediakan layanan pemasangan CCTV dengan kualitas terbaik untuk keamanan Anda. Layanan kami meliputi:</p>
                        <ul>
                            <li>Survey lokasi</li>
                            <li>Pemasangan kamera CCTV</li>
                            <li>Konfigurasi dan pemeliharaan sistem</li>
                        </ul>
                        <button class="btn btn-primary mb-3" onclick="handleButtonClick('jasa_instalasi', 'jasa_instalasi.php')">Lihat Selengkapnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script>
        function handleButtonClick(sectionId, url) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
            setTimeout(() => {
                window.location.href = url;
            }, 1000);
        }
    </script>
</body>

</html>