<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-3">Clients</h1>
            <p class="mb-3">List of Clients</p>
            <a href="<?= base_url('member/clients/new'); ?>" class="btn btn-primary mb-4"><i class="fas fa-fw fa-plus"></i> New Project</a>
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
            	<table class="table table-hover">
            		<thead>
            			<tr class="text-center">
                            <td hidden></td>
            				<th>#</th>
            				<th>Project Name</th>
            				<th>Email</th>
                            <th>Password</th>
            				<th>Action</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php
            			 $no = 1; foreach ($clients as $client): ?>
            				<tr class="text-center">
                                <td hidden></td>
            					<th><?= $no++; ?></th>
            					<td><?= $client['project_name']; ?></td>
            					<td><?= $client['user_email']; ?></td>
                                <td>Your account password</td>
            					<td>
                                    <a href="" class="badge badge-pill badge-secondary" id="set_detail" 
                                        data-toggle="modal" 
                                        data-target="#detail_modal" 
                                        data-email="<?= $client['user_email']; ?>" 
                                        data-project_name="<?= $client['project_name']; ?>" 
                                        data-access_key="<?= $client['user_key']; ?>">details
                                    </a>
            						<a href="<?= base_url('member/clients/delete/'.$client['id'].'/'.urlencode($client['user_key'])); ?>" class="badge badge-pill badge-danger" onclick="return confirm('Are you sure want to delete this client?')">delete</a>
            					</td>
            				</tr>
            			<?php endforeach ?>
            		</tbody>
            	</table>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel"><b>Detail client</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Detail</h5>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Project name</th>
                            <td><span id="project_name"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><span id="email"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Password</th>
                            <td>Your account password</td>
                        </tr>
                        <tr>
                            <th scope="row">Access Key</th>
                            <td><span id="access_key"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_detail', function() {
            $('#email').text($(this).data('email'))
            $('#project_name').text($(this).data('project_name'))
            $('#access_key').text($(this).data('access_key'))
        })
    })
</script>