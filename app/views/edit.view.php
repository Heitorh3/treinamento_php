<?php $this->layout('index.view', ['title' => $title]) ?>

<h2>Editar usuário - <?php echo $user->name ?></h2>

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