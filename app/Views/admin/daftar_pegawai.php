<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <a href="/admin/create" class="btn btn-primary mt-3" style="float: right;">Tambah Karyawan</a>
    <h1 class="h3 mb-4 text-gray-800">Daftar Pegawai</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-header-action" style="float: right;">
                    <a href="/admin/trash" class="btn btn-danger"><i class="fa fa-trash"></i> Trash</a>
                </div>
                <table class="table" id="table_id" width="100%" cellspacing="0">
                    <div class="col-6">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control cari" placeholder="Masukkan Nama" name="keyword">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($data_pegawai as $user) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><img src="/img/<?= $user['foto']; ?>" alt="" class="foto"></td>
                                <td><?= $user['nama']; ?></td>
                                <td><?= $user['jabatan']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/' . $user['pegawaiid']); ?>" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('data_pegawai', 'data_paginate') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>