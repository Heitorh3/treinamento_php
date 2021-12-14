<?php $this->layout('index.view', ['title' => $title]) ?>

<h2>Cadastrar usuário</h2>


<form method="post" action="/user/store">
    <?php echo getCsrf(); ?>
    
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name"  value="<?php echo getOld('name'); ?>"/>
    <?php echo getFlash('name'); ?>
    <br />

    <label for="email">Email:</label>
    <input type="text" name="email" id="email"  value="<?php echo getOld('email'); ?>"/>
    <?php echo getFlash('email'); ?>
    <br />

    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" />
    <?php echo getFlash('password'); ?>
    <br />
    
    <input type="submit" value="Cadastrar" />
</form>