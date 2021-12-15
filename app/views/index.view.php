<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?=$this->section('styles')?>

  <title><?= $this->e($title)?></title>
</head>
  <body>
   
    <div id="header">
      <?=$this->insert('partials/header')?>
    </div>
   
    <div id="content">
      <?=$this->section('content')?>
    </div>
   
    <script src="/app.js"></script>
    <?=$this->section('scripts')?>
  </body>
</html>