<html>
<head>
  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
  <h1 class="title">Data Siswa</h1>
  <button type="button" class="btn btn-light" onclick="window.location.href='form_simpan.php';">Tambah data</button>
  <br><br>
  <table border="2" width="100%">
  <thead class="table-dark">
  <tr>
    <th>Foto</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
    <th>Alamat</th>
    <th colspan="2">Aksi</th>
  </tr>
  </thead>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM siswa");
  $sql->execute(); // Eksekusi querynya
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
    echo "<td>".$data['nis']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
    echo "<td>".$data['telp']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td><button type='button' class='btn btn-light' onclick=\"window.location.href='form_ubah.php?id=".$data['id']."'\">Ubah</button></td>";
    echo "<td><button type='button' class='btn btn-light' onclick=\"window.location.href='proses_hapus.php?id=".$data['id']."'\">Hapus</button></td>";
    echo "</tr>";
  }
  ?>
  </table>
  <button type="button" class="btn btn-light mt-3" onclick="window.location.href='proses_pdf.php';">Ubah ke PDF</button>
  </div>
</body>
</html>
