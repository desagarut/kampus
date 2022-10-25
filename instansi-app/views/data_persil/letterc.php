<script>
  $( function() {
	  $( "#cari" ).autocomplete({
	    source: function( request, response ) {
	      $.ajax( {
					type: "POST",
	        url: '<?= site_url("letterc/autocomplete")?>',
	        dataType: "json",
	        data: {
	          cari: request.term
	        },
	        success: function( data ) {
	          response( JSON.parse( data ));
	        }
	      } );
	    },
	    minLength: 1,
	  } );
  } );
</script>
<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Daftar Letter-C <?= ucwords($this->setting->sebutan_desa)?> <?= $kelurahan["nama_desa"];?></h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Daftar Letter-C</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<?php $this->load->view('data_persil/menu_kiri.php')?>
				</div>
				<div class="col-md-8 col-lg-9">
					
						<div class="card-header">
							<h4 class="text-center"><strong>DAFTAR LETTER C</strong></h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<a href='<?= site_url("letterc/cetak")?>' class="btn btn-box bg-purple btn-sm btn-sm " title="Cetak Data" target="_blank">
											<i class="fa fa-print"></i>Cetak
										</a>
										<a href="<?= site_url("letterc/unduh")?>" class="btn btn-box bg-navy btn-sm btn-sm " title="Unduh Data" target="_blank">
											<i class="fa fa-download"></i>Unduh
										</a>
										<a href="<?= site_url("letterc/clear")?>" class="btn btn-box bg-purple btn-sm "><i class="fa fa-refresh"></i>Bersihkan</a>
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("letterc/search")?>');$('#'+'mainform').submit();}">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("letterc/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th>No</th>
																	<th>Aksi</th>
																	<th nowrap>No. Letter-C</th>
																	<th>Nama di Letter-C</th>
																	<th>Nama Pemilik</th>
																	<th>NIK</th>
																	<th nowrap>Jumlah Persil</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($letterc as $item): ?>
																	<tr>
																		<td><?= $item['no']?></td>
																		<td nowrap>
																			<a href="<?= site_url("letterc/rincian/".$item["id_letterc"])?>" class="btn bg-purple btn-box btn-sm"  title="Rincian"><i class="fa fa-bars"></i></a>
																			<a href="<?= site_url("letterc/create_mutasi/".$item["id_letterc"])?>" class="btn bg-green btn-box btn-sm"  title="Tambah Data"><i class="fa fa-plus"></i></a>
																			<a href="<?= site_url("letterc/create/edit/".$item["id_letterc"])?>" class="btn bg-yellow btn-box btn-sm"  title="Ubah Data"><i class="fa fa-edit"></i></a>
																			<a href="#" data-href="<?= site_url("letterc/hapus/".$item["id_letterc"])?>" class="btn bg-maroon btn-box btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																		</td>
																		<td><?= sprintf("%04s", $item["nomor"]) ?></td>
																		<td><?= $item['nama_kepemilikan'] ?>
																		<td><?= strtoupper($item["namapemilik"]) ?></td>
																		<td><a href='<?= site_url("penduduk/detail/1/0/$item[id_pend]")?>'><?= $item["nik"] ?></a></td>
																		<td><?= $item["jumlah"] ?></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
										<?php $this->load->view('global/paging');?>
									</div>
								</div>
							</div>
							<?php $this->load->view('global/confirm_delete');?>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

