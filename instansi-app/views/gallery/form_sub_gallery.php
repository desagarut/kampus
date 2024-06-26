<!-- Content Header (Page header) -->
<div class="content-wrapper">

	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Form Foto</h4>
					<ol class="breadcrumb">
						<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="<?= site_url('gallery') ?>"><i class="fa fa-dashboard"></i> Daftar Isi Album</a></li>
						<li class="breadcrumb-item active">Form Foto</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content" id="maincontent">
		<div class="card">
			<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="row">
					<div class="col-md-12">

						<div class="card-header">
							<a href="<?= site_url("gallery/sub_gallery/$album") ?>" class="btn btn-box btn-info btn-sm btn-sm " title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Gambar Album
							</a>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama Gambar</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm nomor_sk" maxlength="50" type="text" value="<?= $gallery['nama'] ?>"></input>
								</div>
							</div>
							<?php if ($gallery['gambar']) : ?>
								<div class="form-group">
									<label class="control-label col-sm-4" for="nama"></label>
									<div class="col-sm-6">
										<input type="hidden" name="old_gambar" value="<?= $gallery['gambar'] ?>">
										<img class="attachment-img img-responsive" src="<?= AmbilGaleri($gallery['gambar'], 'sedang') ?>" alt="Gambar Album">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
								<label class="control-label col-sm-4" for="upload">Unggah Gambar</label>
								<div class="col-sm-6">
									<div class="input-group input-group-sm">
										<input type="text" class="form-control <?php !($gallery['gambar']) and print('required') ?>" id="file_path">
										<input id="file" type="file" class="hidden" name="gambar">
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fa fa-search"></i> Browse</button>
										</span>
									</div>
									<?php $upload_mb = max_upload(); ?>
									<p><label class="control-label">Batas maksimal pengunggahan berkas <strong><?= $upload_mb ?> MB.</strong></label></p>
								</div>
							</div>
						</div>
						<div class='card-footer'>
							<div class='col-xs-12'>
								<button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>