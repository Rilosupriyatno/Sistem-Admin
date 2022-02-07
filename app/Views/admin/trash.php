<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Trash</h1>
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
                    <a href="/admin/userList" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
                            <th>jabatan</th>
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
                                    <a href="<?= base_url('/admin/restore/' . $user['id']) ?>" class="btn btn-info">Restore</a>
                                    <form action="<?= base_url('/admin/delete2/' . $user['id']) ?>" method="post" class="d-inline" onclick="return confirm('Yakin mau menghapus?');">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_methode" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Hapus Permanen</button>
                                    </form>
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