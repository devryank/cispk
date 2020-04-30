<?= $this->extend('_partials/template') ?>

<?= $this->section('content') ?>
<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
    <!-- BREADCRUMB-->
    <section class="au-breadcrumb2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                                <li class="list-inline-item">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <!-- WELCOME-->
    <section class="welcome p-t-10">
        <div class="container">
            <div class="row">
                <div class="col-md-5 pr-5 text-right">
                    <img src="<?= base_url(); ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                </div>
                <div class="col-md-4">
                    <?= form_open('profile/proses-edit-profile/' . $user->username);?>
                    <h3 class="title-2 mb-1">
                        <input class="au-input au-input--full" type="text" name="full_name" value="<?= $user->full_name;?>" placeholder="Nama Lengkap">
                        <small class="text-danger"><?= \Config\Services::validation()->getError('full_name'); ?></small>    
                    </h3>
                    <h5 class="display-5 mb-5"><?= session()->get('username');?></h5>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                    <a href="<?= site_url('profile/index/' . $user->username);?>" class="btn btn-info">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>