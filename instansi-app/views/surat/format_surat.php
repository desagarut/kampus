<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>Layanan Cetak Surat</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Beranda</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('surat'); ?>">Layanan Cetak Surat</a></li>
						<li class="breadcrumb-item active"><a href="#!">daftar </a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<form id="main" name="main" action="<?= site_url() ?>surat/search" method="post">
								<div class="row">
									<div class="col-sm-6">
										<select class="form-control select2bs4 " id="nik" name="nik" onchange="formAction('main')" style="width: 100%;">
											<option selected="selected">-- Cari Judul Surat--</option>
											<?php foreach ($menu_surat2 as $data) : ?>
												<option value="<?= $data['url_surat'] ?>"><?= strtoupper($data['nama']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</form>
						</div>
						<div class="card-body">
							<?php if ($data['favorit'] = 1) : ?>
								<div class="row">
									<div class="col-sm-12">
										<table class="table table-bordered dataTable table-striped table-hover table-responsive">
											<thead class="bg-gray disabled color-palette">
												<tr>
													<th width="1%">No</th>
													<th>Aksi</th>
													<th width="50%">Layanan Administrasi Surat (Daftar Favorit)</th>
													<th>Kode Surat</th>
													<th>Lampiran</th>
												</tr>
											</thead>
											<tbody>
												<?php if (count($surat_favorit) > 0) : ?>
													<?php $i = 1;
													foreach ($surat_favorit as $data) : ?>
														<tr <?php if ($data['jenis'] != 1) : ?>style='background-color:#f8deb5 !important;' <?php endif; ?>>
															<td class="text-center"><?= $i; ?></td>
															<td class="nostretch">
																<a href="<?= site_url() ?>surat/form/<?= $data['url_surat'] ?>" class="btn btn-box bg-olive btn-sm" title="Buat Surat"><i class="fa fa-file-word-o"></i>Buat Surat</a>
																<a href="<?= site_url("surat/favorit/$data[id]/$data[favorit]") ?>" class="btn bg-purple btn-box btn-sm" title="Keluarkan dari Daftar Favorit"><i class="fa fa-star"></i></a>
															</td>
															<td><?= $data['nama'] ?></td>
															<td><?= $data['kode_surat'] ?></td>
															<td><?= $data['nama_lampiran'] ?></td>
														</tr>
													<?php $i++;
													endforeach; ?>
												<?php else : ?>
													<tr>
														<td colspan="5" class="card card-warning box-solid">
															<div class="card-body text-center">
																<span>Belum ada surat favorit</span>
															</div>
														</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
								<hr />
							<?php endif; ?>
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-bordered dataTable table-striped table-hover table-responsive">
										<thead class="bg-gray disabled color-palette">
											<tr>
												<th width="1%">No</th>
												<th>Aksi</th>
												<th width="50%">Layanan Administrasi Surat</th>
												<th>Kode Surat</th>
												<th>Lampiran</th>
											</tr>
										</thead>
										<tbody>
											<?php $nomer = 1;
											foreach ($menu_surat2 as $data) : ?>
												<?php if ($data['favorit'] != 1) : ?>
													<tr <?php if ($data['jenis'] != 1) : ?>style='background-color:#f8deb5 !important;' <?php endif; ?>>
														<td><?= $nomer; ?></td>
														<td class="nostretch">
															<a href="<?= site_url() ?>surat/form/<?= $data['url_surat'] ?>" class="btn btn-box bg-purple btn-sm" title="Buat Surat"><i class="fa fa-file-word-o"></i>Buat Surat</a>
															<a href="<?= site_url("surat/favorit/$data[id]/$data[favorit]") ?>" class="btn bg-purple btn-box btn-sm" title="Tambahkan ke Daftar Favorit"><i class="fa fa-star-o"></i></a>
														</td>
														<td><?= $data['nama'] ?></td>
														<td><?= $data['kode_surat'] ?></td>
														<td><?= $data['nama_lampiran'] ?></td>
													</tr>
												<?php $nomer++;
												endif; ?>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>