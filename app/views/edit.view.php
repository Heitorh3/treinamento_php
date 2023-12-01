<?php $this->layout('index.view', ['title' => $title]); ?>

<?php $this->start('styles'); ?>
  <link rel="stylesheet" href="css/styles.css">
<?php $this->stop(); ?>

<h2>Editar usuário - <?php echo $user->name; ?></h2>

<?php echo getFlash('success', 'background-color:green;color:white'); ?>
<?php echo getFlash('error', 'background-color:red;color:white'); ?>

<?php if ($user->path) { ?>
    <img src="<?php echo $user->path; ?>" alt="<?php echo $user->name; ?>" />
<?php } ?>

<form class="row g-3" method="post" action="/user/<?php echo $user->id; ?>/update">
    <?php echo getCsrf(); ?>

    <div class="col-md-6">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="<?php echo $user->name; ?>"/>
        <?php echo getFlash('name'); ?>
    </div>
    
    <div class="col-md-6">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo $user->cpf; ?>"/>
        <?php echo getFlash('cpf'); ?>
    </div>

    <div class="col-md-6">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $user->email; ?>"/>
        <?php echo getFlash('email'); ?>
    </div>
  
     <div class="col-12">
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div> 
</form>

<hr>
    <?php echo getFlash('password_success', 'color:green'); ?>
    <?php echo getFlash('password_error'); ?>

    <form class="row g-3"  action="/password/user/<?php echo $user->id; ?>" method="post">
        <?php echo getCsrf(); ?>

        <div class="col-md-3">
            <label for="password">Password:</label>
            <input type="text" name="password" id="password">
            <?php echo getFlash('password'); ?>
        </div>

        <div class="col-md-3">
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="text" name="password_confirmation" id="password_confirmation">
            <?php echo getFlash('password_confirmation'); ?>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>  
    </form>
<hr>

<form class="row g-3" action="/user/image/update" method="post" enctype="multipart/form-data">
    <div class="col-md-3">
        <label class="custom-file-upload">
            <input type="file" name="file" accept="image/gif, image/png, image/jpeg">Click aqui para upload do arquivo
        </label>
    </div>
    
    <div class="col-12">
       <button type="submit" class="btn btn-primary">Alterar foto</button>
    </div> 
</form>