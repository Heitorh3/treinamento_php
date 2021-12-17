<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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