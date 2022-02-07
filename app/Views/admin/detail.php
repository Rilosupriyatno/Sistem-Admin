<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Detail</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 shadow" style="max-width: 540px;">
                <div class="row no-gutters m">
                    <!-- <div class="row g-0">  -->
                    <div class="col-md-4">
                        <br>
                        <img src="<?= base_url('/img/' . $data_pegawai->foto); ?>" alt="<?= $data_pegawai->nama; ?>" class="foto-detail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $data_pegawai->nama; ?></h4>
                                </li>
                                <li class="list-group-item"><?= $data_pegawai->NIK; ?></li>
                                <li class="list-group-item"><?= $data_pegawai->jenkel; ?></li>
                                <li class="list-group-item"><?= $data_pegawai->jabatan; ?></li>
                                <li class="list-group-item"></li>
                            </ul>
                            <a href="/admin/edit/<?= $data_pegawai->pegawaiid; ?>" class="btn btn-warning">Edit</a>
                            <form action="/admin/delete/<?= $data_pegawai->pegawaiid; ?>" method="post" class="d-inline" onclick="return confirm('Yakin mau menghapus?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_methode" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br><br>
                            <small><a href="<?= base_url('admin/daftar_pegawai'); ?>">&laquo; Kembali</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>