<?php $this->layout('index.view', ['title' => $title]) ?>

<h2>Contato</h2>

<form method="post" action="/contact">
    <input type="text" name="name" id="name" placeholder="Seu nome"  value="<?php echo getOld('name'); ?>"/>
    <?php echo getFlash('name'); ?>
    <br/>
    <input type="text" name="email" id="email" placeholder="Seu email"  value="<?php echo getOld('email'); ?>"/>
    <?php echo getFlash('email'); ?>
    <br/>
    <input type="text" name="subject" id="subject" placeholder="Assunto"  value="<?php echo getOld('subject'); ?>"/>
    <?php echo getFlash('subject'); ?>
    <br/>

    <textarea placeholder="Messagem" name="messagem" value="<?php echo getOld('messagem'); ?>"></textarea>
    <?php echo getFlash('messagem'); ?>
    <br/>

    <button type="submit">Enviar</button>
</form>