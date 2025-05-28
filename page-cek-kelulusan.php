<?php
@include_once('app-passed/head.php');
$dataSiswa = get_field('cek_data_siswa', get_the_ID());
?>
  <div class="login">
    <div class="login-content">
      <h2>Masuk</h2>
      <p>Gunakan 10 digit nomer NISN (Nomer Induk Siswa Nasional) anda untuk mengakses data kelulusan</p>

      <form method="post">
        <div class="field field-nisn">
          <label for="nisn">Nomer NISN</label>
          <input type="number" name="nisn" id="nisn" placeholder="Masukkan Nomer NISN" maxlength="10">
          <div class="error-text error-text-nisn"></div>
        </div>
        <div class="field field-pass">
          <label for="nisn">Password</label>
          <input type="password" name="password" id="password" placeholder="Password">
          <div class="error-text error-text-pass"></div>
        </div>
        <input type="hidden" name="post_id" id="post_id" value="<?php echo $dataSiswa; ?>">
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