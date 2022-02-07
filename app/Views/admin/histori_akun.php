<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Histori Akun</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
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
                            <th>Keterangan</th>
                            <th>Username</th>
                            <th>User Image</th>
                            <th>Waktu</th>
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
                        <?php foreach ($logHistoriAkun as $histoA) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $histoA['keterangan']; ?></td>
                                <td><?= $histoA['username']; ?></td>
                                <td><img src="/img/<?= $histoA['user_image']; ?>" alt="" class="foto"></td>
                                <td><?= $histoA['waktu']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('histori', 'data_paginate') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>