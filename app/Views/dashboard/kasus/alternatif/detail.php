<?= $this->extend('_partials/template') ?>

<?= $this->section('content') ?>
<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb2">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="#"><?= $segment[0]; ?></a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><?= $segment[1]; ?></li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><?= $segment[2]; ?></li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><?= $segment[3]; ?></li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><?= $segment[4]; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?= site_url('dashboard/alternatif/tambah-nilai/' . $segment[3] . '/' . $segment[4] ); ?>" class="btn btn-primary">Tambah Nilai</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?= session()->getFlashdata('message'); ?>
                    <h3 class="title-5 m-b-35">Data Nilai</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table width="100%" class="table table-data2 table-bordered table-hovered" id="myTable">
                        <thead class="text-center">
                            <tr>
                                <th width="40%">Kriteria</th>
                                <th>Bobot</th>
                                <th>Nilai</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detailAlternatif as $detail) : ?>
                                <tr>
                                    <td><?= $detail->nama_kriteria; ?></td>
                                    <td class="text-center"><?= $detail->bobot; ?></td>
                                    <td class="text-center"><?= $detail->nilai; ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="<?= site_url('dashboard/alternatif/edit-nilai/' . $segment[3] . '/' . $segment[4] . '/' . $detail->slug); ?>" class="btn btn-warning mr-1">Edit</a>
                                            <a href="<?= site_url('dashboard/alternatif/delete-nilai/' . $segment[3] . '/' . $segment[4] . '/' . $detail->slug); ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC CHART-->
    <?= $this->endSection() ?>