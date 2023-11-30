<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">      
        <?php if (!logged()) : ?>
          <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="/login">Login</a>
          </li>
          <li>
            <a class="nav-link" href="/user/create">Cadastro</a></li>
        <?php endif; ?>

        <div id="status_login" class="mt-2">
            Bem vindo,
            <?php if (logged()) : ?>
                
                <?php if (user()->path) : ?>
                  <img src="/<?php echo user()->path ?>" class="rounded-circle" width="50" height="40">
                <?php endif; ?>
                
                <?php echo user()->name; ?> | <a href="/logout">Logout</a> |
                  <a href="/user/edit/profile">Edit profile</a>
            <?php else : ?>
                    visitante
            <?php endif; ?>
        </div>
        
      </ul>
    </div>
  </div>
</nav>