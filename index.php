<?php
session_start();
include "koneksi/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Repository</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="shortcut icon" href="img/logo.png">

</head>

<body>

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">REPOSITORY <span class="logo-dec">DOCUMENT</span></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#main-header">Beranda</a></li>
                  <li class=""><a href="#feature">Tentang</a></li>
                  <li class=""><a href="konten.php">Repository</a></li>
                  <li class=""><a href="admin/login/index.php">Masuk</a></li>

                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <h2 class="bnr-sub-title"></h2>
                <div class="logo">
                  <img src="img/logo.png" alt="" width="200px" height="200px" />
                </div>
                <h3 class="bnr-sub-title">SISTEM REPOSITORY DOCUMENT INDIKATOR KINERJA UTAMA</h3>
                <h3 class="bnr-sub-title"><span class="logo-dec">TEKNIK INFORMATIKA UNIMA</span></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <section id="feature" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Latar Belakang dan tujuan IKU</h2>
            <div class="col-md-4 text-left">
              <div class="text-left" style="display: flex; align-items: center;">
                <div class="item-img text-left" style="margin-right: 10px;">
                  <img src="img/Logo1.png" alt="Konsep IKU sebagai alat ukur">
                </div>
                <h4>Konsep IKU sebagai alat ukur</h4>
              </div>
              <br>
              <div class="text-left" style="display: flex; align-items: center;">
                <div class="item-img text-left" style="margin-right: 10px;">
                  <img src="img/Logo2.png" alt="Konsep IKU sebagai alat ukur">
                </div>
                <h4>Optimalisasi IKU dengan mengakomodir umpan balik</h4>
              </div>
              <div class="text-left" style="display: flex; align-items: center;">
                <div class="item-img text-left" style="margin-right: 10px;">
                  <img src="img/Logo3.png" alt="Konsep IKU sebagai alat ukur">
                </div>
                <h4>IKU dengan formula baru yang relevan untuk diimpl</h4>
              </div>
            </div>
            <div class="col-md-8">
              <p class="sub-title pad-bt15" style="text-align: justify; font-size: 1em;">Dalam rangka mewujudkan cita-cita pendidikan tinggi harus dilaksanakan prubahan dalam penilaian performa PTN yang akan dinilai berdasarkan IKU yang menjadi kontrak kinerja antara PTN dan kemdikbudristek. IKU harus mampu menjadi alat ukur sekaligus akselerator untuk pengembang kebijakan serta penjaminan mutu PTN</p>
              <p class="sub-title pad-bt15" style="text-align: justify; font-size: 1em;">Kemendikbudristek telah mengumpulkan umpan balik dari perguruan tinggi untuk merumuskan usulan revisi kepmen IKU termaksut melakukan evaluasi general terhadap IKU (kesesuaian indikator dan formula, pengalaman pelaksanaan) untuk merumuskan metode yang optimal untuk membantu mendorong ketercapaian IKU ke depan</p>
              <p class="sub-title pad-bt15" style="text-align: justify; font-size: 1em;">Telah disusun indikator dan formulah baru yang mengakomodir umpan balik untuk masing-masing IKU PT serta skema insentif BOPTN berbasis IKU yang diberikan kepada PTN, dan dituangkan dalam draf kepmen baru untuk menggantikan kepmen 3/M/2021</p>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </section>
    <!---->

    <script>
      function searchTable() {
        filterTable();
      }

      function filterTable() {
        var docType, author, filter, table, tr, td, i, j, txtValue;
        docType = document.getElementById("documentTypeSelect").value.toLowerCase();
        author = document.getElementById("authorSelect").value.toLowerCase();
        table = document.getElementById("datatable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td");
          var showRow = true;

          // Get content cell text
          var content = td[1].textContent || td[1].innerText;
          content = content.toLowerCase();

          // Check document type filter
          if (docType && !content.includes(docType)) {
            showRow = false;
          }

          // Check author filter
          if (author && !content.includes(author)) {
            showRow = false;
          }

          // Show/hide row based on filters
          tr[i].style.display = showRow ? "" : "none";
        }
      }

      document.body.appendChild(document.getElementById('detailModal'));

      function changeEntries() {
        var select, value, table, tr, i;
        select = document.getElementById("entriesSelect");
        value = select.value;
        table = document.getElementById("datatable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
          if (i <= value) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    </script>
    <!---->
    <!---->
    <div class="contact" style="padding: 20px; border-radius: 10px; margin-top: -20px;">
    </div>
    <!---->
    <!---->
    <section id="testimonial" class="wow fadeInUp delay-05s">
      <div class="bg-testicolor">
        <div class="container section-padding">
          <div class="row">
            <div class="testimonial-item">
              <ul class="bxslider">
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p>Visi Misi </p>
                  </blockquote>
                  <small>Pada Tahun 2022 menjadi Program Studi penghasil tenaga ahli Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.</small>
                </li>
                <li>
                  <blockquote style="font-size: larger;">
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p>Misi:</p>
                  </blockquote>
                  <small>1. Melaksanakan dan mengembangkan pendidikan yang berkualitas untuk menghasilkan lulusan ahli Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p></p>
                  </blockquote>
                  <small>2. Melaksanakan dan mengembangkan penelitian di bidang Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/Grafikartes-Flat-Retro-Modern-Maps.ico" class="img-responsive">
                    <p></p>
                  </blockquote>
                  <small>3. Melaksanakan dan mengembangkan kegiatan pengabdian kepada masyarakat di bidang Teknik Informatika yang berkarakter, inovatif, dan unggul kompetitif.</small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!---->
    <!---->
    <!---->
    <!---->
    <footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>&copy; TEKNIK INFORMATIKA</p>
          <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Baker
            -->
            contact me <a href="https://aldipatara@gmail.com/">aldipatara@gmail</a>
          </div>
        </div>
      </div>
    </footer>
    <!---->
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>


</body>

</html>