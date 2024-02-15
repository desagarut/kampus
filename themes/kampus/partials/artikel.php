<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $article = $single_artikel ?>

<div class="container-xxl py-5">
	<div class="container">

		<div class="col-md-12 col-12">
			<div class="product-images">
				<main id="gallery">
					<div class="main-img text-center">
						<?php if ($article['gambar']) : ?>
							<img src="<?= AmbilFotoArtikel($article['gambar'], 'sedang') ?>" alt="<?= $article['judul'] ?>" id="current" style="object-fit:contain;">
						<?php else : ?>
							<img class="img-fluid" src="<?= base_url() ?>themes/kampus/assets/img/noimage.png" alt="Belum Ada Gambar" style="object-fit: cover;">
						<?php endif ?>
					</div>
				</main>
			</div>
			<div class="product-details-info mt-2">
				<div class="single-block">
					<div class="row">
						<div class="col-md-12">
							<div class="info-body custom-responsive-margin">
								<h4> <a href="#">
										<?= $article['judul'] ?>
									</a> </h4>
							</div>
							<div class="entry-content">
								<p>
									<?= $article['isi'] ?>
									<?php for ($i = 1; $i <= 3; $i++) : ?>
									<?php endfor ?>
									<?php if ($article['dokumen']) : ?>
								<div class="content__attachment --mt-4"> <strong>Dokumen Lampiran</strong> <a href="<?= base_url(LOKASI_DOKUMEN . $article['dokumen']) ?>" class="content__attachment__link btn btn-primary"> <i class="fa fa-cloud-download content__attachment__icon"></i> <span>
											<?= $article['link_dokumen'] ?>
										</span> </a> </div>
							<?php endif ?>
							</p>
							</div>
							<div class="entry-footer clearfix">
								<div class="float-right share"> <a href="http://twitter.com/share?url=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Twitter"><i class="icofont-twitter"></i></a> <a href="http://www.facebook.com/sharer.php?u=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Facebook"><i class="icofont-facebook"></i></a> <a href="https://telegram.me/share/url?url=<?= site_url('artikel/' . buat_slug($article)) ?>&text=<?= $article["judul"]; ?>" title="Share on Telegram"><i class="icofont-telegram"></i></a> <a href="https://api.whatsapp.com/send?text=<?= site_url('artikel/' . buat_slug($article)) ?>" title="Share on Whatsapp"><i class="icofont-whatsapp"></i></a> </div>
							</div>
							<div class="row align-items-center">
								<div class="col-md-12">
									<div class="d-flex border-top">
										<small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-danger me-2"></i><?= $article['owner'] ?></small>
										<small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-danger me-2"></i><?= tgl_indo($article['tgl_upload']) ?></small>
										<small class="flex-fill text-center border-end py-2"><i class="fa fa-eye text-danger me-2"></i><?= $article['hit'] ?></small>
										<small class="flex-fill text-center py-2"><i class="fa fa-folder text-danger me-2"></i><?= $article['kategori'] ?></small>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>