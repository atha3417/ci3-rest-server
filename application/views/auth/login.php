<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Login Form</h1>
                    <div><?= $this->session->flashdata('message'); ?></div>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('email'); ?></div>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('password'); ?></div>
                    </div>
                    <div>
                        <button type="submit" name="login" class="btn btn-secondary" style="width: 100%;">Login</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="<?= base_url('auth/registration'); ?>" class="to_register"> Create Account </a>
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
