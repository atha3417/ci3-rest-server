<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>assets/sbadmin/dist/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dataTables/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dataTables/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/sbadmin/dist/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/dataTables/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/dataTables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url('member/dashboard'); ?>"><i class="fas fa-code"></i> WPU API</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button>
        <div class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('member/dashboard'); ?>"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="fas fa-fw fa-book"></i> Documentation | <small class="text-info">Soon</small></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('member/clients/list'); ?>"><i class="fas fa-fw fa-tasks"></i> Manage clients</a>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Are you sure want to logout?')"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-light">Core</div>
                        <a class="nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active' : null; ?>" href="<?= base_url('member/dashboard'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="javascript:void(0)">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book"></i></div>
                            Documentation
                            <small class="float-right pl-1 pr-1 ml-3 text-warning card bg-secondary">Soon</small>
                        </a>

                        <div class="sb-sidenav-menu-heading text-light">User</div>
                        <a class="nav-link <?= $this->uri->segment(2) == 'clients' ? 'active' : null; ?>" href="<?= base_url('member/clients/list'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tasks"></i></div>
                            Manage Clients
                        </a>

                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Are you sure want to logout?')">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as :</div><?= $this->session->userdata('email'); ?>
                </div>
            </nav>
        </div>