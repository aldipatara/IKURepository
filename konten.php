<?php
include "koneksi/koneksi.php";
include "koneksi/ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Repository</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }

    h2 {
      color: #ddd;
      margin-bottom: 20px;
      text-align: center;
    }

    .dropdown-container {
      margin-bottom: 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .dropdown-toggle {
      background-color: #1e4051;
      color: white;
      border-radius: 5px;
    }

    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      display: none;
      position: absolute;
      top: 0;
      left: 100%;
      margin-top: -1px;
    }

    .dropdown-submenu:hover .dropdown-menu {
      display: block;
    }

    .table {
      background-color: white;
      border-radius: 5px;
    }

    .table th {
      background-color: #23527c;
      color: white;
    }

    .table th,
    .table td {
      padding: 10px;
    }

    .table tbody tr:hover {
      background-color: #f1f1f1;
    }

    .caret-right {
      display: inline-block;
      margin-left: 5px;
      border-top: 5px solid transparent;
      border-bottom: 5px solid transparent;
      border-left: 5px solid black;
    }

    a {
      color: #000;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .dropdown-container {
        flex-direction: column;
      }

      .dropdown-toggle {
        width: 100%;
      }

      .table th,
      .table td {
        font-size: 14px;
      }

      .table th {
        text-align: center;
      }

      .table td {
        text-align: left;
      }
    }
  </style>
</head>

<body style="margin: 0; padding: 0; width: 100%; height: 100%; overflow-x: hidden;">
  <div class="container-fluid" style="padding: 0; width: 100%; height: 100%;">
    <div style="background-image: url('img/jp.jpg'); background-size: cover; padding: 30px; width: 100%;">
      <h2>Data Repository</h2>
    </div>
    <div class="text-right mb-3" style="padding: 10px;">
      <a href="index.php" class="btn btn-secondary">
        <img src="img/home.png" alt="Logo" style="width: 50px; height: 40px; margin-right: 5px;">
        Home
      </a>
    </div>

    <!-- Dropdown Filter -->
    <div class="dropdown-container" style="padding: 10px;">
      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Jenis Dokumen
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <?php
          $sqlJenis = "SELECT DISTINCT jenisdokumen FROM tb_repo";
          $queryJenis = mysqli_query($db, $sqlJenis);
          while ($rowJenis = mysqli_fetch_array($queryJenis)) {
            $sqlAuthor = "SELECT DISTINCT author FROM tb_repo WHERE jenisdokumen = '" . $rowJenis['jenisdokumen'] . "'";
            $queryAuthor = mysqli_query($db, $sqlAuthor);

            echo '<li class="dropdown-submenu">
                    <a href="#" class="filter-link" data-jenisdokumen="' . $rowJenis['jenisdokumen'] . '" data-author="" data-tahun="">'
              . $rowJenis['jenisdokumen'] . '<span class="caret-right"></span></a>';

            if (mysqli_num_rows($queryAuthor) > 0) {
              echo '<ul class="dropdown-menu">';
              while ($rowAuthor = mysqli_fetch_array($queryAuthor)) {
                echo '<li><a href="#" class="filter-link" data-jenisdokumen="' . $rowJenis['jenisdokumen'] . '" data-author="' . $rowAuthor['author'] . '" data-tahun="">'
                  . $rowAuthor['author'] . '</a></li>';
              }
              echo '</ul>';
            }
            echo '</li>';
          }
          ?>
        </ul>
      </div>

      <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tahun
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <?php
          $sqlTahun = "SELECT DISTINCT tahun FROM tb_repo ORDER BY tahun DESC";
          $queryTahun = mysqli_query($db, $sqlTahun);
          while ($rowTahun = mysqli_fetch_array($queryTahun)) {
            echo '<li><a href="#" class="filter-year" data-tahun="' . $rowTahun['tahun'] . '">' . $rowTahun['tahun'] . '</a></li>';
          }
          ?>
        </ul>
      </div>

      <!-- Tombol Refresh -->
      <button id="refreshButton" class="btn btn-default">Refresh</button>

      <!-- Search Bar -->
      <input type="text" id="searchInput" class="form-control" placeholder="Search by title" style="width: 200px; margin-left: 10px;">
    </div>

    <!-- Tabel Konten -->
    <div id="documentTable" class="table-responsive" style="padding: 10px;">
      <?php
      $sql1 = "SELECT * FROM tb_repo ORDER BY tanggal DESC";
      $query1 = mysqli_query($db, $sql1);
      if (mysqli_num_rows($query1) == 0) {
        echo "<center><h2>Belum Ada Data Repository</h2></center>";
      } else { ?>
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th width="10%">Tanggal Masuk</th>
              <th width="80%" style="text-align: center;">Content</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($data = mysqli_fetch_array($query1)) {
              echo '<tr data-jenisdokumen="' . $data['jenisdokumen'] . '" data-author="' . $data['author'] . '" data-tahun="' . $data['tahun'] . '">
                      <td>' . $data['tanggal'] . '</td>
                      <td>
                        <a href="detail.php?id=' . $data['id'] . '"><strong>' . $data['judul'] . '</strong></a><br>
                        ' . $data['author'] . ' (' . $data['tahun'] . ')<br>
                        ' . $data['jenisdokumen'] . '<br>' . $data['keterangan'] . '
                      </td>
                    </tr>';
            }
            ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var filterLinks = document.querySelectorAll('.filter-link');
      var filterYears = document.querySelectorAll('.filter-year');
      var refreshButton = document.getElementById('refreshButton');
      var searchInput = document.getElementById('searchInput');

      var currentJenisDokumen = '';
      var currentAuthor = '';
      var currentTahun = '';

      // Event untuk jenis dokumen dan author
      filterLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          currentJenisDokumen = this.getAttribute('data-jenisdokumen') || '';
          currentAuthor = this.getAttribute('data-author') || '';
          filterAndSortTable(currentJenisDokumen, currentAuthor, currentTahun);
        });
      });

      // Event untuk tahun
      filterYears.forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          currentTahun = this.getAttribute('data-tahun') || '';
          filterAndSortTable(currentJenisDokumen, currentAuthor, currentTahun);
        });
      });

      // Event untuk tombol refresh
      refreshButton.addEventListener('click', function() {
        currentJenisDokumen = '';
        currentAuthor = '';
        currentTahun = '';
        searchInput.value = ''; // Reset search input
        filterAndSortTable(currentJenisDokumen, currentAuthor, currentTahun);
      });

      // Event untuk search input
      searchInput.addEventListener('input', function() {
        filterAndSortTable(currentJenisDokumen, currentAuthor, currentTahun);
      });

      // Fungsi filter dan sort tabel
      function filterAndSortTable(jenisdokumen, author, tahun) {
        var rows = Array.from(document.querySelectorAll('#datatable tbody tr'));
        var searchTerm = searchInput.value.toLowerCase();

        // Filter baris berdasarkan jenis dokumen, author, tahun, dan judul
        rows.forEach(function(row) {
          var rowJenisdokumen = row.getAttribute('data-jenisdokumen') || '';
          var rowAuthor = row.getAttribute('data-author') || '';
          var rowTahun = row.getAttribute('data-tahun') || '';
          var rowTitle = row.querySelector('td strong').textContent.toLowerCase();

          if (
            (jenisdokumen === '' || rowJenisdokumen === jenisdokumen) &&
            (author === '' || rowAuthor === author) &&
            (tahun === '' || rowTahun === tahun) &&
            (searchTerm === '' || rowTitle.includes(searchTerm))
          ) {
            row.style.display = ''; // Tampilkan baris jika sesuai filter
          } else {
            row.style.display = 'none'; // Sembunyikan baris jika tidak sesuai
          }
        });

        // Sortir baris berdasarkan tahun
        rows = rows.filter(row => row.style.display === ''); // Ambil hanya baris yang terlihat
        rows.sort(function(a, b) {
          var tahunA = parseInt(a.getAttribute('data-tahun') || '0', 10);
          var tahunB = parseInt(b.getAttribute('data-tahun') || '0', 10);
          return tahunB - tahunA; // Urutkan secara descending
        });

        // Perbarui tabel dengan urutan yang disortir
        var tbody = document.querySelector('#datatable tbody');
        rows.forEach(function(row) {
          tbody.appendChild(row); // Tambahkan kembali baris ke tabel
        });
      }
    });
  </script>
</body>

</html>