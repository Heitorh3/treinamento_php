<?php $this->layout('index.view', ['title' => $title]) ?>

<h2>Editar usuário - <?php echo $user->name ?></h2>

<?php echo getFlash('success', 'background-color:green;color:white'); ?>
<?php echo getFlash('error', 'background-color:red;color:white'); ?>

<?php if($user->path): ?>
    <img src="/<?php echo $user->path ?>" alt="<?php echo $user->name ?>" />
<?php endif; ?>

<form method="post" action="/user/<?php echo $user->id ?>/update">
    <?php echo getCsrf(); ?>

    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" value="<?php echo $user->name ?>"/>
    <?php echo getFlash('name'); ?>
    <br />
    
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo $user->email ?>"/>
    <?php echo getFlash('email'); ?>
    <br />
  
    <input type="submit" value="Atualizar" />
</form>

<form action="/user/image/update" method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/gif, image/png, image/jpeg">
    <button type="submit">Alterar foto</button>
</form>