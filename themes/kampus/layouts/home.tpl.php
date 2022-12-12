<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes .'/partials/carousel') ?>
<?php $this->load->view($folder_themes .'/partials/service') ?>
<?php $this->load->view($folder_themes .'/partials/about') ?>
<?php $this->load->view($folder_themes .'/partials/categories') ?>
<?php $this->load->view($folder_themes .'/partials/courses') ?>
<?php if ($aparatur_desa) : ?>
    <?php $this->load->view($folder_themes .'/partials/team') ?>
<?php endif;?>

<?php $this->load->view($folder_themes .'/partials/testimonial') ?>

