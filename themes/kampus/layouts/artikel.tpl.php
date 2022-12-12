<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($folder_themes . '/commons/head') ?>

<body>
<?php $this->load->view($folder_themes . '/commons/spinner.php') ?>
<?php $this->load->view($folder_themes . '/commons/nav.php') ?>
<?php //$this->load->view($folder_themes .'/partials/carousel') ?>

<?php $this->load->view($folder_themes .'/partials/artikel') ?>
<?php $this->load->view($folder_themes .'/partials/about') ?>
<?php $this->load->view($folder_themes .'/partials/categories') ?>
<?php $this->load->view($folder_themes .'/partials/courses') ?>
<?php $this->load->view($folder_themes .'/partials/team') ?>
<?php $this->load->view($folder_themes .'/partials/testimonial') ?>

</body>
<?php $this->load->view($folder_themes . '/commons/footer') ?>

</body>

</html>