<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Produk dengan gambar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body bg-dark text-light>
    <!-- Nav Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SOR.co</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Other
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/Titip Jual">Titip Jual</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/crud_gc/">Produk</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/kupon">Diskon</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
  <!-- Nav end -->
    <div class="container-fluid ">
        <h1 class="text-center mt-5 mb-3">Data Produk</h1>
        <a href="tambah_produk.php" class="btn btn-primary mb-3">+ Tambah Produk</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM produk ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if(!$result){
                    die ("Query Error: ".mysqli_errno($koneksi).
                       " - ".mysqli_error($koneksi));
                }

                //buat perulangan untuk element tabel dari data mahasiswa
                $no = 1; //variabel untuk membuat nomor urut
                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                // kemudian dicetak dengan perulangan while
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
                   <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama_produk']; ?></td>
                      <td><?php echo substr($row['deskripsi'], 0, 20); ?></td>
                      <td>Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></td>
                      <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 200px;"></td>
                      <td>
                          <a href="edit_produk.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                          <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn btn-danger">Hapus</a>
                      </td>
                  </tr>
                     
                <?php
                    $no++; //untuk nomor urut terus bertambah 1
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
