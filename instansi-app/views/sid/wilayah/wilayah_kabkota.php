<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Daftar Kabupaten/Kota Prov. <?= $data['provinsi'] ?></h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active"><a href="<?= site_url('identitas_instansi') ?>">Identitas Instansi</a></li>
						<li class="breadcrumb-item active"><a href="#!">wilayah Kab/Kota</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<a href="<?= site_url("sid_core") ?>" class="btn btn-box btn-info btn-sm btn-sm" title="Kembali Ke Daftar Kabupaten Kota">
							<i class="fa fa-arrow-circle-left "></i>&nbsp;Kembali ke Daftar Kab/Kota
						</a>
						<?php if ($this->CI->cek_hak_akses('h')) : ?>
							<a href="<?= site_url("sid_core/form_kabkota/$id_provinsi") ?>" class="btn btn-box btn-success btn-sm" title="Tambah Data"><i class="fa fa-plus"></i></a>
						<?php endif; ?>
						<a href="<?= site_url("sid_core/cetak_kabkota/$id_provinsi") ?>" class="btn btn-box bg-purple btn-sm" title="Cetak Data" target="_blank"><i class="fa fa-print "></i></a>
						<a href="<?= site_url("sid_core/excel_kabkota/$id_provinsi") ?>" class="btn btn-box bg-navy btn-sm" title="Unduh Data" target="_blank"><i class="fa fa-download"></i></a>
					</div>
					<div class="card-header">
						<strong>Provinsi <?= $provinsi ?></strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="padat">No</th>
																<th class="padat">Aksi</th>
																<th>RW</th>
																<th>Ketua RW</th>
																<th>NIK Ketua RW</th>
																<th>RT</th>
																<th>KK</th>
																<th>L+P</th>
																<th>L</th>
																<th>P</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $data) : ?>
																<tr>
																	<td><?= $data['no'] ?></td>
																	<td nowrap>
																		<a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian Sub Wilayah RW"><i class="fa fa-search"></i> RT</a>
																		<?php if ($this->CI->cek_hak_akses('u')) : ?>
																			<?php if ($data['rw'] != "-") : ?>
																				<a href="<?= site_url("sid_core/form_rw/$id_dusun/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																			<?php endif; ?>
																			<?php if ($data['rw'] != "-") : ?>
																				<a href="#" data-href="<?= site_url("sid_core/delete/rw/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																			<?php endif; ?>
																		<?php endif; ?>
																		<?php if ($data['rw'] != "-") : ?>
																			<a href="<?= site_url("sid_core/ajax_kantor_rw_google_maps/$id_dusun/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Lokasi Kantor"><i class="fa fa-map-marker"></i></a>
																			<a href="<?= site_url("sid_core/ajax_wilayah_rw_google_maps/$id_dusun/$data[id]") ?>" class="btn btn-primary btn-box btn-sm" title="Peta Google"><i class="fa fa-google"></i></a>
																			<a href="<?= site_url("sid_core/ajax_wilayah_rw_openstreet_maps/$id_dusun/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Peta Openstreet"><i class="fa fa-map-o"></i></a>

																		<?php endif; ?>
																	</td>
																	<td><?= $data['kabkota'] ?></td>
																	<?php if ($data['kabkota'] == "-") : ?>
																		<td colspan="2">
																			Pergunakan RW ini apabila RT berada langsung di bawah <?= ucwords($this->setting->sebutan_dusun) ?>, yaitu tidak ada RW
																		</td>
																	<?php else : ?>
																		<td nowrap><strong><?= $data['nama_ketua'] ?></strong></td>
																		<td><?= $data['nik_ketua'] ?></td>
																	<?php endif; ?>
																	<td><a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rt'] ?></a></td>
																	<td><?= $data['jumlah_kk'] ?></td>
																	<td><?= $data['jumlah_warga'] ?></td>
																	<td><?= $data['jumlah_warga_l'] ?></td>
																	<td><?= $data['jumlah_warga_p'] ?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
														<tfoot>
															<tr>
																<th colspan="5"><label>TOTAL</label></th>
																<th><?= $total['jmlrt'] ?></th>
																<th><?= $total['jmlkk'] ?></th>
																<th><?= $total['jmlwarga'] ?></th>
																<th><?= $total['jmlwargal'] ?></th>
																<th><?= $total['jmlwargap'] ?></th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</form>
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