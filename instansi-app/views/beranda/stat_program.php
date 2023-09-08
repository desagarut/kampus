<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
?>
    <div class="col-md-12">

<div class="row">
        <div class="col-md-2">
            <a href="<?= site_url('keluarga/clear') ?>" class="small-card-footer" title="Lihat Daftar Keluarga">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-3"><i class="fas fa-envelope-open"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Artikel</span>
                        <?php foreach ($artikel as $data) : ?>
                            <span class="info-box-number"><?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-2">
            <a href="<?= site_url('surat_masuk') ?>" class="small-card-footer" title="Administrasi Surat">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-3"><i class="fas fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Surat Masuk</span>
                        <?php foreach ($surat_masuk as $data) : ?>
                            <span class="info-box-number"><?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="<?= site_url('surat_keluar') ?>" class="small-card-footer" title="Administrasi Surat">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-3"><i class="fas fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Surat Keluar</span>
                        <?php foreach ($surat_keluar as $data) : ?>
                            <span class="info-box-number"><?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="<?= site_url('surat') ?>" class="small-card-footer" title="Administrasi Surat">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-3"><i class="fas fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Surat Mahasiswa</span>
                        <?php foreach ($surat_keluar as $data) : ?>
                            <span class="info-box-number"><?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-2">
            <a href="<?= site_url('sid_core') ?>" title="Lihat Desa">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-purple elevation-3"><i class="fas fa-camera"></i></span>
                        <div class="info-box-content">
                        <?php foreach ($pegawai as $data) : ?>
                            <span class="info-box-text">Foto</span>
                            <span class="info-box-number"><?= $data['jumlah'] ?> <small></small></span>
                        <?php endforeach; ?>
                        </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="<?= site_url('penduduk/clear') ?>" title="Lihat Daftar Penduduk">
                <div class="info-box  mb-3">
                    <span class="info-box-icon bg-maroon elevation-3"><i class="fas fa-play"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Video</span>
                        <?php foreach ($penduduk as $data) : ?>
                            <span class="info-box-number">
                                <?= $data['jumlah'] ?>
                                <small></small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
