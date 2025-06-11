<?php
session_start();
include "koneksi/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Repositori</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="shortcut icon" href="img/logo.png">

  <!-- Custom CSS for better appearance -->
  <style>
    .navbar-brand {
      font-size: 1.8em;
      font-weight: bold;
    }

    .navbar-nav>li>a {
      font-size: 1.2em;
    }

    .banner-info {
      margin-top: 50px;
    }

    .banner-info h2,
    .banner-info h3 {
      font-size: 2.5em;
      font-weight: bold;
    }

    .service-title {
      font-size: 2.2em;
      font-weight: bold;
    }

    .sub-title {
      font-size: 1.5em;
      color: #555;
    }

    .x_content {
      background: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .x_title h2 {
      font-size: 1.8em;
      font-weight: bold;
    }

    .x_title {
      border-bottom: 2px solid #ddd;
      margin-bottom: 20px;
    }

    .x_content ul {
      list-style-type: none;
      padding: 0;
    }

    .x_content ul li {
      font-size: 1.2em;
      margin-bottom: 10px;
    }

    footer {
      background: #333;
      color: #fff;
      padding: 20px 0;
    }

    footer p {
      margin: 0;
    }

    footer .credits a {
      color: #fff;
    }

    .btn-back {
      position: absolute;
      bottom: 20px;
      right: 20px;
    }
  </style>
</head>

<body>

  <div class="loader"></div>
  <div id="myDiv" class="document-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h5 class="service-title pad-bt10">Detail Dokumen</h5>
          <p class="sub-title pad-bt10">"Informasi lengkap dokumen"</p>
          <hr class="bottom-line">
          <div class="x_content">
            <?php
            include 'koneksi/koneksi.php';
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $sqlDetail = "SELECT * FROM tb_repo WHERE id = '$id'";
              $resultDetail = mysqli_query($db, $sqlDetail);
              if (mysqli_num_rows($resultDetail) > 0) {
                $dataDetail = mysqli_fetch_assoc($resultDetail);
                echo '<h4 class="document-name" style="text-align: left;"><strong>' . $dataDetail['namadokumen'] . '</strong></h4>';
                echo '<div style="text-align: left; float: left; margin-right: 20px;">';
                echo '<img src="admin/images/' . $dataDetail['gambar'] . '" alt="Gambar Dokumen" style="max-width: 400px; max-height: 500px;"/>';
                echo '</div>';
                echo '<p style="text-align: left;"><strong>Keterangan:</strong></p>';
                echo '<p style="text-align: left;">' . $dataDetail['keterangan'] . '</p>';
                echo '<p style="text-align: left;"><strong>Tanggal:</strong></p>';
                echo '<p style="text-align: left;">' . $dataDetail['tanggal'] . '</p>';
                echo '<p style="text-align: left;"><strong>Jenis Dokumen:</strong></p>';
                echo '<p style="text-align: left;">' . $dataDetail['jenisdokumen'] . '</p>';
                echo '<p style="text-align: left;"><strong>IKU:</strong></p>';
                echo '<p style="text-align: left;">' . $dataDetail['iku'] . '</p>';
                echo '<p style="text-align: left;"><strong>Tipe:</strong></p>';
                echo '<p style="text-align: left;">' . $dataDetail['tipe'] . '</p>';
                echo '<p style="text-align: left;"><strong>File:</strong></p>';
                echo '<p style="text-align: left;"><a href="admin/surat_masuk/' . $dataDetail['filedata'] . '" target="_blank">📥 Unduh File</a></p>';
              } else {
                echo '<p class="alert alert-danger" style="text-align: left;">Dokumen tidak ditemukan.</p>';
              }
            } else {
              echo '<p class="alert alert-warning" style="text-align: left;">ID dokumen tidak diberikan.</p>';
            }
            ?>
            <button onclick="window.location.href='konten.php'" class="btn btn-primary btn-back">Kembali</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer id="footer" style="position: relative; bottom: 0; width: 100%;">
    <div class="container">
      <div class="row text-center">
        <p>&copy; TEKNIK INFORMATIKA </p>
        <div class="credits">

        </div>
      </div>
    </div>
  </footer>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>