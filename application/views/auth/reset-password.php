<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Reset Password</h1>
                    <div><?= $this->session->flashdata('message'); ?></div>
                    <div>
                        <input type="password" class="form-control" name="password1" placeholder="new password" value="<?= set_value('password1'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('password1'); ?></div>
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password2" placeholder="Confirm new password" value="<?= set_value('password2'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('password2'); ?></div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="reset" class="btn btn-secondary" style="width: 100%;">Reset Password</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="<?= base_url('auth/registration'); ?>" class="to_register"> Create Account </a>
                        </p>

                        <div>
                            <h1><i class="fa fa-code"></i> WPU API!</h1>
                            <p>&copy; Copyright 2020 all rights reserverd. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
