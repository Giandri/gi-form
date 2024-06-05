<div class="col-lg mt-2">
  <div class="card text-start">
    <div class="card-header">
      Form Pengumpulan
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Lengkapi Form Dibawah ini</h5>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="tnama" placeholder="ex: nama anda">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email</label>
          <input type="email" class="form-control" name="temail" placeholder="name@example.com">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
          <textarea class="form-control" name="tpengumpulan" rows="2"></textarea>
        </div>
        <p>Upload Gambar</p>
        <div class="input-group mb-3" style="margin-top:-10px">
          <input type="file" class="form-control" id="inputGroupFile04" name="btngambar" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <button type="submit" class="btn btn-primary mt-3 w-100" name="btnsave"><i class="fa-solid fa-floppy-disk"></i> Save</button>
      </form>
    </div>
  </div>
</div>

<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnsave'])) {
  $nama = mysqli_real_escape_string($koneksi, $_POST['tnama']);
  $email = mysqli_real_escape_string($koneksi, $_POST['temail']);
  $deskripsi = mysqli_real_escape_string($koneksi, $_POST['tpengumpulan']);

  if (isset($_FILES['btngambar']) && $_FILES['btngambar']['error'] == 0) {
    $gambar = $_FILES['btngambar']['name'];
    $gambar_tmp_name = $_FILES['btngambar']['tmp_name'];
    $new_gambar = uniqid() . '-' . $gambar;

    if (move_uploaded_file($gambar_tmp_name, "img/" . $new_gambar)) {
      $query = "INSERT INTO crud (nama_lengkap, email, deskripsi, gambar,waktu_kumpul) VALUES ('$nama', '$email', '$deskripsi', '$new_gambar',now())";
      $simpan = mysqli_query($koneksi, $query);

      if ($simpan) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location.href='index.php?x=datasave';</script>";
      } else {
        echo "<script>alert('Data Gagal Disimpan: " . mysqli_error($koneksi) . "');</script>";
      }
    } else {
      echo "<script>alert('Gagal mengupload gambar.');</script>";
    }
  } else {
    echo "<script>alert('Tidak ada gambar yang diupload atau terjadi error.')</script>";
  }
}
?>