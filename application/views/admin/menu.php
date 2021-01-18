<div class="sidebar-wrapper sidebar-theme">
	<nav id="compactSidebar">
		<div class="theme-logo">
			<a href="<?=base_url('admin')?>">
				<img src="<?=base_url('fav-icon.ico')?>" class="navbar-logo" alt="logo">
			</a>
		</div>
		<ul class="menu-categories">
			<li class="menu">
				<a href="#dashboard" data-active="false" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Dashboard</span></div>
			</li>
			<li class="menu">
				<a href="#app" data-active="false" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Apps</span></div>
			</li>
			<li class="menu">
				<a href="#forms" data-active="false" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Data Karyawan</span></div>
			</li>
			<li class="menu">
				<a href="#users" data-active="false" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Users</span></div>
			</li>
		</ul>
	</nav>

	<div id="compact_submenuSidebar" class="submenu-sidebar">
		<div class="theme-brand-name">
			<a href="index.html"><?php echo APPS_NAME ?></a>
		</div>
		<div class="submenu" id="dashboard">
			<div class="category-info">
				<h5>Dashboard</h5>
			</div>
			<ul class="submenu-list" data-parent-element="#dashboard"> 
				<li>
					<a href="<?=base_url('admin')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Panel Admin</a>
				</li>
				<li>
					<a href="<?=base_url('cs')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Panel CS</a>
				</li>
			</ul>
		</div>
		<div class="submenu" id="app">
			<div class="category-info">
				<h5>Apps</h5>
			</div>
			<ul class="submenu-list" data-parent-element="#app">
				<li>
					<a href="<?=base_url('admin/device')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Device</a>
				</li>
			</ul>
		</div>
		<div class="submenu" id="forms">
			<div class="category-info">
				<h5>Data Karyawan</h5>
			</div>
			<ul class="submenu-list" data-parent-element="#forms">
				<li>
					<a href="<?=base_url('admin/data=master')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Master Data</a>
				</li>
				<li>
					<a href="<?=base_url('admin/data=jabatan')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Jabatan</a>
				</li>
			</ul>
		</div>
		<div class="submenu" id="users">
			<div class="category-info">
				<h5>Users</h5>
			</div>
			<ul class="submenu-list" data-parent-element="#users">
				<li>
					<a href="<?=base_url('admin/data=users')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> CS Users </a>
				</li>
			</ul>
		</div>
	</div>
</div>