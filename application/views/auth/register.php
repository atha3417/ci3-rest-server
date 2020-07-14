<div>
    <a class="hiddenanchor" id="signup"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Create Account</h1>
                    <div><?= $this->session->flashdata('message'); ?></div>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('email'); ?></div>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password1" placeholder="Password" value="<?= set_value('password1'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('password1'); ?></div>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" value="<?= set_value('password2'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('password2'); ?></div>
                    </div>
                    <div>
                        <button type="submit" name="register" class="btn btn-secondary" style="width: 100%;">Create an account</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already have an account?
                            <a href="<?= base_url('auth/'); ?>" class="to_register"> Login </a>
                        </p>
                        <a href="<?= base_url('auth/forgot'); ?>">Forgot your password?</a>

                        <div class="clearfix"></div>
                        <br>

                        <div>
                            <h1><i class="fa fa-code"></i> WPU API</h1>
                            <p>&copy; Copyright 2020 all rights reserverd. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
