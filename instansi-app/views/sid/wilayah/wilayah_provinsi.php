<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
			<div class="col-sm-4">
					<h5 class="m-0">Daftar Wilayah Provinsi</h5>
				</div>
				<div class="col-sm-8">
					<small>
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
							<li class="breadcrumb-item active"><a href="<?= site_url('identitas_instansi') ?>">wilayah Provinsi</a></li>
						</ol>
					</small>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<section class="content" id="maincontent">
		<div class="row">
			<div class="card">
				<div class="card-header">
					<?php if ($this->CI->cek_hak_akses('h')) : ?>
						<a href="<?= site_url('sid_core/form') ?>" class="btn btn-box btn-success btn-sm pull-left" title="Tambah Data"><i class="fa fa-plus"></i></a>
					<?php endif; ?>
					<a href="<?= site_url("$this->controller/dialog/cetak") ?>" class="btn btn-box bg-purple btn-sm" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data"><i class="fa fa-print "></i></a>
					<a href="<?= site_url("$this->controller/dialog/unduh") ?>" title="Unduh Data" class="btn btn-box bg-navy btn-sm" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data"><i class="fa fa-download"></i></a>

					<div class="card-tools">
						<form id="mainform" name="mainform" action="" method="post">

							<div class="input-group input-group-sm" style="width: 250px;">
								<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action','<?= site_url('sid_core/search') ?>');$('#'+'mainform').submit();};">
								<div class="input-group-btn">
									<button type="submit" class="btn btn-sm btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("sid_core/search") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="card-body">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="row">
							<div class="card-body table-responsive" style="height: 350px;">
								<table class="table table-hover">
									<thead>
										<tr>
											<th class="padat">No</th>
											<th wlass="padat">Aksi</th>
											<th width="35%">Povinsi</th>
											<th width="35%">Ketua</th>
											<th class="text-center">Kab/Kota</th>
											<th class="text-center">Kec</th>
											<th class="text-center">Desa/Kel.</th>
											<th class="text-center">Wil</th>
											<th class="text-center">RW</th>
											<th class="text-center">RT</th>
											<th class="text-center">KK</th>
											<th class="text-center">L+P</th>
											<th class="text-center">L</th>
											<th class="text-center">P</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$total = array();
										$total['total_kabkota'] = 0;
										$total['total_kecamatan'] = 0;
										$total['total_desa'] = 0;
										$total['total_wilayah'] = 0;
										$total['total_rw'] = 0;
										$total['total_rt'] = 0;
										$total['total_kk'] = 0;
										$total['total_warga'] = 0;
										$total['total_warga_l'] = 0;
										$total['total_warga_p'] = 0;
										foreach ($main as $data) :
										?>
											<tr>
												<td class="no_urut"><?= $data['no'] ?></td>
												<td nowrap>
													<a href="<?= site_url("sid_core/sub_kabkota/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian Sub Wilayah"><i class="fa fa-search"></i> Kab/Kota</a>
													<?php if ($this->CI->cek_hak_akses('h')) : ?>
														<a href="<?= site_url("sid_core/form_provinsi/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
														<a href="#" data-href="<?= site_url("sid_core/delete/dusun/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
														<a href="<?= site_url("sid_core/ajax_kantor_dusun_maps_google/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Lokasi Kantor"><i class="fa fa-map-marker"></i></a>
														<a href="<?= site_url("sid_core/ajax_wilayah_dusun_maps_google/$data[id]") ?>" class="btn btn-primary btn-box btn-sm" title="Peta Google"><i class="fa fa-map"></i></a>
														<a href="<?= site_url("sid_core/ajax_wilayah_dusun_openstreet_maps/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Peta Openstreet"><i class="fa fa-map-o"></i></a>
													<?php endif; ?>
												</td>
												<td nowrap><?= strtoupper($data['provinsi']) ?></td>
												<td nowrap><strong><?= strtoupper($data['nama_kadus']) ?></strong> - <?= $data['nik_kadus'] ?></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/sub_kabkota/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_kabkota'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/sub_kec/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_kecamatan'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/sub_desa/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_desa'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/sub_wil/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_dusun'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rw'] ?></a></td>
												<td class="bilangan"><?= $data['jumlah_rt'] ?></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/warga_kk/$data[id]") ?>"><?= $data['jumlah_kk'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/warga/$data[id]") ?>"><?= $data['jumlah_warga'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/warga_l/$data[id]") ?>"><?= $data['jumlah_warga_l'] ?></a></td>
												<td class="bilangan"><a href="<?= site_url("sid_core/warga_p/$data[id]") ?>"><?= $data['jumlah_warga_p'] ?></a></td>
											</tr>
										<?php
											$total['total_kabkota'] += $data['jumlah_kabkota'];
											$total['total_kecamatan'] += $data['jumlah_kecamatan'];
											$total['total_desa'] += $data['jumlah_desa'];
											$total['total_wilayah'] += $data['jumlah_dusun'];
											$total['total_rw'] += $data['jumlah_rw'];
											$total['total_rt'] += $data['jumlah_rt'];
											$total['total_kk'] += $data['jumlah_kk'];
											$total['total_warga'] += $data['jumlah_warga'];
											$total['total_warga_l'] += $data['jumlah_warga_l'];
											$total['total_warga_p'] += $data['jumlah_warga_p'];
										endforeach;
										?>
									</tbody>
									<tfoot>
										<tr>
											<th colspan="4"><label align="center">TOTAL</label></th>
											<th class="bilangan"><?= $total['total_kabkota'] ?></th>
											<th class="bilangan"><?= $total['total_kecamatan'] ?></th>
											<th class="bilangan"><?= $total['total_desa'] ?></th>
											<th class="bilangan"><?= $total['total_wilayah'] ?></th>
											<th class="bilangan"><?= $total['total_rw'] ?></th>
											<th class="bilangan"><?= $total['total_rt'] ?></th>
											<th class="bilangan"><?= $total['total_kk'] ?></th>
											<th class="bilangan"><?= $total['total_warga'] ?></th>
											<th class="bilangan"><?= $total['total_warga_l'] ?></th>
											<th class="bilangan"><?= $total['total_warga_p'] ?></th>
										</tr>
									</tfoot>
								</table>
								<?php //$this->load->view('global/paging');
								?>
							</div>
							<?php $this->load->view('global/paging'); ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('global/confirm_delete'); ?>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>