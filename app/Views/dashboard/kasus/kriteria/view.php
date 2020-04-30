<?= $this->extend('_partials/template')?>

<?= $this->section('content')?>
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#"><?= $segment[0];?></a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item"><?= $segment[1];?></li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item"><?= $segment[2];?></li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item"><?= $segment[3];?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?= site_url('dashboard/kriteria/tambah/' . $segment[3]);?>" class="btn btn-primary">Tambah Kriteria</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= session()->getFlashdata('message');?>
                            <h3 class="title-5 m-b-35">Data Kriteria</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="text-center table-data2 table table-bordered table-hovered" id="myTable">
                                <thead class="text-center">
                                    <tr>
                                        <th width="50%">Nama Kriteria</th>
                                        <th width="15%">Tipe</th>
                                        <th width="15%">Bobot</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKriteria->getResult() as $kriteria):?>
                                    <tr>
                                        <td><?= $kriteria->nama_kriteria;?></td>
                                        <td><?= $kriteria->tipe;?></td>
                                        <td><?= $kriteria->bobot;?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="<?= site_url('dashboard/kriteria/edit/' . $segment[3] . '/' . $kriteria->slug);?>" class="btn btn-warning mr-1">Edit</a>
                                                <a href="<?= site_url('dashboard/kriteria/delete/' . $segment[3] .'/' . $kriteria->slug);?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC CHART-->
<?= $this->endSection() ?>
