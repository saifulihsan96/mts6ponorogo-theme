<?php
@include_once('app-passed/head.php');
?>
  <div class="login">
    <div class="login-content">
      <h2>Masuk</h2>
      <p>Gunakan 6 digit nomer NISN (Nomer Induk Siswa Nasional) anda untuk mengakses data kelulusan</p>

      <form method="post">
        <div class="field">
          <label for="nisn">Nomer NISN</label>
          <input type="number" name="nisn" id="nisn" placeholder="Masukkan Nomer NISN">
          <div class="error-text"></div>
        </div>
        <button type="submit" id="login" name="login">Cek Kelulusan</button>
      </form>
      <div class="back-home">Kembali ke home page ? <a href="/">Home</a></div>
    </div>
  </div>
  <div class="loader-content">
    <span class="loader"></span>
  </div>
<?php
@include_once('app-passed/footer.php');