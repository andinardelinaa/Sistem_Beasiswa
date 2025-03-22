<!DOCTYPE html> <!--dokumen ini adalah dokumen html-->
<html lang="en">
<head>
  <title>Daftarbeasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!--style untuk tabel menggunakan css internal-->
  <style>
    table, th, td{
    border : 1px solid rgb(12, 12, 12);
    padding: 10px;
    text-align: center;
    }
    table{
    width: 100%;
    border-collapse: collapse;
    }
  </style>
</head>
<body>

<!--nav bar-->
<div class="container mt-3">
  <h2>BEASISWA</h2>
  <ul class="nav nav-pills">
  <li class="nav-item">
      <a class="nav-link " href="index.php">Beranda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="daftar_coba.php">Daftar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="status.php">View</a>
    </li>
  </ul>
  <br><hr>
</div>

<div class="container mt-3">
  <h2 style="background-color: lightblue">Status Verifikasi</h2></center>
</div>
    <br>
    <div class="container">
<table>
  <!--tabel yang muncul dalam view-->
        <tr style="background-color : lightblue">
        <th>No. </th>
            <th>NIM</th>
            <th>Nama </th>
            <th>Email</th>
            <th>No. Hp</th>
            <th>Semester</th>
            <th>IPK</th>
            <th>Beasiswa</th>
            <th>Foto</th>
            <th>Status Verifikasi</th>
        </tr>
        <tbody> 
                  <?php 
                  //menghubungkan koneksi yang ada dalam database
                      include('koneksi_beasiswa.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM beasiswa");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                    <!--memanggil data yang ada pada database sesuaikan dengan tabel yang ada-->
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nim'] ?></td>
                      <td><?php echo $row['nama'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['nomor_hp'] ?></td>
                      <td><?php echo $row['semester'] ?></td>
                      <td><?php echo $row['ipk'] ?></td>
                      <td><?php echo $row['beasiswa'] ?></td>
                      <td><img src="foto/<?php echo $row['foto'] ?>" alt="Foto" width="100px" height="150px"></td>
                      <td><?php echo $row['status_verifikasi'] ?></td>
                    </tr>
                <?php } ?>
          </tbody>
</table>
<br><br>
</body>
</html><!--penutup tag html-->

