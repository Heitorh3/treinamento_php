<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css" >
  <?=$this->section('styles')?>

  <title><?= $this->e($title)?></title>
</head>
  <body>
   <div class="container">
    <div id="header">
      <?=$this->insert('partials/header')?>
    </div>
   </div>
  
   <div class="container">
    <div id="content">
      <?=$this->section('content')?>
    </div>
   </div>

   <script src="/app.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <?=$this->section('scripts')?>
  </body>
</html>