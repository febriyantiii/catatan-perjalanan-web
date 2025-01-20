<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Tulis Catatan</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="config/simpan_catatan.php" method="post">
    <div class="card-body">
      <!-- Pilih Tanggal -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pilih Tanggal</label>
        <div class="col-sm-10">
          <input type="date" name="tanggal" class="form-control">
        </div>
      </div>
      <!-- Pilih Jam -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Pilih Jam</label>
        <div class="col-sm-10">
          <input type="time" name="jam" class="form-control">
        </div>
      </div>
      <!-- Lokasi -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Lokasi</label>
        <div class="col-sm-10">
          <input type="text" name="lokasi" class="form-control" placeholder="Masukkan Lokasi Anda">
        </div>
      </div>
      <!-- Suhu Tubuh -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Suhu Tubuh</label>
        <div class="col-sm-10">
          <input type="text" name="suhu" class="form-control" placeholder="Masukkan Suhu Tubuh (Celcius)">
        </div>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-success float-right m-2"><i class="fa fa-save"></i> Simpan</button>
      <button type="reset" class="btn btn-warning float-right m-2"><i class="fa fa-save"></i> Kosongkan</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
