<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id = $_GET['id'];
  // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
  $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
  $sql->bindParam(':id', $id);
  $sql->execute(); // Eksekusi query insert
  $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
  ?>
  <div class="container-fluid">
    <div class="d-flex flex-column h-100 justify-content-center align-items-center">
      <h1>Ubah Data Siswa</h1>
      <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nis">NIS</label>
          <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="<?php echo $data['nis']; ?>">
        </div>
        <div class="form-group">
          <label for="nama">nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?php echo $data['nama']; ?>">
        </div>
        <div class="form-group">
          <label for="jk">Jenis Kelamin</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Perempuan
              </label>
            </div>
        </div>
        <div class="form-group">
          <label for="telp">Telepon</label>
          <input type="text" class="form-control" id="telp" name="telp" placeholder="Masukkan no telp" value="<?php echo $data['telp']; ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $data['alamat']; ?>">
        </div>
        <div class="form-group">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <input type="submit" class="btn btn-light" value="Ubah">
        <button type="button" class="btn btn-light" onclick="window.location.href='index.php';">Batal</button>
      </form>
    </div>
  </div>
</body>
</html>
