<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Mutasi Jabatan</h2>
            <form action="/Admin/mutate/<?= $jabat['id']; ?>" method="POST" enctype="multipart/form-data">
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
                    <label for="id_jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-select form-control <?= ($validation->hasError('id_jabatan')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="id_jabatan" name="id_jabatan" autofocus value="<?= old('id_jabatan'); ?>">
                            <option selected>Pilih Jabatan</option>
                            <?php foreach ($jabatan as $jb) : ?>
                                <option value="<?= $jb['id_jabatan']; ?>"><?= $jb['jabatan']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_jabatan'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_sk" class="col-sm-2 col-form-label">NO.SK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('no_sk')) ? 'is-invalid' : ''; ?>" id="no_sk" name="no_sk" autofocus value="<?= old('no_sk'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_sk'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control datepicker <?= ($validation->hasError('tgl_mulai')) ? 'is-invalid' : ''; ?>" id="tgl_mulai" name="tgl_mulai" placeholder="yyyy-mm-dd" autofocus value="<?= old('tgl_mulai'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_mulai'); ?>
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
                    <label for="SK" class="col-sm-2 col-form-label">SK</label>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('SK')) ? 'is-invalid' : ''; ?>" id="SK" name="SK" onchange="prevFile()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('SK'); ?>
                                </div>
                                <label class="custom-file-label" for="SK">Pilih File</label>
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