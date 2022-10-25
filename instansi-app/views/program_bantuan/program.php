<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Program Bantuan</h4>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active">Daftar Program Bantuan</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="row">
					<div class="col-md-12">

						<div class="card-header">
							<?php if ($this->CI->cek_hak_akses('h')) : ?>
								<a href="<?= site_url('program_bantuan/create') ?>" class="btn btn-box bg-olive btn-sm " title="Tambah Program Bantuan"><i class="fa fa-plus"></i> Tambah</a>
								<a href="<?= site_url('program_bantuan/impor') ?>" class="btn btn-box bg-navy btn-sm " title="Impor Program Bantuan" data-target="#impor" data-remote="false" data-toggle="modal" data-backdrop="false" data-keyboard="false"><i class="fa fa-upload"></i> Impor</a>
							<?php endif; ?>
							<a href="<?= site_url('program_bantuan/panduan') ?>" class="btn btn-box btn-info btn-sm " title="Panduan"><i class="fa fa-question-circle"></i> Panduan</a>
							<?php if ($tampil != 0) : ?>
								<a href="<?= site_url('program_bantuan') ?>" class="btn btn-box btn-info btn-sm " title="Kembali Ke Daftar Program Bantuan"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Program Bantuan</a>
							<?php endif; ?>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row">
											<div class="col-sm-9">
												<form id="mainform" name="mainform" action="" method="post">
													<select class="form-control input-sm" name="sasaran" onchange="formAction('mainform', '<?= site_url('program_bantuan/filter/sasaran') ?>')">
														<option value="">Pilih Sasaran</option>
														<?php foreach ($list_sasaran as $key => $value) : ?>
															<option value="<?= $key; ?>" <?= selected($set_sasaran, $key); ?>><?= $value ?></option>
														<?php endforeach; ?>
													</select>
												</form>
											</div>
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover" id="table-program">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th width="1%">No</th>
																<?php if ($this->CI->cek_hak_akses('h')) : ?>
																	<th width="5%" class="text-center">Aksi</th>
																<?php endif ?>
																<th class="text-center">Nama Program</th>
																<th class="text-center">Asal Dana</th>
																<th class="text-center">Jumlah Peserta</th>
																<th class="text-center">Masa Berlaku</th>
																<th class="text-center">Sasaran</th>
																<th class="text-center">Status</th>
															</tr>
														</thead>
														<tbody>
															<?php $nomer = $paging->offset; ?>
															<?php foreach ($program as $item) : ?>
																<?php $nomer++; ?>
																<tr>
																	<td class="text-center"><?= $nomer ?></td>
																	<?php if ($this->CI->cek_hak_akses('h')) : ?>
																		<td nowrap>
																			<a href="<?= site_url("program_bantuan/detail/$item[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian"><i class="fa fa-list"></i></a>
																			<a href="<?= site_url("program_bantuan/edit/$item[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																			<?php if ($item['jml_peserta'] != 0) : ?>
																				<a href="<?= site_url("program_bantuan/expor/$item[id]"); ?>" class="btn bg-navy btn-box btn-sm" title="Expor"><i class="fa fa-download"></i></a>
																				<a href="#" class="btn bg-maroon btn-box btn-sm disabled" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																			<?php endif ?>
																			<?php if ($item['jml_peserta'] == 0) : ?>
																				<a href="#" data-href="<?= site_url("program_bantuan/hapus/$item[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																			<?php endif ?>
																		</td>
																	<?php endif; ?>
																	<td nowrap><a href="<?= site_url("program_bantuan/detail/$item[id]") ?>"><?= $item["nama"] ?></a></td>
																	<td align="center"><?= $item['asaldana'] ?></td>
																	<td align="center"><?= $item['jml_peserta'] ?></td>
																	<td align="center"><?= fTampilTgl($item["sdate"], $item["edate"]); ?></td>
																	<td align="center"><?= $sasaran[$item["sasaran"]] ?></td>
																	<td align="center"><?= $item['status'] ?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<?php $this->load->view('global/paging'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>

<?php include('instansi-app/views/program_bantuan/impor.php'); ?>