<?= $this->extend('auth/templateAuth')?>

<?= $this->section('auth')?>
<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= base_url();?>/assets/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">

                            <?= form_open('auth/registerUser');?>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="au-input au-input--full" type="text" name="full_name" placeholder="John Doe" value="<?= set_value('full_name');?>">
                                    <small class="text-danger"><?= $validation->getError('full_name'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="john" value="<?= set_value('username');?>">
                                    <small class="text-danger"><?= $validation->getError('username'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    <small class="text-danger"><?= $validation->getError('password'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Ketik Ulang Password</label>
                                    <input class="au-input au-input--full" type="password" name="conf_password" placeholder="Ketik ulang password">
                                    <small class="text-danger"><?= $validation->getError('conf_password'); ?></small>
                                </div>
                                <div class="login-checkbox">
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?= $this->endSection()?>