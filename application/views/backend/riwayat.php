<section class="content">

    <div class="row">
	    <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead class="bg-light text-dark">
                        <tr>
                            <th>#</th>
                            <th>No Kartu</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($riwayat as $hasil) : ?>
                                <tr>
                                    <td><?= $i++ ?></th>
                                    <td><?= $hasil['no_kartu'] ; ?></td>
                                    <td><?= $hasil['nama'] ; ?></td>
                                    <td><?= date('d F Y - H:i:s', strtotime($hasil['waktu'])) ; ?></td>
                                    <td><?= $hasil['keterangan'] ; ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>Dashboard/hapusRiwayat/<?= $hasil['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>