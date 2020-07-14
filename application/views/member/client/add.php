<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Clients</h1>
            <p class="mb-3">Add new clients</p>
            <div class="row mt-1">
                <div class="col-lg-5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name"><b>Project Name</b></label>
                            <input type="text" name="project_name" class="form-control" id="name" autofocus autocomplete="off">
                            <small class="text-danger"><?= form_error('project_name'); ?></small>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('member/clients/list'); ?>" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="create" class="btn btn-primary">Create project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
