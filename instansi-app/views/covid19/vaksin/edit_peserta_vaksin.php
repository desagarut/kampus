<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/script.js"></script>
<div class='modal-body'>
	<div class="row">
		<div class="col-sm-12">
			<div class="card card-danger">
				<div class="card-body">
					<table class="table table-bordered table-striped table-hover" >
						<tbody>
							<tr>
								<td style="padding-top : 10px;padding-bottom : 10px; width:40%;" ><?= $judul_terdata_nama?></td>
								<td> : <?= $terdata_nama?></td>
							</tr>
							<tr>
								<td style="padding-top : 10px;padding-bottom : 10px; width:40%;" ><?= $judul_terdata_info?></td>
								<td> :  <?= $terdata_info?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="card card-danger">
				<div class="card-body">
					<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<?php include("instansi-app/views/covid19/vaksin/form_isian_peserta_vaksin.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
		<button type="submit" class="btn btn-box btn-info btn-sm" onclick="$('#'+'validasi').submit();"><i class="fa fa-check"></i> Simpan</button>
	</div>
</div>
