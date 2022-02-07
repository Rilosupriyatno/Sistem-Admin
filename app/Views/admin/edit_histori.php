<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Ubah Jabatan Karyawan</h2>
            <form action="/Admin/updateMutasi/<?= $jabat['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : ''; ?>" id="NIK" name="NIK" autofocus value="<?= (old('NIK')) ? old('NIK') : $jabat['NIK']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIK'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('id_jabatan')) ? 'is-invalid' : ''; ?>" id="id_jabatan" name="id_jabatan" autofocus value="<?= (old('id_jabatan')) ? old('id_jabatan') : $jabat['id_jabatan']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_berakhir" class="col-sm-2 col-form-label">Tanggal Berakhir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control datepicker <?= ($validation->hasError('tgl_berakhir')) ? 'is-invalid' : ''; ?>" id="tgl_berakhir" name="tgl_berakhir" placeholder="yyyy-mm-dd" value="<?= $jabat['tgl_berakhir']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_berakhir'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="updator" class="col-sm-2 col-form-label">Updator</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('updator')) ? 'is-invalid' : ''; ?>" id="updator" name="updator" autofocus value="<?= $jabat['updator']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('updator'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>