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
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><?= $segment[5]; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?= site_url('dashboard/alternatif/detail/' . $segment[3] . '/' . $segment[4]); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Edit Nilai</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= session()->getFlashdata('message'); ?>
                    <?= form_open('dashboard/alternatif/proses-edit-nilai/' . $segment[3] . '/' . $segment[4] . '/' . $segment[5]);?>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input class="au-input au-input--full" type="text" name="nilai" value="<?= $pengujian->nilai;?>">
                            <small class="text-danger"><?= \Config\Services::validation()->getError('nilai'); ?></small>
                        </div>
                        <button class="au-btn au-btn--green m-b-20" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC CHART-->
    <?= $this->endSection() ?>