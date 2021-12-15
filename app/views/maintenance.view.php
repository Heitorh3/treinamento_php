<?php $this->layout('index.view', ['title' => $title]) ?>

<?php $this->start('styles') ?>
  <link rel="stylesheet" href="style_maintenance.css">
<?php $this->stop() ?>

<h2><?php echo $description ?></h2>