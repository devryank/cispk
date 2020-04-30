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
                                    </ul>
                                </div>
                            </div>
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
                            <h3 class="title-5 m-b-35">Data User</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table table-data2 table-bordered table-hovered" id="myTable">
                                <thead class="text-center">
                                    <tr>
                                        <th width="65%">Nama Lengkap</th>
                                        <th width="65%">Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listUser->getResult() as $user):?>
                                    <tr>
                                        <td><?= $user->full_name;?></td>
                                        <td><?= $user->username;?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="<?= site_url('dashboard/user/delete/' . $user->username);?>" class="btn btn-danger">Delete</a>
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
