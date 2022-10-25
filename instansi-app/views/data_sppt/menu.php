			<a href="<?= site_url('data_sppt/rekap')?>"><button class="btn btn-primary btn-sm mb-2 mr-2">Rekapitulasi</button></a>
            <?php if ($this->CI->cek_hak_akses('u')): ?>
			<a href="<?= site_url('data_sppt/clear')?>"><button class="btn btn-info btn-sm mb-2 mr-2">Master Data</button></a>
            <?php endif;?>
			<a href="<?= site_url('data_sppt/tagihan_daftar')?>"><button class="btn btn-danger btn-sm mb-2 mr-2">Tagihan & Pembayaran</button></a>
            <?php if ($this->CI->cek_hak_akses('u')): ?>
            <!--<a href="<?= site_url('data_sppt/import')?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Data SPPT"><button class="btn btn-success btn-sm mb-2 mr-2">Impor Data SPPT PBB</button></a>-->
			<?php endif ?>
            <a href="<?= site_url('data_sppt/panduan')?>"><button class="btn btn-success btn-sm mb-2 mr-2">Panduan SPPT PBB</button></a>
