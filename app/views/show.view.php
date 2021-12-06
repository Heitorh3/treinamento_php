<h2>Show User</h2>

<ul>
    <li>
        <a href="<?php echo URL_ROOT; ?>/user/<?php echo $user->id;?>/show">
            <?php echo $user->name; ?>
        </a>
    </li>
    <li>
      <?php echo $user->email; ?>
    </li>
</ul>