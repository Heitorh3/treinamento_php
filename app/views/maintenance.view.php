<?php $this->layout('index.view', ['title' => $title]) ?>

<?php $this->start('styles') ?>
  <link rel="stylesheet" href="/assets/css/style_maintenance.css">
<?php $this->stop() ?>

<h2><?php echo $subtitle ?></h2>
<h5><?php echo $description ?></h5>