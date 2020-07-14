<div>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Forgot Password</h1>
                    <div><?= $this->session->flashdata('message'); ?></div>
                    <div>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
                        <div class="text-danger float-left"><?= form_error('email'); ?></div>
                    </div>
                    <div>
                        <button type="submit" name="forgot" class="btn btn-secondary" style="width: 100%;">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already have an account?
                            <a href="<?= base_url('auth/'); ?>" class="to_register"> Login </a>
                        </p>
                        <p class="change_link">New to site?
                            <a href="<?= base_url('auth/registration'); ?>" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br>

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
