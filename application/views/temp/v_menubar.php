<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
	<div class="container-fluid">
		<!-- Toggler -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Brand -->
		<a class="navbar-brand pt-0" href="<?php echo base_url(); ?>home">
			<img src="<?php echo base_url(); ?>assets/img/brand/logo_property.jpg" class="navbar-brand-img" alt="...">
		</a>
		<!-- User -->
		<ul class="nav align-items-center d-md-none">
			<!-- <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->
			<li class="nav-item dropdown">
				<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<div class="media align-items-center">
						
						<span class="avatar avatar-sm rounded-circle">
							<img alt="Image placeholder" src="<?php echo base_url(); ?>assets/img/theme/team-4.jpg">
						</span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
					<!-- <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div> -->
					<a href="<?php echo base_url(); ?>login/logout" class="dropdown-item">
						<i class="ni ni-user-run"></i>
						<span>Logout</span>
					</a>
				</div>
			</li>
		</ul>
		<!-- Collapse -->
		<div class="collapse navbar-collapse" id="sidenav-collapse-main">
			<!-- Collapse header -->
			<div class="navbar-collapse-header d-md-none">
				<div class="row">
					<div class="col-6 collapse-brand">
						<a href="<?php echo base_url(); ?>login/logout">
							<img src="<?php echo base_url(); ?>assets/img/brand/logo_property.jpg">
						</a>
					</div>
					<div class="col-6 collapse-close">
						<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
			<!-- Form -->
			<!-- <form class="mt-4 mb-3 d-md-none">
				<div class="input-group input-group-rounded input-group-merge">
					<input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<span class="fa fa-search"></span>
						</div>
					</div>
				</div>
			</form> -->
			<!-- Navigation -->
			<ul class="navbar-nav">
				<li class="nav-item  active ">
					<a <?= ($this->uri->segment(1) == 'home') ? 'class="nav-link active"' : 'class="nav-link"' ?> href="<?php echo base_url(); ?>home">
						<i class="ni ni-chart-bar-32 text-primary"></i> Dashboard
						<!-- <i class="fas fa-chart-bar"></i>Dashboard -->
					</a>
				</li>
				<li class="nav-item dropdown">
					<a <?= ($this->uri->segment(1) == 'properti') ? 'class="nav-link active"' : 'class="nav-link"' ?> href="<?php echo base_url(); ?>produk" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ni ni-shop text-primary"></i> Properti
						
						<!-- <span class="nav-link-text">Properti</span> -->
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width: fit-content;margin-left: 10%;">
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>properti">Tambah Properti</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>berita">Tambah Berita</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>member">Future List Member</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>notifikasi">Push Notifikasi</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a <?= ($this->uri->segment(1) == 'admin') ? 'class="nav-link active"' : 'class="nav-link"' ?> href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ni ni-circle-08 text-primary"></i> Set Master
						<!-- <span class="nav-link-text">Setting</span> -->
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width: fit-content;margin-left: 10%;">
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>admin/user">Set Member</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>admin/toko_member">Set Toko Member</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>admin/bank">Set Bank</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>properti/tipe_properti">Set Tipe Properti</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>properti/jenis_properti">Set Jenis Properti</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>properti/sertifikat">Set Sertifikat</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>properti/sosial_media">Set Sosial Media</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>admin/paket">Set Paket Promo</a>
						<a class="dropdown-item" type="button" href="<?php echo base_url(); ?>admin/jasa">Set Modul Jasa</a>
					</div>
				</li>
			</ul>
			<!-- Divider -->
			<hr class="my-3">
			<!-- Heading -->
			<!-- <h6 class="navbar-heading text-muted">Documentation</h6> -->
			<!-- Navigation -->
			<!-- <ul class="navbar-nav mb-md-3">
				<li class="nav-item">
					<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
						<i class="ni ni-spaceship"></i> Getting started
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
						<i class="ni ni-palette"></i> Foundation
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
						<i class="ni ni-ui-04"></i> Components
					</a>
				</li>
			</ul>
			 <ul class="navbar-nav">
				<li class="nav-item active active-pro">
					<a class="nav-link" href="./examples/upgrade.html">
						<i class="ni ni-send text-dark"></i> Upgrade to PRO
					</a>
				</li>
			</ul> -->
		</div>
	</div>
</nav>
