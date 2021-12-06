<h2>Users</h2>

<ul>
  <?php foreach ($users as $user) : ?>
      <li>
          <a href="<?php echo URL_ROOT; ?>user/<?php echo $user->id;?>/show">
              <?php echo $user->name; ?>
          </a>
      </li>
  <?php endforeach; ?>
</ul>