<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Data Karyawan</h2>
            <form action="/Admin/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : ''; ?>" id="NIK" name="NIK" autofocus value="<?= old('NIK'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIK'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenkel">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select form-control <?= ($validation->hasError('jenkel')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="jenkel" name="jenkel" autofocus value="<?= old('jenkel'); ?>">
                            <option selected>Choose...</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenkel'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control datepicker <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" placeholder="yyyy-mm-dd" autofocus value="<?= old('tanggal_lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pendikte" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pendikte')) ? 'is-invalid' : ''; ?>" id="pendikte" name="pendikte" autofocus value="<?= old('pendikte'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pendikte'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="creator" class="col-sm-2 col-form-label">Creator</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('creator')) ? 'is-invalid' : ''; ?>" id="creator" name="creator" autofocus value="<?= old('creator'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('creator'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/default.svg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="prevImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label class="custom-file-label" for="foto">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>