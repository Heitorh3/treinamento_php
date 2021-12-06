<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
</head>
  <body>
    <div id="header">
      <?php echo require('partials/header.php'); ?>
    </div>
    <div id="content">
      <?php require $view; ?>
  </body>
</html>