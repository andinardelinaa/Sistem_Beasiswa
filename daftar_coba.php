<!DOCTYPE html><!--ini adalah dokumen html-->
<html lang="en">
<head>
  <title>Daftarbeasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!--navigasi bar-->
<div class="container mt-3">
  <h2>BEASISWA</h2>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Beranda</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="daftar_coba.php">Daftar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="status.php">View</a>
    </li>
  </ul>
  <br><hr>

  <div class="container mt-3">
    <h2 style="background-color: lightblue">DAFTAR</h2>
    <form action="simpan.php" method="POST" enctype="multipart/form-data" name="formku" onsubmit="return validateForm()">
      <div class="mb-3 mt-3">
        <!--label untuk NIM--->
        <label for="nim">NIM:</label>
        <select name="nim" class="form-control" id="nim" onchange="checkNIM()">
          <option value="">Pilih NIM</option>
          <option value="122">122</option>
          <option value="222">222</option>
          <option value="322">322</option>
          <option value="422">422</option>
          <option value="522">522</option>
          <option value="622">622</option>
          <option value="722">722</option>
          <option value="822">822</option>
        </select>
      </div>

      <div class="mb-3">
        <!--label untuk Nama--->
        <label for="nama">Masukan Nama:</label>
        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Anda" name="nama">
      </div>

      <div class="mb-3">
        <!--label untuk Email--->
        <label for="email">Masukan Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Masukan email (@).com" name="email" onchange="ValidasiEmail()">
        <p id="msg" name="msg"></p>
      </div>

      <div class="mb-3">
        <label for="nomor">Nomor HP:</label>
        <!--label untuk NOmor HP--->
        <input type="number" class="form-control" id="nomor" placeholder="Masukan Nomor Hp" name="nomor" >
        <p id="msg" name="msg"></p>
      </div>

      <div class="mb-3 mt-3">
        <!--label untuk semester--->
        <label for="semester">Semester saat Ini:</label>
        <select name="semester" class="form-control" id="semester">
        <option value="">Pilih Semester</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
      </div>


      <div class="mb-3 mt-3" id="ipkDiv" >
        <!--label untuk IPK --->
        <label for="ipk">IPK terakhir:</label>
        <input type="float" class="form-control" id="ipk" placeholder="Masukan IPK anda" name="ipk" readonly>
        <input type="hidden" id="ipkHidden" name="ipk">
      </div>

      <div class="mb-3 mt-3">
        <!--label untuk Pilih beasiswa--->
        <label for="beasiswa">Pilih Beasiswa:</label>
        <select name="beasiswa" class="form-control" id="beasiswa" disabled>
        <option value="">Pilih Beasiswa</option>
          <option value="Beasiswa Akademik">Beasiswa Akademik</option>
          <option value="Beasiswa Non-Akademik">Beasiswa Non-Akademik</option>
        </select>
      </div>

      <div class="mb-3">
        <!--label untuk upload Berkas--->
        <label for="foto">Upload Berkas Syarat:</label>
        <input type="file" class="form-control" id="upload" name="upload" disabled>
      </div>

      <button type="submit" class="btn btn-success" id="submitBtn" disabled>Submit</button>
      <button type="reset" class="btn btn-primary">Batal</button>
    </form>
  </div>

  <script type="text/javascript">
    //perintah fungsi untuk kondisi NIM
    function checkNIM() {
      const nim = document.getElementById("nim").value;
      const ipkDiv = document.getElementById("ipkDiv");
      const ipkInput = document.getElementById("ipk");

      if (nim === "") {
        ipkDiv.style.display = "none";
        ipkInput.value = "";
      } else {
        ipkDiv.style.display = "block";
        if (nim === "122") {
          ipkInput.value = "2.30";
        } else if (nim === "222") {
          ipkInput.value = "3.20";
        }else if (nim === "322") {
          ipkInput.value = "2.50";
        }else if (nim === "422") {
          ipkInput.value = "2.20";
        }else if (nim === "522") {
          ipkInput.value = "4.00";
        }else if (nim === "622") {
          ipkInput.value = "2.70";
        }else if (nim === "722") {
          ipkInput.value = "3.00";
        }else if (nim === "822") {
          ipkInput.value = "3.60";
        } else {
          ipkInput.value = "";
        }
        updateFormState();
      }
    }
    //perintah fungsi untuk form disable sesuai kondisi NIM
    function updateFormState() {
      const ipk = parseFloat(document.getElementById("ipk").value);
      const beasiswaSelect = document.getElementById("beasiswa");
      const fotoInput = document.getElementById("upload");
      const submitBtn = document.getElementById("submitBtn");

      if (isNaN(ipk) || ipk < 3) {
        beasiswaSelect.disabled = true;
        fotoInput.disabled = true;
        submitBtn.disabled = true;
      } else {
        beasiswaSelect.disabled = false;
        fotoInput.disabled = false;
        submitBtn.disabled = false;
      }
    }

    //fungsi untuk validasi email
    function ValidasiEmail() {
      var email = document.getElementById("email").value;
      var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!pattern.test(email)) {
        alert("Email tidak valid. Pastikan email Anda mengandung '@' dan domain.");
        return false;
      }
      return true;
    }
    //fungsi validasi form ketika email dan ipk kurang dari 3
    function validateForm() {
      const isValidEmail = ValidasiEmail();
      const ipk = parseFloat(document.getElementById("ipk").value);

      if (ipk < 3) {
        alert("IPK harus 3 atau lebih untuk melanjutkan.");
        return false;
      }
      document.getElementById("ipkHidden").value= ipk;

      return isValidEmail;
    }
  </script>
</body>
</html>
