<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================= -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col—xl-12 col-lg-12 col-md—12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-tit1e">Data Beasiswa </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('beasiswa') ?>" class="breadcrumb—link">Beasiswa</a></li>
                                <li c1ass="breadcrumb-item active" aria-current="page">Tampil Data</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========================================================================= -->
        <!-- end pageheader -->
        <!-- ========================================================================= -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        Data Beasiswa
                        <a href="<?= base_url('beasiswa/tambah') ?>" class="btn btn-sm btn-success float-right">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Beasiswa</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Nama Jenis Beasiswa</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($beasiswa as $a) {
                                    echo "<tr><td>" . $no++ . "</td>
                                    <td>" . $a->nama_beasiswa . "</td>
                                    <td>" . $a->tanggal_mulai . "</td>
                                    <td>" . $a->tanggal_selesai . "</td>
                                    <td>" . $a->nama_jenis . "</td>
                                    <td>" . $a->keterangan . "</td>
                                    <td><a href=" . base_url('beasiswa/ubah/' . $a->id) . " class='btn btn-sm btn-info'><i class='fas fa-edit'></i> Ubah</a>
                                                <a href=" . base_url('beasiswa/hapus/' . $a->id) . " onclick='return confirm(\"ingin hapus data ini?\")' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i> Hapus</a>
                                    </td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>