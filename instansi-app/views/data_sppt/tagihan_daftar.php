<?php ?>
<script>
  $(function() {
    $("#cari_tagih").autocomplete({
      source: function(request, response) {
        $.ajax({
          type: "POST",
          url: '<?= site_url("data_sppt/autocomplete") ?>',
          dataType: "json",
          data: {
            cari: request.term
          },
          success: function(data) {
            response(JSON.parse(data));
          }
        });
      },
      minLength: 1,
    });
  });
</script>

<div class="pcoded-main-container">
	<div class="pcoded-content">
 
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row class-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Pengelolaan SPPT <?= ucwords($this->setting->sebutan_desa) ?> <?= $desa["nama_desa"]; ?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>"><i class="feather icon-home"></i></a></li>
						<li class="breadcrumb-item active"><a href="#!">Pertanahan</a></li>
              <li class="breadcrumb-item"><a href="#!">Tagihan & Pembayaran</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <!-- Start Menu -->
        <?php $this->load->view('data_sppt/menu.php') ?>
        <!-- end Menu -->
      </div>
    </div>

    <form id="mainform" name="mainform" action="" method="post">
      <div class="card">
        <div class="card-header text-center">
          <a href="<?= site_url("data_sppt/tagihan_daftar/") ?>" class="btn btn-info mb-2 mr-2" title="Master Data">Master Data</a>
          <a href="<?= site_url("data_sppt/tagihan_cetak") ?>" class="btn btn-icon btn-primary mb-2 mr-2" title="Cetak Data" target="_blank"><i class="feather icon-printer"></i></a>
          <a href="<?= site_url("data_sppt/tagihan_unduh") ?>" class="btn btn-icon btn-secondary mb-2 mr-2" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data Tagihan" title="Unduh Data Tagihan"><i class="feather icon-download-cloud"></i></a>
          <!-- <a href="<?= site_url('data_sppt/import') ?>" class="btn bg-teal btn-sm btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data SPPT" title="Unduh Data SPPT"> <i class="fa fa-upload"></i>Unggah </a> -->
          <a href="<?= site_url("data_sppt/clear_tagih") ?>" class="btn btn-icon btn-warning mb-2 mr-2"><i class="feather icon-refresh-cw"></i></a>
        </div>

        <div class="card-body table-border-style">
          <form id="mainform" name="mainform" action="" method="post">
            <div class="row">
              <div class="col-xl-12 col-sm-12">
                <h4 class="text-center"><strong>DAFTAR TAGIHAN & PEMBAYARAN SPPT PBB</strong></h4>
              </div>
              <div class="col-xl-12 col-sm-12">
                <div class="box-tools">
                  <div class="input-group input-group-sm pull-right">
                    <input name="cari_tagih" id="cari_tagih" class="form-control" placeholder="cari tagihan..." type="text" value="<?= html_escape($cari_tagih) ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("data_sppt/search_tagih") ?>');$('#'+'mainform').submit();}">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("data_sppt/search_tagih") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">NOP</th>
                <th class="text-center">Nama Wajib Pajak</th>
                <th class="text-center">Total Tagihan</th>
                <th class="text-center">Tanggal Update</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($list_tagihan as $item) : ?>
                <tr>
                  <td class="text-center"><?= $item['no'] ?></td>
                  <td class="text-center">
                    <div class="btn-group">
                      <?php if ($item['status'] == "Lunas") : ?>
                        <button type="button" href="<?= site_url("data_sppt/tagihan_ubah_bayar/" . $item["id_tagih"]) ?>" class="btn btn-secondary btn-sm" disabled title="Pembayaran Selesai" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pembayaran Selesai">Lunas </a></button>
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <!--<li><a href="<?= site_url("data_sppt/tagihan_ubah_bayar/" . $item["id_tagih"]) ?>" class="btn bg-green btn-box btn-block btn-sm"  title="Terima Pembayaran Pajak" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Terima Pembayaran Pajak"><i class="fa fa-dollar"></i> Bayar</a> </li>-->
                          <li><a href="<?= site_url("data_sppt/tagihan_ubah/" . $item["id_tagih"]) ?>" class="btn bg-yellow btn-box btn-block btn-sm" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Tagihan"><i class="fa fa-edit"></i>Ubah</a> </li>
                          <li><a href="#" data-href="<?= site_url("data_sppt/hapus_tagih/" . $item["id_tagih"]) ?>" class="btn bg-red btn-box btn-block btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i>Hapus</a> </li>
                        </ul>


                      <?php elseif ($item['status'] == "Belum Bayar") :  ?>
                        <button type="button" href="<?= site_url("data_sppt/tagihan_ubah_bayar/" . $item["id_tagih"]) ?>" class="btn btn-danger btn-sm" title="Terima Pembayaran Pajak" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Terima Pembayaran Pajak"><i class="fa fa-dollar"></i> Bayar</a></button>

                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <!--<li><a href="<?= site_url("data_sppt/tagihan_ubah_bayar/" . $item["id_tagih"]) ?>" class="btn bg-green btn-box btn-block btn-sm"  title="Terima Pembayaran Pajak" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Terima Pembayaran Pajak"><i class="fa fa-dollar"></i> Bayar</a> </li>-->
                          <li><a href="<?= site_url("data_sppt/tagihan_ubah/" . $item["id_tagih"]) ?>" class="btn bg-yellow btn-box btn-block btn-sm" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Tagihan"><i class="fa fa-edit"></i>Ubah</a> </li>
                          <li><a href="#" data-href="<?= site_url("data_sppt/hapus_tagih/" . $item["id_tagih"]) ?>" class="btn bg-red btn-box btn-block btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i>Hapus</a> </li>
                        </ul>
                      <?php endif; ?>
                    </div>
                  </td>
                  <td class="text-center"><?= sprintf("%04s", $item["tahun_tagih"]) ?></td>
                  <td class="text-center"><?= sprintf("%04s", $item["nomor"]) ?></td>
                  <td nowrap><?= $item['nama_wp'] ?></td>
                  <td nowrap class="text-right"><?= rupiah($item['total_tagih']) ?></td>
                  <td class="text-center"><?= $item['tgl_bayar'] ?></td>
                  <td class="text-center"><?= $item['status'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php $this->load->view('global/paging'); ?>
        </div>
        </div>
    </form>
  </div>
</div>
</form>
</div>
</section>
<?php $this->load->view('global/confirm_delete'); ?>