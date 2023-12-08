<?php $this->layout('index.view', ['title' => $title]); ?>

<h2>Users</h2>

{{ flash('success') | raw }}
{{ flash('error') | raw }}

<form method="get" action="/">
    <input type="text" name="search" placeholder="Digite o nome que deseja buscar...">

    <button type="submit">Buscar</button>
</form>

<ul>
  <?php foreach ($users->rows as $user) { ?>
      <li>
          <a href="<?php echo URL_ROOT; ?>user/<?php echo $user->id; ?>/show">
            <?php echo $user->name; ?>            
          </a>          
      </li>     
      <li>
        <?php echo $user->cpf; ?> 
      </li>
  <?php } ?>
</ul>

<?php echo $links; ?>