<div class="container-fluid h-100">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

	</div>

	<!-- Content Row -->
	<div class="row justify-content-around">
        <div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Lokasi</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_lokasi?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-fw fa-map-marked-alt fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wisata</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_wisata?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-fw fa-hot-tub fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Penginapan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_penginapan?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-fw fa-hotel fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">User</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total_user?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
