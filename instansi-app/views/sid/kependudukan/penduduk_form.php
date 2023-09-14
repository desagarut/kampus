<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Biodata Penduduk</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="<?= site_url('penduduk/clear') ?>"> Daftar Penduduk</a></li>
            <li class="breadcrumb-item active"><a href="#!">Biodata</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content" id="maincontent">
    <div class="row">
      <form id="mainform" name="mainform" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" onreset="reset_hamil();">
        <div class="row">
          <?php include("instansi-app/views/sid/kependudukan/penduduk_form_isian.php"); ?>
        </div>
      </form>
    </div>
  </section>
</div>