<div class="col-lg mt-2">
  <div class="card text-start">
    <div class="card-header">
      Datasave
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Tabel Datasave</h5>
      <a href="index.php?x=form" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Input Data </a>
      <table class="table table-striped table-hover table-bordered mt-3 col-lg">
        <tr class="text-center">
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Deskripsi</th>
          <th>Gambar</th>
          <th>Waktu</th>
          <th class=" col-3">Aksi</th>
        </tr>
        <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT *, DATE_FORMAT(waktu_kumpul, '%Y-%m-%d %H:%i:%s') AS formatted_date FROM crud ORDER BY waktu_kumpul DESC");
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= htmlspecialchars($data['nama_lengkap']) ?></td>
            <td><?= htmlspecialchars($data['email']) ?></td>
            <td><?= htmlspecialchars($data['deskripsi']) ?></td>
            <td><img src="img/<?= htmlspecialchars($data['gambar']) ?>" height="100" alt=""></td>
            <td><?= $data['formatted_date'] ?></td>
            <td>
              <a data-bs-toggle="modal" data-bs-target="#modalhapus<?= $no ?>" class="btn btn-danger ms-4 me-2"><i class="fa-solid fa-trash"></i></a>
              <a data-bs-toggle="modal" data-bs-target="#modalubah<?= $no ?>" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></a>
              <a data-bs-toggle="modal" data-bs-target="#modaldetail<?= $no ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
            </td>
          </tr>
          <!-- Modal Hapus -->
          <div class="modal fade" id="modalhapus<?= $no ?>" tabindex="-1" aria-labelledby="modalhapusLabel<?= $no ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalhapusLabel<?= $no ?>">Konfirmasi Penghapusan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <p class="text-center">Apakah Anda yakin ingin menghapus data ini?</p>
                    <p class="text-center text-danger" style="margin-top: -20px;"><strong><?= $data['nama_lengkap'] ?> - <?= $data['email'] ?></strong></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="btnhapus" class="btn btn-primary">Ya, Hapus Data</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Ubah -->
          <div class="modal fade" id="modalubah<?= $no ?>" tabindex="-1" aria-labelledby="modalubahLabel<?= $no ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalubahLabel<?= $no ?>">Konfirmasi Ubah Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                      <label for="nama<?= $no ?>" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama<?= $no ?>" name="tnama" placeholder="ex: nama anda" value="<?= htmlspecialchars($data['nama_lengkap']) ?>">
                    </div>
                    <div class="mb-3">
                      <label for="email<?= $no ?>" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email<?= $no ?>" name="temail" placeholder="name@example.com" value="<?= htmlspecialchars($data['email']) ?>">
                    </div>
                    <div class="mb-3">
                      <label for="deskripsi<?= $no ?>" class="form-label">Deskripsi</label>
                      <textarea class="form-control" id="deskripsi<?= $no ?>" name="tpengumpulan" rows="2"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                    </div>
                    <p>Upload Gambar</p>
                    <div class="input-group mb-3">
                      <input type="file" class="form-control" id="inputGroupFile<?= $no ?>" name="btngambar" value="<?= $data['gambar'] ?>" aria-describedby="inputGroupFileAddon<?= $no ?>" aria-label="Upload">
                    </div>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary " name="btnubah"><i class="fa-solid fa-floppy-disk"></i> Ubah</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal Detail -->
          <div class="modal fade" id="modaldetail<?= $no ?>" tabindex="-1" aria-labelledby="modaldetailLabel<?= $no ?>" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modaldetailLabel<?= $no ?>">Detail Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p><strong>Nama Lengkap: </strong><?= htmlspecialchars($data['nama_lengkap']) ?></p>
                  <p><strong>Email: </strong><?= htmlspecialchars($data['email']) ?></p>
                  <p><strong>Deskripsi: </strong><?= htmlspecialchars($data['deskripsi']) ?></p>
                  <p><strong>Waktu Kumpul: </strong><?= $data['formatted_date'] ?></p>
                  <div class="text-center">
                    <img src="img/<?= htmlspecialchars($data['gambar']) ?>" height="200" alt="Gambar">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        <?php
          $no++;
        endwhile; ?>
      </table>
    </div>
  </div>
</div>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnubah'])) {
  $nama = mysqli_real_escape_string($koneksi, $_POST['tnama']);
  $email = mysqli_real_escape_string($koneksi, $_POST['temail']);
  $deskripsi = mysqli_real_escape_string($koneksi, $_POST['tpengumpulan']);
  $id = $_POST['id'];

  if (isset($_FILES['btngambar']) && $_FILES['btngambar']['error'] == 0) {
    $gambar = $_FILES['btngambar']['name'];
    $gambar_tmp_name = $_FILES['btngambar']['tmp_name'];
    $new_gambar = uniqid() . '-' . $gambar;

    if (move_uploaded_file($gambar_tmp_name, "img/" . $new_gambar)) {

      $ubah = mysqli_query($koneksi, "UPDATE crud SET nama_lengkap='$nama', email='$email', deskripsi='$deskripsi', gambar='$new_gambar', waktu_kumpul=NOW() WHERE id='$id'");

      if ($ubah) {
        echo "<script>alert('Data Berhasil Diubah'); window.location.href='index.php?x=datasave';</script>";
      } else {
        echo "<script>alert('Data Gagal Diubah: " . mysqli_error($koneksi) . "');</script>";
      }
    } else {
      echo "<script>alert('Gagal mengupload gambar');</script>";
    }
  } else {
    echo "<script>alert('Tidak ada gambar yang diupload atau terjadi error.')</script>";
  }
}

if (isset($_POST['btnhapus'])) {
  $id = $_POST['id'];
  $hapus = mysqli_query($koneksi, "DELETE FROM crud WHERE id='$id'");
  if ($hapus) {
    echo "<script>alert('Data Berhasil Dihapus'); window.location.href='index.php?x=datasave';</script>";
  } else {
    echo "<script>alert('Data Gagal Dihapus: " . mysqli_error($koneksi) . "');</script>";
  }
}
?>