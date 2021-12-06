<ul id="menu_list">
  <li><a href="/">Home</a></li>
  <li><a href="/login">Login</a></li>
  <li><a href="/user/create">Cadastro</a></li>
</ul>

<div id="status_login">
    Bem vindo,
    <?php if (logged()) : ?>
        <!--
        <?php if (user()->path) : ?>
            <img src="/<?php echo user()->path ?>" class="rounded-circle" width="50" height="40">
        <?php endif; ?>
        -->
            <?php echo user()->name; ?> | <a href="/logout">Logout</a> |
        <a href="/user/edit/profile">Edit profile</a>
    <?php else : ?>
            visitante
    <?php endif; ?>
</div>