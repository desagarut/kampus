<style>
	.input-sm
	{
		padding: 4px 4px;
	}
	@media (max-width:780px)
	{
		.btn-group-vertical
		{
			display: block;
		}
	}
	.table-responsive
	{
		min-height:275px;
	}
	.padat {width: 1%;}
	th.horizontal {width: 20%;}
</style>
<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Rincian Letter-C</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('letterc')?>"> Daftar Letter-C</a></li>
						<li class="breadcrumb-item active">Rincian Letter-C</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<div class="row">
			<div class="col-md-12">
				
					<div class="card-header">
						<a href="<?=site_url("letterc/create_mutasi/".$letterc['id'])?>" class="btn btn-box btn-success btn-sm btn-sm "  title="Tambah Persil">
							<i class="fa fa-plus"></i>Tambah Mutasi Persil
						</a>
						<a href="<?=site_url('letterc')?>" class="btn btn-box btn-info btn-sm " title="Kembali Ke Daftar Letter-C"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Letter-C</a>
						<a href="<?= site_url("letterc/form_letterc/".$letterc['id'])?>" class="btn btn-box bg-purple btn-sm btn-sm " title="Cetak Data" target="_blank">
							<i class="fa fa-print"></i>Cetak Letter-C
						</a>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">
										<div class="row">
											<div class="col-sm-12">
												<div class="card-header">
													<h3 class="card-title">Rincian Letter-C</h3>
												</div>
												<div class="card-body">
													<table class="table table-bordered  table-striped table-hover" >
														<tbody>
															<tr>
																<th class="horizontal">Nama Pemilik</td>
																<td> : <?= $pemilik["namapemilik"]?></td>
															</tr>
															<tr>
																<th class="horizontal">NIK</td>
																<td> :  <?= $pemilik["nik"]?></td>
															</tr>
															<tr>
																<th class="horizontal">Alamat</td>
																<td> :  <?= $pemilik["alamat"]?></td>
															</tr>
															<tr>
																<th class="horizontal">Nomor Letter-C</td>
																<td> : <?= sprintf("%04s", $letterc['nomor'])?></td>
															</tr>
															<tr>
																<th class="horizontal">Nama Pemilik Tertulis di Letter-C</td>
																<td> : <?= $letterc["nama_kepemilikan"]?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="row">
													<div class="col-sm-9">
														<div class="card-header">
															<h3 class="card-title">Daftar Persil Letter-C</h3>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th>No</th>
																<th>Aksi</th>
																<th>No. Persil : No. Urut Bidang</th>
																<th>Kelas Tanah</th>
																<th>Lokasi</th>
																<th>Luas Keseluruhan Persil (M2)</th>
																<th>Jumlah Mutasi</th>
															</tr>
														</thead>
														<tbody>
															<?php $nomer = 0?>
															<?php foreach ($persil as $key => $item): $nomer++;?>
																<tr>
																	<td class="text-center padat"><?= $nomer?></td>
																	<td nowrap class="padat">
																		<a href='<?= site_url("letterc/mutasi/$letterc[id]/$item[id]")?>' class="btn bg-maroon btn-box btn-sm"  title="Daftar Mutasi"><i class="fa fa-exchange"></i></a>
																	</td>
																	<td>
																		<a href="<?= site_url("data_persil/rincian/".$item["id"])?>">
																			<?= $item['nomor'].' : '.$item['nomor_urut_bidang']?>
																			<?php if ($letterc['id'] == $item['letterc_awal']): ?>
																				<code>( Pemilik awal )</code>
																			<?php endif; ?>
																		</a>
																	</td>
																	<td><?= $item['kelas_tanah']?></td>
																	<td><?= $item['alamat'] ?: $item['lokasi']?></td>
																	<td><?= $item['luas_persil']?></td>
																	<td><?= $item['jml_mutasi']?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
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
	</div>
</div>

