<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Ubah Data Karyawan</h2>
            <form action="/Admin/update/<?= $pegawai['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : ''; ?>" id="NIK" name="NIK" autofocus value="<?= (old('NIK')) ? old('NIK') : $pegawai['NIK']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIK'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $pegawai['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" placeholder="yyyy-mm-dd" autofocus value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $pegawai['tanggal_lahir']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" autofocus value="<?= (old('alamat')) ? old('alamat') : $pegawai['alamat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pendikte" class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pendikte')) ? 'is-invalid' : ''; ?>" id="pendikte" name="pendikte" autofocus value="<?= (old('pendikte')) ? old('pendikte') : $pegawai['pendikte']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('pendikte'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <?php if ($pegawai['foto'] != null) : ?>
                            <img src="<?= base_url('/img/' . $pegawai['foto']); ?>" class="img-thumbnail img-preview">
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="prevImg()" value="<?= (old('foto')) ? old('foto') : $pegawai['foto']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label class="custom-file-label" for="foto">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>