<?= $this->extend('_partials/template') ?>

<?= $this->section('content') ?>
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
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?= site_url('dashboard/kasus'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Data Kasus</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= session()->getFlashdata('message');?>
                    <?= form_open('dashboard/kasus/proses-edit/' . $kasus->slug);?>
                        <div class="form-group">
                            <label>Nama Kasus</label>
                            <input class="au-input au-input--full" type="text" name="nama_kasus" placeholder="Nama Kasus" value="<?= $kasus->nama_kasus;?>">
                            <small class="text-danger"><?= \Config\Services::validation()->getError('nama_kasus'); ?></small>
                        </div>
                        <button class="au-btn au-btn--green m-b-20" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END STATISTIC CHART-->
    <?= $this->endSection() ?>