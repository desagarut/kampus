<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="pcoded-main-container">
	<div class="pcoded-content">
 
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Pengelolaan SPPT <?= ucwords($this->setting->sebutan_desa) ?> <?= $desa["nama_desa"]; ?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('home') ?>"><i class="feather icon-home"></i></a></li>
						<li class="breadcrumb-item active"><a href="#!">Pertanahan</a></li>
              <li class="breadcrumb-item"><a href="#!">Rekapitulasi</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12">
      <div class="card">
        <card class="card-header">
          <!-- Start Menu -->
          <?php $this->load->view('data_sppt/menu.php') ?>
          <!-- end Menu -->
        </card>
        <div class="card-body">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <p class="mb-0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <h6 class="m-b-15 text-center">Realisasi PBB</h6>
                      <div id="pie-chart-2" style="width:100%"></div>

                      <?php if (isset($data)) { $d = $data->row();?>
                      <h6 class="m-b-10 m-t-10 text-center">Objek Pajak: <?= $d->jumlah_nop ?></h6>
                      <div class="row justify-content-center m-t-10 b-t-default m-l-0 m-r-0 text-center">
                        <div class="col m-t-15 b-r-default">
                          <h6 class="text-muted">Lunas</h6>
                          <h6><?= $rupiah($d->pajak_lunas) ?></h6>
                        </div>
                        <div class="col m-t-15">
                          <h6 class="text-muted">Terhutang</h6>
                          <h6><?= $rupiah($d->pajak_terhutang) ?></h6>
                        </div>
                      </div>
                      <a href="<?= site_url('data_sppt') ?>"><button class="btn btn-info btn-block">Daftar SPPT</button></a>
                    <?php
                    }
                    ?>

                  </div>
                </div>
              </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(function() {
    var options = {
      chart: {
        height: 320,
        type: 'donut',
      },
      labels: ['Pajak Lunas', 'Pajak Terhutang'],
      series: [<?= $d->pajak_lunas ?>, <?= $d->pajak_terhutang ?>],
      colors: ["#0e9e4a", "#ff5252"],
      legend: {
        show: true,
        position: 'bottom',
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              name: {
                show: true
              },
              value: {
                show: true
              }
            }
          }
        }
      },
      dataLabels: {
        enabled: true,
        dropShadow: {
          enabled: false,
        }
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom'
          }
        }
      }]
    }
    var chart = new ApexCharts(
      document.querySelector("#pie-chart-2"),
      options
    );
    chart.render();
  });
</script>