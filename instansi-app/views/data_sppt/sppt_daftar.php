<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

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
              <li class="breadcrumb-item"><a href="#!">Daftar SPPT PBB</a></li>
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

      <div class="card">
        <div class="card-header text-center">
          <a href="<?= site_url("data_sppt/sppt_form/") ?>" class="btn btn-icon btn-success mb-2 mr-2" title="Tambah Data SPPT"><i class="feather icon-plus"></i> </a>
          <a href="<?= site_url("data_sppt/cetak") ?>" class="btn btn-icon btn-primary mb-2 mr-2" title="Cetak Data"><i class="feather icon-printer"></i> </a>
          <a href="<?= site_url("data_sppt/unduh") ?>" class="btn btn-icon btn-secondary mb-2 mr-2" title="Unduh Data"><i class="feather icon-download-cloud"></i> </a>
          <!--<a href="<?= site_url('data_sppt/import') ?>" class="btn btn-icon btn-secondary mb-2 mr-2" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unggah Data SPPT" title="Unggah Data SPPT"><i class="feather icon-upload-cloud"></i></a>-->
          <a href="<?= site_url("data_sppt/clear") ?>" class="btn btn-icon btn-warning mb-2 mr-2"><i class="feather icon-refresh-cw"></i></a>
        </div>
        <div class="card-body table-border-style">
          <form id="mainform" name="mainform" action="" method="post">
            <div class="row">
              <div class="col-sm-12">
                <h4 class="text-center"><strong>DAFTAR SPPT PBB</strong></h4>
                <div class="card-tools">
                  <div class="input-group input-group-sm pull-right">
                    <input name="cari" id="cari" class="form-control" placeholder="Cari Nama Wajib pajak / Nomor objek pajak..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("data_persil/search") ?>');$('#'+'mainform').submit();}">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("data_sppt/search") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" width="12%">Pilih Aksi</th>
                    <th class="text-center" width="8%">Tahun</th>
                    <th class="text-center" width="10%">Nama WP | NOP</th>
                    <th class="text-center" width="10%">Pajak Awal</th>
                    <th class="text-center" width="15%">Blok</th>
                    <th class="text-center" width="13%">Nama Tertagih</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data_sppt as $item) : ?>
                    <tr>
                      <td class="text-center"><?= $item['no'] ?></td>
                      <td class="text-center">
                      <div class="btn-group mb-2 mr-2">
                          <a href="<?= site_url("data_sppt/sppt_detail/" . $item["id_sppt"]) ?>" ><button type="button" class="btn btn-info btn-sm">Detail</button></a>
                          <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= site_url("data_sppt/sppt_detail/" . $item["id_sppt"]) ?>">Lihat Detail</a>
                            <a class="dropdown-item" href="<?= site_url("data_sppt/sppt_form/edit/" . $item["id_sppt"]) ?>">Ubah Data</a>
                            <a class="dropdown-item" href="<?= site_url("data_sppt/ajax_lokasi_maps/" . $item["id_sppt"]) ?>">Lokasi OP</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url("data_sppt/tagihan_tambah/edit/" . $item["id_sppt"]) ?>">Buat Tagihan</a>
                            <a class="dropdown-item" href="<?= site_url("data_sppt/hapus/" . $item["id_sppt"]) ?>">Hapus</a>
                          </div>
                        </div>
                        <!--<div class="btn-group">
                          <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" title="Detail Info SPPT">Detail</button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= site_url("data_sppt/sppt_detail/" . $item["id_sppt"]) ?>" class="btn btn-sm" title="Rincian"><i class="fa fa-eye"></i> Detail</a></li>
                            <li><a href="<?= site_url("data_sppt/tagihan_tambah/edit/" . $item["id_sppt"]) ?>" class="btn btn-sm" title="Buat Tagihan Pajak" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Buat Tagihan Pajak"><i class="fa fa-dollar"></i> Buat Tagihan</a> </li>
                            <li><a href="<?= site_url("data_sppt/ajax_lokasi_maps/" . $item["id_sppt"]) ?>" class="btn btn-sm" title="Lokasi <?= $data['nama'] ?>"><i class="fa fa-map"></i>Peta</a></li>
                            <li><a href="<?= site_url("data_sppt/sppt_form/edit/" . $item["id_sppt"]) ?>" class="btn btn-sm" title="Ubah Data"><i class="fa fa-edit"></i> Ubah</a></li>
                            <li><a href="#" data-href="<?= site_url("data_sppt/hapus/" . $item["id_sppt"]) ?>" class="btn btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> Hapus</a></li>
                          </ul>
                        </div>-->
                      </td>
                      <td class="text-center"><?= sprintf("%04s", $item["tahun_awal"]) ?></td>
                      <!--<td><a href="<? //= site_url("data_sppt/sppt_detail/".$item["id_sppt"])
                                        ?>" class="btn bg-green disabled btn-box btn-sm"  title="Lihat Detail Objek Pajak"><?= sprintf("%04s", $item["nomor"]) ?></a></td>-->
                      <td><strong><?= $item['nama_wp'] ?></strong><br /><?= $item['nomor'] ?></td>
                      <td class="right"><?= $rupiah($item["pbb_terhutang"]) ?></td>
                      <td><?= $item['letak_op'] ?></td>
                      <td><?= strtoupper($item["namatertagih"]) ?>
                        </br>
                        <i style="color:#090">NIK : </i><i><a href='<?= site_url("penduduk/detail/1/0/$item[id_pend]") ?>'>
                            <?= $item["nik"] ?>
                          </a></i><br />
                        <?= $item['alamat'] ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php $this->load->view('global/paging'); ?>
            </div>

          </form>
        </div>
      </div>
  </div>
</div>

<script>
  $(function() {
    $("#cari").autocomplete({
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