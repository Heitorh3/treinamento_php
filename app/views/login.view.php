<?php $this->layout('index.view', [ 'title' => $title ]) ?>

<?php if (!logged()) : ?>
<h2>Login</h2>

<?php echo getFlash('message');
    ?>

<form  action='/login' method='POST'>
  <div class='mb-3'>
    <label for='email' class='form-label'>Email address</label>
    <input type='email' name='email' class='form-control' id='email' aria-describedby='emailHelp' value='heitorh3@gmail.com'>
    <div id='emailHelp' class='form-text'>Nunca compartilharemos seu e-mail com mais ninguém</div>
  </div>

  <div class='mb-3'>
    <label for='password' class='form-label'>Password</label>
    <input type='password' name='password' class='form-control' id='password' value='rasmuslerdorf'>
  </div>

  <button type='submit' class='btn btn-primary'>Submit</button>
</form>

<?php else: ?>
  <h2>Você já esta logado no sistema.</h2>
<?php endif;
?>