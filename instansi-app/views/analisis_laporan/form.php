<?php
	$subjek_tipe  = $_SESSION['subjek_tipe'];
	switch ($subjek_tipe ):
		case 1: $sql = $nama="Nama"; $nomor="NIK";$asubjek="Penduduk"; break;
		case 2: $sql = $nama="Kepala Keluarga"; $nomor="Nomor KK";$asubjek="Keluarga"; break;
		case 3: $sql = $nama="Kepala Rumah Tangga"; $nomor="Nomor Rumah Tangga";$asubjek="Rumah Tangga"; break;
		case 4: $sql = $nama="Nama Kelompok"; $nomor="ID Kelompok";$asubjek="Kelompok"; break;
		default: return null;
	endswitch;
?>
<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Laporan Hasil Analisis</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('analisis_master') ?>"> Master Analisis</a></li>
			<li><a href="<?= site_url() ?>analisis_laporan/leave"><?= $analisis_master['nama']?></a></li>
						<li class="breadcrumb-item active">Laporan Hasil Klasifikasi</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	</div>
	<div class="card">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<?php $this->load->view('analisis_master/left', $data);?>
				</div>
				<div class="col-md-8 col-lg-9">
					
						<div class="card-header">
							<a href="<?= site_url("analisis_laporan/dialog_kuisioner/$p/$o/$id/cetak")?>" class="btn btn-box bg-purple btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Laporan Hasil Analisis <?= $asubjek?> <?= $subjek['nama']?> "><i class="fa fa-print "></i> Cetak</a>

							<a href="<?= site_url("analisis_laporan/dialog_kuisioner/$p/$o/$id/unduh")?>" class="btn btn-box bg-navy btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Laporan Hasil Analisis <?= $asubjek?> <?= $subjek['nama']?> "><i class="fa fa-download "></i> Unduh</a>

							<a href="<?=site_url("analisis_laporan/clear")."/".$analisis_master['id']?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Kembali Ke Laporan Hasil Klasifikasi">
								<i class="fa fa-arrow-circle-left "></i>Kembali Ke Laporan Hasil Klasifikasi</a>
						</div>
						<div class="card-header">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover" >
									<tr>
										<td nowrap width="150">Hasil Pendataan</td>
										<td width="1">:</td>
										<td><a href="<?= site_url() ?>analisis_master/menu/<?= $_SESSION['analisis_master']?>"><?= $analisis_master['nama']?></a></td>
									</tr>
									<tr>
										<td>Nomor Identitas</td>
										<td>:</td>
										<td><?= $subjek['nid']?></td>
									</tr>
									<tr>
										<td>Nama Subjek</td>
										<td>:</td>
										<td><?= $subjek['nama']?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<h5 class="card-title">DAFTAR ANGGOTA</h5>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover ">
											<thead class="bg-gray color-palette">
												<tr>
													<th>NO</th>
													<th>NIK</th>
													<th>NAMA</th>
													<th>TANGGAL LAHIR</th>
													<th>JENIS KELAMIN</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach ($list_anggota AS $ang): ?>
													<tr>
														<td><?= $i?></td>
														<td><?= $ang['nik']?></td>
														<td width="45%"><?= $ang['nama']?></td>
														<td><?= tgl_indo($ang['tanggallahir']) ?></td>
														<td><?php if ($ang['sex'] == 1): ?>LAKI-LAKI<?php endif; ?><?php if ($ang['sex'] == 2): ?>PEREMPUAN<?php endif; ?></td>
													</tr>
												<?php $i++; endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover ">
											<thead class="bg-gray color-palette">
												<tr>
													<th>No</th>
													<th width="45%">Pertanyaan / Indikator</th>
													<th>Bobot</td>
													<th>Jawaban</th>
													<th>Nilai</th>
													<th>Poin</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($list_jawab AS $data): ?>
													<?php if ($data['cek'] >= 1):$bg = "class='bg'";else:$bg ="";endif; ?>
													<tr>
														<td><?= $data['no']?></td>
														<td><?= $data['pertanyaan']?></td>
														<td><?= $data['bobot']?></td>
														<td><?= $data['jawaban']?></td>
														<td><?= $data['nilai']?></td>
														<td><?= $data['poin']?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
											<tfoot  class="bg-info olor-palette">
												<tr class="total">
													<td colspan='5'><strong>TOTAL</strong></td>
													<td><?= $total?></td>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

