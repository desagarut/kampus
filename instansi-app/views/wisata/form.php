<div class="pcoded-main-container">
	<div class="pcoded-content">

  <div class="page-header">
    <h5 class="m-b-10">Form Tambah/Ubah</h5>
    <ul class="breadcrumb">
      <li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= site_url('wisata')?>"><i class="fa fa-dashboard"></i> Daftar Wisata</a></li>
      <li class="active">Tambah/Ubah</li>
    </ul>
  </div>
  <div class="card">
    <form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <div class="row">
        <div class="col-md-12">
          
            <div class="card-header"> <a href="<?= site_url('wisata') ?>" class="btn btn-info btn-sm "><i class="fa fa-arrow-circle-left"></i> Kembali</a> </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group"> 
                    <!-- Start Info Pedagang -->
                    <label class="col-sm-3 control-label" style="text-align:left; color:#999">INFO PENGELOLA</label>
                  </div>
                  <div class="form-group" >
                    <label class="col-sm-3 control-label "  for="nama_pengelola">Nama | NIK </label>
                    <div class="col-sm-3">
                      <input maxlength="50" class="form-control input-sm nomor_sk required" name="nama_pengelola" id="nama_pengelola" value="<?=$wisata['nama_pengelola']?>" type="text" placeholder="Nama pengelola" />
                    </div>
                    <div class="col-sm-2">
                      <input maxlength="50" class="form-control input-sm " name="nik" id="nik" value="<?= $wisata['nik'] ?>" type="text" placeholder="NIK" />
                    </div>
                    <div class="col-sm-2">
                        <input maxlength="50" class="form-control input-sm required" name="no_hp_pengelola" id="no_hp_pengelola" value="<?= $wisata['no_hp_pengelola'] ?>" type="text" placeholder="Contoh: 82317883161" />
                    </div>
                  </div>
                  <div class="form-group" >
                    <label class="col-sm-3 control-label "  for="alamat_pengelola">Alamat Tempat Pengelola</label>
                    <div class="col-sm-7">
                      <textarea rows="3" class="form-control input-sm required" name="alamat_pengelola" id="alamat_pengelola" placeholder="Alamat Tempat Tinggal"><?= $wisata['alamat_pengelola']?>
</textarea>
                    </div>
                  </div>
                  <!-- End Info Pedagang --> 
                  
                  <!-- Start Info Usaha -->
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left; color:#999">INFO USAHA</label>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="nama">Nama Usaha</label>
                    <div class="col-sm-7">
                      <input name="nama" class="form-control input-sm nomor_sk required" maxlength="50" type="text" value="<?=$wisata['nama']?>">
                      </input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama_toko" class="col-sm-3 control-label">Tahun Berdiri</label>
                    <div class="col-sm-2">
                      <select class="form-control input-sm select2 required" id="tahun_berdiri" name="tahun_berdiri" style="width:100%;">
                        <?php for ($i = date('Y'); $i >= 1999; $i--) : ?>
                        <option value="<?= $i ?>">
                        <?= $i ?>
                        </option>
                        <?php endfor; ?>
                      </select>
                      <script>
                      $('#tahun_berdiri').val("<?= $wisata['tahun_berdiri']?>");
                       </script> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="kepemilikan_tempat_wisata">Kepemilikan Tempat Wisata</label>
                    <div class="col-sm-7">
                      <select class="form-control input-sm select2 required" id="kepemilikan_tempat_wisata" name="kepemilikan_tempat_wisata" style="width:100%;">
                        <?php foreach ($kepemilikan_tempat_wisata as $value) : ?>
                        <option <?= $value === $wisata['kepemilikan_tempat_wisata'] ? 'selected' : '' ?> value="<?= $value ?>">
                        <?= $value ?>
                        </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;">Jumlah Karyawan</label>
                    <div class="col-sm-2">
                      <input maxlength="50" class="form-control input-sm required" name="jumlah_karyawan" id="jumlah_karyawan" value="<?= $wisata['jumlah_karyawan']?>" type="text" placeholder="Jumlah Karyawan" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lokasi" class="col-sm-3 control-label">Lokasi Wisata</label>
                    <div class="col-sm-7">
                      <input maxlength="200" class="form-control input-sm required" name="lokasi" id="lokasi" value="<?= $wisata['lokasi']?>" type="text" placeholder="Lokasi Objek Wisata" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="keterangan_lokasi">Keterangan Lokasi Usaha</label>
                    <div class="col-sm-7">
                      <textarea rows="5" class="form-control input-sm required" name="keterangan_lokasi" id="keterangan_lokasi" placeholder="Keterangan lengkap lokasi usaha, seperti patokan"><?= $wisata['keterangan_lokasi']?>
</textarea>
                    </div>
                  </div>
                  <?php if ($wisata['gambar']): ?>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="nama"></label>
                    <div class="col-sm-7">
                      <input type="hidden" name="old_gambar" value="<?=  $wisata['gambar']?>">
                      <img class="attachment-img img-responsive img-circle" width="200px" height="200px" src="<?= AmbilGaleri($wisata['gambar'], 'sedang') ?>" alt="Gambar Album"> </div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="upload">Unggah Gambar Utama Lokasi Wisata</label>
                    <div class="col-sm-7">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control <?php !($wisata['gambar']) and print('') ?>" id="file_path">
                        <input id="file" type="file" class="hidden" name="gambar">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-box"  id="file_browser"><i class="fa fa-search"></i> Browse</button>
                        </span> </div>
                      <?php $upload_mb = max_upload();?>
                      <p>
                        <label class="control-label">Batas maksimal pengunggahan berkas <strong>
                          <?=$upload_mb?>
                          MB.</strong></label>
                        <br/>
                        <span class="help-block"><code>(Kosongkan jika tidak ingin mengubah foto)</code></span></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="sumber_dana">Sumber Dana</label>
                    <div class="col-sm-5">
                      <select class="form-control input-sm select2" id="sumber_dana" name="sumber_dana" style="width:100%;">
                        <?php foreach ($sumber_dana as $value) : ?>
                        <option <?= $value === $wisata['sumber_dana'] ? 'selected' : '' ?> value="<?= $value ?>">
                        <?= $value ?>
                        </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;">Taksiran Modal/Aset</label>
                    <div class="col-sm-2">
                      <input class="form-control input-sm required" name="taksiran_modal" id="taksiran_modal" value="<?= $rupiah($wisata['taksiran_modal']) ?>" type="text" placeholder="Taksiran Modal" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;">Taksiran Omset</label>
                    <div class="col-sm-2">
                      <input maxlength="50" class="form-control input-sm required" name="taksiran_omset" id="taksiran_omset" value="<?= $rupiah($wisata['taksiran_omset']) ?>" type="text" placeholder="Taksiran Omset" />
                    </div>
                  </div>
                  <!-- End Info Usaha --> 
                  
                  <!-- Start Klasifikasi Usaha -->
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left; color:#999">INFO OBJEK WISATA</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="jenis_wisata">Jenis Wisata</label>
                    <div class="col-sm-5">
                      <select class="form-control input-sm select2 required" id="jenis_wisata" name="jenis_wisata" style="width:100%;">
                        <?php foreach ($jenis_wisata as $value) : ?>
                        <option <?= $value === $wisata['jenis_wisata'] ? 'selected' : '' ?> value="<?= $value ?>">
                        <?= $value ?>
                        </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="daya_tarik_utama">Daya tarik utama</label>
                    <div class="col-sm-5">
                      <textarea rows="5" class="form-control input-sm required" name="daya_tarik_utama" id="daya_tarik_utama" placeholder="Keterangan lengkap tentang apa yang menjadi unggulan objek wisata"><?= $wisata['daya_tarik_utama']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="luas_area">Luas Area Objek Wisata</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm required" name="luas_area" id="luas_area" value="<?= $wisata['luas_area'] ?>" type="text" placeholder="Luas area dalam Meter persegi" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="jarak_tempuh">Jarak Tempuh dari Kecamatan</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm required" name="jarak_tempuh" id="jarak_tempuh" value="<?= $wisata['jarak_tempuh'] ?>" type="text" placeholder="Jarak tempuh dalam Kilo Meter" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="waktu_tempuh">Waktu Tempuh dari Kecamatan</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm required" name="waktu_tempuh" id="waktu_tempuh" value="<?= $wisata['waktu_tempuh'] ?>" type="text" placeholder="Waktu tempuh dalam menit" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="cara_tempuh">Cara Tempuh</label>
                    <div class="col-sm-5">
                      <textarea rows="5" class="form-control input-sm required" name="cara_tempuh" id="cara_tempuh" placeholder="Cara mencapai lokasi objek wisata"><?= $wisata['cara_tempuh']?></textarea>
                    </div>
                  </div>
                  
                  <!-- Start Sosial Media -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left; color:#999">SOSIAL MEDIA</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="email">Email</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="email" id="email" value="<?= $wisata['email'] ?>" type="text" placeholder="Email" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="website">Website</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="website" id="website" value="<?= $wisata['website'] ?>" type="text" placeholder="Website" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="fb">Facebook</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="fb" id="fb" value="<?= $wisata['fb'] ?>" type="text" placeholder="Nama Facebook" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="ig">Instagram</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="ig" id="ig" value="<?= $wisata['fb'] ?>" type="text" placeholder="Nama Akun Instagram" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="youtube">Youtube</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="youtube" id="youtube" value="<?= $wisata['youtube'] ?>" type="text" placeholder="Chanel Youtube" />
                    </div>
                  </div>
                  <!-- End Klasifikasi Usaha --> 
                  <!-- Start Perizinan Usaha -->
                  
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left; color:#999">IZIN USAHA</label>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="skdu">SKDU (Surat Keterangan Domisili Usaha)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="skdu" id="skdu" value="<?= $wisata['skdu'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="iud">IUD (Izin Usaha Dagang)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="iud" id="iud" value="<?= $wisata['iud'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="npwp">NPWP (Nomor Pokok Wajib Pajak)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="npwp" id="npwp" value="<?= $wisata['npwp'] ?>" type="text" placeholder="Nomor NPWP" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="situ">SITU (Surat Izin Tempat Usaha)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="situ" id="situ" value="<?= $wisata['situ'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="siui">SIUI (Surat Izin Usaha Industri)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="siui" id="siui" value="<?= $wisata['siui'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="sip">SIP (Surat Izin Prinsip)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="sip" id="sip" value="<?= $wisata['sip'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="siup">SIUP (Surat Izin Usaha Perdagangan)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="siup" id="siup" value="<?= $wisata['siup'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="tdp">TDP (Tanda Daftar Perusahaan)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="tdp" id="tdp" value="<?= $wisata['tdp'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="tdi">TDI (Tanda Daftar Industri)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="tdi" id="tdi" value="<?= $wisata['tdi'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="imb">IMB (Surat Izin Mendirikan Bangunan)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="imb" id="imb" value="<?= $wisata['imb'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="bpom">BPOM (Badan Pengawas Obat dan Makanan)</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="bpom" id="bpom" value="<?= $wisata['bpom'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="ho">HO Surat Izin Gangguan</label>
                    <div class="col-sm-5">
                      <input maxlength="50" class="form-control input-sm" name="ho" id="ho" value="<?= $wisata['ho'] ?>" type="text" placeholder="Nomor Surat" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" style="text-align:left;" for="keterangan">Keterangan</label>
                    <div class="col-sm-7">
                      <textarea id="keterangan" class="form-control input-sm" type="text" placeholder="Keterangan" name="keterangan"><?= $wisata['keterangan'] ?>
</textarea>
                    </div>
                  </div>
                  
                  <!-- End Perizinan Usaha --> 
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="col-xs-12">
                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
