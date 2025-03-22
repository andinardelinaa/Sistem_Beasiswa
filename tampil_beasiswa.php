<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftarbeasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

<div class="container mt-3">
  <h2>BEASISWA</h2>
  <ul class="nav nav-pills">
  <li class="nav-item">
      <a class="nav-link " href="index.php">Beranda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="daftar_coba.php">Daftar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="status.php">View</a>
    </li>
  </ul>
  <br><hr>
</div>
<hr>
<div class="container mt-3">
  <h2 style="background-color: lightblue">TAMPIL</h2></center>
</div>
    <br>
    <div class="container">
<table>
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
        </tr>
        <tbody>
                  <?php 
                      include('koneksi_beasiswa.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM beasiswa");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nim'] ?></td>
                      <td><?php echo $row['nama'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['nomor_hp'] ?></td>
                      <td><?php echo $row['semester'] ?></td>
                      <td><?php echo number_format($row['ipk'],2)?></td>
                      <td><?php echo $row['beasiswa'] ?></td>
                      <td><img src="foto/<?php echo $row['foto'] ?>" alt="Foto" width="100px" height="150px"></td>
                    </tr>
                <?php } ?>
          </tbody>
</table>
<br><br>
</body>
</html>

